# Diverge
![](https://img.shields.io/badge/php-7.4-blue?logo=php)

## Описание

Класс на PHP, который валидирует наценку/скидку между текущей ценой и предыдущей.

## Установка

Добавить в `composer.json`

```
"repositories": [
    ...
    {
      "type": "vcs",
      "url": "https://github.com/dkinev/diverge.git"
    }
  ]
```

Запустить

```
composer require --prefer-dist dkinev/diverge dev-main
```

или добавить

```
"dkinev/diverge": "dev-main"
```

в `composer.json`.

## Использование

Создать новый экземпляр класса

```injectablephp
$diverge = new \dkinev\diverge\Diverge();

// Проверить подходит ли новая цена
$isValid = $diverge(200, 50);

// Получить отклонение цены в %
$diff = $diverge->getDeviation();
```

## Тестирование

### Psalm тестирование

-------------

Покрытие кода тестированием Psalm

Установка dev:
```
composer require --dev vimeo/psalm
```

Запуск проверки:
```
./vendor/bin/psalm .
```

### Unit тестирование

-------------

Покрытие кода Unit тестированием

Установка dev:
```
composer require --dev phpunit/phpunit
```

Запуск проверки:
```
./vendor/bin/phpunit Test/
```
