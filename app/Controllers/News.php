<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author quentin
 */

namespace Controllers;

use Core\Controller;
use Core\View;

class News extends Controller {

    private $_users;
    private $_news;
    private $_commentaires;
    private $_univers;

    function __construct() {
        parent::__construct();
        $this->_news = new \Models\News();
        $this->_commentaires = new \Models\Commentaires();
        $this->_users = new \Models\Users();
        $this->_univers = new \Models\Univers();
    }

    public function index($id) {
        $recupId = explode("-", $id);
        $id = $recupId[0];

        $liste = $this->_news->findByUnivers($id);
        
        

        $listeNews = array();
        foreach($liste as $k => $l)
        {
            $listeNews[$k]['news'] = $l;
            $listeNews[$k]['image'] = $this->_news->findNewsImage($l->id);
            $listeNews[$k]['image'] = $listeNews[$k]['image'][0];
            $listeNews[$k]['auteur'] = $this->_users->getUsersById($l->auteur);
            $listeNews[$k]['auteur'] = $listeNews[$k]['auteur'][0];
        }

        $data = $listeNews;

        View::renderTemplate('header');
        View::render('news/index', $data);
        View::renderTemplate('footer');
    }

    public function detail($id) {
        $recupId = explode("-", $id);
        $id = $recupId[0];

        $news = $this->_news->findById($id);
        $news = $news[0];
        $date = new \DateTime($news->date);
        $news->date = $date->format('d/m/Y \à H\hi');
        $data['news'] = $news;


        $data['image'] = $this->_news->findNewsImage($id);
        $data['image'] = $data['image'][0];
        $data['auteur'] = $this->_users->getUsersById($news->auteur);
        $data['auteur'] = $data['auteur'][0];

        $data['commentaires'] = array();

        $commentaires = $this->_commentaires->findByNews($id);
        foreach($commentaires as $c)
        {
            $auteur = $this->_users->getUsersById($c->id_user);
            $auteur = $auteur[0];
            $date = new \DateTime($c->date);
            $c->date = $date->format('d/m/Y H\hi');
            $data['commentaires'][] = array('commentaire' => $c, 'auteur' => $auteur);
        }
        
        View::renderTemplate('header');
        View::render('news/detail', $data);
        View::renderTemplate('footer');
    }

    public function new_news()
    {
        $data['univers'] = $this->_univers->findAll();
        View::render('news/new', $data);
    }

    public function create()
    {
        $postdata = array(
            'nom'           =>  $_POST['nom'],
            'slug'          =>  '',                                 
            'auteur'        =>  $_SESSION['id'],
            'contenu'       =>  $_POST['contenu'],
            'id_univers'    =>  $_POST['univers']
        );

        $this->_news->create($postdata);

        \Helpers\Url::previous();
    }

    public function edit($id) 
    {
        $data['univers'] = $this->_univers->findAll();
        $data['news'] = $this->_news->findById($id);
        $data['news'] = $data['news'][0];
        View::render('news/edit', $data);
    }

    public function update($id)
    {
        $postdata = array(
            'nom'        =>  $_POST['nom'],                                
            'contenu'       =>  $_POST['contenu']                      
        );

        $where = array('id' => $id);
        $this->_news->update($postdata, $where);

        \Helpers\Url::previous();
    }

}
