<?php
if (isset($_POST)) {
    $link = mysqli_connect('localhost','root','','db');

    $arrayItems = $_POST['item'];
    $order = 0;
        foreach ($arrayItems as $item) {
            $sql = "UPDATE team_users SET position='$order' WHERE userID='$item'";
            mysqli_query($link, $sql);
            $order++;
        }

    echo 'Sorting updated';
    mysqli_close($link);
}


