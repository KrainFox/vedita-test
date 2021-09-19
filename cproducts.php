<?php

namespace CProducts;
//Созданый класс для подключения к БД
use Conection_DB\Conection_DB;

require 'conection_db.php';

class CProducts
{

    public function getProducts($count){ // параметр: который отвечает за ограничение количества выводимых товаров.
        $conect = new Conection_DB();//Создания объекта подключения к БД
        $mysql = $conect->conect();//подключаемся к БД
        $query = $mysql->query(
            "SELECT `id`,`product_name`,`product_price`,`product_article`,
        `product_quantity`,DATE_FORMAT(date_create , '%d.%m.%y %H:%i:%s') AS `date_create`  FROM `products` WHERE 
        `product_hidden`=1 ORDER BY `date_create` LIMIT ".$count);
        //Запрос к БД.
        //Можно было создать хранимые функции и процедуры,
        // но для удобства проверки задания текст запроса размещен прям в PHP коде
        $mysql->close();
        //Закрытия подключения и возвращение данных полученных с БД. Остальные функции имеют схожую структуру, имеют только разные запросы к БД
        return $query;
    }

    public function productQuantityPlus($id){//параметр: ID строки в таблице которую необходимо поменять
        $conect = new Conection_DB();        //В задании не было сказано по какому полю происходит поиск нужной строки "ID" или "PRODUCT_ID", поэтому выбрал сам
        $mysql = $conect->conect();
        $query = $mysql->query('UPDATE `products` SET `product_quantity`
        = `product_quantity`+1 WHERE `id`='.$id);
        $mysql->close();
        return $query;
    }

    public function productQuantityMinus($id){//параметр: аналогично предыдущей функции
        $conect = new Conection_DB();
        $mysql = $conect->conect();
        $query = $mysql->query('UPDATE `products` SET `product_quantity`
        = `product_quantity`-1 WHERE `id`='.$id);
        $mysql->close();
        return $query;
    }

    public function productHidden($id){//параметр: аналогично предыдущей функции
        $conect = new Conection_DB();
        $mysql = $conect->conect();
        $query = $mysql->query('UPDATE `products` SET `product_hidden`
        = 0 WHERE `id`='.$id);
        $mysql->close();
        return $query;
    }

}