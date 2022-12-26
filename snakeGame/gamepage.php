<!DOCTYPE html>
<?php
// Allows User to Access Only If He Is Logged In
session_start();
if ( !isset($_SESSION['name']) ||  $_SESSION['name'] ==""){
    header("Location: ../login/login.php");
}
else{
    $name = $_SESSION['name'];
}
?> <html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Snake</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="../homepage.php">Hourglass</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#page-top">Snake Game</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#snake_game_ref">How to Play</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#navigation">Shortcuts</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="../login/logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Game Section-->
    <section class="page-section stressed gaming mt-5" id="stressed">
        <div class="container">

            <!-- GAME STARTS HERE -->


            <div class="d-flex container mx-auto justify-content-center">

                <!-- Canvas + Buttons + Colour Picker -->
                <div id="game" style="text-align:center" ;>
                    
                    <!-- Scoring System -->
                    <div class="row">
                        <div class="col">
                            <div class="text-center mt-5">
                                <label for="highscore" class="fs-3 text-light">HIGHSCORE</label>
                            </div>

                            <div id="highscore" class="fs-2 text-light" style="text-align: center;">

                            </div>
                        </div>

                        <div class="col">
                            <div class="text-center mt-5">
                                <label for="score" class="fs-3 text-light">SCORE</label>
                            </div>

                            <div id="score" class="fs-2 text-success" style="text-align: center;">

                            </div>
                        </div>
                    </div>

                    <!-- Main Canvas Here -->
                    <canvas id="gc" width="" height=""
                        style="border:2px solid #48c08e; margin-top: 8px; border-radius: 20px;" ;></canvas>

                    <!-- Optional Buttons for Snake Game  -->
                    <div class="pt-1">
                        <table class="table table-borderless">
                            <tr>
                                <td></td>
                                <td colspan="4">
                                    <button type="button" class="btn btn-light" onclick="keyPush(38)">
                                        <img src="../assets/img/arrow-up.svg" alt="">
                                    </button>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-light" onclick="keyPush(37)">
                                        <img src="../assets/img/arrow-left.svg" alt="">
                                    </button>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="text-start">
                                    <button type="button" class="btn btn-light" onclick="keyPush(39)">
                                        <img src="../assets/img/arrow-right.svg" alt="">
                                    </button>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="4">
                                    <button type="button" class="btn btn-light" onclick="keyPush(40)">
                                        <img src="../assets/img/arrow-down.svg" alt="">
                                    </button>
                                </td>
                                <td></td>
                            </tr>

                        </table>
                    </div>

                    <!-- Colour Picker -->
                    <div class="row">
                        <div class="col">
                            <div>
                                <label for="snakecolour" class="text-light fs-2">Snake:</label>
                                <input oninput="change_snake_colour()" type="color" id="snakecolour" name="snakecolour"
                                    value="#00cc99">
                            </div>
                        </div>

                        <div class="col">
                            <div>
                                <label for="foodcolour" class="text-light fs-2">Food:</label>
                                <input oninput="change_food_colour()" type="color" id="foodcolour" name="foodcolour"
                                    value="#ff0000">
                            </div>
                        </div>
                    </div>    

                </div>

            </div>
            <div class="row justify-content-sm-center" id="controller">
            </div>

            <!-- GAME ENDS HERE -->
        </div>
    </section>

    <!-- About Section-->
    <section class="page-section bg-primary text-secondary mb-0 pt-5" id="snake_game_ref">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary" id='snake_game_ref'>Snake Game</h2>

            <!-- Star Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            </div>

            <!-- Description and How to Play-->
            <div class="row">
                <div class="col-lg-4 ms-auto">
                    <p class="text-center fw-bold fs-2 lead">Description
                        <ul>
                            <li class="mb-2">
                                Come on... we know how old you are... Remember the Nokia Days???
                            </li>
                            <li class="mb-2">
                                But if you insist... <br><br> Snake is our <span
                                    class="text-decoration-underline fw-bold fs-4">FAVOURITE</span> video game from the
                                late 1970s that originated from the arcades. Over time, becoming something of a classic.
                            </li>
                        </ul>
                    </p>
                </div>
                <div class="col-lg-4 me-auto">
                    <p class="text-center fw-bold fs-2 lead">How to Play
                        <ul>
                            <li class="mb-2">
                                Leave your work out of your mind...
                            </li>

                            <li class="mb-2">
                                <span class="fw-bold text-warning">Pick a colour</span> for
                                your Snake!
                            </li>

                            <li class="mb-2">
                                <span class="fw-bold text-warning">Pick a colour</span> for the
                                Food!
                            </li>
                            
                            <li class="mb-2">
                                Use your <span class="fw-bold text-light">keyboard's arrow keys</span> to control the Snake.
                            </li>
                            
                            <li class="mb-2">
                                Optionally, use the <span class="fw-bold text-light">on-screen arrow keys</span> to control the Snake.
                            </li>

                            <li class="mb-2">
                                Your <span class="text-decoration-underline fw-bold fs-4">GOAL</span> is to get your
                                snake to grow as long as possible without coming in contact with yourself!
                            </li>

                            <li class="mb-2">
                                <span class="fw-bold text-success">Amateur: 50 points,</span> <span
                                    class="fw-bold text-warning">Novice: 100 points,</span> <span
                                    class="fw-bold text-danger">Expert: 200 points and beyond!</span>
                            </li>
                        </ul>
                    </p>
                </div>
            </div>

            <!-- Star Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            </div>

            <!-- Enjoy and Relax Footer -->
            <h2 class="mt-4 page-section-heading text-center text-uppercase text-secondary">Enjoy and Relax!</h2>

            <!-- Section Shortcuts Option -->
            <section class="page-section mb-0" id="navigation">
                <div class='container'>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4 mt-5">
                            <div class="portfolio-item mx-auto" data-bs-toggle="none"
                                data-bs-target="#portfolioModal_youtube">
                                <button onclick="window.location.href='../videoPages/videopage.php';"
                                    style='padding: 0; border: none; background: none;'>
                                    <img class="img-fluid rounded" src="../assets/img/portfolio/youtube.jpg"
                                        alt="..." />
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-5">
                            <div class="portfolio-item mx-auto" data-bs-toggle="none"
                                data-bs-target="#portfolioModal_riddles">
                                <button onclick="window.location.href='../homepage.php';"
                                    style='padding: 0; border: none; background: none;'>
                                    <img class="img-fluid rounded" src="../assets/img/portfolio/home.png" alt="..." />
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-5">
                            <!-- link by data-bs-target -->
                            <div class="portfolio-item mx-auto" data-bs-toggle="none"
                                data-bs-target="#portfolioModal_game">
                                <button onclick="window.location.href='../quizGame/quizpage.php';"
                                    style='padding: 0; border: none; background: none;'>
                                    <img class="img-fluid rounded" src="../assets/img/portfolio/riddles.png"
                                        alt="..." />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>

    <!-- Footer-->
    <footer class="footer text-center">
    </footer>
    <!-- Game Logic -->
    <script src="js/snakeGame.js"></script>
    <!-- Axios CDN -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/navbar.js"></script>
    <!-- responsive fgame -->
    <script src="js/resize.js"></script>

</body>

</html>