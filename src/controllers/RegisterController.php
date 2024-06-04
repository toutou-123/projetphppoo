<?php

class RegisterController extends Controller
{
    public function index()
    {
        
        $error = "";

        if (isset($_POST["createaccount"])) {
            if (preg_match("/^[A-z]*$/", $_POST["username"]) && $_POST["password"] === $_POST["confirm"]) {
                $user = User::setuser($_POST["username"], $_POST["password"]);
                header("Location:/login");
                exit();
            } else {
                $error = "Votre nom d'utilisateur ne correspond pas aux conditions ou vos mots de passes sont différents";
                echo $error;
            }
        }

        require(__DIR__ . "/../../views/register.php");
    }
}
