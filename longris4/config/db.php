<?php
$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'logris'; // Имя БД
try {
    // Подключение к базе данных
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    // Устанавливаем корректную кодировку
    $db->exec("set names utf8");
} catch (PDOException $e) {
    // Если есть ошибка соединения, выводим её
    print "Ошибка!: " . $e->getMessage() . "<br/>";
}