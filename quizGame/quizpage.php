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
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="css/quiz.css" rel="stylesheet" />
        <!-- FontAweome CDN Link for Icons-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <!--JQuery CDN-->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                <title>Quiz</title>

    </head>
    <body class='bg-primary' id="page-top" onload="getAllCategories()">
        <!-- Navigation-->
        
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="../homepage.php">Hourglass</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#quiz">Quiz</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#quiz_game_ref">How to play</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#shortcuts">Shortcuts</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../login/logout.php">Log out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section gaming mt-5" id="quiz">
            <div class="container">                    
                <br><br>
            </div>
                <!-- Quiz-->
            
            <div class="container-fluid" >
                <h1 class="text-white text-center">Quiz</h1>
                <h4 class="text-white text-center">
                    Welcome to Quiz!<br>
                    You came, you quizzed, you conquered! <br>
                    Stay Hungry. Stay Foolish.<br>
                    Challenge yourself now!
                </h4>

                <div class="dropdown text-secondary text-center">
                    <button class="btn dropdown-toggle" style="width:323px;background-color: #89B5AF;" type="button" id="categories" data-bs-toggle="dropdown" aria-expanded="false" disabled>
                      Categories
                    </button>
                    <div class="dropdown-menu" id="dropdown" aria-labelledby="categories"></div>
                  </div>

                <br>
                <!-- Quiz display -->
                <div id="riddle" >
                    <h2 id="category" class="text-center text-white"></h2>
                    <div id="start" class="text-center ">
                        <button type="button" class="btn btn-success disable-btn px-4" id="play" onclick="play()" style="display: none;">Start/Play Again</button>
                    </div>
                    <div id="question"></div>
                    <div id="totalscore" class="text-white text-center"></div>
                    <div id="result" class="text-center"></div>                    
                    <div id="correctanswer" ></div>
                    
                </div>
                <!-- End quiz -->

            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-secondary mb-0" id="quiz_game_ref">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary" id='quiz_game'>Quiz</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="text-center fw-bold fs-2 lead">Description
                        <ul>
                            <li class="mb-2">
                                Are You Smarter than a 5th Grader? If you think you are...then wait no longer now!
                            </li>
                            <li class="mb-2">
                                We have prepared different categories of quizzes to test your knowledge. Start answering them now!
                            </li>
                           
                        </ul>
                    </p></div>
                    <div class="col-lg-4 me-auto"><p class="text-center fw-bold fs-2 lead"> Instructions
                    <ul>
                        <li>
                            Select a category and click on the 'Start' button
                        </li>
                        <li>You will be given questions based on the category you have selected
                        </li>
                        <li>
                            Pick the option that you think is the correct answer
                        </li>
                        <li>
                            You have as much time as you need to answer all 10 questions
                        </li>
                        <li>
                            You may check your scores and review the correct answers. Have fun!
                        </li>
                    </ul>
                    </p></div>
                </div>
                <div class="divider-custom">
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                </div>
        </section>
                

                <section class="page-section bg-primary" id="shortcuts">
                    <h5 class="mt-2 page-section-heading text-center text-uppercase text-secondary">Don't stress, do your best, forget the rest!</h5>

                    <div class='container'>
                        <div class="row justify-content-center">
                            <!-- Stressed Item 1-->
                            <div class="col-md-6 col-lg-4 mt-5">
                                <!-- link by data-bs-target -->
                                <div class="portfolio-item mx-auto" data-bs-toggle="none" data-bs-target="#portfolioModal_game">
                                    <button onclick="window.location.href='../snakeGame/gamepage.php';" style='padding: 0; border: none; background: none;'>    
                                        <img class="img-fluid rounded" src="../assets/img/portfolio/game.png" alt="..." />
                                    </button>
                                </div>
                            </div>
                            <!-- Stressed Item 2-->
                            <div class="col-md-6 col-lg-4 mt-5">
                                <div class="portfolio-item mx-auto" data-bs-toggle="none" data-bs-target="#portfolioModal_riddles">
                                    <button onclick="window.location.href='../homepage.php';"  style='padding: 0; border: none; background: none;'>    
                                        <img class="img-fluid rounded" src="../assets/img/portfolio/home.png" alt="..." />
                                    </button>
                                </div>
                            </div>
                            <!-- Stressed Item 3-->
                            <div class="col-md-6 col-lg-4 mt-5">
                                <div class="portfolio-item mx-auto" data-bs-toggle="none" data-bs-target="#portfolioModal_youtube">
                                    <button onclick="window.location.href='../videoPages/videopage.php';"  style='padding: 0; border: none; background: none;'>    
                                        <img class="img-fluid rounded" src="../assets/img/portfolio/youtube.jpg" alt="..." />
                                    </button>
                                </div>
                            </div>
                        </div>
            
                    </div>
                </section>
            

            </div>
        <!-- Footer-->
        <footer class="footer text-center">
        </footer>

        <!-- ===========================================================Script Start============================================================================ -->
        <!-- Vue CDN -->
        <script src="https://unpkg.com/vue@next"></script>
        <!-- Axios CDN -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <!-- Core JS scripts-->
        <script src="js/navbar.js"></script>
        <!-- Quiz Functions -->
        <script src='js/quizscripts.js'></script>
        <!-- ===========================================================Script Ends============================================================================ -->

    </body>
</html>