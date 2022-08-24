<!-- Footer -->
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-8 col-12-medium">
                <section>
                    <header>
                        <h2>Последние новости</h2>
                    </header>
                    <ul class="dates">
                        <?
                        require 'config/db.php';
                        $stmt = $db->query("SELECT * FROM `news`;")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($stmt as $k => $v) {
                        ?>
                        <li>
                            <span class="date"><strong><?php echo $v['created']; ?></strong></span>
                            <h3 style="margin-left: 200px"><a href="#"><?php echo $v['header']; ?></a></h3>
                            <p style="margin-left: 200px"><?php echo $v['main']; ?></p>
                        </li>
                        <?
                        }
                        ?>
                    </ul>
                </section>
            </div>
            <div class="col-4 col-12-medium">
                <section>
                    <header>
                        <h2>О чем это все?</h2>
                    </header>
                    <a href="#" class="image featured"><img src="images/pic10.jpg" alt=""/></a>
                    <p>
                        Это <strong>Лонгрис</strong> - компания, которая занимается ведением бизнеса и т.д
                    </p>
                    <footer>
                        <ul class="actions">
                            <li><a href="#" class="button">Узнать больше</a></li>
                        </ul>
                    </footer>
                </section>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <section>
                    <header>
                        <h2>Политика</h2>
                    </header>
                    <ul class="divided">
                        <li><a href="#">Ваши права</a></li>
                        <li><a href="#">Политика конфиндециальности</a></li>
                    </ul>
                </section>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <section>
                    <header>
                        <h2>Что-нибудь еще</h2>
                    </header>
                    <ul class="divided">
                        <li><a href="#">Что-нибудь еще</a></li>
                        <li><a href="#">Что-нибудь еще</a></li>
                    </ul>
                </section>
            </div>
            <div class="col-4 col-12-medium">
                <section>
                    <header>
                        <h2>Мы в соц.сетях</h2>
                    </header>
                    <ul class="social">
                        <li><a class="icon brands fa-facebook-f" href="http://facebook.com"><span class="label">Facebook</span></a>
                        </li>
                        <li><a class="icon brands fa-twitter" href="http://twitter.com"><span class="label">Twitter</span></a></li>
                        <li><a class="icon brands fa-dribbble" href="http://dribbble.com"><span class="label">Dribbble</span></a></li>
                        <li><a class="icon brands fa-tumblr" href="http://tumblr.com"><span class="label">Tumblr</span></a></li>
                        <li><a class="icon brands fa-linkedin-in" href="http://linkedin.com"><span class="label">LinkedIn</span></a>
                        </li>
                    </ul>
                    <ul class="contact">
                        <li>
                            <h3>Адрес</h3>
                            <p>
                                Россия, Челябинск<br/>
                                Улица кожзаводская, дом 54Б<br/>
                                Офис 35
                            </p>
                        </li>
                        <li>
                            <h3>Mail</h3>
                            <p><a href="#">oof@mail.ru</a></p>
                        </li>
                        <li>
                            <h3>Номер</h3>
                            <p>89087052645</p>
                        </li>
                    </ul>
                </section>
            </div>
            <div class="col-12">

                <!-- Copyright -->
                <div id="copyright">
                    <ul class="links">
                        <li>&copy; Logris. Все права соблюдены.</li>
                        <li>Сайт сделал: <a href="">Viktor Bezdenezhnykh</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
