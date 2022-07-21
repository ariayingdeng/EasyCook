<?php

class Validate
{
    static $messages = [];

    static function validateRegister()
    {
        $valid = true;

        // Email should be in email format and not null
        $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (!$filteredEmail) {
            $valid = false;
            self::$messages['email'] = "Please enter the correct email address.";
            error_log("Please enter the correct email address.");
        }

        // Username should not be empty
        if (strlen(trim($_POST['username'])) == 0) {
            $valid = false;
            self::$messages['username'] = "Please enter your username.";
            error_log("Please enter your username.");
        }

        //Validate the phone number, use filter_input with regexp 
        $reg = array("options" => array("regexp" => "/^\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/"));
        $filteredNumber = filter_input(INPUT_POST, 'phonenumber', FILTER_VALIDATE_REGEXP, $reg);
        if (!$filteredNumber) {
            $valid = false;
            self::$messages['phonenumber'] = "Please enter a valid 10 digits phone number.";
        }

        // Password should be a string with at least 8 characters
        // Password and password confirm needs to be same
        // $reg = array("options" => array("regexp" => "/^\.{8,}$/"));
        // $filteredPassword = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, $reg);
        if ((strlen($_POST["password"]) < 8) || ($_POST["password"] != $_POST["password2"])) {
            $valid = false;
            self::$messages['password'] = "Please enter your password with at least 8 characters.";
            error_log("Please enter your password with at least 8 characters.");
        }

        // Whether the same email has been stored in the database
        if (isset($_POST['email'])) {
            $user = UserDAO::getUser(trim($_POST['email']));
            if ($user) {
                $valid = false;
                self::$messages['email'] = "Email has been taken.";
                error_log("Email has been taken.");
            }
        }

        return $valid;
    }
}
