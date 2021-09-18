$(function() {

    $(document).ready(function() {
        $('button').click(function() {
            switch ($(this).attr('id')){
                case 'pls':
                    //alert('pls '+$(this).val());
                    qantityPlus($(this).val());
                    break;
                case 'min':
                    qantityMinus($(this).val());
                    break;
                case 'btHide':
                    // alert('hide '+$(this).val());
                    hideProduct($(this).val())
                    break;
            }
        });
    });
})

    function qantityMinus(elem) {
        if($('#qntt' + elem).text()!=0){
            $('#qntt' + elem).text($('#qntt'+elem).text()-1);
            $.ajax({
                url:"/",
                type:"POST",
                dataType:"text",
                data:({
                   funcName:"min",
                   id:elem
                })
            });
        }
    }

    function qantityPlus(elem){
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
        $('#row' + elem).toggleClass('hide');
        $.ajax({
            url:"/",
            type:"POST",
            dataType:"text",
            data:({
                funcName:"hide",
                id:elem
            })
        });
    }