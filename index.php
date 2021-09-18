<?php
require 'cproducts.php';

use CProducts\CProducts;

$prod = new CProducts();
$data = $prod->getProducts(10);
$i=1;

if(!empty($_POST) ){
    switch ($_POST['funcName']){
        case "min":
            $prod->productQuantityMinus($_POST['id']);
            break;
        case "pls":
            $prod->productQuantityPlus($_POST['id']);
            break;
        case "hide":
            $prod->productHidden($_POST['id']);
            break;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="button.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="wrapper">
            <div class="content">
                <table>
                    <tr>
                        <th>Наименование</th>
                        <th>Цена</th>
                        <th>Артикул</th>
                        <th></th>
                        <th>Количество</th>
                        <th></th>
                        <th>Дата создания</th>
                        <th></th>
                    </tr>
                    <?php
                    while($row = $data->fetch_assoc()){
                        echo
                    '<tr id="row'.$row['id'].'">' .
                        '<th>'.$row['product_name'].'</th>'.
                        '<th>'.$row['product_price'].'</th>'.
                        '<th>'.$row['product_article'].'</th>'.
                        '<th><button id="min" value="'.$row['id'].'">-</button></th>'.
                        '<th id="qntt'.$row['id'].'">'.$row['product_quantity'].'</th>'.
                        '<th><button id="pls" value="'.$row['id'].'">+</button></th>'.
                        '<th>'.$row['date_create'].'</th>'.
                        '<th><button id="btHide" value="'.$row['id'].'">Скрыть</button></th>'.
                    '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>