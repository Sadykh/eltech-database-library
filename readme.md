Eltech-database-library
=

Проект сделан в рамках дисциплины "База данных" в СПБ ГЭТУ ЛЭТИ. Носит демонстративный характер, показывается базовые операции CRUD (create, read, update и delete) при работе с базой данных.

Развертывание проекта
--
1. Для начала нужно развенуть репозиторий
```bash
git@github.com:Sadykh/eltech-database-library.git
``` 
2. Затем нужно запустить систему виртуализации (docker) для создания нужного окружения. Для этого в директории проекта нужно выполнить следующую команду:
```bash
docker-compose up -d
```
3. Затем нужно установить все пакеты и применить миграции. Для этого нам нужно зайти в изолированный контейнер и выполнить ряд команд:
```bash
docker exec -it eltech_library_php bash
cd /www
composer install
php yii migrate
```
4. Далее в файле hosts (пути в Windows и Linux могут различаться) нужно добавить запись:
```
127.0.0.1	local.eltech-library.ru
```
5. Проект запущен и доступен по адресу local.eltech-library.ru