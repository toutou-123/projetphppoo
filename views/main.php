<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facebook</title>
  <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
  <header>
    <h1>Facebook V 0.1</h1>
    <p id="username">bonjour <?= $username ?> </p>
  </header>
  <hr>
  <?php foreach ($posts as $post) : ?>
    <div id="postcontainer">
      <h2><?php echo htmlspecialchars($post->getTitle()); ?></h2>
      <p><?php echo htmlspecialchars($post->getContent()); ?></p>
      
      <form action="" method="post">
        <?php if ($_SESSION["id"] == $post->getUserId()) { ?>
          <button name="delete" id="delete" value="<?= $post->getId() ?>">delete</button>
          <button name="update" id="update" value="<?= $post->getId() ?>">update</button>
        <?php } ?>
      </form>
    </div>
  <?php endforeach ?>
  <form action="/" method="post">
    <div>
      <p>Titre</p>
      <input type="text" name="title" id="title">
      <br>
      <p>contenu</p>
      <textarea name="content" id="content"></textarea>
      <br>
      <button name="submit">publier</button>
      <a href="/Logout" name="disconnect" id="disconnect">Disconnect</a>
    </div>
  </form>
</body>

</html>