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
                        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>" class="d-flex">
                            <?php
                            if (isset($_SESSION['loggedemail'])) {
                                $loggedUser = UserDAO::getUser($_SESSION['loggedemail']);
                                echo "<a class='btn btn-outline-light font-monospace' href='Logout.php'>Logout</a>&nbsp;&nbsp;";
                            ?>
                                <!-- Modified from modal example from Bootstrap: https://getbootstrap.com/docs/5.0/components/modal/ -->
                                <!-- Edit User Account -->
                                <button type="button" class="btn btn-outline-light rounded-circle" data-bs-toggle="modal" data-bs-target="#editUser">
                                    <i class='fa-solid fa-gear'></i>
                                </button>

                                <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Settings</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" style="width: 32%; background-color: #fffce6;">Email Address</span>
                                                    <input type="email" class="form-control" id="e-email" name="email" placeholder="Edit your email address" value="<?= $loggedUser->getEmail(); ?>" disabled>
                                                    <input type="hidden" name="email" value="<?= $loggedUser->getEmail(); ?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" style="width: 32%; background-color: #fffce6;">Username</span>
                                                    <input type="text" class="form-control" id="e-username" name="username" placeholder="Edit your username" value="<?= $loggedUser->getUsername(); ?>" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" style="width: 32%; background-color: #fffce6;">Contact Number</span>
                                                    <input type="text" class="form-control" id="e-phonenumber" name="phonenumber" placeholder="Edit your contact number" value="<?= $loggedUser->getPhoneNumber(); ?>" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" style="width: 32%; background-color: #fffce6;">Address</span>
                                                    <input type="text" class="form-control" id="e-address" name="address" placeholder="Edit your address" value="<?= $loggedUser->getAddress(); ?>" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" style="width: 32%; background-color: #fffce6;">Password</span>
                                                    <input type="password" class="form-control" id="e-password" name="password" placeholder="Enter your password" required>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text" style="width: 32%; background-color: #fffce6;">Password Confirm</span>
                                                    <input type="password" class="form-control" id="e-password2" name="password2" placeholder="Confirm your password" required>
                                                </div>
                                                <span id="passwordInline" class="form-text">
                                                    Must be at least 8 characters long.
                                                </span>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <input type="submit" name="submit" class="btn btn-success" value="Save">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php
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

            <div class="pt-3" style="background-color: #FFFACD;">
                <!-- ends at the showHome and showOrderRecipes -->
                <?php
                if (!is_null(self::$notifications)) {
                    echo "<div class='alert alert-danger mx-auto' role='alert' style=' width: 45rem;'><ul>";
                    foreach (self::$notifications as $msg) {
                        echo "<li>" . $msg . "</li>";
                    }
                    echo "</ul></div>";
                }
            }


            static function showFooter()
            { ?>
                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
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
                <a href='Order.php?mealName=<?= $recipe->getMealName() ?>' class="btn btn-success font-monospace"><i class="fa-solid fa-cart-plus"></i> Order</a>
            </div>
        </div>
    <?php
            }

            // show the recipes that the user has ordered
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


            //Order Page; 
            static function showOrder($recipe, $ingredents)
            {

    ?>
        <div class="pt-3" style="background-color: #FFFACD;">
            <div class="card w-50 align-items-center mx-auto py-2" style="background-color: #fffce6;">
                <form action="" method="post">
                    <div class="card-body">
                        <h2 class="card-title mb-3">These are our recommended ingredients:</h2>
                        <h5 class="card-title mb-3">Customise your ingredient for <?= $recipe->strMeal ?></h2>

                            <?php
                            foreach ($ingredents as $ingredent => $amount) {
                                echo '<div class="input-group mb-3">';
                                echo '<span class="input-group-text">' . $ingredent . '</span>';
                                echo '<input type="number" class="form-control" name=' . str_replace(' ', '', $ingredent) . ' placeholder="1" value="1" required>';
                                echo '</div>';
                            }
                            ?>

                            <div class="d-flex justify-content-center">
                                <input type="submit" name="checkout" class="btn btn-success" value="checkout">
                            </div>
                </form>
            </div>
        </div>
    <?php
            }

            static function showOrderDetails($ingredents, $total)
            {
                $stringOfIngredients = "";
    ?>
        <div class="pt-3" style="background-color: #FFFACD;">
            <div class="card w-50 align-items-center mx-auto py-2" style="background-color: #fffce6;">
                <div class="card-body">
                    <h2 class="card-title mb-3">These are the ingredents you select:</h2>
                    <form action="" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ingredient</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($ingredents as $ingredent => $price) {
                                    echo "<tr>";
                                    echo ' <th scope="row">' . $i . '</th>';
                                    echo "<td>$ingredent</td>";
                                    echo "<td>" . $_POST[str_replace(' ', '', $ingredent)] . "</td>";
                                    echo "<td>$price</td>";
                                    echo "</tr>";
                                    $i++;
                                    echo ' <input type="hidden" name=' . str_replace(' ', '', $ingredent) . ' value=' . $_POST[str_replace(' ', '', $ingredent)] . '>';
                                }
                                ?>
                            </tbody>
                        </table>
                        Total Price: <?= $total ?>
                        <input type="hidden" name="orderTotal" value=<?= $total ?>>
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="confirm" class="btn btn-success" value="confirm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
            }
        }

?>