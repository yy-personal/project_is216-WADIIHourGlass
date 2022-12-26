<?php
session_start();

if ( isset($_SESSION['name'])){
    header("Location: ../homepage.php");
}

?>
<!DOCTYPE html>
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
    <link href="../css/styles.css" rel="stylesheet" />
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body id="page-top" class=" bg-primary">
    <!-- Navigation-->
    <!-- Masthead-->
    <div class="mt-3 text-white ">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0 text-secondary"><img class="masthead-avatar" style='margin:10; height:50px' src="../assets/hourglass_logo.png"/>          Hourglass</h1>
            <!-- Icon Divider-->
            <div class="divider-custom mb-4">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- form -->
            <div id="app" class="container">
                <div class="row">
                    <div class="col-12 col-sm-10 col-lg-8 mx-auto bg-light rounded-3 p-0 p-sm-5">
                        <div class="row w-90 w-sm-75 py-2 mx-auto">
                            <div class="col text-center text-black">
                                <h3>Register</h3>
                            </div>
                        </div>
                        <form>
                            <div class="row w-90 w-sm-75 py-2 mx-auto">

                                <div class="form-group ">
                                    <label for="inputName" class="text-black my-3">Name:</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Name"
                                        v-model="logDetails.name">
                                </div>
                            </div>
                            <div class="row w-90 w-sm-75 py-2 mx-auto">

                                <div class="form-group ">
                                    <label for="inputEmail" class="text-black my-3">Email:</label>
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Email"
                                        v-model="logDetails.email">
                                </div>
                            </div>
                            <div class="row w-90 w-sm-75 py-2 mx-auto">

                                <div class="form-group ">
                                    <label for="inputPassword" class="text-black my-3">Password:</label>
                                    <input type="password" class="form-control" id="inputPassword"
                                        placeholder="Password" v-model="logDetails.password" v-on:keyup.enter="register">
                                </div>
                            </div>
                            <div class="row w-90 w-sm-75 py-2 mx-auto">

                                <div class="form-group ">
                                    <label for="inputConfirmPassword" class="text-black my-3">Confirm Password: </label>
                                    <input type="password" class="form-control" id="inputConfirmPassword"
                                        placeholder="Confirm Password" v-model="logDetails.confirmPassword" v-on:keyup.enter="register">
                                </div>
                            </div>

                            <div class="row w-90 w-sm-75 py-3 mx-auto">
                                <div class="col-12 col-sm-6 py-2 form-group">
                                    <a class="w-100 btn btn-primary btn-block" v-on:click="register()">Create
                                        Account</a>
                                </div>
                                <div class="col-12 col-sm-6 py-2 form-group">
                                    <a href="login.php" class="w-100 btn btn-secondary btn-block">Back to log in</a>
                                </div>

                            </div>
                            <div class="row w-90 w-sm-75 py-2 mx-auto" v-if="errorMessage">
                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        {{errorMessage}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap1 core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <!-- Core theme JS-->
    <script src="../js/navbar.js"></script>
    <!-- vue register -->
    <script src="js/register.js"></script>
</body>

</html>