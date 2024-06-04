<?php

class Post extends PostRepository
{
  private $id;
  private $title;
  private $content;
  private $userId;

  public function __construct($title, $content, $userId, $id=0)
  {
    $this->setTitle($title);
    $this->setContent($content);
    $this->setUserId($userId);
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getTitle()
  {
    return $this->title;
  }
  public function setTitle($title)
  {
    $this->title = htmlspecialchars($title);
  }

  public function getContent()
  {
    return $this->content;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }

  public function getUserId(){
    return $this->userId;
  }

  public function setUserId($userId){
    $this->userId = $userId;
  }
}
