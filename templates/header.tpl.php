<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo BASE?>src/css/style.css">

</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand"><?= $user; ?> ~</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="<?= BASE ?>home">Home</a></li>
        <li><a href="<?= BASE ?>blog">My Blog</a></li>
        <li><a href="<?= BASE ?>community">Community Blog</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= BASE ?>logout/out"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
      </ul>
    </div>
  </nav>
</body>

</html>