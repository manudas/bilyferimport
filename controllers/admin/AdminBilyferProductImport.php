<?php
/*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

/**
 * @since 1.6.0
 */
class AdminBilyferProductImport extends ModuleAdminController
{
	public function renderList()
	{

		// instead of a renderList we are going to use a renderForm inside
		$this -> fields_form = array(
			'tinymce' => true,
			'legend' => array(
				'title' =>  $this->trans('Accepted combinations', array(), 'Modules.cmsseo.Admin'),
				'image' => '../img/admin/cog.gif'
			),
			'input' => array(
				array(
					'type' => 'text',
					// 'lang' => true,
					'label' => $this->trans('ID:', array(), 'Modules.cmsseo.Admin'),
					'name' => 'id',
					'size' => 32,
					'readonly' => true
				),
				array(
					'type' => 'select',
					// 'lang' => true,
					'label' => $this->trans('Block reference:', array(), 'Modules.cmsseo.Admin'),
					'name' => 'blockreference',
					'class' => 'blockreference',
					'hint' => $this->trans('You will find here the references entered in Code Extracts', array(), 'Modules.cmsseo.Admin'),
					'desc' => $this->trans('You will find here the references entered in Code Extracts', array(), 'Modules.cmsseo.Admin'),
					'required' => true,
					'options' => array(
									'query' => $options_blockreferences,
									'id' => 'id_option', 
									'name' => 'name'
								),
				),
				array(
					'type' => 'select',
					'label' => $this->trans('Inner reference:', array(), 'Modules.cmsseo.Admin'),
					'name' => 'subreference',
					'required' => true,
					'class' => 'subreference',
					'hint' => $this->trans('You will find here the subreferences entered in Code Extracts depending on the selected reference', array(), 'Modules.cmsseo.Admin'),
					'desc' => $this->trans('You will find here the subreferences entered in Code Extracts depending on the selected reference', array(), 'Modules.cmsseo.Admin'),
					'options' => array(
									'query' => $options_subreferences,
									'id' => 'id_option', 
									'name' => 'name'
								),
				),
				array(
					'type' => 'text',
					// 'lang' => true,
					'label' => $this->trans('ID object:', array(), 'Modules.cmsseo.Admin'),
					'name' => 'id_object',
					'required' => true,
					'size' => 32
				),
				array(
					'type' => 'select',
					'label' => $this->trans('Type of page:', array(), 'Modules.cmsseo.Admin'),
					'name' => 'type',
					'required' => true,
					'hint' => $this->trans('Accepted values are: cms, product and category', array(), 'Modules.cmsseo.Admin'),
					'desc' => $this->trans('Accepted values are: cms, product and category', array(), 'Modules.cmsseo.Admin'),
					'options' => array(
						'query' => $type_selector_options,  // $options contains the data itself.
						'id' => 'id_option',         		// The value of the 'id' key must be the same as the key for 'value' attribute of the <option> tag in each $options sub-array.
						'name' => 'name',             		// The value of the 'name' key must be the same as the key for the text content of the <option> tag in each $options sub-array.
					),
					
					
				),
				array(
					'type' => 'text',
					// 'lang' => true,
					'label' => $this->trans('Position:', array(), 'Modules.cmsseo.Admin'),
					'name' => 'order',
					'required' => true,
					'hint' => $this->trans('Should be 1 or greater. Ascending order', array(), 'Modules.cmsseo.Admin'),
					'desc' => $this->trans('Should be 1 or greater. Ascending order', array(), 'Modules.cmsseo.Admin'),
					'size' => 32
				)
			),
			'buttons' => array(
                'cancelBlock' => array(
                    'title' => $this->trans('Cancel', array(), 'Modules.combinationseo.Admin'),
                    'href' => (Tools::safeOutput(Tools::getValue('back', false)))
                                ?: $this->context->link->getAdminLink('Admin'.$this->name),
                    'icon' => 'process-icon-cancel',
					'class' => 'pull-right'
                )
            ),
			'submit' => array(
				'title' => $this->trans('Save', array(), 'Modules.combinationseo.Admin'),
				'class' => 'button'
			)
		);
		if (!($obj = $this->loadObject(true)))
			return;
		
		if (!empty($id)) {
			foreach (CodeCombination::$definition['fields'] as $field_name => $field_values){
				$this -> fields_value = array($field_name => $current_combination -> $field_name);
			}
		}
		return parent::renderForm();
	}
}
