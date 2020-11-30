<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">

</head>
<body>
    <nav class = "navbar navbar-expand-lg navbar-light bg-light">
        <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "# navbarColor03" aria-controls = "navbarColor03" aria-Expand = "false" aria-label = "Basculer la navigation ">
            <span class = "navbar-toggler-icon"> </span>
        </button>

        <div class = "collapse navbar-collapse" id = "navbarColor03">
            <ul class = "navbar-nav mr-auto">
                <li class = "nav-item active">
                    <a class="nav-link" href="main.php">
                        <p style = "vertical-align: inherit;"> 
                            Accueil
                        </p> 
                    </a>
                </li>
                <li class = "nav-item active">
                    <a class="nav-link" href="livres.php">
                        <p style = "vertical-align: inherit;"> 
                            Livres
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 </body>
</html>