<?php
require('php/header.php');
?>
<div class="container-fluid">
    <div class="row">

<?php
$name ='pizza';
$nb = 6;

$name = $_GET['name'];
$nb = $_GET['nb'];

$data = file_get_contents('Https://world.openfoodfacts.org/cgi/search.pl?search_terms='.$name.'&search_simple=1&action=process&json=1');

$json = json_decode($data, true);

//var_dump($test);

//$valeur1 = $test["products"][0]["serving_size"];

//var_dump($json);

for ($p=0; $p <= ($nb-1); $p++) :

    $nomProduit = $json['products'][$p]['product_name'];
    $marque = $json['products'][$p]['brands'];
    $image = $json['products'][$p]['image_small_url'];
    $poidPortion = $json['products'][$p]['serving_size'];

    if (isset($json['products'][$p]['nutriments']['energy_serving'])){

    $kcal = $json['products'][$p]['nutriments']['energy_serving'];}

    ?>

        <div class="col-md-3 resultats">
            <h2>Votre résultat</h2>
            <table>
                <tr>
                    <td><strong>Nom du produit</strong></td>
                    <td><?=$nomProduit?></td>
                </tr>
                <tr>
                    <td><strong>Marque</strong></td>
                    <td><?=$marque?></td>
                </tr>
                <tr>
                    <td><strong>Image</strong></td>
                    <td><img class="thumbnail" src="<?=$image?>"/></td>
                </tr>
                <tr>
                    <td><strong>Calories</strong></td>
                    <td><?=$kcal?></td>
                </tr>
                <tr>
                    <td><strong>Poids des Portions</strong></td>
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