<?php
require('php/header.php');
?>
<div class="container-fluid">
    <div class="row">
<?php

$data = file_get_contents('Https://world.openfoodfacts.org/cgi/search.pl?search_terms=pizza&search_simple=1&action=process&json=1');

$json = json_decode($data, true);

//var_dump($test);

//$valeur1 = $test["products"][0]["serving_size"];

//var_dump($json);

for ($p=0; $p <= 10; $p++) :

    $nomProduit = $json['products'][$p]['product_name_fr'];
    $marque = $json['products'][$p]['brands'];
    $image = $json['products'][$p]['image_small_url'];
    $poidPortion = $json['products'][$p]['serving_size'];
    $kcal = $json['products'][$p]['nutriments']['energy_serving'];

    ?>

        <div class="col-md-3 resultats">
            <h2>Votre résultat</h2>
            <table>
                <tr>
                    <td>Nom du produit</td>
                    <td><?=$nomProduit?></td>
                </tr>
                <tr>
                    <td>Marque</td>
                    <td><?=$marque?></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="<?=$image?>"/></td>
                </tr>
                <tr>
                    <td>Calories</td>
                    <td><?=$kcal?></td>
                </tr>
                <tr>
                    <td>Poids des Portions</td>
                    <td><?=$poidPortion?></td>
                </tr>
            </table>
        </div>




<?php endfor ?>
</div>
    </div>
<?php
require('php/footer.php');
?>