<?php
abstract class Controller{
    public function redirect($path){
        // redirige vers une autre page
        header("Location:$path");
        exit();
    }
    abstract public function index();
}
?>