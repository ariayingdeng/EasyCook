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
            <script src="https://kit.fontawesome.com/2c624dc77d.js" crossorigin="anonymous"></script>
        </head>

        <body>
            <nav class="navbar navbar-expand-sm navbar-dark p-3" style="background-color: #ff7f4d;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="Home.php">
                        <!-- TODO: add icon for the project -->
                        <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">
                        Easy Cook
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item fw-bold">
                                <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
                            </li>
                            <li class="nav-item fw-bold">
                                <a class="nav-link" href="Recipes.php">Recipes</a>
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
                echo "<div class='alert alert-danger mx-auto text-center' role='alert' style='width: 45rem;'>";
                echo self::$notifications;
                echo "</div>";
            }
            ?>
            <div class="card align-items-center mx-auto py-2" style="background-color: #fffce6; width: 45rem;">
                <form action="" method="post">
                    <div class="card-body" style="width: 30rem;">
                        <h2 class="card-title mb-3 text-center">Sign in to your account</h2>
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
                echo "<div class='alert alert-danger mx-auto' role='alert' style=' width: 45rem;'><ul>";
                foreach (self::$notifications as $msg) {
                    echo "<li>" . $msg . "</li>";
                }
                echo "</ul></div>";
            }
            ?>
            <div class="card align-items-center mx-auto py-2" style="background-color: #fffce6; width: 45rem;">
                <form action="" method="post">
                    <div class="card-body" style="width: 30rem;">
                        <h2 class="card-title mb-3 text-center">Create your account</h2>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your email address for login" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="phonenumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter your contact number" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            <span id="passwordInline" class="form-text">
                                Must be at least 8 characters long.
                            </span>
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
        <img src="<?php echo IMAGES . "/logout.jpg" ?>" class="img-fluid rounded mx-auto d-block" alt="logout">
    <?php
    }

    static function showHome($recipes)
    {
    ?>
        <div class="d-flex justify-content-between align-content-start flex-wrap" style="background-color: #FFFACD;">
            <?php
            foreach ($recipes as $recipe) {
                self::showRecipeCard($recipe);
            }
            ?>
        </div>

    <?php
    }

    static function showRecipeCard($recipe)
    {
    ?>
        <div class="card mt-3 mb-3" style="width: 18rem;" style="background-color: #fffce6;">
            <img src="<?= $recipe->getImageURL(); ?>" class="card-img-top" alt="MealPic">
            <div class="card-body" style="background-color: #fffce6;">
                <h5 class="card-title d-flex justify-content-between"><?= $recipe->getMealName(); ?><span class="badge bg-warning" style="height: 1.5rem;"><?= $recipe->getCategory(); ?></span></h5>
                <p class="card-text">
                    <?php
                    $tags = explode(",", $recipe->getTagStr());
                    foreach ($tags as $tag) {
                        echo "<span class='badge bg-secondary' style='margin-right:3px'>" . $tag . "</span>";
                    }
                    ?>
                </p>
                <a href="#" class="btn btn-success font-monospace"><i class="fa-solid fa-cart-plus"></i> Order</a>
            </div>
        </div>
    <?php
    }

    static function showOrderRecipes($recipes)
    {
    ?>
        <div style="background-color: #FFFACD;">
            <h5 class="d-flex justify-content-between p-3">The meals that you ordered:</h5>
            <?php
            foreach ($recipes as $recipe) {
                self::showOrderRecipeCard($recipe);
            }
            ?>
        </div>
    <?php
    }

    static function showOrderRecipeCard($recipe)
    {
    ?>
        <div class="card mb-5 rounded" style="background-color: #fffce6;">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="<?= $recipe->getImageURL(); ?>" class="rounded-start" style="max-width: 100%; height: 100%;" alt="MealPic">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between"><?= $recipe->getMealName(); ?><span class="badge bg-warning" style="height: 1.5rem;"><?= $recipe->getCategory(); ?></span></h5>
                        <p class="card-text"><?= $recipe->getMealInstructions(); ?></p>
                        <p class="card-text d-flex justify-content-between">
                        <span>
                            <?php
                            $tags = explode(",", $recipe->getTagStr());
                            foreach ($tags as $tag) {
                                echo "<span class='badge bg-secondary' style='margin-right:10px'>" . $tag . "</span>";
                            }
                            ?>
                        </span>
                        <a href="<?= $recipe->getYoutubeLink(); ?>" type="button" class="btn btn-info" target="_blank">Check YouTube Video</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}

?>