<?php
    include 'form.php';
    if(isset($_POST['button']) && $_POST['button'] == 'Добавить запись'){
        $mysql = mysqli_connect('localhost', 'root', '', 'book');
        if (mysqli_connect_error()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

        $sql = 'INSERT INTO `dnevnik`(`surname`, `name`, `lastname`, `gender`, `date`, `phone`, `location`, `email`, `comment`) VALUES ("'.htmlspecialchars($_POST['surname']).'","'.htmlspecialchars($_POST['name']).'","'.htmlspecialchars($_POST['lastname']).'","'.$_POST['gender'].'","'.$_POST['date'].'","'.htmlspecialchars($_POST['phone']).'","'.htmlspecialchars($_POST['location']).'","'.htmlspecialchars($_POST['email']).'","'.htmlspecialchars($_POST['comment']).'")';
        // $sql = 'INSERT INTO `dnevnik` (`comment`) VALUES ("'.htmlspecialchars($_POST['comment']).'") ';

        mysqli_query($mysql, $sql);
        header("Refresh:0; url=?p=view");
    }

?>
