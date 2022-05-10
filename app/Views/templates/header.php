<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <script src="https://kit.fontawesome.com/062265acee.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
<!-- HEADER: MENU + HEROE SECTION -->
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="home" class="navbar-brand">Brand</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="barbershops" class="nav-item nav-link">Barbershops</a>
                    <?php
                    if (session()->get('isLoggedIn') == FALSE)
                        echo '<a href="login" class="nav-item nav-link">Login</a>
                              <a href="register" class="nav-item nav-link">Register</a>';
                    else echo '<a href="profile" class="nav-item nav-link">Profile</a>
                               <a href="" class="nav-item nav-link">Logout</a>';
                    ?>
                </div>
            </div>
        </div>

</header>