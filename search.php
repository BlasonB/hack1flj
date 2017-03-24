<?php
require('header.php');
?>
    <div class="container-fluid">
        <div class="row">


<?php



$id = $_GET['id'];

$url = "http://world.openfoodfacts.org/api/v0/product/'.$id.'json";

$result = file_get_contents($url);

$json2 = json_decode($result, true);

//var_dump($json2);

$id = $json2['product']['code'];
$nomProduit = $json2['product']['product_name'];
$marque = $json2['product']['brands'];
$image = $json2['product']['image_small_url'];

if (isset($json2['product']['nutrition_grades'])){
$nutriScor = strtoupper($json2['product']['nutrition_grades']);}

if (isset($json2['product']['quantity'])){
    $poid = $json2['product']['quantity'];}


$valPortion = $json2['product']['nutriments']['energy_serving'];

if (isset($json2['product']['nutriments']['energy_value'])){
$val100g = $json2['product']['nutriments']['energy_value'];}
else $val100g = $json2['product']['nutriments']['energy'];

if (isset($json2['product']['serving_quantity'])){
$pdportion = $json2['product']['serving_quantity'];}
else $pdportion = $json2['product']['serving_size'];

if (isset($json2['product']['allergens'])){
$alergen = $json2['product']['allergens'];}

switch ($nutriScor) {
    case 'A':
        $nutriScor = 'img/nutriscore-a.svg';
        break;
    case 'B':
        $nutriScor = 'img/nutriscore-b.svg';
        break;
    case 'C':
        $nutriScor = 'img/nutriscore-c.svg';
        break;
    case 'D':
        $nutriScor = 'img/nutriscore-d.svg';
        break;
    case 'E':
        $nutriScor = 'img/nutriscore-e.svg';
        break;
}

?>


            <div class="col-md-3 col-md-offset-3 divdenfer">
                <div class="divdenferproduit">
                        <h2>Votre résultat</h2>
                    <table>
                        <tr>
                            <td><strong>Nom du produit</strong></td>
                            <td><a href="search.php?id=<?=$id?>" ><?=$nomProduit?></a></td>
                        </tr>
                        <tr>
                            <td><strong>Marque</strong></td>
                            <td><?=$marque?></td>
                        </tr>
                        <tr>
                            <td><strong></strong></td>
                            <td><img class="thumbnail img-responsive" src="<?=$image?>"/></td>
                        </tr>
                        <tr>
                            <td><strong>Poid/litre: </strong></td>
                            <td><?=$poid?></td>
                        </tr>

                        <tr>
                            <td><strong>Valeur energétique/portion: </strong></td>
                            <td><?=$valPortion?></td>
                        </tr>
                        <tr>
                            <td><strong>Valeur energétique pour 100g: </strong></td>
                            <td><?=$val100g?></td>
                        </tr>
                        <tr>
                            <td><strong>Poids/litre d'une portion: </strong></td>
                            <td><?=$pdportion?></td>
                        </tr>
                        <tr>
                            <td><strong>Alergens: </strong></td>
                            <td><?=$alergen?></td>
                        </tr>
                        <tr>
                            <td><strong>code barre:</strong></td>
                            <td><?=$id?></td>
                        </tr>
                    </table>

                    <img src="<?=$nutriScor?>" class="img-responsive" />
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 col-md-offset-4">
            <form method="POST" action="">
            <div class="form-group">
                <label for="langages">choix de votre sport:</label>
                <input class="form-control" type="text" name="sport"  id="langages"/>
            </div>
            <div class="form-group">
                <label for="portion">Nombre de portions gobé :</label>
                <input class="form-control" type="text" name="portion"  id="portion"/>
            </div>
            <input class="btn btn-success" type="submit" name="btnSubmit" value="GO" />
            </form>
          </div>
        </div>
    </div>

<?php

($calorialiment = ($valPortion/ 4.1868));

include 'connect.php';
if(isset($_POST['sport'])) {
    $bdd = mysqli_connect(SERVER, USER, PASS, DB);
    mysqli_set_charset($bdd, 'utf8');

    $req = "SELECT calorie FROM sport.sport WHERE sport='$_POST[sport]'";
    $res = mysqli_query($bdd, $req);
    while ($data = mysqli_fetch_assoc($res)) {
        $kal = $data['calorie'];
        $temps = floor(($calorialiment * $_POST['portion']) / $kal);
        $tempsmin = (((($calorialiment * $_POST['portion'])/ $kal) - $temps) * 60);
        echo 'Il te faut ' . $temps . 'H et ' . round($tempsmin) . 'min pour conso toutes les calories.';

    }


}

?>


<?php
require('footer.php');
?>
