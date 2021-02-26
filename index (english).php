<?php

$fichier = file('english.txt'); // Nom du fichier qui contient les citations

$total = count($fichier); // Total du nombre de lignes du fichier

$i = mt_rand(0, $total-1); // Nombre au hasard entre 0 et le total du nombre de lignes

$wordphp = $fichier[$i];

?>

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<html lang="en">
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
        </style>
    </head>

    <body>

        <header>

            <h1 class="title"><a href="index%20(english).php"><i class='far fa-lightbulb' style='font-size:36px'></i> Eurêka</a></h1>

        </header>

        <br>
        <br>
        <br>

        <acronym title="Did you find an idea ?">
            <h1 class="ml1">
                <p id="word">
                    <span class="container">
                        <span class="text-wrapper">
                            <span class="line line1"></span>
                            <span class="letters">
                                <?php echo utf8_encode($wordphp); ?>
                            </span>
                            <span class="line line2"></span>
                        </span>
                    </span>
                </p>
            </h1>
        </acronym>

        <button type="button" class="word" onclick="document.location.reload(false)">Another word <i class='fas fa-redo' style='font-size:16px'></i></button>

        <br>
        <br>
        <br>

        <button type="button" class="eureka">Eurêka <i class='fas fa-bolt' style='font-size:16px'></i></button>

        <br>
        <br>
        <br>
        <br>

        <div style='display:none;' id="form">

            <h2 id="note">Write your idea <i class='far fa-edit' style='font-size:16px'></i></h2>
            <h4 id="attention"><i class='fas fa-exclamation-triangle' style='font-size:12px;color:red'></i> If you click "Another word" again, your idea will be erased <i class='fas fa-exclamation-triangle' style='font-size:12px;color:red'></i></h6>

            <br>
            <br>

            <form action="mail%20(english)" method="post">

                <textarea class="form" name="idea" placeholder="Your idea" cols="50" rows="15" id="tocopy"></textarea><br /><br /><br /><br />

                <input type="button" value="Copy your idea into the clipboard" class="js-copy" data-target="#tocopy"><br /><br /><br /><br />

                <input type="submit" value="Send your idea by email" class="js-copy">

            </form>

            <br /><br />

            <button id="slideup"><i class='fas fa-angle-double-up' style='font-size:24px'></i></button>

        </div>

        <footer>

            <div class="separation"></div>

            <br>
            <br>
            <br>

            <a href="index%20(english).php"><p id="footertitle"><i class='far fa-lightbulb' style='font-size:20px'></i> Eurêka</h1></a>

        <br>
        <br>

        <center><a href="https://www.reddit.com/user/MyWare"><img src="reddit-logo-16.png" style="width:3%;"></a></center>

        <br>
        <br>

        <nav><li><a href="index.php" id="langue"><span id="bleu">Changer la</span> <span id="blanc">langue en</span> <span id="rouge">Français</span> <i class='fas fa-globe-americas' style='font-size:13px'></i></a></li></nav>

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

    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    <script>

        var btncopy = document.querySelector('.js-copy');
        if(btncopy) {
            btncopy.addEventListener('click', docopy);
        }

        function docopy() {

            // Cible de l'élément qui doit être copié
            var target = this.dataset.target;
            var fromElement = document.querySelector(target);
            if(!fromElement) return;

            // Sélection des caractères concernés
            var range = document.createRange();
            var selection = window.getSelection();
            range.selectNode(fromElement);
            selection.removeAllRanges();
            selection.addRange(range);

            try {
                // Exécution de la commande de copie
                var result = document.execCommand('copy');
                if (result) {
                    // La copie a réussi
                    alert('Your idea has been copied in the clipboard');
                }
            }
            catch(err) {
                // Une erreur est surevnue lors de la tentative de copie
                alert(err);
            }

            // Fin de l'opération
            selection = window.getSelection();
            if (typeof selection.removeRange === 'function') {
                selection.removeRange(range);
            } else if (typeof selection.removeAllRanges === 'function') {
                selection.removeAllRanges();
            }
        }

        /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

        var textWrapper = document.querySelector('.ml1 .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: false})
            .add({
            targets: '.ml1 .letter',
            scale: [0.3,1],
            opacity: [0,1],
            translateZ: 0,
            easing: "easeOutExpo",
            duration: 600,
            delay: (el, i) => 70 * (i+1)
        }).add({
            targets: '.ml1 .line',
            scaleX: [0,1],
            opacity: [0.5,1],
            easing: "easeOutExpo",
            duration: 700,
            offset: '-=875',
            delay: (el, i, l) => 80 * (l - i)
        }).add({
            targets: '.ml1',
            opacity: 100,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });

        /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

        $(document).ready(function(){

            $(".eureka").click(function(){
                $("div#form").slideDown(1000);
            });

            $(".ml1").click(function(){
                $("div#form").slideDown(1000);
            });

            $("#slideup").click(function(){
                $("div#form").slideUp(1000);
            });

        });

    </script>

    </body>
</html>