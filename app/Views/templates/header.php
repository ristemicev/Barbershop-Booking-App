<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo ($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <script src="https://kit.fontawesome.com/062265acee.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>

<body>
    <!-- HEADER: MENU + HEROE SECTION -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="http://localhost:8080/home" class="navbar-brand navbar-dark navbar_elements">
                    <img src="http://localhost:8080/logo_transperent.png" alt="Brand" width="150px" height="">
                </a>
                <button type="button" class="navbar-toggler navbar-dark" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="http://localhost:8080/barbershops" class="nav-item nav-link navbar_elements">Barbershops</a>
                        <?php
                        if (session()->get('isLoggedIn') == FALSE)
                            echo '<a href="http://localhost:8080/login" class="nav-item nav-link navbar_elements">Login</a>
                              <a href="http://localhost:8080/register" class="nav-item nav-link navbar_elements">Register</a>';
                        else {
                            if (session()->get('type') === 'b') {
                                echo '<a href="http://localhost:8080/profile" class="nav-item nav-link navbar_elements">My barbershop</a>';
                            }
                            echo '<a href="" id="logout" class="nav-item nav-link navbar_elements">Logout</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>

    </header>

    <script>
        $(function() {

            $('#logout').on('click', function(e) {
                e.preventDefault();
                console.log("click")
                $.ajax({
                    type: 'post',
                    url: '/user_auth/logout',
                    dataType: "html",
                    success: function(response) {
                        alert(response);
                        window.location = "/login"
                    },
                    error: function(result) {
                        $('body').html("err");
                    },
                });

            });

        });
    </script>