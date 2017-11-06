<?php
/*
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
*
*  @author Manuel José Pulgar Anguita <tech@affilired.com>
*  @copyright  2017 Affilired SL
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

/**
 * @since 1.5.0
 */
class spindokProductFeedModuleFrontController extends ModuleFrontController
{

	/**
	* Returns true if the request, with passed parameters, is autorized to get data. False otherwise.
	*/
	private function getAutorization($merchant_id) {
		
		if (empty($merchant_id)) return false;		
		// include here the security measured we want to take to avoid everyone who calls this script to crawl the product feed
		
		return true;
	}

	/**
	 * @see FrontController::postProcess()
	 */
	public function display()
	{


		$merchant_id = Tools::getValue('merchant_id');
		// $max_product = Tools::getValue('max_product');

		$autorized = $this -> getAutorization($merchant_id);  

		if (empty($autorized)) { /* if is zero or is null, the access request is denied */
			header('HTTP/1.0 403 Forbidden');
			echo '<h1>HTTP/1.0 403 Forbidden</h1>';
			// die("salida1");
		}

		else {

			$feed_product_data = $this -> getProductFeedArr($merchant_id);

			$feed = $this -> getXML_from_DATA($feed_product_data);
			// die("salida2");
			header("Content-Type: application/xml");
			echo $feed;
		}
		return true;
	}

	private function getLangIsoFromLangID($lang_array, $lang_id){
		$result = null;
		foreach ($lang_array as $lang) {
			if ($lang['id_lang'] == $lang_id) {
				return $lang['iso_code'];
			}
		}
		return $result;
	}

	private function getXML_from_DATA($feed_product_data) {
		// die('<pre>'.var_export($feed_product_data, true)) ;

		$current_context = Context::getContext();
		$original_context_shop = $current_context -> shop;
		$link = new Link;//because getImageLInk is not static function
		$protocol = Tools::getShopProtocol();

		$xml = new DOMDocument( "1.0", "utf-8" );
		$feedXML = $xml -> createElement( "xmlproductfeed" );
		$xml -> appendChild( $feedXML );

		$default_language = Configuration::get('PS_LANG_DEFAULT');

		// $feedXML = new SimpleXMLElement("<xmlproductfeed></xmlproductfeed>");
		if (!empty($feed_product_data)) {
			foreach ($feed_product_data as $store_name => $store_data) {
				$storeNode = $xml -> createElement( "shop" );
				// $storeNode = $feedXML -> addChild('shop');
				$storeNode -> setAttribute('name', $store_name);

				$feedXML -> appendChild( $storeNode );

				$productsNode = $xml -> createElement( 'products' );
				$storeNode -> appendChild( $productsNode );
				
				$id_store = Shop::getIdByName($store_name);
				$lang_list = Language::getLanguages(true, $id_store);

				$current_shop = new Shop($id_store);
				$current_context -> shop = $current_shop;
				$currency = Currency::getDefaultCurrency();

				foreach ($store_data as $product_data) {
					// $feedXML->addAttribute('newsPagePrefix', 'value goes here');
					$productNode = $xml -> createElement( 'product' );
					// $languageNode = $storeNode -> addChild($iso_lang);
					$productsNode -> appendChild( $productNode );

					$product_name = $xml -> createElement( "name" );
					$productNode -> appendChild( $product_name );

					foreach ($product_data -> name as $name_lang_id => $translated_name) {
						$name_iso_code = $this -> getLangIsoFromLangID ($lang_list, $name_lang_id);
						if (empty($name_iso_code)) {
							continue;
						}
						$name_lang = $xml -> createElement( $name_iso_code );
						$product_name -> appendChild( $name_lang );
						$text_content = (!empty($translated_name)?$translated_name:"");
						$CDATA_name = $xml -> createCDATASection($text_content);
						$name_lang -> appendChild( $CDATA_name );
					}


					$product_description = $xml -> createElement( "description" );
					$productNode -> appendChild( $product_description );

					foreach ($product_data -> description as $description_lang_id => $translated_description) {
						$description_iso_code = $this -> getLangIsoFromLangID ($lang_list, $description_lang_id);
						if (empty($description_iso_code)) {
							continue;
						}
						$description_lang = $xml -> createElement( $description_iso_code );
						$product_description -> appendChild( $description_lang );
						$text_content = (!empty($translated_description)?$translated_description:"");
						$CDATA_description = $xml -> createCDATASection($text_content);
						$description_lang -> appendChild( $CDATA_description );
					}

					$product_net_price = $xml -> createElement( "net_price",  round ($product_data -> price_tax_exc, 2));
					$productNode -> appendChild( $product_net_price );

					$product_currency = $xml -> createElement( "currency",  $currency -> iso_code);
					$productNode -> appendChild( $product_currency );

					$images = $product_data -> getImages($default_language, $current_context);
					if (!empty($images)) {

						$product_images = $xml -> createElement( "images" );
						$productNode -> appendChild( $product_images );

						foreach ($images as $image) {
							
							$imagePath = $link->getImageLink($product_data -> link_rewrite[$default_language], $image['id_image']);

							$imagePath = $protocol.$imagePath;

							$product_image = $xml -> createElement( "image", $imagePath );
							$product_images -> appendChild( $product_image );

						}
					}

					$product_url = $xml -> createElement( "url" );
					$productNode -> appendChild( $product_url );

					foreach ($product_data -> link_rewrite as $url_lang_id => $translated_url) {
						$url_iso_code = $this -> getLangIsoFromLangID ($lang_list, $url_lang_id);
						if (empty($url_iso_code)) {
							continue;
						}
						$url = $link -> getProductLink($product_data, null, null, null, $url_lang_id, $id_store);
						$url_content = (!empty($url)?$url:"");

						$CDATA_url = $xml -> createCDATASection($url_content);


						$url_lang = $xml -> createElement( $url_iso_code);
						$url_lang -> appendChild( $CDATA_url );

						$product_url -> appendChild( $url_lang );

						/*
						   public function getProductLink(
								$product,
								$alias = null,
								$category = null,
								$ean13 = null,
								$idLang = null,
								$idShop = null,
						*/
					}

				}
			}
		}
		// return $feedXML->asXML();
		$current_context -> shop = $original_context_shop;

		return $xml -> saveXml();
	}

	/**
	* Returns if a product is being sold in a store (in a multistore context)
	*/
	private function productBelongsToStore($id_product, $SHOP_DATA) {
		foreach ($SHOP_DATA as $shop_product_data) {
			if ($shop_product_data['id_product'] == $id_product) {
				return true;
			}
		}
		return false;
	}

	/**
	* Returns whether a product is active in a store or not (in a multistore context)
	*/
	private function productIsActiveInStore($id_product, $SHOP_DATA) {
		foreach ($SHOP_DATA as $shop_product_data) {
			if ($shop_product_data['id_product'] == $id_product) {
				return $shop_product_data['active'] == 1;
			}
		}
		return false;
	}

	/**
	* Returns a product price depending on the selected store (in a multistore context)
	*/
	private function getPriceInStore($id_product, $SHOP_DATA) {
		foreach ($SHOP_DATA as $shop_product_data) {
			if ($shop_product_data['id_product'] == $id_product) {
				return $shop_product_data['price'];
			}
		}
		return null;
	}

	/**
	* Gets an array with the Product info for the feeds system
	*/
	private function getProductFeedArr( $merchant_id ) {

		// $shop_list = $this -> getShopsList();
		$result = null;

		$spindok_merchant_collection = new PrestashopCollection('spindokModel');
		$spindok_merchant_collection->where('merchant_id', '=', $merchant_id);
		$inflated_collection = $spindok_merchant_collection -> getAll();
		

		if (!empty($inflated_collection)) {

			foreach ($inflated_collection as $spindok_merchant ) {
				$merchant_id = $spindok_merchant -> merchant_id;
				$id_store = $spindok_merchant -> id_store;
				$shop = new Shop($id_store);

				if (!$shop -> active) {
					continue;
				}

				// $lang_list = Language::getLanguages(true, $id_store);


				$product_collection = new PrestashopCollection('Product');

				$result = array();
				
				$SHOP_selection = "SELECT id_product, id_shop, price, active FROM "._DB_PREFIX_."product_shop WHERE id_shop = $id_store";
				$SHOP_DATA = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($SHOP_selection);

				foreach ($product_collection as $product_obj) {
					$id = $product_obj -> id;
					$is_in_store = $this -> productBelongsToStore($id, $SHOP_DATA);
					
					if (!$is_in_store) { 
						// if the product doesn't belong to the store, we are not interested in it
						continue;
					}

					$active = $this -> productIsActiveInStore($id, $SHOP_DATA);
					if (!$active) {
						// if the product is not active in the store, we are not interested in it
						continue;
					}

					$price_in_store = $this -> getPriceInStore($id, $SHOP_DATA);

					$product_obj -> price_tax_exc = $price_in_store;

					$result[$shop -> name][] = $product_obj;
				}

			}

		}
		
		return $result;						
	}

	// @todo delete this
	private function generateURL() {
		$this->context->link->getModuleLink('spindok','ProductFeed',array_of_params);
		// index.php?fc=module&module=MODULE_NAME&controller=CONTROLLER_NAME or something like this




		// index.php?fc=module&module=spindok&controller=productfeed
	}

}
