<?php
//Con esto evitamos que un usuario entre si no esta logeado
if (!isset($_SESSION['uname'])) {
    header('Location:' . BASE . 'index');
}

include 'header.tpl.php';
?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" />
<div class="scroll_vertical">
    <div class="container">
        <?php
        
        echo "<br><br><br><form action='' method='post'>If you want to add a new post click here ➤ <input type='submit' name='insert' value='Add post'></form><br>";
        if (isset($_POST['insert'])) {
            for ($x = 0; $x < 1; $x++) {
                echo " <div class='well'>
        <div class='media'>
        <a class='pull-left' href='#'>
            <img class='media-object' src='https://i.imgur.com/BkQK5Wb.jpg'></a>
            <div class='media-body'>
            <h4 class='media-heading'><form action='" . BASE . "blog/insertd' method='post'><textarea required rows='1' cols='10' name='title' placeholder='Insert a title'></textarea></h4>
            <form action='" . BASE . "blog/insertd' method='post'><textarea required rows='1' cols='10' name='tag' placeholder='Insert a tag'></textarea>
            <form action='" . BASE . "blog/insertd' method='post'><textarea required rows='5' cols='100' name='cont' placeholder='Insert your text'></textarea>
            <p class='text-right'><input type='submit' value='Send'></p></form>
                    </div>
    </div></div>";
            }
        }
        if (count($data) > 0) {
            echo "<hr><br><h2>My posts:</h2>";
        }

        for ($x = 0; $x < count($data); $x++) {
            echo " <div class='well'>
    <div class='media'>
    <a class='pull-left' href='#'>
        <img class='media-object' src='https://i.imgur.com/BkQK5Wb.jpg'></a>
        <div class='media-body'>
                <h4 class='media-heading'>" . $data[$x]['title'] . "</h4>
                <p>" . $data[$x]['cont'] . "</p>
                <ul class='list-inline list-unstyled'>
                    <li><span><i class='glyphicon glyphicon-calendar'></i> Create date: " . $data[$x]['create_date'] . "</span></li>
                    <ul class='list-inline list-unstyled'>
                    <li><span><i class='glyphicon glyphicon-calendar'></i> Last modify: " . $data[$x]['modify_date'] . " </span></li>
        </div></div>
</div> 
<form action='' method='post'>You can edit this post clicking here: <input type='submit' name='edit' value='✍'><input type='hidden' name='idPostd' value=" . $data[$x]['id'] . "></form>
<form action='" . BASE . "blog/removed' method='post'>To remove this post click here: <input type='submit' value='✘'> <input type='hidden' name='idPost' value=" . $data[$x]['id'] . "></form><br>";
        }
        
        if (isset($_POST['edit'])) {
            for ($x = 0; $x < count($data); $x++) {

                if ($data[$x]['id'] == $_POST['idPostd']) {
                    echo " <div class='well'>
        <div class='media'>
        <a class='pull-left' href='#'>
            <img class='media-object' src='https://i.imgur.com/BkQK5Wb.jpg'></a>
            <div class='media-body'>
            <h4 class='media-heading'><form action='" . BASE . "blog/editd' method='post'><textarea rows='1' cols='10' name='newtitle'>" . $data[$x]['title'] . "</textarea></h4>
            <form action='" . BASE . "blog/editd' method='post'><textarea rows='5' cols='100' name='newcont'>" . $data[$x]['cont'] . "</textarea>
            <p class='text-right'><input type='hidden' name='idPostF' value=" . $data[$x]['id'] . "><input type='submit' value='Send'></p></form>
                    </div>
    </div></div>";
                }
            }
        }
        ?>

        <?php
        include 'footer.tpl.php';
        ?>