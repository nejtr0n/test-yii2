# Readme
#### Запуск
```
docker-compose up
```

#### Миграции
```
docker-compose run php php yii migrate
```

#### Сиды
```
docker-compose run php php yii seed
```

#### Проверка
После этого по адресу проверяем через curl
```
curl http://localhost/v1/books
```
```
curl http://localhost/v1/authors
```