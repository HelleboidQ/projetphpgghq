<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Adresses extends Controller {

    private $_adresses;

    function __construct() {
        parent::__construct();
        $this->_adresses = new \Models\Adresses();
    }

    public function newAdresse()
    {
        $data = array();
        View::render('adresses/new', $data);
    }

    public function create()
    {
        $postdata = array(
            'numero'        =>  $_POST['numero'],
            'cplt_numero'   =>  $_POST['cplt'],                                 
            'cp'            =>  $_POST['cp'],
            'rue'           =>  $_POST['rue'],
            'ville'         =>  $_POST['ville'],
            'id_users'      =>  \Helpers\Session::get('id')                         
        );

        $this->_adresses->create($postdata);

        \Helpers\Url::previous();
    }

    public function edit($id) {
        $adresse = $this->_adresses->findById($id);
        $data = $adresse;
        View::render('adresses/edit', $data);
    }

    public function update($id)
    {
        $postdata = array(
            'numero'        =>  $_POST['numero'],
            'cplt_numero'   =>  $_POST['cplt'],                                 
            'cp'            =>  $_POST['cp'],
            'rue'           =>  $_POST['rue'],
            'ville'         =>  $_POST['ville']                            
        );

        $where = array('id' => $id);
        $this->_adresses->update($postdata, $where);

        \Helpers\Url::previous();
    }

}
