<?php

namespace CProducts;

use Conection_DB\Conection_DB;

require 'conection_db.php';

class CProducts
{

    public function getProducts($count){
        $conect = new Conection_DB();
        $mysql = $conect->conect();
        $query = $mysql->query(
            "SELECT `id`,`product_name`,`product_price`,`product_article`,
        `product_quantity`,DATE_FORMAT(date_create , '%d.%m.%y %H:%i:%s') AS `date_create`  FROM `products` WHERE 
        `product_hidden`=1 ORDER BY `date_create` LIMIT ".$count);
        $mysql->close();
        return $query;
    }

    public function productQuantityPlus($id){
        $conect = new Conection_DB();
        $mysql = $conect->conect();
        $query = $mysql->query('UPDATE `products` SET `product_quantity`
        = `product_quantity`+1 WHERE `id`='.$id);
        $mysql->close();
        return $query;
    }

    public function productQuantityMinus($id){
        $conect = new Conection_DB();
        $mysql = $conect->conect();
        $query = $mysql->query('UPDATE `products` SET `product_quantity`
        = `product_quantity`-1 WHERE `id`='.$id);
        $mysql->close();
        return $query;
    }

    public function productHidden($id){
        $conect = new Conection_DB();
        $mysql = $conect->conect();
        $query = $mysql->query('UPDATE `products` SET `product_hidden`
        = 0 WHERE `id`='.$id);
        $mysql->close();
        return $query;
    }

}