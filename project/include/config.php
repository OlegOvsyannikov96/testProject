<?php

define('SIGN_IN', 0); // признак того, что обращение идет с сервера авторизации
define('SIGN_UP', 1); // признак того, что обращение идет с сервера регистрации
define('PATH', __DIR__ . "/db/file.json"); // Путь к файлу данных пользователей
define('XHR', "XMLHttpRequest"); // признак того, что запрос от ajax

/*
    Костыль для класса Validator, так как не нашел 
    нужных мне функций для проверки полей пользователя,
    а регулярки пока не освоил
*/
define('LATIN', "AABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
define('CYRILLIC', "аабвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ");
define('CHECK_NUMBERS', "00123456789");
define('CHECK_ALPHABET', LATIN . CYRILLIC);
define('CHECK_ALPHABET_AND_NUMBERS', CHECK_NUMBERS . LATIN . CYRILLIC);

/*
    Коды сообщений класса Validator и их описание
    LE  - ошибки логина
    EE  - ошибки email-а
    NE  - ошибки имени пользователя
    PE  - ошибки пароля
    PCE - ошибки поля подтверждения пароля
*/
define('LE1', 'login cannot be empty!');
define('LE2', 'login cannot contain "space"!');
define('LE3', 'login cannot be < 6 symbols!');

define('EE1', 'email cannot be empty!');
define('EE2', 'email incorrect!');

define('NE1', 'name cannot be empty!');
define('NE2', 'name must be composed of letters!');
define('NE3', 'name cannot be < 2 letters!');

define('PE1', 'password cannot be empty!');
define('PE2', 'password must be composed of letters and numbers!');
define('PE3', 'password cannot be < 6 symbols!');

define('PCE1', 'password-confirm cannot be empty!');
define('PCE2', 'password-confirm and password must match!');

/*
    Коды сообщений сервера регистрации и их описание
    RS  - успешная регистрация
    CE  - ошибка соединения с json файлом
    SEE - ошибки логина на сервере
    SLE - ошибки логина на сервере
*/
define('CE', 'connection error!');
define('SEE', 'email already exists!');
define('SLE', 'user already exists!');

/*
    Коды сообщений сервера авторизации и их описание
    APE  - ошибки пароля на сервере
    ALE  - ошибки логина на сервере
*/
define('APE', 'password incorrect!');
define('ALE', 'user does not exist!');