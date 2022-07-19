<?php

class Page
{

    public static $heading = "Easy Cook";
    public static $notifications;


    static function showHeader()
    { ?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="author" content="">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="css/styles.css">
        </head>

        <body>
            <nav class="navbar navbar-expand-sm navbar-dark p-3" style="background-color: #ff7f4d;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="">
                        <!-- TODO: add icon for the project -->
                        <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">
                        Easy Cook
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item fw-bold">
                                <a class="nav-link active" aria-current="page" href="">Home</a>
                            </li>
                            <li class="nav-item fw-bold">
                                <a class="nav-link" href="">Recipes</a>
                            </li>
                            <li class="nav-item fw-bold">
                                <a class="nav-link" href="" tabindex="-1" aria-disabled="true">Orders</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <?php
                                 if (isset($_SESSION['loggedemail'])) {
                                    echo "<a class='btn btn-outline-light font-monospace' href='Logout.php'>Logout</a>";
                                 } else {
                                    echo "<a class='btn btn-outline-light font-monospace' href='Register.php'>Register</a>&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo "<a class='btn btn-outline-light font-monospace' href='Login.php'>Login</a>";
                                 }
                            ?>
                            &nbsp;&nbsp;
                        </form>
                    </div>
                </div>
            </nav>

        <?php }


    static function showFooter()
    { ?>
        </body>

        </html>

    <?php }


    static function showLogin()
    { ?>
        <div class="pt-3" style="background-color: #FFFACD;">
            <?php
            if (!is_null(self::$notifications)) {
                echo "<div class='alert alert-danger w-50 mx-auto' role='alert'>";
                echo self::$notifications;
                echo "</div>";
            }
            ?>
            <div class="card w-50 align-items-center mx-auto py-2" style="background-color: #fffce6;">
                <form action="" method="post">
                    <div class="card-body">
                        <h2 class="card-title mb-3">Sign in to your account</h2>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your email address for login" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="submit" class="btn btn-success" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php }


    static function showRegistration()
    { ?>
        <div class="pt-3" style="background-color: #FFFACD;">
            <?php
            if (!is_null(self::$notifications)) {
                echo "<div class='alert alert-danger w-50 mx-auto' role='alert'><ul>";
                foreach (self::$notifications as $msg) {
                    echo "<li>" . $msg . "</li>";
                }
                echo "</ul></div>";
            }
            ?>
            <div class="card w-50 align-items-center mx-auto py-2" style="background-color: #fffce6;">
                <form action="" method="post">
                    <div class="card-body">
                        <h2 class="card-title mb-3">Create your account</h2>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your email address for login" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Password Confirm</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm your password" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="submit" class="btn btn-success" value="Register">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php }

    static function showLogout($user)
    {
    ?>
        <div class="alert alert-warning text-center m-0" role="alert">
            <h2>Thank you for your visit, <?php echo $user->getUsername(); ?>!</h2>
        </div>
        <img src="<?php echo IMAGES . "/logout.jpg"?>" class="img-fluid rounded mx-auto d-block" alt="logout">
    <?php
    }
}

?>