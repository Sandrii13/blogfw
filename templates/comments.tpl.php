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

        <!--visual post-->
        <?php
        for ($x = 0; $x < count($data); $x++) {
            echo " <div class='well'>
        <div class='media'>
        <a class='pull-left' href='#'>
            <img class='media-object' src='https://i.imgur.com/BkQK5Wb.jpg'></a>
            <div class='media-body'>
                    <h4 class='media-heading'>" . $data[$x]['title'] . "</h4>
                    <p>" . $data[$x]['cont'] . "</p>
                    <p class='text-right'>By user " . $data[$x]['user'] . "</p>
                    <ul class='list-inline list-unstyled'>
                        <li><span><i class='glyphicon glyphicon-calendar'></i> Create date: " . $data[$x]['create_date'] . "</span></li>
                        <ul class='list-inline list-unstyled'>
                        <li><span><i class='glyphicon glyphicon-calendar'></i> Last modify: " . $data[$x]['modify_date'] . " </span></li>
            </div>
    </div> ";

            //insert comments

            echo "<div class='well'>
        <div class='media'>
        <a class='pull-left' href='#'>
            <img class='media-object' src=''></a>
            <div class='media-body'>
            <form action='" . BASE . "comments/insertd/id/" . $data[$x]['id'] . "' method='post'><textarea rows='5' cols='100' name='insert' placeholder='Add your comment here'></textarea>
            <p class='text-right'><input type='submit' value='Send'></p></form>
            </div>
    </div></div></div>";
            if (count($coms) > 0) {
                echo "<h2>Comments (" . count($coms) . "): </h2>";
            }
        }

        for ($x = 0; $x < count($coms); $x++) {

            echo " <div class='well'>
        <div class='media'>
            <div class='media-body'>
                    <p>" . $coms[$x]['comment'] . "</p>
                    <p class='text-right'>By user " . $coms[$x]['user'] . "</p>
                    </div>
    </div></div>";
        }
        include 'footer.tpl.php';
        ?>