Panier :

<br /> <br /> 
<?php
if (sizeof($data["panier"]) == 0) {
    echo "Panier vide";
} else {
    foreach ($data["panier"] as $panier) {
        echo "id panier : " . $panier->id . " - " . $panier->nom;
    }
}
?>