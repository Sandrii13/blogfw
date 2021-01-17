<?php
//Con esto evitamos que un usuario entre si no esta logeado
if (!isset($_SESSION['uname'])) {
	header('Location:' . BASE . 'index');
}

include 'header.tpl.php';
?>

<title>Home</title>
<!--Custom styles-->

<center>
	<br>
	<h1>Connect with others</h1><br><br><br><br>
	<img class="imgPrin" src="https://www.marketgoo.com/wp-content/uploads/2018/08/blog-feature-img.svg">
</center>

<?php
include 'footer.tpl.php';
?>