<!DOCTYPE html>
<?php
session_start();
if ( !isset($_SESSION['name']) ||  $_SESSION['name'] ==""){
    header("Location: ../login/login.php");
}
else{
    $name = $_SESSION['name'];
}
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hourglass</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/weather_widget.css" rel="stylesheet" />
    <link href="css/speedometer.css" rel="stylesheet" />

</head>

<body id="page-top" onload="get_weather()">
    <!-- Navigation-->

    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="../display/homepage.php">Hourglass</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#welcome">Welcome</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#schedule">SCHEDULE</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#stressed">Stressed?</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#about_us">About us</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="../login/logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section welcome" style='padding:0' id="welcome">
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-2 fill_cloud1' id='weather_background_left_column'>
                    <!-- <img src="assets/raining.gif" alt=""> -->
                </div>
                <div class='col-8' style='padding-left: 0; padding-right: 0;'>
                    <header class="masthead bg-primary text-white text-center">
                        <div class="container d-flex align-items-center flex-column">
                            <!-- Masthead Avatar Image-->
                            <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
                            <!-- Masthead Heading-->
                            <h1 class="masthead-heading text-uppercase mb-0">Welcome to hourglass, <?=$name?></h1>
                            <!-- <button type="button" class="btn btn-info">test weather console.log</button> -->
                            <!-- Icon Divider-->
                            <div class="divider-custom divider-light">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <!-- Masthead Subheading-->
                            <p class="masthead-subheading font-weight-light mb-0" id='weather_quote'>*Display weather
                                quote here*</p>
                            <div class="divider-custom divider-light">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <h5>
                                Don't like the weather you are seeing?
                                <span class="text-muted"><br>
                                    Change it!
                                </span>
                            </h5>
                            <br>
                            <div class='row'>
                                <div class="col">
                                    <button type="button" class="btn btn-warning" onclick='turn_clear()'>Clear!</button>
                                </div>
                                <div class='col'>
                                    <button type="button" class="btn btn-info" onclick='turn_rain()'>Rain!</button>
                                </div>
                                <div class='col'>
                                    <button type="button" class="btn btn-light" onclick='turn_cloud()'>Clouds!</button>
                                </div>
                                <div class='col'>
                                    <button type="button" class="btn btn-dark" onclick='turn_weird()'>Foggy!</button>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
                <div class='col-2 fill_cloud2' id='weather_background_right_column'></div>
            </div>
        </div>
    </section>
    <!-- Masthead-->

    <!-- Portfolio Section-->
    <section class="page-section schedule" id="schedule">
        <div class="container container-fluid">
            <!-- Portfolio Section Heading-->
            <div class="content-section-heading text-center">
                <h2 class="mb-0">Schedule</h2>
                <h3 class="text-warning mb-5 ">what's your next move?</h3>
            </div>

            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">

                <div class="col">
                    <iframe
                        src="https://calendar.google.com/calendar/embed?src=wadgroup7%40gmail.com&ctz=Asia%2FSingapore"
                        style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
                </div>
                <!-- <div class="col">
                        Dropdownlist
                    </div> -->
            </div>
            <div class="row justify-content-center">
                <p class='text-center'>Events stuff</p>
                <!-- <button type="button" class="btn btn-warning" onclick='get_calendar_info()'>get calendar data!</button> -->
                                                                                                            <!-- change to check avail? -->
                <button type="button" id="authorize_button" style="display: none;" class="btn btn-warning" >Refresh calendar data!</button>
                <p id="totalHours"></p>
            </div>
        </div>
    </section>

    <!-- Portfolio Section-->
    <section class="page-section stressed" id="stressed">
        <div class="container">
            <!-- Portfolio Section Heading-->

            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Stressed?</h2>
            <h3 class="text-warning mt-2 mb-5 text-center">Click on the icon to find out what you can do to de-stress!
            </h3>

            <!-- Stressed Grid Items-->
            <div class="row justify-content-center">

                <!-- Stressed Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <!-- link by data-bs-target -->
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal_game">
                        <img class="img-fluid" src="assets/img/portfolio/game.png" alt="..." />
                    </div>
                </div>
                <!-- Stressed Item 2-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal_riddles">
                        <img class="img-fluid" src="assets/img/portfolio/riddles.png" alt="..." />
                    </div>
                </div>
                <!-- Stressed Item 3-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal_youtube">
                        <img class="img-fluid" src="assets/img/portfolio/youtube.jpg" alt="..." />
                    </div>
                </div>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about_us">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">About us</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ms-auto">
                    <p class="lead">This website was created by:
                        <ul>
                            <li>
                                Lim Yin Yao
                            </li>
                            <li>
                                Ng Jun Hng Aloysius
                            </li>
                            <li>
                                Tian Fu Wei
                            </li>
                            <li>
                                Wang Xun Jie
                            </li>
                            <li>
                                Zhao Yanyang
                            </li>
                        </ul>
                    </p>
                </div>
                <div class="col-lg-4 me-auto">
                    <p class="lead">Special Thanks to our:
                        <ul>
                            <li>Supreme Leader: Kyong Jin Shim</li>
                            <li>Supreme Followers:
                                <ul>
                                    <li>
                                        Ambrose Ang
                                    </li>
                                    <li>
                                        Sean Choonu
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </p>
                </div>
            </div>
            <div class="divider-custom divider-light">
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            </div>
            <!-- About Section Button-->
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer text-center">
    </footer>
    <!-- Stressed Modals-->
    <!-- Stressed Modal 1-->
    <div class="portfolio-modal modal fade" id="portfolioModal_game" tabindex="-1" aria-labelledby="portfolioModal_game"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Game!</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/game.png" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">Try out a classic... an old-school game of Snakes with NO GAME OVER!</p>
                                <button class="btn btn-primary"
                                    onclick="window.location.href='../displaygamepage/gamepage.html';">
                                    Let's go!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Stressed Modal 2-->
    <div class="portfolio-modal modal fade" id="portfolioModal_riddles" tabindex="-1"
        aria-labelledby="portfolioModal_riddles" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Riddles!</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/riddles.png" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">Try out this game where we ...</p>
                                <button class="btn btn-primary"
                                    onclick="window.location.href='../displaygamepage/riddlepage.html';">
                                    Let's go!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 3-->
    <div class="portfolio-modal modal fade" id="portfolioModal_youtube" tabindex="-1"
        aria-labelledby="portfolioModal_youtube" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Videos!</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/youtube.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">Check out our curated playlist of YouTube resources - for learning or
                                    fun!</p>
                                <button class="btn btn-primary"
                                    onclick="window.location.href='../displaygamepage/videopage.php';">
                                    Let's go!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Axios CDN -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- google cal -->
    <script src="js/functions.js"></script>
    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()"
        onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>

    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
</body>

</html>