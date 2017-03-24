<?php
require('php/header.php');
?>
<div class="container-fluid">
    <div class="row">

<?php


$name = $_GET['name'];
$nb = $_GET['nb'];

$data = file_get_contents('Https://world.openfoodfacts.org/cgi/search.pl?search_terms='.$name.'&search_simple=1&action=process&json=1');

$json = json_decode($data, true);

//var_dump($test);

//$valeur1 = $test["products"][0]["serving_size"];

//var_dump($json);

for ($p=0; $p <= ($nb-1); $p++) :

    $id = $json['products'][$p]['code'];
    $nomProduit = $json['products'][$p]['product_name'];
    $marque = $json['products'][$p]['brands'];
    $image = $json['products'][$p]['image_small_url'];
    $nutriScor = $json['products'][$p]['nutrition_grades'];

    if (isset($json['products'][$p]['quantity'])){

    $poid = $json['products'][$p]['quantity'];}

    ?>

        <div class="col-md-3 resultats">
            <h2>Votre résultat</h2>
            <table>
                <tr>
                    <td><strong>Nom du produit:</strong></td>
                    <td><a href="search.php?id=<?=$id?>" ><?=$nomProduit?></a></td>
                </tr>
                <tr>
                    <td><strong>Marque:</strong></td>
                    <td><?=$marque?></td>
                </tr>
                <tr>
                    <td><strong></strong></td>
                    <td><img class="thumbnail" src="<?=$image?>"/></td>
                </tr>
                <tr>
                    <td><strong>Poid:</strong></td>
                    <td><?=$poid?></td>
                </tr>
                <tr>
                    <td><strong>Nutriscor:</strong></td>
                    <td><?=$nutriScor?></td>
                </tr>
            </table>
        </div>




<?php endfor ?>
</div>
    </div>
<?php
require('php/footer.php');
?>