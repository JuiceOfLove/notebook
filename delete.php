<?php
    $mysql = mysqli_connect('localhost', 'root', '', 'book');
    if (mysqli_connect_error()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

    $sql = 'SELECT * FROM `dnevnik`';
    $sql_res = mysqli_query($mysql,$sql);

    while($row = mysqli_fetch_assoc($sql_res)){
       echo '<a href="?p=delete&id='.$row['id'].'&surname='.$row['surname'].'">'.$row['surname'].' '.mb_substr($row['name'],0,1).'. '.mb_substr($row['lastname'],0,1).'.</a>'.'<br>';
    }



    if(isset($_GET['id'])) {
        $sql = "DELETE FROM `dnevnik` WHERE `id`= {$_GET['id']}";
        mysqli_query($mysql, $sql);
        print '<script type="text/javascript">alert("' . "Запись с фамилией {$_GET['surname']} удалена" . '");</script>';
        header("Refresh:0; url=?p=delete");

    }

?>