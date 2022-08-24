<!DOCTYPE HTML>
<html>
<head>
    <title>logris</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body class="left-sidebar is-preload">
<div id="page-wrapper">
    <?
    include 'header.php';
    ?>
    </section>

    <!-- Main -->
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-4 col-12-medium">

                    <!-- Sidebar -->
                    <section class="box">
                        <a href="#" class="image featured"><img src="images/pic09.jpg" alt=""/></a>
                        <header>
                            <h3>Блок</h3>
                        </header>
                        <p>Здесь можно что-то написать.</p>
                        <footer>
                            <a href="#" class="button alt">Подтвердить</a>
                        </footer>
                    </section>
                    <section class="box">
                        <header>
                            <h3>Блок</h3>
                        </header>
                        <p>Здесь можно что-то написать.</p>
                        <ul class="divided">
                            <li><a href="#">И вставить ссылки</a></li>
                            <li><a href="#">Ссылки...</a></li>
                            <li><a href="#">Ссылки...</a></li>
                            <li><a href="#">Ссылки...</a></li>
                        </ul>
                        <footer>
                            <a href="#" class="button alt">Подтвердить</a>
                        </footer>
                    </section>

                </div>
                <div class="col-8 col-12-medium imp-medium">

                    <!-- Content -->
                    <article class="box post">
                        <a href="#" class="image featured"><img src="images/pic01.jpg" alt=""/></a>
                        <header>
                            <h2>Обратная связь</h2>
                            <p>Форма для обратной связи</p>
                        </header>
                        <p>
                        <form action="#" method="post">

                            <label>ФИО</label>
                            <input name="name" type="text" placeholder="Писать здесь">

                            <label>Email</label>
                            <input name="email" type="email" placeholder="Писать здесь">

                            <label>Сообщение</label>
                            <textarea name="message" placeholder="Писать здесь"></textarea>
                            <br>
                            <input id="submit" name="submit" type="submit" value="Отправить">

                        </form>
                        </p>
                    </article>

                </div>
            </div>
        </div>
    </section>
    <?
    include 'footer.php';
    ?>
</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>

<?php
require 'config/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$date = date("Y-m-d H:i:s");

function dobavit($name, $email, $message, $date, $db)
{
    try {
        $db->exec("set names utf8");
        $data = array('name' => $name, 'email' => $email, 'message' => $message, 'date' => $date);
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO `feedback` 
(`id`,`name`, `email`, `message`, `created`) VALUES 
(NULL, :name, :email, :message, :date)");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    if ($result) {
        echo "Успех. Информация занесена в базу данных";
    }
}

if (array_key_exists('submit', $_POST)) {
    dobavit($name, $email, $message, $date, $db);
}