<?php
/**
 * Welcome controller.
 *
 * @author David Carr - dave@daveismyname.com
 *
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */
namespace Controllers;

use Core\Controller;
use Core\View;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Welcome extends Controller
{
    private $_news;
    private $_users;
    private $_produits;

    /**
     * Call the parent construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Welcome');

        $this->_news = new \Models\News();
        $this->_produits = new \Models\Produits();
        $this->_users = new \Models\Users();
    }

    /**
     * Define Index page title and load template files.
     */
    public function index()
    {
        $liste = $this->_news->findAllLast(5);
        $listeNews = array();
        foreach ($liste as $k => $l) {
            $listeNews[$k]['news'] = $l;
            $listeNews[$k]['image'] = $this->_news->findNewsImage($l->id);
            $listeNews[$k]['image'] = $listeNews[$k]['image'][0];
            $listeNews[$k]['auteur'] = $this->_users->getUsersById($l->auteur);
            $listeNews[$k]['auteur'] = $listeNews[$k]['auteur'][0];
        }

        $data['news'] = $listeNews;

        $liste2 = $this->_produits->findAllLast(5);
        $listeProduits = array();
        foreach ($liste2 as $k => $l) {
            $listeProduits[$k]['produit'] = $l;
            $listeProduits[$k]['image'] = $this->_produits->findProduitImage($l->id);
            $listeProduits[$k]['image'] = $listeProduits[$k]['image'][0];
            $listeProduits[$k]['auteur'] = $this->_users->getUsersById($l->id_auteur);
            $listeProduits[$k]['auteur'] = $listeProduits[$k]['auteur'][0];
        }

        $data['produits'] = $listeProduits;



        View::renderTemplate('header', $data);
        View::render('welcome/welcome', $data);
        View::renderTemplate('footer', $data);
    }

    /**
     * Define Subpage page title and load template files.
     */
    public function subPage()
    {
        $data['title'] = $this->language->get('subpage_text');
        $data['welcome_message'] = $this->language->get('subpage_message');

        View::renderTemplate('header', $data);
        View::render('welcome/subpage', $data);
        View::renderTemplate('footer', $data);
    }
}
