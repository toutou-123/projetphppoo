<?php
abstract class UserRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getusers(){
        return self::request("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getuserById($id){
        return self::request("SELECT * FROM user WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getuserByName($username, $password){
        return self::request("SELECT * FROM user WHERE username='$username' AND password='$password'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function setuser($username, $password){
        return self::request("INSERT INTO user(username,password) VALUES('".$username."','".$password."')");
    }

}