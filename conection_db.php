<?php

namespace Conection_DB;

use mysqli; //встроенный драйвер для работы с MySQL

class Conection_DB //Класс для работы с БД
{
    public function  conect(){
        //данные для подключения к БД
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','vedita_test');
        // Объект подключения
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        //возвращение объекта подключения
        return $mysql;
    }

}