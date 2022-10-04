
Описание как развернуть проект
-

**1**. Выполните клонирование данного репозитория.
```shell script
git clone https://github.com/VadymTarasov/me-team.git dir_name
```

**2**. В папке с проектом введите команду

```shell script
composer update
```

**3**. Расширение прав доступа на редактирование и добавление файлов
```shell script
sudo chmod 777 -R dir_name/
```
**4**. В файле .env создайте подключение к базе данных

**5**. В папке с проектом введите следующие команды:
```shell script
php bin/console doctrine:database:create
```
```shell script
php bin/console doctrine:migrations:migrate
```

**6**. В папке с проектом введите команду

```shell script
symfony serve
```

#### Проект доступен по адресу

```shell script
 http://127.0.0.1:8000 
```
