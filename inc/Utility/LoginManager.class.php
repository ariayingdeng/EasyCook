<?php

class LoginManager
{

    // This method is from the class demo in CSIS3280
    static function verifyLogin()
    {

        if (session_id() == '' || !isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['loggedemail'])) {
            return true;
        } else {
            session_destroy();
            return false;
        }
    }

    static function saveEditAccount()
    {
        // if the user info editting form is submitted
        if (isset($_POST['submit']) && $_POST['submit'] == "Save") {
            if (Validate::validateEditAccount()) {
                $updatedUser = new User();
                $updatedUser->setEmail(trim($_POST["email"]));
                $updatedUser->setUsername(trim($_POST["username"]));
                $updatedUser->setPhoneNumber(trim($_POST["phonenumber"]));
                $updatedUser->setAddress(trim($_POST["address"]));
                $updatedUser->setPassword($_POST["password"]);

                UserDAO::updateUser($updatedUser);
                Page::$notifications = array("Profile updated successfully!");
            } else {
                Page::$notifications = Validate::$messages;
            }
        }
    }
}

?>