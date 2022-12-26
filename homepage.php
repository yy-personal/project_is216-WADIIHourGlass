<?php
session_start();
$name = '';
if ( !isset($_SESSION['name']) ||  $_SESSION['name'] == ""){
    header("Location: login/login.php");
}
else{
    $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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
    <link href="css/gauge.css" rel="stylesheet" />
    <link href="css/weather_widget.css" rel="stylesheet" />
    <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <title>Hourglass</title>
</head>

<body id="main" onload="displaySpeedometer()">
    <!-- Navigation-->

    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="homepage.php">Hourglass</a>
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
                            href="login/logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="page-section" style='padding:0' id="welcome">
        <div class='container-fluid bg-primary d-flex justify-content-around'>
            <div class='row'>
                <div class=' col-lg-3' style='padding-left: 0; padding-right: 0;'>
                    <header class="masthead text-white text-center">
                        <div class="container d-flex align-items-center flex-column" style='height:166px'>
                            <!-- Masthead Avatar Image-->
                            <img class="masthead-avatar" style='margin:0 ;' src="assets/hourglass_logo.png" alt="..." />
                        </div>
                    </header>
                </div>

                <div class='col-lg-7' style='padding-left: 0; padding-right: 0;'>
                    <header class="masthead text-white text-center">
                        <div class="container d-flex align-items-center flex-column mt-3">
                            <!-- Masthead Heading-->
                            <h2 class="masthead-heading text-uppercase mb-1 text-secondary">Welcome to hourglass</h2>
                            <h1 class="masthead-heading mb-0 text-secondary"><?=$name?></h1>
                            <!-- <button type="button" class="btn btn-info">test weather console.log</button> -->
                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <!-- Masthead Subheading-->
                            <p class="masthead-subheading font-weight-light mb-0">
                                <h2 class="text-uppercase mb-0">{{city_name}}</h2>
                                <h3 class="text-uppercase mb-0 ">{{current_hr}}<span
                                        class='blink'>:</span>{{current_min}}{{current_ampm}}</h3>
                            </p>
                        </div>
                    </header>
                </div>
            </div>
        </div>
    </section>



    <!-- Masthead-->

    <!-- Portfolio Section-->
    <section class="page-section bg-light" id="schedule">
        <div class="container container-fluid">

            <!-- Schedule Section Heading-->
            <div class="content-section-heading text-center">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Schedule</h2>
                <h3 class="text-warning mb-5 ">What's your next move?</h3>
            </div>

            <!-- Schedule Calendar Items-->
            <div class="row justify-content-around">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7">
                    <iframe
                        src="https://calendar.google.com/calendar/embed?src=wadgroup7%40gmail.com&ctz=Asia%2FSingapore"
                        style="border: 0; min-height: 600px;" width="100%" height="100%" frameborder="0" scrolling="no">
                    </iframe>
                </div>
                <div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 text-center'>
                    <div class="card ">
                        <div class="card-header p-4" v-html='weather_widget_html'>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title text-center" v-text='current_weather_main'></h5>
                            <p class="card-text" v-text='quote'></p>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a href="https://calendar.google.com/calendar/u/0/r" class="btn btn-primary">Reschedule
                                    my calendar</a>
                            </div>

                        </div>
                        <hr>
                        <div class="card-body text-center p-3">
                            <h4 id='speedometerText'>Refresh calendar to find out how's your workload!</h4>

                            <div class='d-flex justify-content-center mt-4' >
                                <div class="chart-gauge" id='speedometer'></div>
                            </div>

                            
                            <p id="totalHours"></p>
                            <button type="button" id="authorize_button" class="btn btn-warning mb-2">View workload
                                status!</button>



                        </div>
                    </div>
                </div>
                <div class="chart-gauge"></div>

            </div>

        </div>
    </section>

    <!-- Portfolio Section-->
    <section class="page-section bg-primary" id="stressed">
        <div class="container container-fluid">
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            </div>
            <!-- Portfolio Section Heading-->

            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Stressed?</h2>
            <h3 class="text-warning mt-2 mb-5 text-center">Click on the icon to find out what you can do to de-stress!
            </h3>

            <!-- Stressed Grid Items-->
            <div class="row justify-content-center">

                <!-- Stressed Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <!-- link by data-bs-target -->
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal_game">
                        <img class="img-fluid rounded" src="assets/img/portfolio/game.png" alt="..." />
                    </div>
                </div>
                <!-- Stressed Item 2-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal_riddles">
                        <img class="img-fluid rounded" src="assets/img/portfolio/riddles.png" alt="..." />
                    </div>
                </div>
                <!-- Stressed Item 3-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal_youtube">
                        <img class="img-fluid rounded" src="assets/img/portfolio/youtube.jpg" alt="..." />
                    </div>
                </div>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            </div>
        </div>
    </section>
    <!-- About Section-->


    <!-- Footer-->
    <footer class="footer text-center">
        <section class="page-section bg-secondary text-white mb-0" id="about_us">
            <div class="container container-fluid">
                <div class="divider-custom divider-light">
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                </div>
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About us</h2>
                <!-- Icon Divider-->

                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 me-auto">
                        <p class="text-center fw-bold fs-2 lead">This website was created by:
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
                        <p class="text-left fw-bold fs-2 lead">Special Thanks to our:
                            <ul>
                                <li>Supreme Leader: Kyong Jin Shim</li>
                                <li>Supreme Followers:
                                    <ul>
                                        <li>
                                            Ambrose Ang
                                        </li>
                                        <li>
                                            Sean Choon
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
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                </div>
                <!-- About Section Button-->
            </div>
        </section>
    </footer>
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
                                <div class="divider-custom mb-3">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/game.png" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">Try out a classic game of Snakes to relieve some stress!<p>
                                        <button class="btn btn-primary"
                                            onclick="window.location.href='snakeGame/gamepage.php';">
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
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Quiz!</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom mb-3">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/riddles.png" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">Try out this game where you can put your knowledge to test!</p>
                                <button class="btn btn-primary" onclick="window.location.href='quizGame/quizpage.php';">
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
                                <div class="divider-custom mb-3">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/youtube.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">
                                    Check out our curated playlist of YouTube resources - to learn or have fun!
                                </p>
                                <button class="btn btn-primary"
                                    onclick="window.location.href='videoPages/videopage.php';">
                                    Let's go!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===========================================================Script Start============================================================================ -->
    <!-- Vue CDN -->
    <script src="https://unpkg.com/vue@next"></script>
    <!-- Axios CDN -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Vue for home -->
    <script src="js/homepageVue.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Core JS scripts-->
    <script src="js/navbar.js"></script>
    <!-- speedometer render -->
    <script src="js/speedometer.js"></script>
    <!-- google cal -->
    <script src="js/calendar.js"></script>
    <!-- calendar handler -->
    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()"
        onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>

    <!-- Weather Widget based on openweather -->
    <script>
        ! function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://weatherwidget.io/js/widget.min.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'weatherwidget-io-js');
    </script>

    <script type="text/javascript" src="./gaugeClient.js"></script>
    <script type="text/javascript" src="./labels.js"></script>
    <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script src="js/gauge_script.js"></script>

    <!-- ===========================================================Script Ends============================================================================ -->

</body>

</html>