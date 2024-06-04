<?php
abstract class PostRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getpost(){
        return self::request("SELECT * FROM post")->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getPostByAuthor($idUser){
        return self::request("SELECT * FROM post WHERE id_user=$idUser")->fetch(PDO::FETCH_ASSOC);
    }

// autre façon d'écrire insertDb()
    // public static function createPost(Post $post)
    // {
    //     $title = $post->getTitle();
    //     $content = $post->getContent();
    //     $userId = $_SESSION["id"];
    
    //     $query = "INSERT INTO post (title, content, id_user) VALUES ($title, $content, $userId)";
    //     self::request($query);
    // }

    public static function insertDb($post){
        return self::request("INSERT INTO post(title, content, id_user) VALUES('".$post->getTitle()."','".$post->getContent()."','".$_SESSION["id"]."')");
    }

    public static function deletePost($postId){
        return self::request("DELETE FROM post WHERE id =".$postId);
    }

public static function getAuthorPost(){
    return self::request("SELECT * FROM post p RIGHT JOIN user u ON p.id_user = u.id;")->fetchAll(PDO::FETCH_ASSOC);
}

}