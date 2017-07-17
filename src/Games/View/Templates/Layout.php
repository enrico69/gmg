<?php
/**
 * Main template
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo $siteURL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $siteURL; ?>css/bootstrap-theme.min.css">
    <title><?php echo $title; ?></title>
    <script src="<?php echo $siteURL; ?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $siteURL; ?>js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="nav-li" href="<?php echo $siteURL; ?>" >Accueil</a></li>
                    <li class="dropdown">
                        <a class="nav-li" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">Au hasard <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $siteURL; ?>random" >Un jeu au hasard</a></li>
                            <li><a href="<?php echo $siteURL; ?>random?mode=solo" >Un jeu à jouer solo au hasard</a></li>
                            <li><a href="<?php echo $siteURL; ?>random?mode=multi" >Un jeu à jouer en multi au hasard</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-li" href="<?php echo $siteURL; ?>list" >Listes</a></li>
                    <li><a class="nav-li" href="<?php echo $siteURL; ?>list/top" >Top jeux solo récurrents</a></li>
                    <li><a class="nav-li" href="<?php echo $siteURL; ?>list?filter=A%20acheter" >A acheter</a></li>
                    <li><a class="nav-li" href="<?php echo $siteURL; ?>todo" >Jeux à faire</a></li>
                    <li><a class="nav-li" href="<?php echo $siteURL; ?>add" >Ajout</a></li>
                </ul>
            </div>
        </div>
        <form style="float:right;" method="POST" action="<?php echo $siteURL;?>search">
            <input type="text" name="search" />
            <input type="submit" value="Rechercher"/>
        </form>
        </div>
    </nav>
    <?php echo $content; ?>
</body>
</html>