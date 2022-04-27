<?php
    $mysql = mysqli_connect('localhost', 'root', '', 'book');
    if (mysqli_connect_error()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

    $sql = 'SELECT * FROM `dnevnik`';
    $sql_res = mysqli_query($mysql,$sql);

    $result = '<table><tr><td>Фамилия</td><td>Имя</td><td>отчество</td><td>Пол</td><td>Дата</td><td>телефон</td><td>Адрес</td><td>email</td><td>Комментарий</td></tr>';
    while($row = mysqli_fetch_assoc($sql_res)){
        $result .= '<tr><td>'.$row['surname'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['lastname'].'</td>
        <td>'.$row['gender'].'</td>
        <td>'.$row['date'].'</td>
        <td>'.$row['phone'].'</td>
        <td>'.$row['location'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['comment'].'</td></tr>';
    }
    echo $result.'</table>';
?>