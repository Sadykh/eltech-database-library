<?php

/* @var $this yii\web\View */

$this->title = 'Главная страница';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Здравствуйте!</h1>

        <p class="lead">Добро пожаловать на демо библиотеку.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3">
                <h2>Куда вы попали?</h2>

                <p>Вы находитесь в электронной библиотеке. Данная электронная библиотека была написана в рамках
                    практической работы по дисциплине «Базы данных» в СПбГЭТУ «ЛЭТИ»</p>
                <p>Сайт работает только для ознакомительного характера. Гарантия сохранности данных отсутствует.</p>
            </div>

            <div class="col-lg-9">
                <h2>Как это всё работает?</h2>
                <p>В данном проекте используется стек технологий: php 7.1, nginx и база данных mysql. Для ускорения
                    разработки используется веб-фреймворк Yii2, а база данных - mariadb в виду ее более адекватной
                    производительности. Для быстрого развертывания и одинаковой среды используются docker
                    контейнеры.</p>

                <p>В проекте реализованы типичные операции CRUD для таблиц базы данных: create, read, update, delete.
                    Также используются дополнительные операторы для поиска по базе данных.</p>

                <p>
                    Чтобы увидеть полный функционал, вам нужно авторизоваться или пройти процедуру регистрации
                    пользователя (смотрите в верхнем правом углу).
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2>Разработчики</h2>

                <p>
                    Данную работу сделала бригада из студентов группы 5301:
                </p>
                <ul>
                    <li><a href="https://freelansim.ru/freelancers/Sadykh">Садыхов Садых</a></li>
                    <li><a href="https://freelansim.ru/freelancers/EvgeniiDolenko">Доленко Евгений</a></li>
                    <li>Манаков Денис</li>
                </ul>

                <p>Исходный код доступен на <a href="https://github.com/Sadykh/eltech-database-library">Github</a></p>
                <p>Принимаем ваши письма на адрес: <a href="mailto:me@sadykh.ru">me@sadykh.ru</a></p>

            </div>
            <div class="col-lg-6">
                <h2>Donate</h2>
                <p>Стипендии у нас нет. За любую безвозмездную помощь будем благодарны.</p>
                <ul>
                    <li><b>BTC:</b> <a
                                href="https://chainz.cryptoid.info/btc/address.dws?347qwDtFqSepJV3D43q8bqW1XPPcKqFwn9.htm">347qwDtFqSepJV3D43q8bqW1XPPcKqFwn9</a>
                    </li>
                    <li><b>ETH:</b> <a href="https://etherscan.io/address/0xd2b512d9fa83858bff218713f02f9fd17b630cd1">0xd2b512d9fa83858bff218713f02f9fd17b630cd1</a>
                    </li>
                    <li><b>DASH:</b> <a
                                href="https://chainz.cryptoid.info/dash/address.dws?7pYP4ZpmRCQvSJYRtVVwEK5GzkiK1qyAwH.htm">7pYP4ZpmRCQvSJYRtVVwEK5GzkiK1qyAwH</a>
                    </li>
                    <li><b>LTC:</b> <a
                                href="https://chainz.cryptoid.info/ltc/address.dws?LNYuhjMRPQWZxMuTKpHvepsmw42Pok3dTa.htm">LNYuhjMRPQWZxMuTKpHvepsmw42Pok3dTa</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
