<?php

class MainController extends Controller{
    public function index(){
        try{    
            
            if (!isset($_SESSION['id'])) {
                header("Location:/login");
                exit();
            }
            $user= User::getuserById($_SESSION["id"]);
            if (isset($_POST["submit"])){
                $postUpdate = new Post ($_POST["title"],$_POST["content"],$_SESSION["id"]);
                Post::insertDb($postUpdate);
            }
            if (isset($_POST["delete"])) {
                $postId = $_POST["delete"];
                Post::deletePost($postId);
            }
            $postdb=Post::getpost();
            $username = $user["username"];
            $posts = [];
            foreach ($postdb as $post) {
                $posts[] = new Post($post["title"], $post["content"],$post["id_user"], $post["id"]);
            }
            
            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }   
        require(__DIR__ . "/../../views/main.php");
    }
}
?>