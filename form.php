<?php
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
    $button = 'Добавить запись';
    if (isset($_GET['id'])){
        $button = 'Изменить запись';
        $my_db = mysqli_connect('localhost', 'root', '', 'book');
        if (mysqli_connect_error()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

        $sql = 'SELECT * FROM `dnevnik` WHERE `id` = '.$_GET['id'].'';
        $sql_res = mysqli_query($my_db, $sql);
        $row = mysqli_fetch_assoc($sql_res);
    }

?>
<form name="form_add" method="post">
    <div class="column">
        <div class="add">
            <label for="surname">Фамилия</label> <input id="surname" type="text" name="surname" placeholder="Фамилия" value="">
        </div>
        <div class="add">
            <label for="name">Имя</label> <input id="name" type="text" name="name" placeholder="Имя" value="<?=$row['name'];?>">
        </div>
        <div class="add">
            <label for="lastname">Отчество</label> <input id="lastname" type="text" name="lastname" placeholder="Отчество" value="<?=$row['lastname'];?>">
        </div>
        <div class="add">
            <label for="gender">Пол</label>
            <select name="gender" id="gender">
                <option value='<?=$row['gender'];?>'><?=$row['gender'];?></option>
                <option value="мужской">мужской</option>
                <option value="женский">женский</option>
            </select>
        </div>
        <div class="add">
            <label for="dateofbirth">Дата рождения</label> <input id="dateofbirth" type="date" name="date" value="<?=$row['date'];?>">
        </div>
        <div class="add">
            <label for="tel">Телефон</label> <input id="tel" type="text" name="phone" placeholder="Телефон" value="<?=$row['phone'];?>">
        </div>
        <div class="add">
            <label for="address">Адрес</label> <input id="address" type="text" name="location" placeholder="Адрес" value="<?=$row['location'];?>">
        </div>
        <div class="add">
            <label for="email">Email</label> <input id="email" type="email" name="email" placeholder="Email" value="<?=$row['email'];?>">
        </div>
        <div class="add">
            <label for="comment">Комментарий</label> <textarea id="comment" name="comment" placeholder="Краткий комментарий"><?=$row['comment'];?></textarea>
        </div>

            <button type="submit" value="<?=$button;?>" name="button" class="form-btn"><?=$button;?></button>
    </div>
</form>