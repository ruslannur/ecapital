$(function() {

    $('div.main_content').on('click', 'button.reply', function () {
        //alert(1);
        var id = $(this).attr('id');
        $('input#parent_id').val(id);
        $('div#form_well').appendTo($('div#box-'+id));
        $('.show_main_reply_block').show();
    })


$('div.main_content').on('click', '#send_button', function(){
    var content = $.trim($('textarea#content').val());
    var user_name = $.trim($('input#user_name').val());
    if(content.length < 1 || user_name.length < 1) {
        alert('empty fields');
        return;
    }
    var data = $('#form1').serialize();
    console.log(data);

    $.ajax({
        url: '../comments/create',
        type: 'POST',
        data: data,
        success: function(res){
            //console.log(res);
            if(res == 'success') {
                load_content();
            } else {
                alert('Error!');
            }

        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
});

function load_content() {
    $.ajax({
        url: '../comments/content',
        type: 'GET',
        dataType: 'html',
        success: function(res){
            //console.log(res);
            $('div.main_content').empty();
            $('div.main_content').html(res);
        },
        error: function(){
            alert('Error!');
        }
    });
}

    $('div.main_content').on('click', '#main_reply_button', function() {
        $('input#parent_id').val(0);
        $('div#form_well').appendTo('div.hr');
        $('.show_main_reply_block').hide();
        //alert(4);
    });

});


