<?php
    $mysql = mysqli_connect('localhost', 'root', '', 'book');
    if (mysqli_connect_error()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

    // $sql = 'SELECT `surname`, LEFT(`name`, 1) as name FROM `dnevnik`';
    $sql = 'SELECT * FROM `dnevnik`';
    $sql_res = mysqli_query($mysql,$sql);

    while($row = mysqli_fetch_assoc($sql_res)){
       echo '<a href="?p=edit&id='.$row['id'].'">'.$row['surname'].' '.$row['name'].'.</a>'.'<br>';
    }

    $row = [
        'surname' => '',
        'name' => '',
        'lastname' => '',
        'gender' => '',
        'date' => '',
        'phone' => '',
        'location' => '',
        'email' => '',
        'comment' => '',
    ];
    $button = 'Изменить запись';
    if (isset($_GET['id'])){
        $my_db = mysqli_connect('localhost', 'root', '', 'book');
        if (mysqli_connect_error()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

        $sql = 'SELECT * FROM `dnevnik` WHERE `id` = '.$_GET['id'].'';
        $sql_res = mysqli_query($my_db, $sql);
        $row = mysqli_fetch_assoc($sql_res);
    }

    if(isset($_POST['button'])){
        $mysql = mysqli_connect('localhost', 'root', '', 'book');
        if (mysqli_connect_error()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

        $sql = "UPDATE `dnevnik` SET `surname` = '{$_POST['surname']}',`name` = '{$_POST['name']}' WHERE `id`={$_GET['id']}" ;

        mysqli_query($mysql, $sql);
        header("Refresh:0; url=?p=edit");
    }


?>

<form name="form_add" method="post">
    <div class="column">
        <div class="add">
            <label>Фамилия</label> <input type="text" name="surname" placeholder="Фамилия" value="<?=$row['surname'];?>">
        </div>
        <div class="add">
            <label>Имя</label> <input type="text" name="name" placeholder="Имя" value="<?=$row['name'];?>">
        </div>
            <button type="submit" value="<?=$button;?>" name="button" class="form-btn"><?=$button;?></button>
    </div>
</form>


