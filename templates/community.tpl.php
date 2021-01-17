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

        for ($x = 0; $x < count($data); $x++) {
            echo "<div class='well'>
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
                                <li>|</li>
                                <li>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-starempty'></span>
                                </li>
                                <li>|</li>
                                <li>
                                    <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                                    <span><i class='fa fa-facebook-square'></i></span>
                                    <span><i class='fa fa-twitter-square'></i></span>
                                    <span><i class='fa fa-google-plus-square'></i></span>
                                </li>
                                <li>|</li>
                                <span><i class='glyphicon glyphicon-comment'></i> <a href='" . BASE . "comments/selectd/id/" . $data[$x]['id'] . "'>comments</a></span>
                                    </ul>
                    </div>
            </div>
            </div>";
        }if(count($data) == 0){
            ?>
            <script>
                alert("No posts to view");
            </script>
        <?php
        }

        /* if (isset($data)) {
            if (count($data) > 0) {
                
                foreach ($data as $valor) {
                    echo "<div class='well'>
                <div class='media'>
                <a class='pull-left' href='#'>
                    <img class='media-object' src='https://i.imgur.com/BkQK5Wb.jpg'></a>";
                    foreach ($valor as $key => $value) {

                        if ($key == "title") {
                            echo "<div class='media-body'>
                            <h4 class='media-heading'>$value</h4>";
                        }
                        if ($key == "cont") {
                            echo "<p>$value</p>";
                        }
                        if ($key == "user") {
                            echo "<p class='text-right'>By user $value</p>";
                        }
                        if ($key == "create_date") {
                            echo "<ul class='list-inline list-unstyled'>
                                <li><span><i class='glyphicon glyphicon-calendar'></i> Create date: $value </span></li>";
                        }
                        if ($key == "modify_date") {
                            echo "<ul class='list-inline list-unstyled'>
                                <li><span><i class='glyphicon glyphicon-calendar'></i> Last modify: $value </span></li>
                                <li>|</li>";
                        }
                        if ($key == "id") {
                            $commentID = $value;
                        }
                    }
                    echo"
                    <li>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-starempty'></span>
                                </li>
                                <li>|</li>
                                <li>
                                    <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                                    <span><i class='fa fa-facebook-square'></i></span>
                                    <span><i class='fa fa-twitter-square'></i></span>
                                    <span><i class='fa fa-google-plus-square'></i></span>
                                </li>
                                <li>|</li>
                                <span><i class='glyphicon glyphicon-comment'></i><form action='" . BASE . "comments' method='post'><input type='submit' name='comment' value='comments'><input type='hidden' name='commentID' value='$commentID'></span>
                                    </ul>
                    </div>
            </div>
</div>";
                }
            }
        } else {
        ?>
            <script>
                alert("You don't have any post to see.");
            </script>
        <?php
        }
        ?>
        </table>
    </div>

    <?php
    */
        include 'footer.tpl.php';
        ?>