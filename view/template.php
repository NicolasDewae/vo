<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <nav class = "navbar navbar-expand-lg navbar-light bg-light">
        <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "# navbarColor03" aria-controls = "navbarColor03" aria-Expand = "false" aria-label = "Basculer la navigation ">
            <span class = "navbar-toggler-icon"> </span>
        </button>

        <div class = "collapse navbar-collapse" id = "navbarColor03">
            <ul class = "navbar-nav mr-auto">
                <li class = "nav-item active">
                    <a class="nav-link" href="<?php echo URL ?>accueil">
                        <p style = "vertical-align: inherit;"> 
                            Accueil
                        </p> 
                    </a>
                </li>
                <!-- if session, show navbar with "livres" and "déconnexion" else, show "inscription" and "connexion" -->
                <?php if (isset($_SESSION['id'])) { ?>
                    <li class = "nav-item active">
                        <a class="nav-link" href="<?php echo URL ?>livres">
                            <p style = "vertical-align: inherit;"> 
                                Livres
                            </p> 
                        </a>
                    </li>
                    <li class = "nav-item active">
                        <a class="nav-link" href="<?php echo URL ?>deconnexion">
                            <p style = "vertical-align: inherit;"> 
                                Deconnexion
                            </p> 
                        </a>
                    </li>
                <?php } else {?>
                    <li class = "nav-item active">
                        <a class="nav-link" href="<?php echo URL ?>inscription">
                            <p style = "vertical-align: inherit;"> 
                                Inscription
                            </p> 
                        </a>
                    </li>
                    <li class = "nav-item active">
                        <a class="nav-link" href="<?php echo URL ?>connexion">
                            <p style = "vertical-align: inherit;"> 
                                Connexion
                            </p> 
                        </a>
                    </li>
                <!-- end if -->
                <?php } ?>
                <li class = "nav-item active">
                    <a class="nav-link" href="<?php echo URL ?>todo">
                        <p style = "vertical-align: inherit;"> 
                            To do
                        </p> 
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <h1><?php echo $title ?></h1>
        <?php echo $content ?>
    </div>
</body>
</html>