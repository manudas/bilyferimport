<?php


class AdminImportController extends AdminImportControllerCore
{


    public function __construct()
    {
        parent::__construct();

        switch ((int)Tools::getValue('entity')) {
           
            case $this->entities[$this->l('Products')]:
                self::$validators['image'] = array(
                    'AdminImportController',
                    'split'
                );

                $this->available_fields = array(
                    'no' => array('label' => $this->l('Ignore this column')),
                    'id' => array('label' => $this->l('ID')),
                    'active' => array('label' => $this->l('Active (0/1)')),
                    'name' => array('label' => $this->l('Name')),
                    'category' => array('label' => $this->l('Categories (x,y,z...)')),
                    // 'price_tex' => array('label' => $this->l('Price tax excluded')),
                    'price_tin' => array('label' => $this->l('Price tax included')),
                    // 'id_tax_rules_group' => array('label' => $this->l('Tax rules ID')),
                    'wholesale_price' => array('label' => $this->l('Wholesale price')),
                    'on_sale' => array('label' => $this->l('On sale (0/1)')),
                    'reduction_price' => array('label' => $this->l('Discount amount')),
                    'reduction_percent' => array('label' => $this->l('Discount percent')),
                    'reduction_from' => array('label' => $this->l('Discount from (yyyy-mm-dd)')),
                    'reduction_to' => array('label' => $this->l('Discount to (yyyy-mm-dd)')),
                    'reference' => array('label' => $this->l('Reference #')),
                    // 'supplier_reference' => array('label' => $this->l('Supplier reference #')),
                    // 'supplier' => array('label' => $this->l('Supplier')),
                    // 'manufacturer' => array('label' => $this->l('Manufacturer')),
                    'ean13' => array('label' => $this->l('EAN13')),
                    // 'upc' => array('label' => $this->l('UPC')),
                    // 'ecotax' => array('label' => $this->l('Ecotax')),
                    // 'width' => array('label' => $this->l('Width')),
                    // 'height' => array('label' => $this->l('Height')),
                    // 'depth' => array('label' => $this->l('Depth')),
                    // 'weight' => array('label' => $this->l('Weight')),
                    'quantity' => array('label' => $this->l('Quantity')),
                    // 'minimal_quantity' => array('label' => $this->l('Minimal quantity')),
                    // 'visibility' => array('label' => $this->l('Visibility')),
                    'additional_shipping_cost' => array('label' => $this->l('Additional shipping cost')),
                    'unity' => array('label' => $this->l('Unit for the unit price')),
                    'unit_price' => array('label' => $this->l('Unit price')),
                    'description_short' => array('label' => $this->l('Short description')),
                    'description' => array('label' => $this->l('Description')),
                    'tags' => array('label' => $this->l('Tags (x,y,z...)')),
                    'meta_title' => array('label' => $this->l('Meta title')),
                    'meta_keywords' => array('label' => $this->l('Meta keywords')),
                    'meta_description' => array('label' => $this->l('Meta description')),
                    'link_rewrite' => array('label' => $this->l('URL rewritten')),
                    // 'available_now' => array('label' => $this->l('Text when in stock')),
                    // 'available_later' => array('label' => $this->l('Text when backorder allowed')),
                    // 'available_for_order' => array('label' => $this->l('Available for order (0 = No, 1 = Yes)')),
                    // 'available_date' => array('label' => $this->l('Product availability date')),
                    // 'date_add' => array('label' => $this->l('Product creation date')),
                    'show_price' => array('label' => $this->l('Show price (0 = No, 1 = Yes)')),
                    'image' => array('label' => $this->l('Image URLs (x,y,z...)')),
                    'delete_existing_images' => array(
                        'label' => $this->l('Delete existing images (0 = No, 1 = Yes)')
                    ),
                    'features' => array('label' => $this->l('Feature (Name:Value:Position:Customized)')),
                    // 'online_only' => array('label' => $this->l('Available online only (0 = No, 1 = Yes)')),
                    // 'condition' => array('label' => $this->l('Condition')),
                    'customizable' => array('label' => $this->l('Customizable (0 = No, 1 = Yes)')),
                    // 'uploadable_files' => array('label' => $this->l('Uploadable files (0 = No, 1 = Yes)')),
                    // 'text_fields' => array('label' => $this->l('Text fields (0 = No, 1 = Yes)')),
                    'out_of_stock' => array('label' => $this->l('Action when out of stock')),
                    'shop' => array(
                        'label' => $this->l('ID / Name of shop'),
                        'help' => $this->l('Ignore this field if you don\'t use the Multistore tool. If you leave this field empty, the default shop will be used.'),
                    ),
                    'advanced_stock_management' => array(
                        'label' => $this->l('Advanced Stock Management'),
                        'help' => $this->l('Enable Advanced Stock Management on product (0 = No, 1 = Yes).')
                    ),
                    'depends_on_stock' => array(
                        'label' => $this->l('Depends on stock'),
                        'help' => $this->l('0 = Use quantity set in product, 1 = Use quantity from warehouse.')
                    ),
                    'warehouse' => array(
                        'label' => $this->l('Warehouse'),
                        'help' => $this->l('ID of the warehouse to set as storage.')
                    ),
                );

                self::$default_values = array(
                    'id_category' => array((int)Configuration::get('PS_HOME_CATEGORY')),
                    'id_category_default' => null,
                    'active' => '1',
                    'width' => 0.000000,
                    'height' => 0.000000,
                    'depth' => 0.000000,
                    'weight' => 0.000000,
                    'visibility' => 'both',
                    'additional_shipping_cost' => 0.00,
                    'unit_price' => 0,
                    'quantity' => 0,
                    'minimal_quantity' => 1,
                    'price' => 0,
                    'id_tax_rules_group' => 0,
                    'description_short' => array((int)Configuration::get('PS_LANG_DEFAULT') => ''),
                    'link_rewrite' => array((int)Configuration::get('PS_LANG_DEFAULT') => ''),
                    'online_only' => 0,
                    'condition' => 'new',
                    'available_date' => date('Y-m-d'),
                    'date_add' => date('Y-m-d H:i:s'),
                    'date_upd' => date('Y-m-d H:i:s'),
                    'customizable' => 0,
                    'uploadable_files' => 0,
                    'text_fields' => 0,
                    'advanced_stock_management' => 0,
                    'depends_on_stock' => 0,
                );
            break;

        }

    }


    

   

    /*
    * Return fields to be display AS piece of advise
    *
    * @param $in_array boolean
    * @return string or return array
    */
    public function getAvailableFields($in_array = false)
    {
        $i = 0;
        $fields = array();
        $keys = array_keys($this->available_fields);
        array_shift($keys);
        foreach ($this->available_fields as $k => $field) {
            if ($k === 'no') {
                continue;
            }
            if ($k === 'price_tin') {
                $fields[$i - 1] = '<div>'.$this->available_fields[$keys[$i - 1]]['label'].' '.$this->l('or').' '.$field['label'].'</div>';
            } else {
                if (isset($field['help'])) {
                    $html = '&nbsp;<a href="#" class="help-tooltip" data-toggle="tooltip" title="'.$field['help'].'"><i class="icon-info-sign"></i></a>';
                } else {
                    $html = '';
                }
                $fields[] = '<div>'.$field['label'].$html.'</div>';
            }
            ++$i;
        }
        if ($in_array) {
            return $fields;
        } else {
            return implode("\n\r", $fields);
        }
    }



    /**
     * copyImg copy an image located in $url and save it in a path
     * according to $entity->$id_entity .
     * $id_image is used if we need to add a watermark
     *
     * @param int $id_entity id of product or category (set in entity)
     * @param int $id_image (default null) id of the image if watermark enabled.
     * @param string $url path or url to use
     * @param string $entity 'products' or 'categories'
     * @param bool $regenerate
     * @return bool
     */
    protected static function copyImg($id_entity, $id_image = null, $url, $entity = 'products', $regenerate = true)
    {
        $tmpfile = tempnam(_PS_TMP_IMG_DIR_, 'ps_import');
        $watermark_types = explode(',', Configuration::get('WATERMARK_TYPES'));

        switch ($entity) {
            default:
            case 'products':
                $image_obj = new Image($id_image);
                $path = $image_obj->getPathForCreation();
            break;
            case 'categories':
                $path = _PS_CAT_IMG_DIR_.(int)$id_entity;
            break;
            case 'manufacturers':
                $path = _PS_MANU_IMG_DIR_.(int)$id_entity;
            break;
            case 'suppliers':
                $path = _PS_SUPP_IMG_DIR_.(int)$id_entity;
            break;
        }

        $url = urldecode(trim($url));
        $parced_url = parse_url($url);

        if (isset($parced_url['path'])) {
            $uri = ltrim($parced_url['path'], '/');
            $parts = explode('/', $uri);
            foreach ($parts as &$part) {
                $part = rawurlencode($part);
            }
            unset($part);
            $parced_url['path'] = '/'.implode('/', $parts);
        }

        if (isset($parced_url['query'])) {
            $query_parts = array();
            parse_str($parced_url['query'], $query_parts);
            $parced_url['query'] = http_build_query($query_parts);
        }

        if (!function_exists('http_build_url')) {
            require_once(_PS_TOOL_DIR_.'http_build_url/http_build_url.php');
        }

        $url = http_build_url('', $parced_url);

        $orig_tmpfile = $tmpfile;

        if (Tools::copy($url, $tmpfile)) {
            // Evaluate the memory required to resize the image: if it's too much, you can't resize it.
            if (!ImageManager::checkImageMemoryLimit($tmpfile)) {
                @unlink($tmpfile);
                return false;
            }

            $tgt_width = $tgt_height = 0;
            $src_width = $src_height = 0;
            $error = 0;
            ImageManager::resize($tmpfile, $path.'.jpg', null, null, 'jpg', false, $error, $tgt_width, $tgt_height, 5,
                                 $src_width, $src_height);
            $images_types = ImageType::getImagesTypes($entity, true);

            if ($regenerate) {
                $previous_path = null;
                $path_infos = array();
                $path_infos[] = array($tgt_width, $tgt_height, $path.'.jpg');
                foreach ($images_types as $image_type) {
                    $tmpfile = self::get_best_path($image_type['width'], $image_type['height'], $path_infos);

                    if (ImageManager::resize($tmpfile, $path.'-'.stripslashes($image_type['name']).'.jpg', $image_type['width'],
                                         $image_type['height'], 'jpg', false, $error, $tgt_width, $tgt_height, 5,
                                         $src_width, $src_height)) {
                        // the last image should not be added in the candidate list if it's bigger than the original image
                        if ($tgt_width <= $src_width && $tgt_height <= $src_height) {
                            $path_infos[] = array($tgt_width, $tgt_height, $path.'-'.stripslashes($image_type['name']).'.jpg');
                        }
                        if ($entity == 'products') {
                            if (is_file(_PS_TMP_IMG_DIR_.'product_mini_'.(int)$id_entity.'.jpg')) {
                               unlink(_PS_TMP_IMG_DIR_.'product_mini_'.(int)$id_entity.'.jpg');
                            }
                            if (is_file(_PS_TMP_IMG_DIR_.'product_mini_'.(int)$id_entity.'_'.(int)Context::getContext()->shop->id.'.jpg')) {
                               unlink(_PS_TMP_IMG_DIR_.'product_mini_'.(int)$id_entity.'_'.(int)Context::getContext()->shop->id.'.jpg');
                            }
                        }
                    }
                    if (in_array($image_type['id_image_type'], $watermark_types)) {
                        Hook::exec('actionWatermark', array('id_image' => $id_image, 'id_product' => $id_entity));
                    }
                }
            }
        } else {
            @unlink($orig_tmpfile);
            return false;
        }
        unlink($orig_tmpfile);
        return true;
    }

    private function getCombinationAttributif($line, $iso_lang) {


        $lang_offset = $this -> getLangOffset($is_lang);

        $result = array(
            0 => array( 'group'     => 'color',
                        'attribute' => $line[AdminImportController::$firstAttributeOffset + $lang_offset + AdminImportController::$colorOffset]),
            2 => array( 'group'     => 'material',  
                        'attribute' => $line[AdminImportController::$firstAttributeOffset + $lang_offset + AdminImportController::$materialOffset])
        );

        return $result;

    }

    private function removeCombinationAttributes(&$line, $iso_lang){
        $lang_offset = $this -> getLangOffset($is_lang);
        for ($i = 0; $i < AdminImportController::$totalAttributes; $i++){
            unset($line[AdminImportController::$firstAttributeOffset + $lang_offset + $i]);
        }
    }

    private function removeOtherLanguageInfo(&$line, $iso_lang) {
        if (strtolower($is_lang) == 'es' ) {
            $remove_lang_iso = 'en';
        }
        else {
            $remove_lang_iso = 'es';
        }
        $lang_offset = $this -> getLangOffset($is_lang);

        if ($lang_offset != 0) {
            $remove_index_limit = count($line);
        }
        else {
            $remove_index_limit = $this -> getLangOffset($iso_lang);
        }
        for ($i = $lang_offset; $i < $remove_index_limit; $i++) {
            unset($line[$i]);
        }
    }


    public function productImport($iso_lang)
    {
        if (!defined('PS_MASS_PRODUCT_CREATION')) {
            define('PS_MASS_PRODUCT_CREATION', true);
        }

        $this->receiveTab();
        $handle = $this->openCsvFile();
        $default_language_id = (int)Configuration::get('PS_LANG_DEFAULT');
        $id_lang = Language::getIdByIso(Tools::getValue('iso_lang'));
        if (!Validate::isUnsignedId($id_lang)) {
            $id_lang = $default_language_id;
        }
        AdminImportController::setLocale();
        $shop_ids = Shop::getCompleteListOfShopsID();

        $convert = Tools::getValue('convert');
        $force_ids = Tools::getValue('forceIDs');
        $match_ref = Tools::getValue('match_ref');
        $regenerate = Tools::getValue('regenerate');
        $shop_is_feature_active = Shop::isFeatureActive();
        Module::setBatchMode(true);

        for ($current_line = 0; $line = fgetcsv($handle, MAX_LINE_SIZE, $this->separator); $current_line++) {
            if ($convert) {
                $line = $this->utf8EncodeArray($line);
            }


            $info = AdminImportController::getMaskedRow($line);
            $combinations = $this -> getCombinationAttributes($info, $iso_lang);
            

            $this -> removeCombinationAttributes($info, $iso_lang);
            
            $this -> removeOtherLanguageInfo($info, $iso_lang);


            if ($force_ids && isset($info['id']) && (int)$info['id']) {
                $product = new Product((int)$info['id']);
            } elseif ($match_ref && array_key_exists('reference', $info)) {
                $datas = Db::getInstance()->getRow('
						SELECT p.`id_product`
						FROM `'._DB_PREFIX_.'product` p
						'.Shop::addSqlAssociation('product', 'p').'
						WHERE p.`reference` = "'.pSQL($info['reference']).'"
					', false);
                if (isset($datas['id_product']) && $datas['id_product']) {
                    $product = new Product((int)$datas['id_product']);
                } else {
                    $product = new Product();
                }
            } elseif (array_key_exists('id', $info) && (int)$info['id'] && Product::existsInDatabase((int)$info['id'], 'product')) {
                $product = new Product((int)$info['id']);
            } else {
                $product = new Product();
            }


            $update_advanced_stock_management_value = false;
            if (isset($product->id) && $product->id && Product::existsInDatabase((int)$product->id, 'product')) {
                $product->loadStockData();
                $update_advanced_stock_management_value = true;
                $category_data = Product::getProductCategories((int)$product->id);

                if (is_array($category_data)) {
                    foreach ($category_data as $tmp) {
                        if (!isset($product->category) || !$product->category || is_array($product->category)) {
                            $product->category[] = $tmp;
                        }
                    }
                }
            }

            AdminImportController::setEntityDefaultValues($product);
            AdminImportController::arrayWalk($info, array('AdminImportController', 'fillInfo'), $product);

            if (!$shop_is_feature_active) {
                $product->shop = (int)Configuration::get('PS_SHOP_DEFAULT');
            } elseif (!isset($product->shop) || empty($product->shop)) {
                $product->shop = implode($this->multiple_value_separator, Shop::getContextListShopID());
            }

            if (!$shop_is_feature_active) {
                $product->id_shop_default = (int)Configuration::get('PS_SHOP_DEFAULT');
            } else {
                $product->id_shop_default = (int)Context::getContext()->shop->id;
            }

            // link product to shops
            $product->id_shop_list = array();
            foreach (explode($this->multiple_value_separator, $product->shop) as $shop) {
                if (!empty($shop) && !is_numeric($shop)) {
                    $product->id_shop_list[] = Shop::getIdByName($shop);
                } elseif (!empty($shop)) {
                    $product->id_shop_list[] = $shop;
                }
            }

            if ((int)$product->id_tax_rules_group != 0) {
                if (Validate::isLoadedObject(new TaxRulesGroup($product->id_tax_rules_group))) {
                    $address = $this->context->shop->getAddress();
                    $tax_manager = TaxManagerFactory::getManager($address, $product->id_tax_rules_group);
                    $product_tax_calculator = $tax_manager->getTaxCalculator();
                    $product->tax_rate = $product_tax_calculator->getTotalRate();
                } else {
                    $this->addProductWarning(
                        'id_tax_rules_group',
                        $product->id_tax_rules_group,
                        Tools::displayError('Invalid tax rule group ID. You first need to create a group with this ID.')
                    );
                }
            }
            if (isset($product->manufacturer) && is_numeric($product->manufacturer) && Manufacturer::manufacturerExists((int)$product->manufacturer)) {
                $product->id_manufacturer = (int)$product->manufacturer;
            } elseif (isset($product->manufacturer) && is_string($product->manufacturer) && !empty($product->manufacturer)) {
                if ($manufacturer = Manufacturer::getIdByName($product->manufacturer)) {
                    $product->id_manufacturer = (int)$manufacturer;
                } else {
                    $manufacturer = new Manufacturer();
                    $manufacturer->name = $product->manufacturer;
                    $manufacturer->active = true;

                    if (($field_error = $manufacturer->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                        ($lang_field_error = $manufacturer->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $manufacturer->add()) {
                        $product->id_manufacturer = (int)$manufacturer->id;
                        $manufacturer->associateTo($product->id_shop_list);
                    } else {
                        $this->errors[] = sprintf(
                            Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
                            $manufacturer->name,
                            (isset($manufacturer->id) && !empty($manufacturer->id))? $manufacturer->id : 'null'
                        );
                        $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                            Db::getInstance()->getMsgError();
                    }
                }
            }

            if (isset($product->supplier) && is_numeric($product->supplier) && Supplier::supplierExists((int)$product->supplier)) {
                $product->id_supplier = (int)$product->supplier;
            } elseif (isset($product->supplier) && is_string($product->supplier) && !empty($product->supplier)) {
                if ($supplier = Supplier::getIdByName($product->supplier)) {
                    $product->id_supplier = (int)$supplier;
                } else {
                    $supplier = new Supplier();
                    $supplier->name = $product->supplier;
                    $supplier->active = true;

                    if (($field_error = $supplier->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                        ($lang_field_error = $supplier->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $supplier->add()) {
                        $product->id_supplier = (int)$supplier->id;
                        $supplier->associateTo($product->id_shop_list);
                    } else {
                        $this->errors[] = sprintf(
                            Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
                            $supplier->name,
                            (isset($supplier->id) && !empty($supplier->id))? $supplier->id : 'null'
                        );
                        $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                            Db::getInstance()->getMsgError();
                    }
                }
            }

            if (isset($product->price_tex) && !isset($product->price_tin)) {
                $product->price = $product->price_tex;
            } elseif (isset($product->price_tin) && !isset($product->price_tex)) {
                $product->price = $product->price_tin;
                // If a tax is already included in price, withdraw it from price
                if ($product->tax_rate) {
                    $product->price = (float)number_format($product->price / (1 + $product->tax_rate / 100), 6, '.', '');
                }
            } elseif (isset($product->price_tin) && isset($product->price_tex)) {
                $product->price = $product->price_tex;
            }

            if (!Configuration::get('PS_USE_ECOTAX')) {
                $product->ecotax = 0;
            }

            if (isset($product->category) && is_array($product->category) && count($product->category)) {
                $product->id_category = array(); // Reset default values array
                foreach ($product->category as $value) {
                    if (is_numeric($value)) {
                        if (Category::categoryExists((int)$value)) {
                            $product->id_category[] = (int)$value;
                        } else {
                            $category_to_create = new Category();
                            $category_to_create->id = (int)$value;
                            $category_to_create->name = AdminImportController::createMultiLangField($value);
                            $category_to_create->active = 1;
                            $category_to_create->id_parent = Configuration::get('PS_HOME_CATEGORY'); // Default parent is home for unknown category to create
                            $category_link_rewrite = Tools::link_rewrite($category_to_create->name[$default_language_id]);
                            $category_to_create->link_rewrite = AdminImportController::createMultiLangField($category_link_rewrite);
                            if (($field_error = $category_to_create->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                                ($lang_field_error = $category_to_create->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $category_to_create->add()) {
                                $product->id_category[] = (int)$category_to_create->id;
                            } else {
                                $this->errors[] = sprintf(
                                    Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
                                    $category_to_create->name[$default_language_id],
                                    (isset($category_to_create->id) && !empty($category_to_create->id))? $category_to_create->id : 'null'
                                );
                                $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                                    Db::getInstance()->getMsgError();
                            }
                        }
                    } elseif (is_string($value) && !empty($value)) {
                        $category = Category::searchByPath($default_language_id, trim($value), $this, 'productImportCreateCat');
                        if ($category['id_category']) {
                            $product->id_category[] = (int)$category['id_category'];
                        } else {
                            $this->errors[] = sprintf(Tools::displayError('%1$s cannot be saved'), trim($value));
                        }
                    }
                }
                $product->id_category = array_values(array_unique($product->id_category));
            }

            // Will update default category if there is none set here. Home if no category at all.
            if (!isset($product->id_category_default) || !$product->id_category_default) {
                // this if will avoid ereasing default category if category column is not present in the CSV file (or ignored)
                if (isset($product->id_category[0])) {
                    $product->id_category_default = (int)$product->id_category[0];
                } else {
                    $defaultProductShop = new Shop($product->id_shop_default);
                    $product->id_category_default = Category::getRootCategory(null, Validate::isLoadedObject($defaultProductShop)?$defaultProductShop:null)->id;
                }
            }

            $link_rewrite = (is_array($product->link_rewrite) && isset($product->link_rewrite[$id_lang])) ? trim($product->link_rewrite[$id_lang]) : '';
            $valid_link = Validate::isLinkRewrite($link_rewrite);

            if ((isset($product->link_rewrite[$id_lang]) && empty($product->link_rewrite[$id_lang])) || !$valid_link) {
                $link_rewrite = Tools::link_rewrite($product->name[$id_lang]);
                if ($link_rewrite == '') {
                    $link_rewrite = 'friendly-url-autogeneration-failed';
                }
            }

            if (!$valid_link) {
                $this->warnings[] = sprintf(
                    Tools::displayError('Rewrite link for %1$s (ID: %2$s) was re-written as %3$s.'),
                    $product->name[$id_lang],
                    (isset($info['id']) && !empty($info['id']))? $info['id'] : 'null',
                    $link_rewrite
                );
            }

            if (!(is_array($product->link_rewrite) && count($product->link_rewrite))) {
                $product->link_rewrite = AdminImportController::createMultiLangField($link_rewrite);
            } else {
                $product->link_rewrite[(int)$id_lang] = $link_rewrite;
            }

            // replace the value of separator by coma
            if ($this->multiple_value_separator != ',') {
                if (is_array($product->meta_keywords)) {
                    foreach ($product->meta_keywords as &$meta_keyword) {
                        if (!empty($meta_keyword)) {
                            $meta_keyword = str_replace($this->multiple_value_separator, ',', $meta_keyword);
                        }
                    }
                }
            }

            // Convert comma into dot for all floating values
            foreach (Product::$definition['fields'] as $key => $array) {
                if ($array['type'] == Product::TYPE_FLOAT) {
                    $product->{$key} = str_replace(',', '.', $product->{$key});
                }
            }

            // Indexation is already 0 if it's a new product, but not if it's an update
            $product->indexed = 0;
            $productExistsInDatabase = false;

            if ($product->id && Product::existsInDatabase((int)$product->id, 'product')) {
                $productExistsInDatabase = true;
            }

            if (($match_ref && $product->reference && $product->existsRefInDatabase($product->reference)) || $productExistsInDatabase) {
                $product->date_upd = date('Y-m-d H:i:s');
            }

            $res = false;
            $field_error = $product->validateFields(UNFRIENDLY_ERROR, true);
            $lang_field_error = $product->validateFieldsLang(UNFRIENDLY_ERROR, true);
            if ($field_error === true && $lang_field_error === true) {
                // check quantity
                if ($product->quantity == null) {
                    $product->quantity = 0;
                }

                // If match ref is specified && ref product && ref product already in base, trying to update
                if ($match_ref && $product->reference && $product->existsRefInDatabase($product->reference)) {
                    $datas = Db::getInstance()->getRow('
						SELECT product_shop.`date_add`, p.`id_product`
						FROM `'._DB_PREFIX_.'product` p
						'.Shop::addSqlAssociation('product', 'p').'
						WHERE p.`reference` = "'.pSQL($product->reference).'"
					', false);
                    $product->id = (int)$datas['id_product'];
                    $product->date_add = pSQL($datas['date_add']);
                    $res = $product->update();
                } // Else If id product && id product already in base, trying to update
                elseif ($productExistsInDatabase) {
                    $datas = Db::getInstance()->getRow('
						SELECT product_shop.`date_add`
						FROM `'._DB_PREFIX_.'product` p
						'.Shop::addSqlAssociation('product', 'p').'
						WHERE p.`id_product` = '.(int)$product->id, false);
                    $product->date_add = pSQL($datas['date_add']);
                    $res = $product->update();
                }
                // If no id_product or update failed
                $product->force_id = (bool)$force_ids;

                if (!$res) {
                    if (isset($product->date_add) && $product->date_add != '') {
                        $res = $product->add(false);
                    } else {
                        $res = $product->add();
                    }
                }

                if ($product->getType() == Product::PTYPE_VIRTUAL) {
                    StockAvailable::setProductOutOfStock((int)$product->id, 1);
                } else {
                    StockAvailable::setProductOutOfStock((int)$product->id, (int)$product->out_of_stock);
                }
            }

            $shops = array();
            $product_shop = explode($this->multiple_value_separator, $product->shop);
            foreach ($product_shop as $shop) {
                if (empty($shop)) {
                    continue;
                }
                $shop = trim($shop);
                if (!empty($shop) && !is_numeric($shop)) {
                    $shop = Shop::getIdByName($shop);
                }

                if (in_array($shop, $shop_ids)) {
                    $shops[] = $shop;
                } else {
                    $this->addProductWarning(Tools::safeOutput($info['name']), $product->id, $this->l('Shop is not valid'));
                }
            }
            if (empty($shops)) {
                $shops = Shop::getContextListShopID();
            }
            // If both failed, mysql error
            if (!$res) {
                $this->errors[] = sprintf(
                    Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
                    (isset($info['name']) && !empty($info['name']))? Tools::safeOutput($info['name']) : 'No Name',
                    (isset($info['id']) && !empty($info['id']))? Tools::safeOutput($info['id']) : 'No ID'
                );
                $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                    Db::getInstance()->getMsgError();
            } else {
                // Product supplier
                if (isset($product->id) && $product->id && isset($product->id_supplier) && property_exists($product, 'supplier_reference')) {
                    $id_product_supplier = (int)ProductSupplier::getIdByProductAndSupplier((int)$product->id, 0, (int)$product->id_supplier);
                    if ($id_product_supplier) {
                        $product_supplier = new ProductSupplier($id_product_supplier);
                    } else {
                        $product_supplier = new ProductSupplier();
                    }

                    $product_supplier->id_product = (int)$product->id;
                    $product_supplier->id_product_attribute = 0;
                    $product_supplier->id_supplier = (int)$product->id_supplier;
                    $product_supplier->product_supplier_price_te = $product->wholesale_price;
                    $product_supplier->product_supplier_reference = $product->supplier_reference;
                    $product_supplier->save();
                }

                // SpecificPrice (only the basic reduction feature is supported by the import)
                if (!$shop_is_feature_active) {
                    $info['shop'] = 1;
                } elseif (!isset($info['shop']) || empty($info['shop'])) {
                    $info['shop'] = implode($this->multiple_value_separator, Shop::getContextListShopID());
                }

                // Get shops for each attributes
                $info['shop'] = explode($this->multiple_value_separator, $info['shop']);

                $id_shop_list = array();
                foreach ($info['shop'] as $shop) {
                    if (!empty($shop) && !is_numeric($shop)) {
                        $id_shop_list[] = (int)Shop::getIdByName($shop);
                    } elseif (!empty($shop)) {
                        $id_shop_list[] = $shop;
                    }
                }

                if ((isset($info['reduction_price']) && $info['reduction_price'] > 0) || (isset($info['reduction_percent']) && $info['reduction_percent'] > 0)) {
                    foreach ($id_shop_list as $id_shop) {
                        $specific_price = SpecificPrice::getSpecificPrice($product->id, $id_shop, 0, 0, 0, 1, 0, 0, 0, 0);

                        if (is_array($specific_price) && isset($specific_price['id_specific_price'])) {
                            $specific_price = new SpecificPrice((int)$specific_price['id_specific_price']);
                        } else {
                            $specific_price = new SpecificPrice();
                        }
                        $specific_price->id_product = (int)$product->id;
                        $specific_price->id_specific_price_rule = 0;
                        $specific_price->id_shop = $id_shop;
                        $specific_price->id_currency = 0;
                        $specific_price->id_country = 0;
                        $specific_price->id_group = 0;
                        $specific_price->price = -1;
                        $specific_price->id_customer = 0;
                        $specific_price->from_quantity = 1;

                        $specific_price->reduction = (isset($info['reduction_price']) && $info['reduction_price']) ? (float)str_replace(',', '.', $info['reduction_price']) : $info['reduction_percent'] / 100;
                        $specific_price->reduction_type = (isset($info['reduction_price']) && $info['reduction_price']) ? 'amount' : 'percentage';
                        $specific_price->from = (isset($info['reduction_from']) && Validate::isDate($info['reduction_from'])) ? $info['reduction_from'] : '0000-00-00 00:00:00';
                        $specific_price->to = (isset($info['reduction_to']) && Validate::isDate($info['reduction_to']))  ? $info['reduction_to'] : '0000-00-00 00:00:00';
                        if (!$specific_price->save()) {
                            $this->addProductWarning(Tools::safeOutput($info['name']), $product->id, $this->l('Discount is invalid'));
                        }
                    }
                }

                if (isset($product->tags) && !empty($product->tags)) {
                    if (isset($product->id) && $product->id) {
                        $tags = Tag::getProductTags($product->id);
                        if (is_array($tags) && count($tags)) {
                            if (!empty($product->tags)) {
                                $product->tags = explode($this->multiple_value_separator, $product->tags);
                            }
                            if (is_array($product->tags) && count($product->tags)) {
                                foreach ($product->tags as $key => $tag) {
                                    if (!empty($tag)) {
                                        $product->tags[$key] = trim($tag);
                                    }
                                }
                                $tags[$id_lang] = $product->tags;
                                $product->tags = $tags;
                            }
                        }
                    }
                    // Delete tags for this id product, for no duplicating error
                    Tag::deleteTagsForProduct($product->id);
                    if (!is_array($product->tags) && !empty($product->tags)) {
                        $product->tags = AdminImportController::createMultiLangField($product->tags);
                        foreach ($product->tags as $key => $tags) {
                            $is_tag_added = Tag::addTags($key, $product->id, $tags, $this->multiple_value_separator);
                            if (!$is_tag_added) {
                                $this->addProductWarning(Tools::safeOutput($info['name']), $product->id, $this->l('Tags list is invalid'));
                                break;
                            }
                        }
                    } else {
                        foreach ($product->tags as $key => $tags) {
                            $str = '';
                            foreach ($tags as $one_tag) {
                                $str .= $one_tag.$this->multiple_value_separator;
                            }
                            $str = rtrim($str, $this->multiple_value_separator);

                            $is_tag_added = Tag::addTags($key, $product->id, $str, $this->multiple_value_separator);
                            if (!$is_tag_added) {
                                $this->addProductWarning(Tools::safeOutput($info['name']), (int)$product->id, 'Invalid tag(s) ('.$str.')');
                                break;
                            }
                        }
                    }
                }

                //delete existing images if "delete_existing_images" is set to 1
                if (isset($product->delete_existing_images)) {
                    if ((bool)$product->delete_existing_images) {
                        $product->deleteImages();
                    }
                }

                if (isset($product->image) && is_array($product->image) && count($product->image)) {
                    $product_has_images = (bool)Image::getImages($this->context->language->id, (int)$product->id);
                    foreach ($product->image as $key => $url) {
                        $url = trim($url);
                        $error = false;
                        if (!empty($url)) {
                            $url = str_replace(' ', '%20', $url);

                            $image = new Image();
                            $image->id_product = (int)$product->id;
                            $image->position = Image::getHighestPosition($product->id) + 1;
                            $image->cover = (!$key && !$product_has_images) ? true : false;
                            // file_exists doesn't work with HTTP protocol
                            if (($field_error = $image->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                                ($lang_field_error = $image->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $image->add()) {
                                // associate image to selected shops
                                $image->associateTo($shops);
                                if (!AdminImportController::copyImg($product->id, $image->id, $url, 'products', !$regenerate)) {
                                    $image->delete();
                                    $this->warnings[] = sprintf(Tools::displayError('Error copying image: %s'), $url);
                                }
                            } else {
                                $error = true;
                            }
                        } else {
                            $error = true;
                        }

                        if ($error) {
                            $this->warnings[] = sprintf(Tools::displayError('Product #%1$d: the picture (%2$s) cannot be saved.'), $image->id_product, $url);
                        }
                    }
                }

                if (isset($product->id_category) && is_array($product->id_category)) {
                    $product->updateCategories(array_map('intval', $product->id_category));
                }

                $product->checkDefaultAttributes();
                if (!$product->cache_default_attribute) {
                    Product::updateDefaultAttribute($product->id);
                }

                // Features import
                $features = get_object_vars($product);

                if (isset($features['features']) && !empty($features['features'])) {
                    foreach (explode($this->multiple_value_separator, $features['features']) as $single_feature) {
                        if (empty($single_feature)) {
                            continue;
                        }
                        $tab_feature = explode(':', $single_feature);
                        $feature_name = isset($tab_feature[0]) ? trim($tab_feature[0]) : '';
                        $feature_value = isset($tab_feature[1]) ? trim($tab_feature[1]) : '';
                        $position = isset($tab_feature[2]) ? (int)$tab_feature[2] - 1 : false;
                        $custom = isset($tab_feature[3]) ? (int)$tab_feature[3] : false;
                        if (!empty($feature_name) && !empty($feature_value)) {
                            $id_feature = (int)Feature::addFeatureImport($feature_name, $position);
                            $id_product = null;
                            if ($force_ids || $match_ref) {
                                $id_product = (int)$product->id;
                            }
                            $id_feature_value = (int)FeatureValue::addFeatureValueImport($id_feature, $feature_value, $id_product, $id_lang, $custom);
                            Product::addFeatureProductImport($product->id, $id_feature, $id_feature_value);
                        }
                    }
                }
                // clean feature positions to avoid conflict
                Feature::cleanPositions();

                // set advanced stock managment
                if (isset($product->advanced_stock_management)) {
                    if ($product->advanced_stock_management != 1 && $product->advanced_stock_management != 0) {
                        $this->warnings[] = sprintf(Tools::displayError('Advanced stock management has incorrect value. Not set for product %1$s '), $product->name[$default_language_id]);
                    } elseif (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') && $product->advanced_stock_management == 1) {
                        $this->warnings[] = sprintf(Tools::displayError('Advanced stock management is not enabled, cannot enable on product %1$s '), $product->name[$default_language_id]);
                    } elseif ($update_advanced_stock_management_value) {
                        $product->setAdvancedStockManagement($product->advanced_stock_management);
                    }
                    // automaticly disable depends on stock, if a_s_m set to disabled
                    if (StockAvailable::dependsOnStock($product->id) == 1 && $product->advanced_stock_management == 0) {
                        StockAvailable::setProductDependsOnStock($product->id, 0);
                    }
                }

                // Check if warehouse exists
                if (isset($product->warehouse) && $product->warehouse) {
                    if (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
                        $this->warnings[] = sprintf(Tools::displayError('Advanced stock management is not enabled, warehouse not set on product %1$s '), $product->name[$default_language_id]);
                    } else {
                        if (Warehouse::exists($product->warehouse)) {
                            // Get already associated warehouses
                            $associated_warehouses_collection = WarehouseProductLocation::getCollection($product->id);
                            // Delete any entry in warehouse for this product
                            foreach ($associated_warehouses_collection as $awc) {
                                $awc->delete();
                            }
                            $warehouse_location_entity = new WarehouseProductLocation();
                            $warehouse_location_entity->id_product = $product->id;
                            $warehouse_location_entity->id_product_attribute = 0;
                            $warehouse_location_entity->id_warehouse = $product->warehouse;
                            if (WarehouseProductLocation::getProductLocation($product->id, 0, $product->warehouse) !== false) {
                                $warehouse_location_entity->update();
                            } else {
                                $warehouse_location_entity->save();
                            }
                            StockAvailable::synchronize($product->id);
                        } else {
                            $this->warnings[] = sprintf(Tools::displayError('Warehouse did not exist, cannot set on product %1$s.'), $product->name[$default_language_id]);
                        }
                    }
                }

                // stock available
                if (isset($product->depends_on_stock)) {
                    if ($product->depends_on_stock != 0 && $product->depends_on_stock != 1) {
                        $this->warnings[] = sprintf(Tools::displayError('Incorrect value for "depends on stock" for product %1$s '), $product->name[$default_language_id]);
                    } elseif ((!$product->advanced_stock_management || $product->advanced_stock_management == 0) && $product->depends_on_stock == 1) {
                        $this->warnings[] = sprintf(Tools::displayError('Advanced stock management not enabled, cannot set "depends on stock" for product %1$s '), $product->name[$default_language_id]);
                    } else {
                        StockAvailable::setProductDependsOnStock($product->id, $product->depends_on_stock);
                    }

                    // This code allows us to set qty and disable depends on stock
                    if (isset($product->quantity) && (int)$product->quantity) {
                        // if depends on stock and quantity, add quantity to stock
                        if ($product->depends_on_stock == 1) {
                            $stock_manager = StockManagerFactory::getManager();
                            $price = str_replace(',', '.', $product->wholesale_price);
                            if ($price == 0) {
                                $price = 0.000001;
                            }
                            $price = round(floatval($price), 6);
                            $warehouse = new Warehouse($product->warehouse);
                            if ($stock_manager->addProduct((int)$product->id, 0, $warehouse, (int)$product->quantity, 1, $price, true)) {
                                StockAvailable::synchronize((int)$product->id);
                            }
                        } else {
                            if ($shop_is_feature_active) {
                                foreach ($shops as $shop) {
                                    StockAvailable::setQuantity((int)$product->id, 0, (int)$product->quantity, (int)$shop);
                                }
                            } else {
                                StockAvailable::setQuantity((int)$product->id, 0, (int)$product->quantity, (int)$this->context->shop->id);
                            }
                        }
                    }
                } else {
                    // if not depends_on_stock set, use normal qty

                    if ($shop_is_feature_active) {
                        foreach ($shops as $shop) {
                            StockAvailable::setQuantity((int)$product->id, 0, (int)$product->quantity, (int)$shop);
                        }
                    } else {
                        StockAvailable::setQuantity((int)$product->id, 0, (int)$product->quantity, (int)$this->context->shop->id);
                    }
                }
            }
            foreach ($combinations as $combination) {
                $result = $this -> bilyferAttributeImport($combination, $id_lang);
            }
        }
        $this->closeCsvFile($handle);
        Module::processDeferedFuncCall();
        Module::processDeferedClearCache();
        Tag::updateTagCount();
    }



    protected static function fillInfo($infos, $key, &$entity)
    {
        $infos = trim($infos);

        $bullet = false;
        
        if (isset(self::$validators[$key][1]) && self::$validators[$key][1] == 'createMultiLangField' && Tools::getValue('iso_lang')) {
            $id_lang = Language::getIdByIso(Tools::getValue('iso_lang'));
            $tmp = call_user_func(self::$validators[$key], $infos);
            foreach ($tmp as $id_lang_tmp => $value) {
                /*
                $lang_obj = new Language($id_lang_tmp);
                $lang_iso = $lang_obj -> iso_code;
                if ((strtolower($lang_iso) == 'es') && (($key == "bullet1es") || ($key == "bullet2es") || ($key == "bullet3es")) ) {
                    $descriptiones .= "<li class='bullet'>$value</li>";
                }
                else if ((strtolower($lang_iso) == 'en') && (($key == "bullet1en") || ($key == "bullet2en") || ($key == "bullet3en")) ) {
                    $descriptionen .= "<li class='bullet'>$value</li>";
                }
                */
                if (empty($entity->{$key}[$id_lang_tmp]) || $id_lang_tmp == $id_lang) {
                    if(strpos(strtolower($key), 'bullet') !== false) { // es bullet
                        $bullet = true;
                        $entity->{"description"}[$id_lang_tmp] = "<ul><li class='bullet'>$value</li>";
                    }
                    else {
                        $entity->{$key}[$id_lang_tmp] = $value;
                    }
                }
                else {
                    if(strpos(strtolower($key), 'bullet') !== false) { // es bullet
                        $entity->{"description"}[$id_lang_tmp] .= "<li class='bullet'>$value</li>";
                    }
                }
            }
            if ($bullet == true) {
                foreach ($entity->{"description"} as $key => $description) {
                    $entity->{"description"}[$key] .= "</ul>";
                }
            }
        } elseif (!empty($infos) || $infos == '0') { // ($infos == '0') => if you want to disable a product by using "0" in active because empty('0') return true
                $entity->{$key} = isset(self::$validators[$key]) ? call_user_func(self::$validators[$key], $infos) : $infos;
        }
        
        return true;
    }


    public function productImportCreateCat($default_language_id, $category_name, $id_parent_category = null)
    {
        $category_to_create = new Category();
        $shop_is_feature_active = Shop::isFeatureActive();
        if (!$shop_is_feature_active) {
            $category_to_create->id_shop_default = 1;
        } else {
            $category_to_create->id_shop_default = (int)Context::getContext()->shop->id;
        }
        $category_to_create->name = AdminImportController::createMultiLangField(trim($category_name));
        $category_to_create->active = 1;
        $category_to_create->id_parent = (int)$id_parent_category ? (int)$id_parent_category : (int)Configuration::get('PS_HOME_CATEGORY'); // Default parent is home for unknown category to create
        $category_link_rewrite = Tools::link_rewrite($category_to_create->name[$default_language_id]);
        $category_to_create->link_rewrite = AdminImportController::createMultiLangField($category_link_rewrite);

        if (($field_error = $category_to_create->validateFields(UNFRIENDLY_ERROR, true)) === true &&
            ($lang_field_error = $category_to_create->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $category_to_create->add()) {
            /**
             * @see AdminImportController::productImport() @ Line 1480
             * @TODO Refactor if statement
             */
            // $product->id_category[] = (int)$category_to_create->id;
        } else {
            $this->errors[] = sprintf(
                Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
                $category_to_create->name[$default_language_id],
                (isset($category_to_create->id) && !empty($category_to_create->id))? $category_to_create->id : 'null'
            );
            $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                Db::getInstance()->getMsgError();
        }
    }

    public function bilyferAttributeImport($info, $id_lang)
    {

        $default_language = Configuration::get('PS_LANG_DEFAULT');
        $id_lang = Language::getIdByIso($id_lang);
        if (!Validate::isUnsignedId($id_lang)) {
            $id_lang = $default_language_id;
        }

        $groups = array();
        foreach (AttributeGroup::getAttributesGroups($id_lang) as $group) {
            $groups[$group['name']] = (int)$group['id_attribute_group'];
        }

        $attributes = array();
        foreach (Attribute::getAttributes($id_lang) as $attribute) {
            $attributes[$attribute['attribute_group'].'_'.$attribute['name']] = (int)$attribute['id_attribute'];
        }

        $info = array_map('trim', $info);

        AdminImportController::setDefaultValues($info);

        if (!$shop_is_feature_active) {
            $info['shop'] = 1;
        } elseif (!isset($info['shop']) || empty($info['shop'])) {
            $info['shop'] = implode($this->multiple_value_separator, Shop::getContextListShopID());
        }

        // Get shops for each attributes
        $info['shop'] = explode($this->multiple_value_separator, $info['shop']);

        $id_shop_list = array();
        if (is_array($info['shop']) && count($info['shop'])) {
            foreach ($info['shop'] as $shop) {
                if (!empty($shop) && !is_numeric($shop)) {
                    $id_shop_list[] = Shop::getIdByName($shop);
                } elseif (!empty($shop)) {
                    $id_shop_list[] = $shop;
                }
            }
        }

        if (isset($info['id_product']) && $info['id_product']) {
            $product = new Product((int)$info['id_product'], false, $id_lang);
        } elseif (Tools::getValue('match_ref') && isset($info['product_reference']) && $info['product_reference']) {
            $datas = Db::getInstance()->getRow('
                SELECT p.`id_product`
                FROM `'._DB_PREFIX_.'product` p
                '.Shop::addSqlAssociation('product', 'p').'
                WHERE p.`reference` = "'.pSQL($info['product_reference']).'"
            ', false);
            if (isset($datas['id_product']) && $datas['id_product']) {
                $product = new Product((int)$datas['id_product'], false, $id_lang);
            }
        } else {
            // continue;
        }

        $id_image = array();

        //delete existing images if "delete_existing_images" is set to 1
        if (array_key_exists('delete_existing_images', $info) && $info['delete_existing_images'] && !isset($this->cache_image_deleted[(int)$product->id])) {
            $product->deleteImages();
            $this->cache_image_deleted[(int)$product->id] = true;
        }

        if (isset($info['image_url']) && $info['image_url']) {
            $info['image_url'] = explode($this->multiple_value_separator, $info['image_url']);

            if (is_array($info['image_url']) && count($info['image_url'])) {
                foreach ($info['image_url'] as $url) {
                    $url = trim($url);
                    $product_has_images = (bool)Image::getImages($this->context->language->id, $product->id);

                    $image = new Image();
                    $image->id_product = (int)$product->id;
                    $image->position = Image::getHighestPosition($product->id) + 1;
                    $image->cover = (!$product_has_images) ? true : false;

                    $field_error = $image->validateFields(UNFRIENDLY_ERROR, true);
                    $lang_field_error = $image->validateFieldsLang(UNFRIENDLY_ERROR, true);

                    if ($field_error === true && $lang_field_error === true && $image->add()) {
                        $image->associateTo($id_shop_list);
                        if (!AdminImportController::copyImg($product->id, $image->id, $url, 'products', !$regenerate)) {
                            $this->warnings[] = sprintf(Tools::displayError('Error copying image: %s'), $url);
                            $image->delete();
                        } else {
                            $id_image[] = (int)$image->id;
                        }
                    } else {
                        $this->warnings[] = sprintf(
                            Tools::displayError('%s cannot be saved'),
                            (isset($image->id_product) ? ' ('.$image->id_product.')' : '')
                        );
                        $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').mysql_error();
                    }
                }
            }
        } elseif (isset($info['image_position']) && $info['image_position']) {
            $info['image_position'] = explode($this->multiple_value_separator, $info['image_position']);

            if (is_array($info['image_position']) && count($info['image_position'])) {
                foreach ($info['image_position'] as $position) {
                    // choose images from product by position
                    $images = $product->getImages($default_language);

                    if ($images) {
                        foreach ($images as $row) {
                            if ($row['position'] == (int)$position) {
                                $id_image[] = (int)$row['id_image'];
                                break;
                            }
                        }
                    }
                    if (empty($id_image)) {
                        $this->warnings[] = sprintf(
                            Tools::displayError('No image was found for combination with id_product = %s and image position = %s.'),
                            $product->id,
                            (int)$position
                        );
                    }
                }
            }
        }

        $id_attribute_group = 0;
        // groups
        $groups_attributes = array();
        if (isset($info['group'])) {
            foreach (explode($this->multiple_value_separator, $info['group']) as $key => $group) {
                if (empty($group)) {
                    continue;
                }
                $tab_group = explode(':', $group);
                $group = trim($tab_group[0]);
                if (!isset($tab_group[1])) {
                    $type = 'select';
                } else {
                    $type = trim($tab_group[1]);
                }

                // sets group
                $groups_attributes[$key]['group'] = $group;

                // if position is filled
                if (isset($tab_group[2])) {
                    $position = trim($tab_group[2]);
                } else {
                    $position = false;
                }

                if (!isset($groups[$group])) {
                    $obj = new AttributeGroup();
                    $obj->is_color_group = false;
                    $obj->group_type = pSQL($type);
                    $obj->name[$id_lang] = $group;
                    $obj->public_name[$id_lang] = $group;
                    $obj->position = (!$position) ? AttributeGroup::getHigherPosition() + 1 : $position;

                    if (($field_error = $obj->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                        ($lang_field_error = $obj->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true) {
                        $obj->add();
                        $obj->associateTo($id_shop_list);
                        $groups[$group] = $obj->id;
                    } else {
                        $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '');
                    }

                    // fills groups attributes
                    $id_attribute_group = $obj->id;
                    $groups_attributes[$key]['id'] = $id_attribute_group;
                } else {
                    // already exists

                    $id_attribute_group = $groups[$group];
                    $groups_attributes[$key]['id'] = $id_attribute_group;
                }
            }
        }

        // inits attribute
        $id_product_attribute = 0;
        $id_product_attribute_update = false;
        $attributes_to_add = array();


        // for each attribute
        if (isset($info['attribute'])) {
            foreach (explode($this->multiple_value_separator, $info['attribute']) as $key => $attribute) {
                if (empty($attribute)) {
                    continue;
                }
                $tab_attribute = explode(':', $attribute);
                $attribute = trim($tab_attribute[0]);
                // if position is filled
                if (isset($tab_attribute[1])) {
                    $position = trim($tab_attribute[1]);
                } else {
                    $position = false;
                }

                if (isset($groups_attributes[$key])) {
                    $group = $groups_attributes[$key]['group'];
                    if (!isset($attributes[$group.'_'.$attribute]) && count($groups_attributes[$key]) == 2) {
                        $id_attribute_group = $groups_attributes[$key]['id'];
                        $obj = new Attribute();
                        // sets the proper id (corresponding to the right key)
                        $obj->id_attribute_group = $groups_attributes[$key]['id'];
                        $obj->name[$id_lang] = str_replace('\n', '', str_replace('\r', '', $attribute));
                        $obj->position = (!$position && isset($groups[$group])) ? Attribute::getHigherPosition($groups[$group]) + 1 : $position;

                        if (($field_error = $obj->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                            ($lang_field_error = $obj->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true) {
                            $obj->add();
                            $obj->associateTo($id_shop_list);
                            $attributes[$group.'_'.$attribute] = $obj->id;
                        } else {
                            $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '');
                        }
                    }

                    $info['minimal_quantity'] = isset($info['minimal_quantity']) && $info['minimal_quantity'] ? (int)$info['minimal_quantity'] : 1;

                    $info['wholesale_price'] = str_replace(',', '.', $info['wholesale_price']);
                    $info['price'] = str_replace(',', '.', $info['price']);
                    $info['ecotax'] = str_replace(',', '.', $info['ecotax']);
                    $info['weight'] = str_replace(',', '.', $info['weight']);
                    $info['available_date'] = Validate::isDate($info['available_date']) ? $info['available_date'] : null;

                    if (!Validate::isEan13($info['ean13'])) {
                        $this->warnings[] = sprintf(Tools::displayError('EAN13 "%1s" has incorrect value for product with id %2d.'), $info['ean13'], $product->id);
                        $info['ean13'] = '';
                    }

                    if ($info['default_on']) {
                        $product->deleteDefaultAttributes();
                    }

                    // if a reference is specified for this product, get the associate id_product_attribute to UPDATE
                    if (isset($info['reference']) && !empty($info['reference'])) {
                        $id_product_attribute = Combination::getIdByReference($product->id, strval($info['reference']));

                        // updates the attribute
                        if ($id_product_attribute) {
                            // gets all the combinations of this product
                            $attribute_combinations = $product->getAttributeCombinations($id_lang);
                            foreach ($attribute_combinations as $attribute_combination) {
                                if ($id_product_attribute && in_array($id_product_attribute, $attribute_combination)) {
                                    $product->updateAttribute(
                                        $id_product_attribute,
                                        (float)$info['wholesale_price'],
                                        (float)$info['price'],
                                        (float)$info['weight'],
                                        0,
                                        (Configuration::get('PS_USE_ECOTAX') ? (float)$info['ecotax'] : 0),
                                        $id_image,
                                        strval($info['reference']),
                                        strval($info['ean13']),
                                        (int)$info['default_on'],
                                        0,
                                        strval($info['upc']),
                                        (int)$info['minimal_quantity'],
                                        $info['available_date'],
                                        null,
                                        $id_shop_list
                                    );
                                    $id_product_attribute_update = true;
                                    if (isset($info['supplier_reference']) && !empty($info['supplier_reference'])) {
                                        $product->addSupplierReference($product->id_supplier, $id_product_attribute, $info['supplier_reference']);
                                    }
                                }
                            }
                        }
                    }

                    // if no attribute reference is specified, creates a new one
                    if (!$id_product_attribute) {
                        $id_product_attribute = $product->addCombinationEntity(
                            (float)$info['wholesale_price'],
                            (float)$info['price'],
                            (float)$info['weight'],
                            0,
                            (Configuration::get('PS_USE_ECOTAX') ? (float)$info['ecotax'] : 0),
                            (int)$info['quantity'],
                            $id_image,
                            strval($info['reference']),
                            0,
                            strval($info['ean13']),
                            (int)$info['default_on'],
                            0,
                            strval($info['upc']),
                            (int)$info['minimal_quantity'],
                            $id_shop_list,
                            $info['available_date']
                        );

                        if (isset($info['supplier_reference']) && !empty($info['supplier_reference'])) {
                            $product->addSupplierReference($product->id_supplier, $id_product_attribute, $info['supplier_reference']);
                        }
                    }

                    // fills our attributes array, in order to add the attributes to the product_attribute afterwards
                    if (isset($attributes[$group.'_'.$attribute])) {
                        $attributes_to_add[] = (int)$attributes[$group.'_'.$attribute];
                    }

                    // after insertion, we clean attribute position and group attribute position
                    $obj = new Attribute();
                    $obj->cleanPositions((int)$id_attribute_group, false);
                    AttributeGroup::cleanPositions();
                }
            }
        }


        $product->checkDefaultAttributes();
        if (!$product->cache_default_attribute) {
            Product::updateDefaultAttribute($product->id);
        }
        if ($id_product_attribute) {
            // now adds the attributes in the attribute_combination table
            if ($id_product_attribute_update) {
                Db::getInstance()->execute('
                    DELETE FROM '._DB_PREFIX_.'product_attribute_combination
                    WHERE id_product_attribute = '.(int)$id_product_attribute);
            }

            foreach ($attributes_to_add as $attribute_to_add) {
                Db::getInstance()->execute('
                    INSERT IGNORE INTO '._DB_PREFIX_.'product_attribute_combination (id_attribute, id_product_attribute)
                    VALUES ('.(int)$attribute_to_add.','.(int)$id_product_attribute.')', false);
            }

            // set advanced stock managment
            if (isset($info['advanced_stock_management'])) {
                if ($info['advanced_stock_management'] != 1 && $info['advanced_stock_management'] != 0) {
                    $this->warnings[] = sprintf(Tools::displayError('Advanced stock management has incorrect value. Not set for product with id %d.'), $product->id);
                } elseif (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') && $info['advanced_stock_management'] == 1) {
                    $this->warnings[] = sprintf(Tools::displayError('Advanced stock management is not enabled, cannot enable on product with id %d.'), $product->id);
                } else {
                    $product->setAdvancedStockManagement($info['advanced_stock_management']);
                }
                // automaticly disable depends on stock, if a_s_m set to disabled
                if (StockAvailable::dependsOnStock($product->id) == 1 && $info['advanced_stock_management'] == 0) {
                    StockAvailable::setProductDependsOnStock($product->id, 0, null, $id_product_attribute);
                }
            }

            // Check if warehouse exists
            if (isset($info['warehouse']) && $info['warehouse']) {
                if (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
                    $this->warnings[] = sprintf(Tools::displayError('Advanced stock management is not enabled, warehouse is not set on product with id %d.'), $product->id);
                } else {
                    if (Warehouse::exists($info['warehouse'])) {
                        $warehouse_location_entity = new WarehouseProductLocation();
                        $warehouse_location_entity->id_product = $product->id;
                        $warehouse_location_entity->id_product_attribute = $id_product_attribute;
                        $warehouse_location_entity->id_warehouse = $info['warehouse'];
                        if (WarehouseProductLocation::getProductLocation($product->id, $id_product_attribute, $info['warehouse']) !== false) {
                            $warehouse_location_entity->update();
                        } else {
                            $warehouse_location_entity->save();
                        }
                        StockAvailable::synchronize($product->id);
                    } else {
                        $this->warnings[] = sprintf(Tools::displayError('Warehouse did not exist, cannot set on product %1$s.'), $product->name[$id_lang]);
                    }
                }
            }

            // stock available
            if (isset($info['depends_on_stock'])) {
                if ($info['depends_on_stock'] != 0 && $info['depends_on_stock'] != 1) {
                    $this->warnings[] = sprintf(Tools::displayError('Incorrect value for depends on stock for product %1$s '), $product->name[$id_lang]);
                } elseif ((!$info['advanced_stock_management'] || $info['advanced_stock_management'] == 0) && $info['depends_on_stock'] == 1) {
                    $this->warnings[] = sprintf(Tools::displayError('Advanced stock management is not enabled, cannot set depends on stock %1$s '), $product->name[$id_lang]);
                } else {
                    StockAvailable::setProductDependsOnStock($product->id, $info['depends_on_stock'], null, $id_product_attribute);
                }

                // This code allows us to set qty and disable depends on stock
                if (isset($info['quantity']) && (int)$info['quantity']) {
                    // if depends on stock and quantity, add quantity to stock
                    if ($info['depends_on_stock'] == 1) {
                        $stock_manager = StockManagerFactory::getManager();
                        $price = str_replace(',', '.', $info['wholesale_price']);
                        if ($price == 0) {
                            $price = 0.000001;
                        }
                        $price = round(floatval($price), 6);
                        $warehouse = new Warehouse($info['warehouse']);
                        if ($stock_manager->addProduct((int)$product->id, $id_product_attribute, $warehouse, (int)$info['quantity'], 1, $price, true)) {
                            StockAvailable::synchronize((int)$product->id);
                        }
                    } else {
                        if ($shop_is_feature_active) {
                            foreach ($id_shop_list as $shop) {
                                StockAvailable::setQuantity((int)$product->id, $id_product_attribute, (int)$info['quantity'], (int)$shop);
                            }
                        } else {
                            StockAvailable::setQuantity((int)$product->id, $id_product_attribute, (int)$info['quantity'], $this->context->shop->id);
                        }
                    }
                }
            }
            // if not depends_on_stock set, use normal qty
            else {
                if ($shop_is_feature_active) {
                    foreach ($id_shop_list as $shop) {
                        StockAvailable::setQuantity((int)$product->id, $id_product_attribute, (int)$info['quantity'], (int)$shop);
                    }
                } else {
                    StockAvailable::setQuantity((int)$product->id, $id_product_attribute, (int)$info['quantity'], $this->context->shop->id);
                }
            }
        }

    }

 

    public function postProcess()
    {
        /* PrestaShop demo mode */
        if (_PS_MODE_DEMO_) {
            $this->errors[] = Tools::displayError('This functionality has been disabled.');
            return;
        }

        if (Tools::isSubmit('import')) {
            // Check if the CSV file exist
            if (Tools::getValue('csv')) {
                $shop_is_feature_active = Shop::isFeatureActive();
                // If i am a superadmin, i can truncate table
                if ((($shop_is_feature_active && $this->context->employee->isSuperAdmin()) || !$shop_is_feature_active) && Tools::getValue('truncate')) {
                    $this->truncateTables((int)Tools::getValue('entity'));
                }
                $import_type = false;
                Db::getInstance()->disableCache();
                switch ((int)Tools::getValue('entity')) {

                    case $this->entities[$import_type = $this->l('Products')]:
                        $this->productImport();
                        // $this->bilyferAttributeImport($info hacer info);
                        $this->clearSmartyCache();
                        break;

                }
         
            } else {
                $this->errors[] = $this->l('You must upload a file in order to proceed to the next step');
            }
        } 

        switch ((int)Tools::getValue('entity')) {

            case $this->entities[$import_type != $this->l('Products')]:
                return parent::postProcess();
                break;
            default:
                Db::getInstance()->enableCache();
                return AdminController::postProcess();
            break;

        }
    }

}
