<?php

class bilyferimport extends Module {

    public function __construct()
    {
        $this->name = 'bilyferimport';
        $this->tab = 'front_office_features';
        $this->version = '0.1';
        $this->author = 'Manuel José Pulgar Anguita';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.7');
    
        parent::__construct();
    
        $this->displayName = $this->l('Modulo de importación CSV para Bylifer');
        $this->description = $this->l('Módulo para importar los archivos extraídos de EXCEL con productos a la tienda Bilyfer');
    
        $this->confirmUninstall = $this->l('¿Seguro que lo quiere desinstalar?');
    }

}