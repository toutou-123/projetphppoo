<?php
class LoginController extends Controller{
    public function index(){
        
        $error ="";
        if(isset($_POST["connect"])){
            if (preg_match("/^[A-z]*$/",$_POST["username"])) {
                $user = User::getUserByName($_POST["username"],$_POST["password"]);
                if (!$user) {
                    $error = "Nom d'utilisateur ou mot de passe incorrect";
                    echo $error;
                }
                else{
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["id"] = $user["id"];
                    header("Location:/");
                    exit();
                }
            }
            else{
                $error = "Nom d'utilisateur ou mot de passe incorrect";
                echo $error;
            }
        }
        require(__DIR__ . "/../../views/login.php");
    }
}

