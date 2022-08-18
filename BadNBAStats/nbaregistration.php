<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <style>
            h1 {
                border: 1px solid white;
                margin-top: 40px;
            }

            .logo {
                float: left;
            }

            .logo img {
                margin-top: 4%;
                width: 90%;
                height: auto;
                border: 1px solid black;
                padding: 1px;
                margin-left: 5%;
            }

            .login {
                color: white;
                border: 1px solid white;
                padding: 3%;
            }

            .form-control {
                margin: 2%;
            }

            .form {
                padding: 4px;
            }

            #arrowAnim {
                width: 100px;
                height: 100px;
                padding: 0px;
                float: right;
                margin-top: -18%;
            }

            .arrow {
                width: 5vw;
                height: 5vw;
                border: 2.5vw solid;
                border-color: blue transparent transparent red;
                transform: rotate(-45deg);
            }

            .arrowSliding {
                position: absolute;
                -webkit-animation: slide 2s linear infinite;
                animation: slide 2s linear infinite;
            }

            .delay1 {
                -webkit-animation-delay: 1s;
                animation-delay: 1s;
            }

            .delay2 {
                -webkit-animation-delay: 2s;
                animation-delay: 2s;
            }

            .delay3 {
                -webkit-animation-delay: 3s;
                animation-delay: 3s;
            }

            @-webkit-keyframes slide {
                0% {
                    opacity: 0;
                    transform: translateX(15vw);
                }

                20% {
                    opacity: 1;
                    transform: translateX(9vw);
                }

                80% {
                    opacity: 1;
                    transform: translateX(-9vw);
                }

                100% {
                    opacity: 0;
                    transform: translateX(-15vw);
                }
            }

            @keyframes slide {
                0% {
                    opacity: 0;
                    transform: translateX(15vw);
                }

                20% {
                    opacity: 1;
                    transform: translateX(9vw);
                }

                80% {
                    opacity: 1;
                    transform: translateX(-9vw);
                }

                100% {
                    opacity: 0;
                    transform: translateX(-15vw);
                }
            }
            @media (min-width: 768px){
                .form{
                    width: 40%;
                }
                #arrowAnim{
                    margin-right: 15%;
                }
            }
            @media (min-width: 992px) {
                .page-wrapper {
                    width: 100%;
                    height: auto;
                    border: 1px solid white;
                    background-image: url('images/background3.gif');
                }

                #title {
                    background-color: black;
                    width: 26%;
                    margin-left: 2%;
                    margin-right: auto;
                }

                #topnav {
                    float: right;
                    width: 70%;
                    height: 100%;
                    margin: none;
                    display: initial;
                }

                .hamburger {
                    display: none;
                }

                .menu {
                    display: none;
                }

                .logo {
                    width: 10%;
                    height: auto;
                    float: right;
                    margin-right: 18%;
                    margin-top: 3%;
                }

                .logo img {
                    width: 250%;
                    margin-left: 0%;
                    margin-right: 0%;
                }

                #arrowAnim {
                    width: 100px;
                    height: 100px;
                    padding: 0px;
                    float: right;
                    margin-top: -25%;
                    margin-right: 15%;
                }

                .form {                    
                    width: 40%;
                }
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            <nav>
                <div id="topnav">
                    <ul>
                        <li class="active"><a href="nbahome.php">Home</a></li>
                        <li><a href="nbastats.php">Advanced Stats</a></li>
                        <li><a href="nbaregistration.php">Media</a></li>
                        <li><a href="nbaplayers.php">Build a Player</a></li>
                    </ul>
                </div>
            </nav>
            <div id="title">
                <h1>Check the Media!</h1>
            </div>
        </div>
        <div class="logo">
            <a href="nbahome.php">
                <img src="images/75logo.jpeg" alt="sign">
            </a>
        </div>
        <ul class="menu">
            <li><a class="menuItem" href="nbahome.php">Home</a></li>
            <li><a class="menuItem" href="nbaregistration.php">Sign in</a></li>
            <li><a class="menuItem" href="nbastats.php">Advanced Stats</a></li>
            <li><a class="menuItem" href="nbaplayers.php">Build a Player</a></li>
        </ul>
        <div class="login">
            <h2>Official NBA Youtube</h2>
            <form class="form">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/OKPpH_-a26k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </form>
            <p>This is the official NBA channel. NBA clips from real games are occasionally uploaded here. There are also highlights.</p>
        </div>
        <div class="login">
            <h2>Analysis Channels</h2>
            <form class="form">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/-JyXwWRzGLY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </form>
            <p>This is one of many NBA analysis videos. Content creators such as Thinking Basketball, Andy Hoops, BBALLBREAKDOWN, and A.M. Hoops help viewers understand the intricacies of the game.</p>
            <div id="arrowAnim">
                <div class="arrowSliding">
                    <div class="arrow"></div>
                </div>
                <div class="arrowSliding delay1">
                    <div class="arrow"></div>
                </div>
                <div class="arrowSliding delay2">
                    <div class="arrow"></div>
                </div>
                <div class="arrowSliding delay3">
                    <div class="arrow"></div>
                </div>
            </div>
        </div>
        <button class="hamburger">
            <i class="menuIcon material-icons">menu</i>
            <i class="closeIcon material-icons">close</i>
        </button>
        <script>
            const menu = document.querySelector(".menu");
            const menuItems = document.querySelectorAll(".menuItem");
            const hamburger = document.querySelector(".hamburger");
            const closeIcon = document.querySelector(".closeIcon");
            const menuIcon = document.querySelector(".menuIcon");

            function toggleMenu() {
                if (menu.classList.contains("showMenu")) {
                    menu.classList.remove("showMenu");
                    closeIcon.style.display = "none";
                    menuIcon.style.display = "block";
                } else {
                    menu.classList.add("showMenu");
                    closeIcon.style.display = "block";
                    menuIcon.style.display = "none";
                }
            }

            hamburger.addEventListener("click", toggleMenu);

            menuItems.forEach(
                function (menuItem) {
                    menuItem.addEventListener("click", toggleMenu);
                }
            )
        </script>
    </body>
</html>