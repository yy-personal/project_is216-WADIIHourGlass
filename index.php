<!DOCTYPE html>
<?php
?>
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
    <link href="css/weather_widget.css" rel="stylesheet" />
    <link href="css/speedometer.css" rel="stylesheet" />

    <title>Welcome to Hourglass</title>
</head>

<body class='bg-secondary'>
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href=".">Hourglass</a>
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
                            href="login/register.php">Sign up</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="login/login.php">Log in</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#about_us">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section welcome" style='padding:0' id="welcome">
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-2 fill_cloud1' style=" opacity: 0.3;">
                </div>
                <div class='col-8' style='padding-left: 0; padding-right: 0;'>
                    <header class="masthead bg-primary text-white text-center">
                        <div class="container d-flex align-items-center flex-column">
                            <img class="masthead-avatar mb-5" src="assets/hourglass_logo.png" alt="..." />
                            <h1 class="masthead-heading text-uppercase mb-0 text-secondary" style='font-size: 2.3rem;'>
                                Welcome to hourglass</h1>
                            <!-- <button type="button" class="btn btn-info">test weather console.log</button> -->
                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <h4 class="masthead-subheading text-uppercase mb-0 text-secondary my-3">The time to relax is
                                when you don't have time for it. <br>
                                - Sydney J. Harris
                            </h4>
                        </div>
                    </header>
                </div>
                <div class='col-2 fill_cloud2' style=" opacity: 0.3;"></div>
            </div>
        </div>
    </section>


    <section class="page-section">

        <div class="container container-fluid">
            <!-- divider -->
            <div class="divider-custom divider-light">
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            </div>
            <div class="row py-2 d-flex justify-content-center">
                <div class="col page-section-heading text-white text-center">
                    <h1>What is HourGlass?</h1>
                </div>
            </div>
            <div class="row py-2 d-flex justify-content-center">
                <div class="col text-white text-center">
                    <h3>Feeling Stressed? Feeling Busy?</h3>
                </div>
            </div>
            <div class="row py-2 d-flex justify-content-center">
                <div class="col text-white text-center">
                    <p>Don't worry! Cause HourGlass has got your back!<br>
                        You can connect your calendar and we will do the rest for you!
                    </p>
                    <h5>We will calculate how hard you work, let you know the weather ahead and provide a relaxation
                        space for you!</h5>
                </div>
            </div>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
            </div>
            <div class="row py-2 d-flex justify-content-center">
                <div class="col text-white text-center">
                    <h3>Sneak Peak!</h3>
                </div>
            </div>

            <div class="row py-2 d-flex justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 text-white text-center">
                    <h4>Your personal dashboard</h4>
                    <img src="assets/img/portfolio/calendarSneak.jpg" class="img-fluid img" alt="Dashboard Sneak Peak">

                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-white text-center">
                    <h4>Your relaxation hub</h4>
                    <img src="assets/img/portfolio/snakeGameSneak.jpg" class="img-fluid img" alt="Snake Game Sneak Peak">

                </div>
            </div>                             
        </div>
    </section>


    <!-- About Us Section-->
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
</body>
</html>