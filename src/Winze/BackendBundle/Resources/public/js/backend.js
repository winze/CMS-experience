$(function() {
    $( "#sortable tbody" ).sortable({
        update: function(event, ui){
            var listOrder = $(this).sortable('toArray').toString();
            $.post($(this).parent('#sortable').attr('data-link'), {
                order : listOrder
            });
        }
    });
    tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        theme_advanced_buttons1: "mylistbox,mysplitbutton,bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,link,unlink",
        theme_advanced_buttons2: "",
        theme_advanced_buttons3: "",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        plugins: "fullscreen",
        theme_advanced_buttons1_add: "fullscreen"
    });

    
    $('.js_activated').click(function(event){
        event.preventDefault();
        var btn_activated = $(this);
        $.ajax({
            url: $(this).attr('data-link'),
            type: "post",
            data: {
                id:$(this).attr('data-id')
            },
            dataType: "json",
            success: function(retour){
                if(retour.status){
                    $(btn_activated).attr('title','Visible');
                    $(btn_activated).html('<span class="badge badge-success"><i class="icon-ok icon-white"></i></span>');
                }else{
                    $(btn_activated).attr('title','Non visible');
                    $(btn_activated).html('<span class="badge badge-important"><i class="icon-remove icon-white"></i></span>');
                }
            }
        });
    });
    $('.js_diaporama_remove').click(function(event){
        event.preventDefault();
        var btn_remove = $(this);
        $.ajax({
            url: $(btn_remove).attr('data-link'),
            type: "post",
            data: {
                id:$(btn_remove).attr('data-id')
            },
            dataType: "json",
            success: function(){
                $(btn_remove).parent('td').parent('tr').remove();
            }
        });
    });
});