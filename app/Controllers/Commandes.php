<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Helpers;

class Commandes extends Controller {

    private $_commandes;
    private $_modele;
   	private $_produits;
   	private $_users;
   	private $_adresses;

    function __construct() {
        parent::__construct();
        $this->_commandes = new \Models\Commandes();
        $this->_modele = new \Models\Modele();
        $this->_produits = new \Models\Produits();
        $this->_users = new \Models\Users();
        $this->_adresses = new \Models\Adresses();

    }

    public function imprimer($id)
    {
    	$data = array();
    	
    	$commande = $this->_commandes->findById($id);
    	$data['commande'] = $commande[0];

    	$utilisateur = $this->_users->findById($commande[0]->id_users);

    	//var_dump($utilisateur);

    	$adresse = $this->_adresses->findById($commande[0]->id_adresse);
    	//var_dump($adresse);

    	$produits_raw = $this->_commandes->findProduitsById($id);

    	//var_dump($produits_raw);

    	foreach($produits_raw as $p)
    	{
    		$nom_modele = $this->_modele->findById($p->id_produit);
    		$nom_produit = $this->_produits->findById($nom_modele[0]->id_produit);



    		$nom_produit = $nom_produit[0];
    		$nom_modele = $nom_modele[0];

    		$data['contenu'][] = array('modele' => $nom_modele->nom, 'nom' => $nom_produit->nom, 'prix' => $p->prix, 'quantite' => $p->quantite);
    	}

    	//var_dump($data);

    	foreach($data['contenu'] as $ligne)
    	{
    		//echo $ligne['nom'] . ' - ' . $ligne['modele'];
    		//echo ' - ' . $ligne['prix'] * $ligne['quantite'];
    		//echo '<hr>';
    	}

    	
    	$pdf = new Helpers\FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'Votre commande :');
		$pdf->Ln(20);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(40,5,
			utf8_decode($utilisateur[0]->pseudo)
			);
		$pdf->Ln();
		$pdf->Cell(40,5,
			utf8_decode($adresse[0]->numero . ' ' . $adresse[0]->cplt_numero . ' ' . $adresse[0]->rue)
			);
		$pdf->Ln();
		$pdf->Cell(40,5,
			utf8_decode($adresse[0]->cp . ' ' . $adresse[0]->ville)
			);
		$pdf->Ln(10);

		$pdf->SetFont('Arial','B',12);

		$pdf->Cell(120,10,utf8_decode('Article'),1);
			$pdf->Cell(20,10,utf8_decode('PU'),1);
			$pdf->Cell(10,10,utf8_decode('Qte'),1);
			$pdf->Cell(30,10,utf8_decode('Total'),1);
			$pdf->Ln(15);

		$pdf->SetFont('Arial','B',10);

		foreach($data['contenu'] as $ligne)
		{
			$pdf->Cell(120,10,utf8_decode($ligne['nom'] . ' - ' . $ligne['modele']),1);
			$pdf->Cell(20,10,utf8_decode(number_format ($ligne['prix'],2,',',' ') . '€'),1);
			$pdf->Cell(10,10,utf8_decode(number_format ($ligne['quantite'],0,',',' ')),1);
			$pdf->Cell(30,10,utf8_decode(number_format ($ligne['prix']*$ligne['quantite'],2,',',' ') . '€'),1);

			$pdf->Ln();
		}

		$pdf->Output('D','commande-'.$id.'.pdf');
		

    	
    }
}
