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
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/weather_widget.css" rel="stylesheet" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <title>Video</title>
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
                            href="#video">Video</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#video_playlist">Playlist</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#shortcuts">Shortcuts</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="../login/logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Video Section-->
    <section class="page-section video mt-5" id="video">
        <div class="container">
            <!-- Portfolio Section Heading-->

            <!-- Icon Divider-->
            <br><br>
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

            <!-- Video Goes Here -->
            <div id="game" style="text-align:center" ;>

                <div class="container" style="position: relative;
                    overflow: hidden;
                    padding-top: 56.25%;" id="curtains">
                    <iframe allow="autoplay" class="responsive-iframe" id="ytplayer" type="text/html" style="position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        border: 0;"
                        src="https://www.youtube.com/embed?listType=playlist&list=PLw-VjHDlEOgvWPpRBs9FRGgJcKpDimTqf&autoplay=1"
                        frameborder="0"></iframe>
                </div>

                <!--Youtube playlists
                    1: "https://www.youtube.com/embed?listType=playlist&list=PLw-VjHDlEOgvWPpRBs9FRGgJcKpDimTqf&autoplay=1"
                    2: "https://www.youtube.com/embed/XWq5kBlakcQ?autoplay=1" 
                    3: "https://youtube.com/embed/playlist?list=PL6XRrncXkMaXB2EihFoVzbD7X8Bh97EJK&autoplay=1" 
                    4:  "https://www.youtube.com/embed/6fZ1LsDAi1c?autoplay=1"
                    5:  "https://www.youtube.com/embed/5qap5aO4i9A?autoplay=1"
                    6:  "https://www.youtube.com/embed/DWcJFNfaw9c?autoplay=1"
                    7:  "https://www.youtube.com/embed/laylist?list=PLydZ2Hrp_gPTtwYPY7jmlHsJnPYwHslN5&autoplay=1"
                    8:  "https://youtube.com/embed/qi3Hfy8waFo?autoplay=1"
                    9:  "https://youtube.com/embed/playlist?list=PLYMb6ZCMuRIF1yVUuicdh692YBmFuoo5I&autoplay=1"

                    -->

                <script>
                    // Load the IFrame Player API code asynchronously.
                    var tag = document.createElement('script');
                    tag.src = "https://www.youtube.com/player_api";
                    var firstScriptTag = document.getElementsByTagName('script')[0];
                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                    // Replace the 'ytplayer' element with an <iframe> and
                    // YouTube player after the API code downloads.
                    var player;

                    function onYouTubePlayerAPIReady() {
                        player = new YT.Player('ytplayer', {
                            height: '600',
                            width: '900',
                            videoId: 'https://www.youtube.com/embed?listType=playlist&list=PLydZ2Hrp_gPTtwYPY7jmlHsJnPYwHslN5'
                        });
                    }
                </script>
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
    <section class="page-section video_playlist bg-primary text-white mb-0 pt-5 " id="video_playlist">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-secondary">VIDEO PLAYLISTS</h2>
            <!-- Icon Divider-->

            <!-- About Section Content-->
            <div class="row mt-2 d-flex justify-content-around mx-auto">
                <div class="col-lg-12">
                    <div class="divider-custom">
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    </div>
                    <h3 class='text-center text-secondary'>YOUTUBE TRENDING<h3>
                            <div class='row mx-auto'>
                                <div class="col-12 col-sm-6 col-md-3 p-2">
                                    <button class="btn w-100 btn-danger" onclick="music_video()">
                                        Music Videos
                                    </button>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 p-2">
                                    <button class="btn w-100 btn-danger" onclick="news_asia()">
                                        News (Asia)
                                    </button> </div>
                                <div class="col-12 col-sm-6 col-md-3 p-2">
                                    <button class="btn w-100 btn-danger" onclick="news_us()">
                                        News (US)
                                    </button> </div>
                                <div class="col-12 col-sm-6 col-md-3 p-2">
                                    <button class="btn w-100 btn-danger" onclick="news_europe()">
                                        News (Europe)
                                    </button>
                                </div>


                            </div>
                            <div>
                            </div>
                            <div class="row mt-2 d-flex justify-content-around mx-auto">
                                <div class="col-lg-12">
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <h3 class='text-center text-secondary'>CURATED PICKS<h3>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-3 p-2">
                                                    <button class="btn w-100 btn-danger m-2 " onclick="lofi_study()">
                                                        Lofi beats (Study)
                                                    </button>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-3 p-2">
                                                    <button class="btn w-100 btn-danger m-2 " onclick="lofi_relaxing()">
                                                        Lofi beats (Relaxing)
                                                    </button>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-3 p-2">
                                                    <button class="btn w-100 btn-danger m-2 " onclick="learning_world()">
                                                        Learning
                                                    </button>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-3 p-2">
                                                    <button class="btn w-100 btn-danger m-2 " onclick="indie_music()">
                                                        Indie Music
                                                    </button>
                                                </div>
                                                <!-- <div class="col">
                                                    <button class="btn btn-danger mt-2 " onclick="learning_geography()">
                                                        Geography
                                                    </button>
                                                </div> -->
                                            </div>
                                </div>
                            </div>

                </div>
                <div class="divider-custom">
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                </div>

                <!-- Enjoy and Relax Footer -->
                <h2 class="mt-4 page-section-heading text-center text-uppercase text-secondary">Enjoy and Have Fun!</h2>

                <!-- bottom nav -->
                <section class="page-section shortcuts mb-0" id="shortcuts">
                    <div class='container'>
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-4 mt-5">
                                <div class="portfolio-item mx-auto" data-bs-toggle="none"
                                    data-bs-target="#portfolioModal_youtube">
                                    <button onclick="window.location.href='../quizGame/quizpage.php';"
                                        style='padding: 0; border: none; background: none;'>
                                        <img class="img-fluid rounded" src="../assets/img/portfolio/riddles.png"
                                            alt="..." />
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mt-5">
                                <div class="portfolio-item mx-auto" data-bs-toggle="none"
                                    data-bs-target="#portfolioModal_riddles">
                                    <button onclick="window.location.href='../homepage.php';"
                                        style='padding: 0; border: none; background: none;'>
                                        <img class="img-fluid rounded" src="../assets/img/portfolio/home.png"
                                            alt="..." />
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mt-5">
                                <!-- link by data-bs-target -->
                                <div class="portfolio-item mx-auto" data-bs-toggle="none"
                                    data-bs-target="#portfolioModal_game">
                                    <button onclick="window.location.href='../snakeGame/gamepage.php';"
                                        style='padding: 0; border: none; background: none;'>
                                        <img class="img-fluid img-max rounded" src="../assets/img/portfolio/game.png"
                                            alt="..." />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    </section>

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
    <!-- Functions -->
    <script src='js/videopage.js'></script>
    <!-- ===========================================================Script Ends============================================================================ -->

</body>

</html>