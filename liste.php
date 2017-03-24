<?php
require('header.php');
?>

    <div class="container-fluid text-center container_1">
        <h2>Vos résultat</h2>
    </div>
    <div class="container-fluid">
        <div class="row" style=" margin-left: 75px;">
            <?php


            $name = $_GET['name'];
            $nb = $_GET['nb'];

            $data = file_get_contents('Https://fr.openfoodfacts.org/cgi/search.pl?search_terms='.$name.'&search_simple=1&action=process&json=1');

            $json = json_decode($data, true);

            //var_dump($test);

            //$valeur1 = $test["products"][0]["serving_size"];

            //var_dump($json);

            for ($p=0; $p <= ($nb-1); $p++) :

                $id = $json['products'][$p]['code'];
                $nomProduit = $json['products'][$p]['product_name'];
                $marque = $json['products'][$p]['brands'];
                $image = $json['products'][$p]['image_small_url'];

                if (isset($json['products'][$p]['nutrition_grades'])){
                $nutriScor = strtoupper($json['products'][$p]['nutrition_grades']);}

                if (isset($json['products'][$p]['quantity'])){
                    $poid = $json['products'][$p]['quantity'];}

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


                <div class="col-xs-12 col-sm-3 resultats">
                    <div class="text-center">
                        <h3><a href="search.php?id=<?=$id?>" ><?=$nomProduit?></a></h3>
                            <p><?=$marque?></p>
                            <img class="thumbnail img-responsive" src="<?=$image?>" style=" margin-left:auto; margin-right: auto;"/>
                            <p><strong>Poids :  </strong><?=$poid?></p>

                         <img src="<?=$nutriScor?>" /><br />
                    </div>
                </div>



            <?php endfor ?>
        </div>
    </div>


<?php
require('footer.php');
?>