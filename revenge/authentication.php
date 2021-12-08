<?php

// Написать функцию authentication($__password), которая проверяет правильность пароля $__password и возвращает, сколько раз текущий пользователь неправильно ввел пароль.

// Пароли хэшированы с помощью функции md5() и хранятся в виде сериализованного списка хешей в файле passwords.txt. Если пароль не проходит проверку, то счетчик ошибок данного пользователя инкрементируется. Функция возвращает число ошибочных попыток ввода пароля для текущего пользователя.

// При написании функции учесть что session_start() уже была вызвана ранее.

function authentication($__password) {

    $fileName = 'passwords.txt';
    
    $data = file_get_contents($fileName);

    $dataArr = unserialize($data);

    if (!isset($_SESSION['counter']))
        $_SESSION['counter'] = 1;

    if (!in_array(md5($__password), $dataArr)) {
            $_SESSION['counter']++;
    }
	
    return $_SESSION['counter'];
    
}
