<?php
namespace Controllers;

use Core\Controller;
use Core\View;

class Users extends Controller {
    private $_users;

    function __construct() {
        parent::__construct();
        $this->_users = new \Models\Users();
    }

    public function update()
    {
        $id = $_POST['user_id'];

        $postdata = array(
            'pseudo'    =>  $_POST['pseudo'],
            'mail'      =>  $_POST['email'],                                 
            'prenom'    =>  $_POST['first_name'],
            'nom'       =>  $_POST['last_name'],
            'admin'     =>  ($_POST['admin'] == 'on') ? 1 : 0                     
        );

        $where = array('id' => $id);
        $this->_users->update($postdata, $where);

        \Helpers\Url::previous();
    }
}
