<?php

namespace Conection_DB;

use mysqli;

class Conection_DB
{



    public function  conect(){

        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','vedita_test');

        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);

        return $mysql;
    }

    public function close(){

    }
}