$(function() {//Обработчик нажатия на кнопки в таблице сделанный с помощью Jquery
    $(document).ready(function() {
        $('button').click(function() {
            switch ($(this).attr('id')){
                case 'pls':
                    qantityPlus($(this).val());
                    break;
                case 'min':
                    qantityMinus($(this).val());
                    break;
                case 'btHide':
                    hideProduct($(this).val())
                    break;
            }
        });
    });
})

    function qantityMinus(elem) {
        if($('#qntt' + elem).text()!=0){//проверка количества товара что бы не уходить в отрицательные значения
            $('#qntt' + elem).text($('#qntt'+elem).text()-1);//Изменение значения в представлении пользователя
            $.ajax({//Ajax функция отправки данных на сервер
                url:"/",//отправляем обратно в index.php
                type:"POST",//метод отправки данных
                dataType:"text",
                data:({
                   funcName:"min",//Парамет: имя функции которая будет вызываться в простеньком маршрутизаторе файла index.php
                   id:elem//ID товара значения которого должно поменяться
                })
            });
        }
    }

    function qantityPlus(elem){//Данная функция аналогична первой только нет проверки на отрицательно значение
        $('#qntt' + elem).text(+$('#qntt' + elem).text() + 1);
        $.ajax({
            url:"/",
            type:"POST",
            dataType:"text",
            data:({
                funcName:"pls",
                id:elem
            })
        });
    }

    function hideProduct(elem) {
        $('#row' + elem).toggleClass('hide');// Добовляем класс hide всей строке что бы запись пропала у пользователя,
                                            // а после отсылаем на сервер информацию для дальнейшей записи в БД что товар скрыт
        $.ajax({//функция Ajax аналогичная двум предыдущим
            url:"/",
            type:"POST",
            dataType:"text",
            data:({
                funcName:"hide",
                id:elem
            })
        });
    }