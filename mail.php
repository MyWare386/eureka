<?php

if(isset($_POST['idea']) OR isset($_POST['message'])){

    if(isset($_POST['mailform'])){

        if(!empty($_POST['mail'])){

            $header="MIME-Version: 1.0\r\n";
            $header.='From:"eurêka.com"'."\n";
            $header.='Content-Type:text/html; charset="uft-8"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';

            $message='
<html>
    <body>
        <div align="center">

            <h1 style="color: black;font-family: monospace;font-size: 30px;text-decoration: overline;">
                <a href="#" style="text-decoration: none;color: black;">
                    Eurêka
                </a>
            </h1>

            <br>

            <i style="font-family:monospace;">Mail de l\'expéditeur :&nbsp;</i>'.$_POST['mail'].'<br />

            <h1 style="font-family:monospace;"><u>Votre idée :</u></h1>

            <br>

            <p style="font-family:monospace;font-size:30px;">"'.($_POST['message']).'"</p>

            <br>

            <h3 style="font-family:monospace;">Quelle bonne idée !</h3>

            <br>
            <br>

            <footer>

                <div style="height: 5px;width: 30%;background-color: black;"></div>

                <br>

                <a href="index.php" style="text-decoration: none;color: black;"><p style="font-family: monospace;font-size: 17px;text-decoration: overline;font-weight: 600;">Eurêka</h1></a>

            <br>

            <center><a href="https://www.reddit.com/user/MyWare">Reddit</a></center>

            <br>

            <p style="font-family: monospace;font-size: 12px;text-align: center;opacity: 70%;">&copy; 2021 Martin Droulez</p>

            </footer>

        </div>
    </body>
</html>
';

            mail($_POST['mail'], "Votre idée - Eurêka", $message, $header);

            $succes="<div class='succes'>Votre idée vous a été envoyé <br> Vous allez être redirigé</div>";

            header('refresh:2;url=index.php');

        }else{
            $erreur="<div class='erreur'>Veuillez compléter tous les champs</div>";
        }
    }

?>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eurêka</title>
        <link rel="stylesheet" href="style.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="icon" type="image/png" href="favicon.JPG" />
        <style>
            html, body { height: 100%; }
            body {
                overflow: auto;
            }

            .ocean { 
                height: 5%;
                width:100%;
                position:fixed;
                bottom:0;
                left:0;
                background: #015871;
                z-index: -10;
            }

            .wave {
                background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/85486/wave.svg) repeat-x; 
                position: absolute;
                top: -198px;
                width: 6400px;
                height: 198px;
                animation: wave 7s cubic-bezier( 0.36, 0.45, 0.63, 0.53) infinite;
                transform: translate3d(0, 0, 0);
                z-index: -10;
            }

            .wave:nth-of-type(2) {
                top: -175px;
                animation: wave 7s cubic-bezier( 0.36, 0.45, 0.63, 0.53) -.125s infinite, swell 7s ease -1.25s infinite;
                opacity: 1;
            }

            @keyframes wave {
                0% {
                    margin-left: 0;
                }
                100% {
                    margin-left: -1600px;
                }
            }

            @keyframes swell {
                0%, 100% {
                    transform: translate3d(0,-25px,0);
                }
                50% {
                    transform: translate3d(0,5px,0);
                }
            }

            div#vertical{
                margin-top: 13%;
            }

            div.succes{
                font-size: 20px;
                color: green;
                border-width: thin;
                font-family: monospace;
                text-align: center;
                border-color: green;
            }

            div.erreur{
                font-size: 20px;
                color: red;
                border-width: thin;
                font-family: monospace;
                text-align: center;
                border-color: red;
            }
        </style>
    </head>

    <body>

        <h1 class="title"><a href="index.php"><i class='far fa-lightbulb' style='font-size:36px'></i> Eurêka</a></h1>

        <div id="vertical">

            <?php

    if(isset($succes)){
        echo $succes;
    }

    if(isset($erreur)){
        echo $erreur;
    }

            ?>

            <form method="POST" action="">

                <h2 id="note">Votre idée <i class='fas fa-arrow-down' style='font-size:16px'></i></h2>

                <input type="text" class="form" name="message" value="<?php if(isset($_POST['idea'])){ echo $_POST['idea']; }else{ echo $_POST['message']; } ?>" /><br><br>

                <h2 id="note">Envoyez-vous votre idée par mail <i class='fas fa-terminal' style='font-size:16px'></i></h2>

                <input type="email" class="form" name="mail" placeholder="Votre email"/><br /><br />

                <input type="submit" value="Envoyer" name="mailform" class="form"/><br /><br />

            </form>

        </div>

        <footer>

            <div class="separation"></div>

            <br>
            <br>
            <br>

            <a href="index.php"><p id="footertitle"><i class='far fa-lightbulb' style='font-size:20px'></i> Eurêka</h1></a>

        <br>
        <br>

        <center><a href="https://www.reddit.com/user/MyWare"><img src="reddit-logo-16.png" style="width:3%;"></a></center>

        <br>
        <br>

        <nav><li><a href="index%20(english).php" id="langue"><span id="rouge">Change</span> <span id="blanc">language to</span> <span id="bleu">English</span> <i class='fas fa-globe-americas' style='font-size:13px'></i></a></li></nav>

        <br>
        <br>

        <p id="copyright"><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">&copy; 2021 Martin Droulez</a></p>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        </footer>

    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    </body>
</html>


<?php
    
}else{
    header('Location:index.php');
}

?>