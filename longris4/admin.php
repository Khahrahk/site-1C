<!DOCTYPE HTML>

<html>
<head>
    <title>Logris</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body class="homepage is-preload">
<div id="page-wrapper">
    <?
    include 'header.php';
    ?>
    </section>

    <!-- Main -->
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h2>Панель администратора</h2>
                    <br><br>
                    <form action="#" method="post">
                        <input type="submit" name="vivesti" value="Вывести" id="submit1">
                        <input type="submit" name="dobavit" value="Добавить запись" id="submit1">
                        <input type="submit" name="udalit" value="Удалить запись" id="submit1">
                        <input type="submit" name="redaktirovat" value="Редактировать запись" id="submit1">

                    </form>
                    <?php
                    include 'config/db.php';
                    function dobavit()
                    {
                        echo
                        '<form action="#" method="post">

        <input type="text" name="header" placeholder="Заголовок" id="input">
        <input type="text" name="main" placeholder="Содержание" id="input">

        <input type="submit" name="submit1" value="Сохранить" id="submit11">

    </form>';
                    }

                    $arr = [
                        'Январь',
                        'Февраль',
                        'Март',
                        'Апрель',
                        'Май',
                        'Июнь',
                        'Июль',
                        'Август',
                        'Сентябрь',
                        'Октябрь',
                        'Ноябрь',
                        'Декабрь'
                    ];

                    $month = date('n')-1;
                    $num = (int)$_POST['num'];
                    $header = $_POST['header'];
                    $main = $_POST['main'];
                    $date = $arr[$month].', '.date('d');

                    function vivesti()
                    {
                        global $db;
                        $stmt = $db->query("SELECT * FROM `news`;")->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <table>
                        <tr>
                            <td>Номер</td>
                            <td>Заголовок</td>
                            <td>Содержание</td>
                            <td>Дата создания</td>
                        </tr>
                        <?
                        foreach ($stmt as $k => $v) {
                            ?>
                            <tr>
                                <td><?php echo $v['id']; ?></td>
                                <td><?php echo $v['header']; ?></td>
                                <td><?php echo $v['main']; ?></td>
                                <td><?php echo $v['created']; ?></td>
                            </tr>
                            <?php
                        }
                        ?></table><?
                    }

                    function dobavit1($header, $main, $date, $db)
                    {
                        try {
                            $db->exec("set names utf8");
                            $data = array('header' => $header, 'main' => $main, 'date' => $date);
                            // Подготавливаем SQL-запрос
                            $query = $db->prepare("INSERT INTO `news` 
(`id` ,`header`, `main`, `created`) VALUES 
(NULL, :header, :main, :date)");
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

                    function udalit1()
                    {
                        echo
                        '<form action="#" method="post">

        <input type="text" name="num" placeholder="Введите число записи" id="input">
        <input type="submit" name="submit5" value="Удалить" id="submit11">

    </form>';
                    }

                    function udalit2($header, $main, $date, $db, $num)
                    {
                        try {
                            $db->exec("set names utf8");
                            $data = array('header' => $header, 'main' => $main, 'date' => $date, 'num' => $num);
                            // Подготавливаем SQL-запрос
                            $query = $db->prepare("DELETE FROM `news` WHERE `id` = '$num'");
                            // Выполняем запрос с данными
                            $query->execute($data);
                            // Запишим в переменую, что запрос отрабтал
                            $result = true;
                        } catch (PDOException $e) {
                            // Если есть ошибка соединения или выполнения запроса, выводим её
                            print "Ошибка!: " . $e->getMessage() . "<br/>";
                        }
                        if ($result) {
                            echo "Вы успешно удалили запись";
                        }
                    }

                    function redaktirovat1($num)
                    {
                        echo
                        '<form action="#" method="post">

        <input type="text" name="num" placeholder="Номер" id="input" ">
        <input type="text" name="header" placeholder="Заголовок" id="input">
        <input type="text" name="main" placeholder="Содержание" id="input">

        <input type="submit" name="submit3" value="Сохранить" id="submit11">

    </form>';
                        return $num;
                    }

                    function redaktirovat2($header, $main, $date, $db, $num)
                    {
                        try {
                            $db->exec("set names utf8");
                            $query = $db->prepare("
UPDATE `news` 
SET `header` = :header, `main` = :main, `created` = :date
WHERE `id` = '$num'");

                            $data = array('header' => $header, 'main' => $main, 'date' => $date);
                            // Выполняем запрос с данными
                            $query->execute($data);
                            // Запишим в переменую, что запрос отрабтал
                            $result = true;
                        } catch (PDOException $e) {
                            // Если есть ошибка соединения или выполнения запроса, выводим её
                            print "Ошибка!: " . $e->getMessage() . "<br/>";
                        }
                        if ($result) {
                            echo "Вы успешно изменили запись";
                        }
                    }

                    if (array_key_exists('submit1', $_POST)) {
                        dobavit1($header, $main, $date, $db);
                    }
                    if (array_key_exists('dobavit', $_POST)) {
                        dobavit();
                    }
                    if (array_key_exists('udalit', $_POST)) {
                        udalit1();
                    }
                    if (array_key_exists('redaktirovat', $_POST)) {
                        redaktirovat1($num);
                    }
                    if (array_key_exists('submit3', $_POST)) {
                        redaktirovat2($header, $main, $date, $db, $num);
                    }
                    if (array_key_exists('submit5', $_POST)) {
                        udalit2($header, $main, $date, $db, $num);
                    }
                    if (array_key_exists('vivesti', $_POST)) {
                        vivesti();
                    }
                    ?>
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

<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>