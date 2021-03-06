<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Eatbeat</title>
    <!-- Bootstrap -->
    <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-center">
                    <form action="liste.php" method="get" class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Marques, catégories, ...">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nb" placeholder="Nb Articles">
                        </div>
                        <button type="submit" class="btn btn-default" name="btnSubmit">GO !</button>
                    </form>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
