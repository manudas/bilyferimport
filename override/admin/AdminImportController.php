<?php


class AdminImportController extends AdminImportControllerCore
{

    public function __construct()
    {
        $this->bootstrap = true;

        parent::__construct();

        switch ((int)Tools::getValue('entity')) {

            case $this->entities[$this->trans('Products', array(), 'Admin.Global')]:
                self::$validators['image'] = array(
                    'AdminImportController',
                    'split'
                );

                $this->available_fields = array(
                    'no' => array('label' => $this->trans('Ignore this column', array(), 'Admin.AdvParameters.Feature')),
                    'id' => array('label' => $this->trans('ID', array(), 'Admin.Global')),
                    'active' => array('label' => $this->trans('Active (0/1)', array(), 'Admin.AdvParameters.Feature')),
                    'name' => array('label' => $this->trans('Name', array(), 'Admin.Global')),
                    'category' => array('label' => $this->trans('Categories (x,y,z...)', array(), 'Admin.AdvParameters.Feature')),
                    'price_tex' => array('label' => $this->trans('Price tax excluded', array(), 'Admin.AdvParameters.Feature')),
                    'price_tin' => array('label' => $this->trans('Price tax included', array(), 'Admin.AdvParameters.Feature')),
                    'id_tax_rules_group' => array('label' => $this->trans('Tax rule ID', array(), 'Admin.AdvParameters.Feature')),
                    'wholesale_price' => array('label' => $this->trans('Cost price', array(), 'Admin.Catalog.Feature')),
                    'on_sale' => array('label' => $this->trans('On sale (0/1)', array(), 'Admin.AdvParameters.Feature')),
                    'reduction_price' => array('label' => $this->trans('Discount amount', array(), 'Admin.AdvParameters.Feature')),
                    'reduction_percent' => array('label' => $this->trans('Discount percent', array(), 'Admin.AdvParameters.Feature')),
                    'reduction_from' => array('label' => $this->trans('Discount from (yyyy-mm-dd)', array(), 'Admin.AdvParameters.Feature')),
                    'reduction_to' => array('label' => $this->trans('Discount to (yyyy-mm-dd)', array(), 'Admin.AdvParameters.Feature')),
                    'reference' => array('label' => $this->trans('Reference #', array(), 'Admin.AdvParameters.Feature')),
                    'supplier_reference' => array('label' => $this->trans('Supplier reference #', array(), 'Admin.AdvParameters.Feature')),
                    'supplier' => array('label' => $this->trans('Supplier', array(), 'Admin.Global')),
                    'manufacturer' => array('label' => $this->trans('Brand', array(), 'Admin.Global')),
                    'ean13' => array('label' => $this->trans('EAN13', array(), 'Admin.AdvParameters.Feature')),
                    'upc' => array('label' => $this->trans('UPC', array(), 'Admin.AdvParameters.Feature')),
                    'ecotax' => array('label' => $this->trans('Ecotax', array(), 'Admin.Catalog.Feature')),
                    'width' => array('label' => $this->trans('Width', array(), 'Admin.Global')),
                    'height' => array('label' => $this->trans('Height', array(), 'Admin.Global')),
                    'depth' => array('label' => $this->trans('Depth', array(), 'Admin.Global')),
                    'weight' => array('label' => $this->trans('Weight', array(), 'Admin.Global')),
                    'quantity' => array('label' => $this->trans('Quantity', array(), 'Admin.Global')),
                    'minimal_quantity' => array('label' => $this->trans('Minimal quantity', array(), 'Admin.AdvParameters.Feature')),
                    'visibility' => array('label' => $this->trans('Visibility', array(), 'Admin.Catalog.Feature')),
                    'additional_shipping_cost' => array('label' => $this->trans('Additional shipping cost', array(), 'Admin.AdvParameters.Feature')),
                    'unity' => array('label' => $this->trans('Unit for the price per unit', array(), 'Admin.AdvParameters.Feature')),
                    'unit_price' => array('label' => $this->trans('Price per unit', array(), 'Admin.AdvParameters.Feature')),
                    'description_short' => array('label' => $this->trans('Summary', array(), 'Admin.Catalog.Feature')),
                    'description' => array('label' => $this->trans('Description', array(), 'Admin.Global')),
                    'tags' => array('label' => $this->trans('Tags (x,y,z...)', array(), 'Admin.AdvParameters.Feature')),
                    'meta_title' => array('label' => $this->trans('Meta title', array(), 'Admin.Global')),
                    'meta_keywords' => array('label' => $this->trans('Meta keywords', array(), 'Admin.Global')),
                    'meta_description' => array('label' => $this->trans('Meta description', array(), 'Admin.Global')),
                    'link_rewrite' => array('label' => $this->trans('Rewritten URL', array(), 'Admin.AdvParameters.Feature')),
                    'available_now' => array('label' => $this->trans('Label when in stock', array(), 'Admin.Catalog.Feature')),
                    'available_later' => array('label' => $this->trans('Label when backorder allowed', array(), 'Admin.AdvParameters.Feature')),
                    'available_for_order' => array('label' => $this->trans('Available for order (0 = No, 1 = Yes)', array(), 'Admin.AdvParameters.Feature')),
                    'available_date' => array('label' => $this->trans('Product availability date', array(), 'Admin.AdvParameters.Feature')),
                    'date_add' => array('label' => $this->trans('Product creation date', array(), 'Admin.AdvParameters.Feature')),
                    'show_price' => array('label' => $this->trans('Show price (0 = No, 1 = Yes)', array(), 'Admin.AdvParameters.Feature')),
                    'image' => array('label' => $this->trans('Image URLs (x,y,z...)', array(), 'Admin.AdvParameters.Feature')),
                    'image_alt' => array('label' => $this->trans('Image alt texts (x,y,z...)', array(), 'Admin.AdvParameters.Feature')),
                    'delete_existing_images' => array(
                        'label' => $this->trans('Delete existing images (0 = No, 1 = Yes)', array(), 'Admin.AdvParameters.Feature')
                    ),
                    'features' => array('label' => $this->trans('Feature (Name:Value:Position:Customized)', array(), 'Admin.AdvParameters.Feature')),
                    'online_only' => array('label' => $this->trans('Available online only (0 = No, 1 = Yes)', array(), 'Admin.AdvParameters.Feature')),
                    'condition' => array('label' => $this->trans('Condition', array(), 'Admin.Catalog.Feature')),
                    'customizable' => array('label' => $this->trans('Customizable (0 = No, 1 = Yes)', array(), 'Admin.AdvParameters.Feature')),
                    'uploadable_files' => array('label' => $this->trans('Uploadable files (0 = No, 1 = Yes)', array(), 'Admin.AdvParameters.Feature')),
                    'text_fields' => array('label' => $this->trans('Text fields (0 = No, 1 = Yes)', array(), 'Admin.AdvParameters.Feature')),
                    'out_of_stock' => array('label' => $this->trans('Action when out of stock', array(), 'Admin.AdvParameters.Feature')),
                    'is_virtual' => array('label' => $this->trans('Virtual product (0 = No, 1 = Yes)', array(), 'Admin.AdvParameters.Feature')),
                    'file_url' => array('label' => $this->trans('File URL', array(), 'Admin.AdvParameters.Feature')),
                    'nb_downloadable' => array(
                        'label' => $this->trans('Number of allowed downloads', array(), 'Admin.Catalog.Feature'),
                        'help' => $this->trans('Number of days this file can be accessed by customers. Set to zero for unlimited access.', array(), 'Admin.Catalog.Help'),
                    ),
                    'date_expiration' => array('label' => $this->trans('Expiration date (yyyy-mm-dd)', array(), 'Admin.AdvParameters.Feature')),
                    'nb_days_accessible' => array(
                        'label' => $this->trans('Number of days', array(), 'Admin.AdvParameters.Feature'),
                        'help' => $this->trans('Number of days this file can be accessed by customers. Set to zero for unlimited access.', array(), 'Admin.Catalog.Help'),
                    ),
                    'shop' => array(
                        'label' => $this->trans('ID / Name of shop', array(), 'Admin.AdvParameters.Feature'),
                        'help' => $this->trans('Ignore this field if you don\'t use the Multistore tool. If you leave this field empty, the default shop will be used.', array(), 'Admin.AdvParameters.Help'),
                    ),
                    'advanced_stock_management' => array(
                        'label' => $this->trans('Advanced Stock Management', array(), 'Admin.AdvParameters.Feature'),
                        'help' => $this->trans('Enable Advanced Stock Management on product (0 = No, 1 = Yes).', array(), 'Admin.AdvParameters.Help')
                    ),
                    'depends_on_stock' => array(
                        'label' => $this->trans('Depends on stock', array(), 'Admin.AdvParameters.Feature'),
                        'help' => $this->trans('0 = Use quantity set in product, 1 = Use quantity from warehouse.', array(), 'Admin.AdvParameters.Help')
                    ),
                    'warehouse' => array(
                        'label' => $this->trans('Warehouse', array(), 'Admin.AdvParameters.Feature'),
                        'help' => $this->trans('ID of the warehouse to set as storage.', array(), 'Admin.AdvParameters.Help')
                    ),
                    'accessories' => array('label' => $this->trans('Accessories (x,y,z...)', array(), 'Admin.AdvParameters.Feature')),
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
                    'is_virtual' => 0,
                );
                break;

            
        }

    }


    public function renderForm()
    {
        if (!is_dir(AdminImportController::getPath())) {
            return !($this->errors[] = Tools::displayError('The import directory doesn\'t exist. Please check your file path.'));
        }

        if (!is_writable(AdminImportController::getPath())) {
            $this->displayWarning($this->trans('The import directory must be writable (CHMOD 755 / 777).', array(), 'Admin.AdvParameters.Notification'));
        }

        $files_to_import = scandir(AdminImportController::getPath());
        uasort($files_to_import, array('AdminImportController', 'usortFiles'));
        foreach ($files_to_import as $k => &$filename) {
            //exclude .  ..  .svn and index.php and all hidden files
            if (preg_match('/^\..*|index\.php/i', $filename) || is_dir(AdminImportController::getPath().$filename)) {
                unset($files_to_import[$k]);
            }
        }
        unset($filename);

        $this->fields_form = array('');

        $this->toolbar_scroll = false;
        $this->toolbar_btn = array();

        // adds fancybox
        $this->addJqueryPlugin(array('fancybox'));

        $entity_selected = 0;
        if (isset($this->entities[$this->l(Tools::ucfirst(Tools::getValue('import_type')))])) {
            $entity_selected = $this->entities[$this->l(Tools::ucfirst(Tools::getValue('import_type')))];
            $this->context->cookie->entity_selected = (int)$entity_selected;
        } elseif (isset($this->context->cookie->entity_selected)) {
            $entity_selected = (int)$this->context->cookie->entity_selected;
        }

        $csv_selected = '';
        if (isset($this->context->cookie->csv_selected) &&
            @filemtime(AdminImportController::getPath(
                urldecode($this->context->cookie->csv_selected)
            ))) {
            $csv_selected = urldecode($this->context->cookie->csv_selected);
        } else {
            $this->context->cookie->csv_selected = $csv_selected;
        }

        $id_lang_selected = '';
        if (isset($this->context->cookie->iso_lang_selected) && $this->context->cookie->iso_lang_selected) {
            $id_lang_selected = (int)Language::getIdByIso(urldecode($this->context->cookie->iso_lang_selected));
        }

        $separator_selected = $this->separator;
        if (isset($this->context->cookie->separator_selected) && $this->context->cookie->separator_selected) {
            $separator_selected = urldecode($this->context->cookie->separator_selected);
        }

        $multiple_value_separator_selected = $this->multiple_value_separator;
        if (isset($this->context->cookie->multiple_value_separator_selected) && $this->context->cookie->multiple_value_separator_selected) {
            $multiple_value_separator_selected = urldecode($this->context->cookie->multiple_value_separator_selected);
        }

        //get post max size
        $post_max_size = ini_get('post_max_size');
        $bytes         = (int) trim($post_max_size);
        $last          = strtolower($post_max_size[strlen($post_max_size) - 1]);

        switch ($last) {
            case 'g':
                $bytes *= 1024;
                // no break to fall-through
            case 'm':
                $bytes *= 1024;
                // no break to fall-through
            case 'k':
                $bytes *= 1024;
        }

        if (!isset($bytes) || $bytes == '') {
            $bytes = 20971520;
        } // 20Mb

        $this->tpl_form_vars = array(
            'post_max_size' => (int)$bytes,
            'module_confirmation' => Tools::isSubmit('import') && (isset($this->warnings) && !count($this->warnings)),
            'path_import' => AdminImportController::getPath(),
            'entities' => $this->entities,
            'entity_selected' => $entity_selected,
            'csv_selected' => $csv_selected,
            'separator_selected' => $separator_selected,
            'multiple_value_separator_selected' => $multiple_value_separator_selected,
            'files_to_import' => $files_to_import,
            'languages' => Language::getLanguages(false),
            'id_language' => ($id_lang_selected) ? $id_lang_selected : $this->context->language->id,
            'available_fields' => $this->getAvailableFields(),
            'truncateAuthorized' => (Shop::isFeatureActive() && $this->context->employee->isSuperAdmin()) || !Shop::isFeatureActive(),
            'PS_ADVANCED_STOCK_MANAGEMENT' => Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'),
        );

        return parent::renderForm();
    }

 

    public function renderView()
    {
        $this->addJS(_PS_JS_DIR_.'admin/import.js');

        $handle = $this->openCsvFile();
        $nb_column = $this->getNbrColumn($handle, $this->separator);
        $nb_table = ceil($nb_column / MAX_COLUMNS);

        $res = array();
        foreach ($this->required_fields as $elem) {
            $res[] = '\''.$elem.'\'';
        }

        $data = array();
        for ($i = 0; $i < $nb_table; $i++) {
            $data[$i] = $this->generateContentTable($i, $nb_column, $handle, $this->separator);
        }

        $this->context->cookie->entity_selected = (int)Tools::getValue('entity');
        $this->context->cookie->iso_lang_selected = urlencode(Tools::getValue('iso_lang'));
        $this->context->cookie->separator_selected = urlencode($this->separator);
        $this->context->cookie->multiple_value_separator_selected = urlencode($this->multiple_value_separator);
        $this->context->cookie->csv_selected = urlencode(Tools::getValue('csv'));

        $this->tpl_view_vars = array(
            'import_matchs' => Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'import_match', true, false),
            'fields_value' => array(
                'csv' => Tools::getValue('csv'),
                'entity' => (int)Tools::getValue('entity'),
                'iso_lang' => Tools::getValue('iso_lang'),
                'truncate' => Tools::getValue('truncate'),
                'forceIDs' => Tools::getValue('forceIDs'),
                'regenerate' => Tools::getValue('regenerate'),
                'sendemail' => Tools::getValue('sendemail'),
                'match_ref' => Tools::getValue('match_ref'),
                'separator' => $this->separator,
                'multiple_value_separator' => $this->multiple_value_separator
            ),
            'nb_table' => $nb_table,
            'nb_column' => $nb_column,
            'res' => implode(',', $res),
            'max_columns' => MAX_COLUMNS,
            'no_pre_select' => array('price_tin', 'feature'),
            'available_fields' => $this->available_fields,
            'data' => $data
        );

        return parent::renderView();
    }

   














    protected static function createMultiLangField($field)
    {
        $res = array();
        foreach (Language::getIDs(false) as $id_lang) {
            $res[$id_lang] = $field;
        }
mirar esta, puede estar bien para los bulleeeeeeeeeeeeeeeeeeeeessssssssssssssssssssssssssss
        return $res;
    }




analizar este

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
    protected static function copyImg($id_entity, $id_image = null, $url = '', $entity = 'products', $regenerate = true)
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
            case 'stores':
                $path = _PS_STORE_IMG_DIR_.(int)$id_entity;
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
            ImageManager::resize($tmpfile, $path.'.jpg', null, null, 'jpg', false, $error, $tgt_width, $tgt_height, 5, $src_width, $src_height);
            $images_types = ImageType::getImagesTypes($entity, true);

            if ($regenerate) {
                $previous_path = null;
                $path_infos = array();
                $path_infos[] = array($tgt_width, $tgt_height, $path.'.jpg');
                foreach ($images_types as $image_type) {
                    $tmpfile = self::get_best_path($image_type['width'], $image_type['height'], $path_infos);

                    if (ImageManager::resize(
                        $tmpfile,
                        $path.'-'.stripslashes($image_type['name']).'.jpg',
                        $image_type['width'],
                        $image_type['height'],
                        'jpg',
                        false,
                        $error,
                        $tgt_width,
                        $tgt_height,
                        5,
                        $src_width,
                        $src_height
                    )) {
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

 

    public function categoryImport($offset = false, $limit = false, &$crossStepsVariables = false, $validateOnly = false)
    {
        $this->receiveTab();
        $handle = $this->openCsvFile($offset);
        if (!$handle) {
            return false;
        }

        $default_language_id = (int)Configuration::get('PS_LANG_DEFAULT');
        $id_lang = Language::getIdByIso(Tools::getValue('iso_lang'));
        if (!Validate::isUnsignedId($id_lang)) {
            $id_lang = $default_language_id;
        }
        AdminImportController::setLocale();

        $force_ids = Tools::getValue('forceIDs');
        $regenerate = Tools::getValue('regenerate');
        $shop_is_feature_active = Shop::isFeatureActive();


        $cat_moved = array();
        if ($crossStepsVariables !== false && array_key_exists('cat_moved', $crossStepsVariables)) {
            $cat_moved = $crossStepsVariables['cat_moved'];
        }

        $line_count = 0;
        for ($current_line = 0; ($line = fgetcsv($handle, MAX_LINE_SIZE, $this->separator)) && (!$limit || $current_line < $limit); $current_line++) {
            $line_count++;
            if ($this->convert) {
                $line = $this->utf8EncodeArray($line);
            }

            if (count($line) == 1 && $line[0] == null) {
                $this->warnings[] = $this->trans('There is an empty row in the file that won\'t be imported.', array(), 'Admin.AdvParameters.Notification');
                continue;
            }

            $info = AdminImportController::getMaskedRow($line);

            $this->categoryImportOne(
                $info,
                $default_language_id,
                $id_lang,
                $force_ids,
                $regenerate,
                $shop_is_feature_active,
                $cat_moved, // by ref
                $validateOnly
            );
        }

        if (!$validateOnly) {
            /* Import has finished, we can regenerate the categories nested tree */
            Category::regenerateEntireNtree();
        }
        $this->closeCsvFile($handle);

        if ($crossStepsVariables !== false) {
            $crossStepsVariables['cat_moved'] = $cat_moved;
        }
        return $line_count;
    }

    protected function categoryImportOne($info, $default_language_id, $id_lang, $force_ids, $regenerate, $shop_is_feature_active, &$cat_moved, $validateOnly = false)
    {
        $tab_categ = array(Configuration::get('PS_HOME_CATEGORY'), Configuration::get('PS_ROOT_CATEGORY'));
        if (isset($info['id']) && in_array((int)$info['id'], $tab_categ)) {
            $this->errors[] = Tools::displayError('The category ID must be unique. It can\'t be the same as the one for Root or Home category.');
            return;
        }
        AdminImportController::setDefaultValues($info);

        if ($force_ids && isset($info['id']) && (int)$info['id']) {
            $category = new Category((int)$info['id']);
        } else {
            if (isset($info['id']) && (int)$info['id'] && Category::existsInDatabase((int)$info['id'], 'category')) {
                $category = new Category((int)$info['id']);
            } else {
                $category = new Category();
            }
        }

        AdminImportController::arrayWalk($info, array('AdminImportController', 'fillInfo'), $category);

        // Parent category
        if (isset($category->parent) && is_numeric($category->parent)) {
            // Validation for parenting itself
            if ($validateOnly && ($category->parent == $category->id) || (isset($info['id']) && $category->parent == (int)$info['id'])) {
                $this->errors[] = sprintf(
                    Tools::displayError('The category ID must be unique. It can\'t be the same as the one for the parent category (ID: %1$s).'),
                    (isset($info['id']) && !empty($info['id']))? $info['id'] : 'null'
                );
                return;
            }
            if (isset($cat_moved[$category->parent])) {
                $category->parent = $cat_moved[$category->parent];
            }
            $category->id_parent = $category->parent;
        } elseif (isset($category->parent) && is_string($category->parent)) {
            // Validation for parenting itself
            if ($validateOnly && isset($category->name) && ($category->parent == $category->name)) {
                $this->errors[] = sprintf(
                    Tools::displayError('A category can\'t be its own parent. You should rename it (current name: %1$s).'),
                    $category->parent
                );
                return;
            }
            $category_parent = Category::searchByName($id_lang, $category->parent, true);
            if ($category_parent['id_category']) {
                $category->id_parent = (int)$category_parent['id_category'];
                $category->level_depth = (int)$category_parent['level_depth'] + 1;
            } else {
                $category_to_create = new Category();
                $category_to_create->name = AdminImportController::createMultiLangField($category->parent);
                $category_to_create->active = 1;
                $category_link_rewrite = Tools::link_rewrite($category_to_create->name[$id_lang]);
                $category_to_create->link_rewrite = AdminImportController::createMultiLangField($category_link_rewrite);
                $category_to_create->id_parent = Configuration::get('PS_HOME_CATEGORY'); // Default parent is home for unknown category to create

                if (($field_error = $category_to_create->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                    ($lang_field_error = $category_to_create->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true &&
                    !$validateOnly && // Do not move the position of this test. Only ->add() should not be triggered is !validateOnly. Previous tests should be always run.
                    $category_to_create->add()) {
                    $category->id_parent = $category_to_create->id;
                } else {
                    if (!$validateOnly) {
                        $this->errors[] = sprintf(
                            $this->trans('%1$s (ID: %2$s) cannot be saved', array(), 'Admin.AdvParameters.Notification'),
                            $category_to_create->name[$id_lang],
                            (isset($category_to_create->id) && !empty($category_to_create->id))? $category_to_create->id : 'null'
                        );
                    }
                    if ($field_error !== true || isset($lang_field_error) && $lang_field_error !== true) {
                        $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                            Db::getInstance()->getMsgError();
                    }
                }
            }
        }
        if (isset($category->link_rewrite) && !empty($category->link_rewrite[$default_language_id])) {
            $valid_link = Validate::isLinkRewrite($category->link_rewrite[$default_language_id]);
        } else {
            $valid_link = false;
        }

        if (!$shop_is_feature_active) {
            $category->id_shop_default = 1;
        } else {
            $category->id_shop_default = (int)Context::getContext()->shop->id;
        }

        $bak = $category->link_rewrite[$default_language_id];
        if ((isset($category->link_rewrite) && empty($category->link_rewrite[$default_language_id])) || !$valid_link) {
            $category->link_rewrite = Tools::link_rewrite($category->name[$default_language_id]);
            if ($category->link_rewrite == '') {
                $category->link_rewrite = 'friendly-url-autogeneration-failed';
                $this->warnings[] = sprintf($this->trans('URL rewriting failed to auto-generate a friendly URL for: %s', array(), 'Admin.AdvParameters.Notification'), $category->name[$default_language_id]);
            }
            $category->link_rewrite = AdminImportController::createMultiLangField($category->link_rewrite);
        }

        if (!$valid_link) {
            $this->informations[] = sprintf(
                $this->trans('Rewrite link for %1$s (ID %2$s): re-written as %3$s.', array(), 'Admin.AdvParameters.Notification'),
                $bak,
                (isset($info['id']) && !empty($info['id']))? $info['id'] : 'null',
                $category->link_rewrite[$default_language_id]
            );
        }
        $res = false;
        if (($field_error = $category->validateFields(UNFRIENDLY_ERROR, true)) === true &&
            ($lang_field_error = $category->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && empty($this->errors)) {
            $category_already_created = Category::searchByNameAndParentCategoryId(
                $id_lang,
                $category->name[$id_lang],
                $category->id_parent
            );

            // If category already in base, get id category back
            if ($category_already_created['id_category']) {
                $cat_moved[$category->id] = (int)$category_already_created['id_category'];
                $category->id = (int)$category_already_created['id_category'];
                if (Validate::isDate($category_already_created['date_add'])) {
                    $category->date_add = $category_already_created['date_add'];
                }
            }

            if ($category->id && $category->id == $category->id_parent) {
                $this->errors[] = sprintf(
                    $this->trans('A category cannot be its own parent. The parent category ID is either missing or unknown (ID: %1$s).', array(), 'Admin.AdvParameters.Notification'),
                    (isset($info['id']) && !empty($info['id']))? $info['id'] : 'null'
                );
                return;
            }

            /* No automatic nTree regeneration for import */
            $category->doNotRegenerateNTree = true;

            // If id category AND id category already in base, trying to update
            $categories_home_root = array(Configuration::get('PS_ROOT_CATEGORY'), Configuration::get('PS_HOME_CATEGORY'));
            if ($category->id &&
                $category->categoryExists($category->id) &&
                !in_array($category->id, $categories_home_root) &&
                !$validateOnly) {
                $res = $category->update();
            }
            if ($category->id == Configuration::get('PS_ROOT_CATEGORY')) {
                $this->errors[] = $this->trans('The root category cannot be modified.', array(), 'Admin.AdvParameters.Notification');
            }
            // If no id_category or update failed
            $category->force_id = (bool)$force_ids;
            if (!$res && !$validateOnly) {
                $res = $category->add();
            }
        }

        // ValidateOnly mode : stops here
        if ($validateOnly) {
            return;
        }

        //copying images of categories
        if (isset($category->image) && !empty($category->image)) {
            if (!(AdminImportController::copyImg($category->id, null, $category->image, 'categories', !$regenerate))) {
                $this->warnings[] = $category->image.' '.$this->trans('cannot be copied.', array(), 'Admin.AdvParameters.Notification');
            }
        }
        // If both failed, mysql error
        if (!$res) {
            $this->errors[] = sprintf(
                Tools::displayError('%1$s (ID: %2$s) cannot be '.($validateOnly?'validated':'saved')),
                (isset($info['name']) && !empty($info['name']))? Tools::safeOutput($info['name']) : 'No Name',
                (isset($info['id']) && !empty($info['id']))? Tools::safeOutput($info['id']) : 'No ID'
            );
            $error_tmp = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').Db::getInstance()->getMsgError();
            if ($error_tmp != '') {
                $this->errors[] = $error_tmp;
            }
        } else {
            // Associate category to shop
            if ($shop_is_feature_active) {
                Db::getInstance()->execute('
					DELETE FROM '._DB_PREFIX_.'category_shop
					WHERE id_category = '.(int)$category->id);

                if (!$shop_is_feature_active) {
                    $info['shop'] = 1;
                } elseif (!isset($info['shop']) || empty($info['shop'])) {
                    $info['shop'] = implode($this->multiple_value_separator, Shop::getContextListShopID());
                }

                // Get shops for each attributes
                $info['shop'] = explode($this->multiple_value_separator, $info['shop']);

                foreach ($info['shop'] as $shop) {
                    if (!empty($shop) && !is_numeric($shop)) {
                        $category->addShop(Shop::getIdByName($shop));
                    } elseif (!empty($shop)) {
                        $category->addShop($shop);
                    }
                }
            }
        }
    }

    public function productImport($offset = false, $limit = false, &$crossStepsVariables = false, $validateOnly = false, $moreStep = 0)
    {
        if ($moreStep == 1) {
            return $this->productImportAccessories($offset, $limit, $crossStepsVariables);
        }
        $this->receiveTab();
        $handle = $this->openCsvFile($offset);
        if (!$handle) {
            return false;
        }

        $default_language_id = (int)Configuration::get('PS_LANG_DEFAULT');
        $id_lang = Language::getIdByIso(Tools::getValue('iso_lang'));
        if (!Validate::isUnsignedId($id_lang)) {
            $id_lang = $default_language_id;
        }
        AdminImportController::setLocale();
        $shop_ids = Shop::getCompleteListOfShopsID();

        $force_ids = Tools::getValue('forceIDs');
        $match_ref = Tools::getValue('match_ref');
        $regenerate = Tools::getValue('regenerate');
        $shop_is_feature_active = Shop::isFeatureActive();
        if (!$validateOnly) {
            Module::setBatchMode(true);
        }

        $accessories = array();
        if ($crossStepsVariables !== false && array_key_exists('accessories', $crossStepsVariables)) {
            $accessories = $crossStepsVariables['accessories'];
        }

        $line_count = 0;
        for ($current_line = 0; ($line = fgetcsv($handle, MAX_LINE_SIZE, $this->separator)) && (!$limit || $current_line < $limit); $current_line++) {
            $line_count++;
            if ($this->convert) {
                $line = $this->utf8EncodeArray($line);
            }

            if (count($line) == 1 && $line[0] == null) {
                $this->warnings[] = $this->trans('There is an empty row in the file that won\'t be imported.', array(), 'Admin.AdvParameters.Notification');
                continue;
            }

            $info = AdminImportController::getMaskedRow($line);

            $this->productImportOne(
                $info,
                $default_language_id,
                $id_lang,
                $force_ids,
                $regenerate,
                $shop_is_feature_active,
                $shop_ids,
                $match_ref,
                $accessories, // by ref
                $validateOnly
            );
        }
        $this->closeCsvFile($handle);
        if (!$validateOnly) {
            Module::processDeferedFuncCall();
            Module::processDeferedClearCache();
            Tag::updateTagCount();
        }

        if ($crossStepsVariables !== false) {
            $crossStepsVariables['accessories'] = $accessories;
        }
        return $line_count;
    }

    protected function productImportAccessories($offset, $limit, &$crossStepsVariables)
    {
        if ($crossStepsVariables === false || !array_key_exists('accessories', $crossStepsVariables)) {
            return 0;
        }

        $accessories = $crossStepsVariables['accessories'];

        if ($offset == 0) {
            //             AdminImportController::setLocale();
            Module::setBatchMode(true);
        }

        $line_count = 0;
        $i = 0;
        foreach ($accessories as $product_id => $links) {
            // skip elements until reaches offset
            if ($i < $offset) {
                $i++;
                continue;
            }

            if (count($links) > 0) { // We delete and relink only if there is accessories to link...
                // Bulk jobs: for performances, we need to do a minimum amount of SQL queries. No product inflation.
                $unique_ids = Product::getExistingIdsFromIdsOrRefs($links);
                Db::getInstance()->delete('accessory', 'id_product_1 = '.(int)$product_id);
                Product::changeAccessoriesForProduct($unique_ids, $product_id);
            }
            $line_count++;

            // Empty value to reduce array weight (that goes through HTTP requests each time) but do not unset array entry!
            $accessories[$product_id] = 0; // In JSON, 0 is lighter than null or false

            // stop when limit reached
            if ($line_count >= $limit) {
                break;
            }
        }

        if ($line_count < $limit) { // last pass only
            Module::processDeferedFuncCall();
            Module::processDeferedClearCache();
        }

        $crossStepsVariables['accessories'] = $accessories;

        return $line_count;
    }

    protected function productImportOne($info, $default_language_id, $id_lang, $force_ids, $regenerate, $shop_is_feature_active, $shop_ids, $match_ref, &$accessories, $validateOnly = false)
    {
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
                    $this->trans('Unknown tax rule group ID. You need to create a group with this ID first.', array(), 'Admin.AdvParameters.Notification')
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
                    ($lang_field_error = $manufacturer->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true &&
                    !$validateOnly && // Do not move this condition: previous tests should be played always, but next ->add() test should not be played in validateOnly mode
                    $manufacturer->add()) {
                    $product->id_manufacturer = (int)$manufacturer->id;
                    $manufacturer->associateTo($product->id_shop_list);
                } else {
                    if (!$validateOnly) {
                        $this->errors[] = sprintf(
                            $this->trans('%1$s (ID: %2$s) cannot be saved', array(), 'Admin.AdvParameters.Notification'),
                            $manufacturer->name,
                            (isset($manufacturer->id) && !empty($manufacturer->id))? $manufacturer->id : 'null'
                        );
                    }
                    if ($field_error !== true || isset($lang_field_error) && $lang_field_error !== true) {
                        $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                            Db::getInstance()->getMsgError();
                    }
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
                    ($lang_field_error = $supplier->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true &&
                    !$validateOnly &&  // Do not move this condition: previous tests should be played always, but next ->add() test should not be played in validateOnly mode
                    $supplier->add()) {
                    $product->id_supplier = (int)$supplier->id;
                    $supplier->associateTo($product->id_shop_list);
                } else {
                    if (!$validateOnly) {
                        $this->errors[] = sprintf(
                            $this->trans('%1$s (ID: %2$s) cannot be saved', array(), 'Admin.AdvParameters.Notification'),
                            $supplier->name,
                            (isset($supplier->id) && !empty($supplier->id))? $supplier->id : 'null'
                        );
                    }
                    if ($field_error !== true || isset($lang_field_error) && $lang_field_error !== true) {
                        $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                            Db::getInstance()->getMsgError();
                    }
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
                            ($lang_field_error = $category_to_create->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true &&
                            !$validateOnly &&  // Do not move this condition: previous tests should be played always, but next ->add() test should not be played in validateOnly mode
                            $category_to_create->add()) {
                            $product->id_category[] = (int)$category_to_create->id;
                        } else {
                            if (!$validateOnly) {
                                $this->errors[] = sprintf(
                                    $this->trans('%1$s (ID: %2$s) cannot be saved', array(), 'Admin.AdvParameters.Notification'),
                                    $category_to_create->name[$default_language_id],
                                    (isset($category_to_create->id) && !empty($category_to_create->id))? $category_to_create->id : 'null'
                                );
                            }
                            if ($field_error !== true || isset($lang_field_error) && $lang_field_error !== true) {
                                $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                                    Db::getInstance()->getMsgError();
                            }
                        }
                    }
                } elseif (!$validateOnly && is_string($value) && !empty($value)) {
                    $category = Category::searchByPath($default_language_id, trim($value), $this, 'productImportCreateCat');
                    if ($category['id_category']) {
                        $product->id_category[] = (int)$category['id_category'];
                    } else {
                        $this->errors[] = sprintf($this->trans('%1$s cannot be saved', array(), 'Admin.AdvParameters.Notification'), trim($value));
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
            $this->informations[] = sprintf(
                $this->trans('Rewrite link for %1$s (ID %2$s): re-written as %3$s.', array(), 'Admin.AdvParameters.Notification'),
                $product->name[$id_lang],
                (isset($info['id']) && !empty($info['id']))? $info['id'] : 'null',
                $link_rewrite
            );
        }

        if (!$valid_link || !(is_array($product->link_rewrite) && count($product->link_rewrite))) {
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
                $res = ($validateOnly || $product->update());
            } // Else If id product && id product already in base, trying to update
            elseif ($productExistsInDatabase) {
                $datas = Db::getInstance()->getRow('
					SELECT product_shop.`date_add`
					FROM `'._DB_PREFIX_.'product` p
					'.Shop::addSqlAssociation('product', 'p').'
					WHERE p.`id_product` = '.(int)$product->id, false);
                $product->date_add = pSQL($datas['date_add']);
                $res = ($validateOnly || $product->update());
            }
            // If no id_product or update failed
            $product->force_id = (bool)$force_ids;

            if (!$res) {
                if (isset($product->date_add) && $product->date_add != '') {
                    $res = ($validateOnly || $product->add(false));
                } else {
                    $res = ($validateOnly || $product->add());
                }
            }

            if (!$validateOnly) {
                if ($product->getType() == Product::PTYPE_VIRTUAL) {
                    StockAvailable::setProductOutOfStock((int)$product->id, 1);
                } else {
                    StockAvailable::setProductOutOfStock((int)$product->id, (int)$product->out_of_stock);
                }

                if ($product_download_id = ProductDownload::getIdFromIdProduct((int)$product->id)) {
                    $product_download = new ProductDownload($product_download_id);
                    $product_download->delete(true);
                }

                if ($product->getType() == Product::PTYPE_VIRTUAL) {
                    $product_download = new ProductDownload();
                    $product_download->filename = ProductDownload::getNewFilename();
                    Tools::copy($info['file_url'], _PS_DOWNLOAD_DIR_.$product_download->filename);
                    $product_download->id_product = (int)$product->id;
                    $product_download->nb_downloadable = (int)$info['nb_downloadable'];
                    $product_download->date_expiration = $info['date_expiration'];
                    $product_download->nb_days_accessible = (int)$info['nb_days_accessible'];
                    $product_download->display_filename = basename($info['file_url']);
                    $product_download->add();
                }
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
                $this->addProductWarning(Tools::safeOutput($info['name']), $product->id, $this->trans('Shop is not valid', array(), 'Admin.AdvParameters.Notification'));
            }
        }
        if (empty($shops)) {
            $shops = Shop::getContextListShopID();
        }
        // If both failed, mysql error
        if (!$res) {
            $this->errors[] = sprintf(
                $this->trans('%1$s (ID: %2$s) cannot be saved', array(), 'Admin.AdvParameters.Notification'),
                (isset($info['name']) && !empty($info['name']))? Tools::safeOutput($info['name']) : 'No Name',
                (isset($info['id']) && !empty($info['id']))? Tools::safeOutput($info['id']) : 'No ID'
            );
            $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                Db::getInstance()->getMsgError();
        } else {
            // Product supplier
            if (!$validateOnly && isset($product->id) && $product->id && isset($product->id_supplier) && property_exists($product, 'supplier_reference')) {
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
                    $specific_price->reduction = (isset($info['reduction_price']) && $info['reduction_price']) ? $info['reduction_price'] : $info['reduction_percent'] / 100;
                    $specific_price->reduction_type = (isset($info['reduction_price']) && $info['reduction_price']) ? 'amount' : 'percentage';
                    $specific_price->from = (isset($info['reduction_from']) && Validate::isDate($info['reduction_from'])) ? $info['reduction_from'] : '0000-00-00 00:00:00';
                    $specific_price->to = (isset($info['reduction_to']) && Validate::isDate($info['reduction_to']))  ? $info['reduction_to'] : '0000-00-00 00:00:00';
                    if (!$validateOnly && !$specific_price->save()) {
                        $this->addProductWarning(Tools::safeOutput($info['name']), $product->id, $this->trans('Discount is invalid', array(), 'Admin.AdvParameters.Notification'));
                    }
                }
            }

            if (!$validateOnly && isset($product->tags) && !empty($product->tags)) {
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
                            $this->addProductWarning(Tools::safeOutput($info['name']), $product->id, $this->trans('Tags list is invalid', array(), 'Admin.AdvParameters.Notification'));
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
            if (!$validateOnly && isset($product->delete_existing_images)) {
                if ((bool)$product->delete_existing_images) {
                    $product->deleteImages();
                }
            }

            if (!$validateOnly && isset($product->image) && is_array($product->image) && count($product->image)) {
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
                        $alt = $product->image_alt[$key];
                        if (strlen($alt) > 0) {
                            $image->legend = self::createMultiLangField($alt);
                        }
                        // file_exists doesn't work with HTTP protocol
                        if (($field_error = $image->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                            ($lang_field_error = $image->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $image->add()) {
                            // associate image to selected shops
                            $image->associateTo($shops);
                            if (!AdminImportController::copyImg($product->id, $image->id, $url, 'products', !$regenerate)) {
                                $image->delete();
                                $this->warnings[] = sprintf($this->trans('Error copying image: %s', array(), 'Admin.AdvParameters.Notification'), $url);
                            }
                        } else {
                            $error = true;
                        }
                    } else {
                        $error = true;
                    }

                    if ($error) {
                        $this->warnings[] = sprintf($this->trans('Product #%1$d: the picture (%2$s) cannot be saved.', array(), 'Admin.AdvParameters.Notification'), $image->id_product, $url);
                    }
                }
            }

            if (!$validateOnly && isset($product->id_category) && is_array($product->id_category)) {
                $product->updateCategories(array_map('intval', $product->id_category));
            }

            $product->checkDefaultAttributes();
            if (!$validateOnly && !$product->cache_default_attribute) {
                Product::updateDefaultAttribute($product->id);
            }

            // Features import
            $features = get_object_vars($product);

            if (!$validateOnly && isset($features['features']) && !empty($features['features'])) {
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
            if (!$validateOnly && isset($product->advanced_stock_management)) {
                if ($product->advanced_stock_management != 1 && $product->advanced_stock_management != 0) {
                    $this->warnings[] = sprintf($this->trans('Advanced stock management has incorrect value. Not set for product %1$s ', array(), 'Admin.AdvParameters.Notification'), $product->name[$default_language_id]);
                } elseif (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') && $product->advanced_stock_management == 1) {
                    $this->warnings[] = sprintf($this->trans('Advanced stock management is not enabled, cannot enable on product %1$s ', array(), 'Admin.AdvParameters.Notification'), $product->name[$default_language_id]);
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
                    $this->warnings[] = sprintf($this->trans('Advanced stock management is not enabled, warehouse not set on product %1$s ', array(), 'Admin.AdvParameters.Notification'), $product->name[$default_language_id]);
                } elseif (!$validateOnly) {
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
                        $this->warnings[] = sprintf($this->trans('Warehouse did not exist, cannot set on product %1$s.', array(), 'Admin.AdvParameters.Notification'), $product->name[$default_language_id]);
                    }
                }
            }

            // stock available
            if (isset($product->depends_on_stock)) {
                if ($product->depends_on_stock != 0 && $product->depends_on_stock != 1) {
                    $this->warnings[] = sprintf($this->trans('Incorrect value for "Depends on stock" for product %1$s ', array(), 'Admin.AdvParameters.Notification'), $product->name[$default_language_id]);
                } elseif ((!$product->advanced_stock_management || $product->advanced_stock_management == 0) && $product->depends_on_stock == 1) {
                    $this->warnings[] = sprintf($this->trans('Advanced stock management is not enabled, cannot set "Depends on stock" for product %1$s ', array(), 'Admin.AdvParameters.Notification'), $product->name[$default_language_id]);
                } elseif (!$validateOnly) {
                    StockAvailable::setProductDependsOnStock($product->id, $product->depends_on_stock);
                }

                // This code allows us to set qty and disable depends on stock
                if (!$validateOnly && isset($product->quantity)) {
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
            } elseif (!$validateOnly) {
                // if not depends_on_stock set, use normal qty
                if ($shop_is_feature_active) {
                    foreach ($shops as $shop) {
                        StockAvailable::setQuantity((int)$product->id, 0, (int)$product->quantity, (int)$shop);
                    }
                } else {
                    StockAvailable::setQuantity((int)$product->id, 0, (int)$product->quantity, (int)$this->context->shop->id);
                }
            }

            // Accessories linkage
            if (isset($product->accessories) && !$validateOnly && is_array($product->accessories) && count($product->accessories)) {
                $accessories[$product->id] = $product->accessories;
            }
        }
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

        if (($field_error = $category_to_create->validateFields(UNFRIENDLY_ERROR, true)) !== true ||
            ($lang_field_error = $category_to_create->validateFieldsLang(UNFRIENDLY_ERROR, true)) !== true ||
            !$category_to_create->add()) {
            $this->errors[] = sprintf(
                $this->trans('%1$s (ID: %2$s) cannot be saved', array(), 'Admin.AdvParameters.Notification'),
                $category_to_create->name[$default_language_id],
                (isset($category_to_create->id) && !empty($category_to_create->id))? $category_to_create->id : 'null'
            );
            if ($field_error !== true || isset($lang_field_error) && $lang_field_error !== true) {
                $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                    Db::getInstance()->getMsgError();
            }
        }
    }

    public function attributeImport($offset = false, $limit = false, &$crossStepsVariables = false, $validateOnly = false)
    {
        $default_language = Configuration::get('PS_LANG_DEFAULT');

        $groups = array();
        if ($crossStepsVariables !== false && array_key_exists('groups', $crossStepsVariables)) {
            $groups = $crossStepsVariables['groups'];
        }
        foreach (AttributeGroup::getAttributesGroups($default_language) as $group) {
            $groups[$group['name']] = (int)$group['id_attribute_group'];
        }

        $attributes = array();
        if ($crossStepsVariables !== false && array_key_exists('attributes', $crossStepsVariables)) {
            $attributes = $crossStepsVariables['attributes'];
        }
        foreach (Attribute::getAttributes($default_language) as $attribute) {
            $attributes[$attribute['attribute_group'].'_'.$attribute['name']] = (int)$attribute['id_attribute'];
        }

        $this->receiveTab();
        $handle = $this->openCsvFile($offset);
        if (!$handle) {
            return false;
        }

        AdminImportController::setLocale();

        $regenerate = Tools::getValue('regenerate');
        $shop_is_feature_active = Shop::isFeatureActive();

        $line_count = 0;
        for ($current_line = 0; ($line = fgetcsv($handle, MAX_LINE_SIZE, $this->separator)) && (!$limit || $current_line < $limit); $current_line++) {
            $line_count++;

            if ($this->convert) {
                $line = $this->utf8EncodeArray($line);
            }

            if (count($line) == 1 && $line[0] == null) {
                $this->warnings[] = $this->trans('There is an empty row in the file that won\'t be imported.', array(), 'Admin.AdvParameters.Notification');
                continue;
            }

            $info = AdminImportController::getMaskedRow($line);
            $info = array_map('trim', $info);

            $this->attributeImportOne(
                $info,
                $default_language,
                $groups, // by ref
                $attributes, // by ref
                $regenerate,
                $shop_is_feature_active,
                $validateOnly
            );
        }
        $this->closeCsvFile($handle);

        if ($crossStepsVariables !== false) {
            $crossStepsVariables['groups'] = $groups;
            $crossStepsVariables['attributes'] = $attributes;
        }
        return $line_count;
    }

    protected function attributeImportOne($info, $default_language, &$groups, &$attributes, $regenerate, $shop_is_feature_active, $validateOnly = false)
    {
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
            $product = new Product((int)$info['id_product'], false, $default_language);
        } elseif (Tools::getValue('match_ref') && isset($info['product_reference']) && $info['product_reference']) {
            $datas = Db::getInstance()->getRow('
				SELECT p.`id_product`
				FROM `'._DB_PREFIX_.'product` p
				'.Shop::addSqlAssociation('product', 'p').'
				WHERE p.`reference` = "'.pSQL($info['product_reference']).'"
			', false);
            if (isset($datas['id_product']) && $datas['id_product']) {
                $product = new Product((int)$datas['id_product'], false, $default_language);
            }
        } else {
            return;
        }

        $id_image = array();

        if (isset($info['image_url']) && $info['image_url']) {
            $info['image_url'] = explode($this->multiple_value_separator, $info['image_url']);

            if (is_array($info['image_url']) && count($info['image_url'])) {
                foreach ($info['image_url'] as $key => $url) {
                    $url = trim($url);
                    $product_has_images = (bool)Image::getImages($this->context->language->id, $product->id);

                    $image = new Image();
                    $image->id_product = (int)$product->id;
                    $image->position = Image::getHighestPosition($product->id) + 1;
                    $image->cover = (!$product_has_images) ? true : false;

                    if (isset($info['image_alt'])) {
                        $alt = self::split($info['image_alt']);
                        if (isset($alt[$key]) && strlen($alt[$key]) > 0) {
                            $alt = self::createMultiLangField($alt[$key]);
                            $image->legend = $alt;
                        }
                    }

                    $field_error = $image->validateFields(UNFRIENDLY_ERROR, true);
                    $lang_field_error = $image->validateFieldsLang(UNFRIENDLY_ERROR, true);

                    if ($field_error === true &&
                        $lang_field_error === true &&
                        !$validateOnly &&
                        $image->add()) {
                        $image->associateTo($id_shop_list);
// FIXME: 2s/image !
                        if (!AdminImportController::copyImg($product->id, $image->id, $url, 'products', !$regenerate)) {
                            $this->warnings[] = sprintf($this->trans('Error copying image: %s', array(), 'Admin.AdvParameters.Notification'), $url);
                            $image->delete();
                        } else {
                            $id_image[] = (int)$image->id;
                        }
// until here
                    } else {
                        if (!$validateOnly) {
                            $this->warnings[] = sprintf(
                                $this->trans('%s cannot be saved', array(), 'Admin.AdvParameters.Notification'),
                                (isset($image->id_product) ? ' ('.$image->id_product.')' : '')
                            );
                        }
                        if ($field_error !== true || $lang_field_error !== true) {
                            $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').mysql_error();
                        }
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
                            $this->trans('No image was found for combination with id_product = %s and image position = %s.', array(), 'Admin.AdvParameters.Notification'),
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
                    $obj->name[$default_language] = $group;
                    $obj->public_name[$default_language] = $group;
                    $obj->position = (!$position) ? AttributeGroup::getHigherPosition() + 1 : $position;

                    if (($field_error = $obj->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                        ($lang_field_error = $obj->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true) {
                        // here, cannot avoid attributeGroup insertion to avoid an error during validation step.
                        //if (!$validateOnly) {
                            $obj->add();
                        $obj->associateTo($id_shop_list);
                        $groups[$group] = $obj->id;
                        //}
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
                        $obj->name[$default_language] = str_replace('\n', '', str_replace('\r', '', $attribute));
                        $obj->position = (!$position && isset($groups[$group])) ? Attribute::getHigherPosition($groups[$group]) + 1 : $position;

                        if (($field_error = $obj->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                            ($lang_field_error = $obj->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true) {
                            if (!$validateOnly) {
                                $obj->add();
                                $obj->associateTo($id_shop_list);
                                $attributes[$group.'_'.$attribute] = $obj->id;
                            }
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
                        $this->warnings[] = sprintf($this->trans('EAN13 "%1s" has incorrect value for product with id %2d.', array(), 'Admin.AdvParameters.Notification'), $info['ean13'], $product->id);
                        $info['ean13'] = '';
                    }

                    if ($info['default_on'] && !$validateOnly) {
                        $product->deleteDefaultAttributes();
                    }

                    // if a reference is specified for this product, get the associate id_product_attribute to UPDATE
                    if (isset($info['reference']) && !empty($info['reference'])) {
                        $id_product_attribute = Combination::getIdByReference($product->id, strval($info['reference']));

                        // updates the attribute
                        if ($id_product_attribute && !$validateOnly) {
                            // gets all the combinations of this product
                            $attribute_combinations = $product->getAttributeCombinations($default_language);
                            foreach ($attribute_combinations as $attribute_combination) {
                                if ($id_product_attribute && in_array($id_product_attribute, $attribute_combination)) {
                                    // FIXME: ~3s/declinaison
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
// until here
                                }
                            }
                        }
                    }

                    // if no attribute reference is specified, creates a new one
                    if (!$id_product_attribute && !$validateOnly) {
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
                    if (!$validateOnly) {
                        $obj = new Attribute();
                        $obj->cleanPositions((int)$id_attribute_group, false);
                        AttributeGroup::cleanPositions();
                    }
                }
            }
        }

        $product->checkDefaultAttributes();
        if (!$product->cache_default_attribute && !$validateOnly) {
            Product::updateDefaultAttribute($product->id);
        }
        if ($id_product_attribute) {
            if (!$validateOnly) {
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
            }

            // set advanced stock managment
            if (isset($info['advanced_stock_management'])) {
                if ($info['advanced_stock_management'] != 1 && $info['advanced_stock_management'] != 0) {
                    $this->warnings[] = sprintf($this->trans('Advanced stock management has incorrect value. Not set for product with id %d.', array(), 'Admin.AdvParameters.Notification'), $product->id);
                } elseif (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') && $info['advanced_stock_management'] == 1) {
                    $this->warnings[] = sprintf($this->trans('Advanced stock management is not enabled, cannot enable on product with id %d.', array(), 'Admin.AdvParameters.Notification'), $product->id);
                } elseif (!$validateOnly) {
                    $product->setAdvancedStockManagement($info['advanced_stock_management']);
                }
                // automaticly disable depends on stock, if a_s_m set to disabled
                if (!$validateOnly && StockAvailable::dependsOnStock($product->id) == 1 && $info['advanced_stock_management'] == 0) {
                    StockAvailable::setProductDependsOnStock($product->id, 0, null, $id_product_attribute);
                }
            }

            // Check if warehouse exists
            if (isset($info['warehouse']) && $info['warehouse']) {
                if (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
                    $this->warnings[] = sprintf($this->trans('Advanced stock management is not enabled, warehouse is not set on product with id %d.', array(), 'Admin.AdvParameters.Notification'), $product->id);
                } else {
                    if (Warehouse::exists($info['warehouse'])) {
                        $warehouse_location_entity = new WarehouseProductLocation();
                        $warehouse_location_entity->id_product = $product->id;
                        $warehouse_location_entity->id_product_attribute = $id_product_attribute;
                        $warehouse_location_entity->id_warehouse = $info['warehouse'];
                        if (!$validateOnly) {
                            if (WarehouseProductLocation::getProductLocation($product->id, $id_product_attribute, $info['warehouse']) !== false) {
                                $warehouse_location_entity->update();
                            } else {
                                $warehouse_location_entity->save();
                            }
                            StockAvailable::synchronize($product->id);
                        }
                    } else {
                        $this->warnings[] = sprintf($this->trans('Warehouse did not exist, cannot set on product %1$s.', array(), 'Admin.AdvParameters.Notification'), $product->name[$default_language]);
                    }
                }
            }

            // stock available
            if (isset($info['depends_on_stock'])) {
                if ($info['depends_on_stock'] != 0 && $info['depends_on_stock'] != 1) {
                    $this->warnings[] = sprintf($this->trans('Incorrect value for "Depends on stock" for product %1$s ', array(), 'Admin.Notifications.Error'), $product->name[$default_language]);
                } elseif ((!$info['advanced_stock_management'] || $info['advanced_stock_management'] == 0) && $info['depends_on_stock'] == 1) {
                    $this->warnings[] = sprintf($this->trans('Advanced stock management is not enabled, cannot set "Depends on stock" for product %1$s ', array(), 'Admin.AdvParameters.Notification'), $product->name[$default_language]);
                } elseif (!$validateOnly) {
                    StockAvailable::setProductDependsOnStock($product->id, $info['depends_on_stock'], null, $id_product_attribute);
                }

                // This code allows us to set qty and disable depends on stock
                if (isset($info['quantity'])) {
                    // if depends on stock and quantity, add quantity to stock
                    if ($info['depends_on_stock'] == 1) {
                        $stock_manager = StockManagerFactory::getManager();
                        $price = str_replace(',', '.', $info['wholesale_price']);
                        if ($price == 0) {
                            $price = 0.000001;
                        }
                        $price = round(floatval($price), 6);
                        $warehouse = new Warehouse($info['warehouse']);
                        if (!$validateOnly && $stock_manager->addProduct((int)$product->id, $id_product_attribute, $warehouse, (int)$info['quantity'], 1, $price, true)) {
                            StockAvailable::synchronize((int)$product->id);
                        }
                    } elseif (!$validateOnly) {
                        if ($shop_is_feature_active) {
                            foreach ($id_shop_list as $shop) {
                                StockAvailable::setQuantity((int)$product->id, $id_product_attribute, (int)$info['quantity'], (int)$shop);
                            }
                        } else {
                            StockAvailable::setQuantity((int)$product->id, $id_product_attribute, (int)$info['quantity'], $this->context->shop->id);
                        }
                    }
                }
            } elseif (!$validateOnly) { // if not depends_on_stock set, use normal qty
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

    

    protected function openCsvFile($offset = false)
    {
        $file = $this->excelToCsvFile(Tools::getValue('csv'));
        $handle = false;
        if (is_file($file) && is_readable($file)) {
            if (!mb_check_encoding(file_get_contents($file), 'UTF-8')) {
                $this->convert = true;
            }
            $handle = fopen($file, 'r');
        }

        if (!$handle) {
            $this->errors[] = $this->trans('Cannot read the .CSV file', array(), 'Admin.AdvParameters.Notification');
            return null; // error case
        }

        AdminImportController::rewindBomAware($handle);

        $toSkip = (int)Tools::getValue('skip');
        if ($offset && $offset > 0) {
            $toSkip += $offset;
        }
        for ($i = 0; $i < $toSkip; ++$i) {
            $line = fgetcsv($handle, MAX_LINE_SIZE, $this->separator);
            if ($line === false) {
                return false; // reached end of file
            }
        }
        return $handle;
    }

    protected function closeCsvFile($handle)
    {
        fclose($handle);
    }

    protected function excelToCsvFile($filename)
    {
        if (preg_match('#(.*?)\.(csv)#is', $filename)) {
            $dest_file = AdminImportController::getPath(strval(preg_replace('/\.{2,}/', '.', $filename)));
        } else {
            $csv_folder = AdminImportController::getPath();
            $excel_folder = $csv_folder.'csvfromexcel/';
            $info = pathinfo($filename);
            $csv_name = basename($filename, '.'.$info['extension']).'.csv';
            $dest_file = $excel_folder.$csv_name;

            if (!is_dir($excel_folder)) {
                mkdir($excel_folder);
            }

            if (!is_file($dest_file)) {
                $reader_excel = PHPExcel_IOFactory::createReaderForFile($csv_folder.$filename);
                $reader_excel->setReadDataOnly(true);
                $excel_file = $reader_excel->load($csv_folder.$filename);

                $csv_writer = PHPExcel_IOFactory::createWriter($excel_file, 'CSV');

                $csv_writer->setSheetIndex(0);
                $csv_writer->setDelimiter(';');
                $csv_writer->save($dest_file);
            }
        }

        return $dest_file;
    }

    

    public function postProcess()
    {
        /* PrestaShop demo mode */
        if (_PS_MODE_DEMO_) {
            $this->errors[] = $this->trans('This functionality has been disabled.', array(), 'Admin.Notifications.Error');
            return;
        }

        if (Tools::isSubmit('import')) {
            $this->importByGroups();
        } elseif ($filename = Tools::getValue('csvfilename')) {
            $filename = urldecode($filename);
            $file = AdminImportController::getPath(basename($filename));
            if (realpath(dirname($file)) != realpath(AdminImportController::getPath())) {
                exit();
            }
            if (!empty($filename)) {
                $b_name = basename($filename);
                if (Tools::getValue('delete') && file_exists($file)) {
                    @unlink($file);
                } elseif (file_exists($file)) {
                    $b_name = explode('.', $b_name);
                    $b_name = strtolower($b_name[count($b_name) - 1]);
                    $mime_types = array('csv' => 'text/csv');

                    if (isset($mime_types[$b_name])) {
                        $mime_type = $mime_types[$b_name];
                    } else {
                        $mime_type = 'application/octet-stream';
                    }

                    if (ob_get_level() && ob_get_length() > 0) {
                        ob_end_clean();
                    }

                    header('Content-Transfer-Encoding: binary');
                    header('Content-Type: '.$mime_type);
                    header('Content-Length: '.filesize($file));
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    $fp = fopen($file, 'rb');
                    while (is_resource($fp) && !feof($fp)) {
                        echo fgets($fp, 16384);
                    }
                    exit;
                }
            }
        }
        Db::getInstance()->enableCache();
        return parent::postProcess();
    }

    public function importByGroups($offset = false, $limit = false, &$results = null, $validateOnly = false, $moreStep = 0)
    {
        // Check if the CSV file exist
        if (Tools::getValue('csv')) {
            $shop_is_feature_active = Shop::isFeatureActive();
            // If i am a superadmin, i can truncate table (ONLY IF OFFSET == 0 or false and NOT FOR VALIDATION MODE!)
            if (!$offset && !$moreStep && !$validateOnly &&(($shop_is_feature_active && $this->context->employee->isSuperAdmin()) || !$shop_is_feature_active) && Tools::getValue('truncate')) {
                $this->truncateTables((int)Tools::getValue('entity'));
            }
            $import_type = false;
            $doneCount = 0;
            // Sometime, import will use registers to memorize data across all elements to import (for trees, or else).
            // Since import is splitted in multiple ajax calls, we must keep these data across all steps of the full import.
            $crossStepsVariables = array();
            if ($crossStepsVars = Tools::getValue('crossStepsVars')) {
                $crossStepsVars = json_decode($crossStepsVars, true);
                if (sizeof($crossStepsVars) > 0) {
                    $crossStepsVariables = $crossStepsVars;
                }
            }
            Db::getInstance()->disableCache();
            switch ((int)Tools::getValue('entity')) {
                case $this->entities[$import_type = $this->trans('Categories', array(), 'Admin.Global')]:
                    $doneCount += $this->categoryImport($offset, $limit, $crossStepsVariables, $validateOnly);
                    $this->clearSmartyCache();
                    break;
                case $this->entities[$import_type = $this->trans('Products', array(), 'Admin.Global')]:
                    if (!defined('PS_MASS_PRODUCT_CREATION')) {
                        define('PS_MASS_PRODUCT_CREATION', true);
                    }
                    $moreStepLabels = array($this->trans('Linking Accessories...', array(), 'Admin.AdvParameters.Notification'));
                    $doneCount += $this->productImport($offset, $limit, $crossStepsVariables, $validateOnly, $moreStep);
                    $this->clearSmartyCache();
                    break;
                case $this->entities[$import_type = $this->trans('Customers', array(), 'Admin.Global')]:
                    $doneCount += $this->customerImport($offset, $limit, $validateOnly);
                    break;
                case $this->entities[$import_type = $this->trans('Addresses', array(), 'Admin.Global')]:
                    $doneCount += $this->addressImport($offset, $limit, $validateOnly);
                    break;
                case $this->entities[$import_type = $this->trans('Combinations', array(), 'Admin.Global')]:
                    $doneCount += $this->attributeImport($offset, $limit, $crossStepsVariables, $validateOnly);
                    $this->clearSmartyCache();
                    break;
                case $this->entities[$import_type = $this->trans('Brands', array(), 'Admin.Global')]:
                    $doneCount += $this->manufacturerImport($offset, $limit, $validateOnly);
                    $this->clearSmartyCache();
                    break;
                case $this->entities[$import_type = $this->trans('Suppliers', array(), 'Admin.Global')]:
                    $doneCount += $this->supplierImport($offset, $limit, $validateOnly);
                    $this->clearSmartyCache();
                    break;
                case $this->entities[$import_type = $this->trans('Alias', array(), 'Admin.ShopParameters.Feature')]:
                    $doneCount += $this->aliasImport($offset, $limit, $validateOnly);
                    break;
                case $this->entities[$import_type = $this->trans('Store contacts', array(), 'Admin.AdvParameters.Feature')]:
                    $doneCount += $this->storeContactImport($offset, $limit, $validateOnly);
                    $this->clearSmartyCache();
                    break;
            }

            // @since 1.5.0
            if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
                switch ((int)Tools::getValue('entity')) {
                    case $this->entities[$import_type = $this->trans('Supply Orders', array(), 'Admin.AdvParameters.Feature')]:
                        if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
                            $doneCount += $this->supplyOrdersImport($offset, $limit, $validateOnly);
                        }
                        break;
                    case $this->entities[$import_type = $this->trans('Supply Order Details', array(), 'Admin.AdvParameters.Feature')]:
                        if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
                            $doneCount += $this->supplyOrdersDetailsImport($offset, $limit, $crossStepsVariables, $validateOnly);
                        }
                        break;
                }
            }

            if ($results !== null) {
                $results['isFinished'] = ($doneCount < $limit);
                $results['doneCount'] = $offset + $doneCount;
                if ($offset === 0) {
                    // compute total count only once, because it takes time
                    $handle = $this->openCsvFile(0);
                    if ($handle) {
                        $count = 0;
                        while (fgetcsv($handle, MAX_LINE_SIZE, $this->separator)) {
                            $count++;
                        }
                        $results['totalCount'] = $count;
                    }
                    $this->closeCsvFile($handle);
                }
                if (!$results['isFinished'] || (!$validateOnly && ($moreStep < count($moreStepLabels)))) {
                    // Since we'll have to POST this array from ajax for the next call, we should care about it size.
                    $nextPostSize = mb_strlen(json_encode($crossStepsVariables));
                    $results['crossStepsVariables'] = $crossStepsVariables;
                    $results['nextPostSize'] = $nextPostSize + (1024*64) ; // 64KB more for the rest of the POST query.
                    $results['postSizeLimit'] = Tools::getMaxUploadSize();
                }
                if ($results['isFinished'] && !$validateOnly && ($moreStep < count($moreStepLabels))) {
                    $results['oneMoreStep'] = $moreStep + 1;
                    $results['moreStepLabel'] = $moreStepLabels[$moreStep];
                }
            }

            if ($import_type !== false) {
                $log_message = sprintf($this->trans('%s import', array(), 'Admin.AdvParameters.Notification'), $import_type);
                if ($offset !== false && $limit !== false) {
                    $log_message .= ' '.sprintf($this->trans('(from %s to %s)', array(), 'Admin.AdvParameters.Notification'), $offset, $limit);
                }
                if (Tools::getValue('truncate')) {
                    $log_message .= ' '.$this->trans('with truncate', array(), 'Admin.AdvParameters.Notification');
                }
                PrestaShopLogger::addLog($log_message, 1, null, $import_type, null, true, (int)$this->context->employee->id);
            }

            Db::getInstance()->enableCache();
        } else {
            $this->errors[] = $this->trans('To proceed, please upload a file first.', array(), 'Admin.AdvParameters.Notification');
        }
    }

    protected function addProductWarning($product_name, $product_id = null, $message = '')
    {
        $this->warnings[] = $product_name.(isset($product_id) ? ' (ID '.$product_id.')' : '').' '
            .Tools::displayError($message);
    }

    public function ajaxProcessSaveImportMatchs()
    {
        if ($this->access('edit')) {
            $match = implode('|', Tools::getValue('type_value'));
            Db::getInstance()->execute('INSERT IGNORE INTO  `'._DB_PREFIX_.'import_match` (
										`id_import_match` ,
										`name` ,
										`match`,
										`skip`
										)
										VALUES (
										NULL ,
										\''.pSQL(Tools::getValue('newImportMatchs')).'\',
										\''.pSQL($match).'\',
										\''.pSQL(Tools::getValue('skip')).'\'
										)', false);

            die('{"id" : "'.Db::getInstance()->Insert_ID().'"}');
        }
    }

    public function ajaxProcessLoadImportMatchs()
    {
        if ($this->access('edit')) {
            $return = Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'import_match` WHERE `id_import_match` = '
                .(int)Tools::getValue('idImportMatchs'), true, false);
            die('{"id" : "'.$return[0]['id_import_match'].'", "matchs" : "'.$return[0]['match'].'", "skip" : "'
                .$return[0]['skip'].'"}');
        }
    }

    public function ajaxProcessDeleteImportMatchs()
    {
        if ($this->access('edit')) {
            Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'import_match` WHERE `id_import_match` = '
                .(int)Tools::getValue('idImportMatchs'), false);
            die;
        }
    }

    public static function getPath($file = '')
    {
        return (defined('_PS_HOST_MODE_') ? _PS_ROOT_DIR_ : _PS_ADMIN_DIR_).DIRECTORY_SEPARATOR.'import'
            .DIRECTORY_SEPARATOR.$file;
    }

    public function ajaxProcessImport()
    {
        $offset = (int)Tools::getValue('offset');
        $limit = (int)Tools::getValue('limit');
        $validateOnly = ((int)Tools::getValue('validateOnly') == 1);
        $moreStep = (int)Tools::getValue('moreStep');

        $results = array();
        $this->importByGroups($offset, $limit, $results, $validateOnly, $moreStep);

        // Retrieve errors/warnings if any
        if (count($this->errors) > 0) {
            $results['errors'] = $this->errors;
        }
        if (count($this->warnings) > 0) {
            $results['warnings'] = $this->warnings;
        }
        if (count($this->informations) > 0) {
            $results['informations'] = $this->informations;
        }

        if (!$validateOnly && (bool)$results['isFinished'] && !isset($results['oneMoreStep']) && (bool)Tools::getValue('sendemail')) {
            // Mail::Send() can sometimes throw an error...
            try {
                unset($this->context->cookie->csv_selected); // remove CSV selection file if finished with no error.

                $templateVars = array(
                    '{firstname}' => $this->context->employee->firstname,
                    '{lastname}' => $this->context->employee->lastname,
                    '{filename}' => Tools::getValue('csv')
                );

                $employeeLanguage = new Language((int) $this->context->employee->id_lang);
                // Mail send in last step because in case of failure, does NOT throw an error.
                $mailSuccess = @Mail::Send(
                    (int)$this->context->employee->id_lang,
                    'import',
                    $this->trans(
                        'Import complete',
                        array(),
                        'Emails.Subject',
                        $employeeLanguage->locale
                    ),
                    $templateVars,
                    $this->context->employee->email,
                    $this->context->employee->firstname . ' ' . $this->context->employee->lastname,
                    null,
                    null,
                    null,
                    null,
                    _PS_MAIL_DIR_,
                    false, // do not die in failed! Warn only, it's not an import error, because import finished in fact.
                    (int)$this->context->shop->id
                );
                if (!$mailSuccess) {
                    $results['warnings'][] = $this->trans('The confirmation email couldn\'t be sent, but the import is successful. Yay!', array(), 'Admin.AdvParameters.Notification');
                }
            } catch (\Exception $e) {
                $results['warnings'][] = $this->trans('The confirmation email couldn\'t be sent, but the import is successful. Yay!', array(), 'Admin.AdvParameters.Notification');
            }
        }

        die(json_encode($results));
    }

}
