$(function() {
    $( "#sortable tbody" ).sortable({
        update: function(event, ui){
            var listOrder = $(this).sortable('toArray').toString();
            $.post($(this).parent('#sortable').attr('data-link'), {
                order : listOrder
            });
        }
    });
    
    $('.js_activated').click(function(event){
        event.preventDefault();
        var btn_activated = $(this);
        $.ajax({
           url: $(this).attr('data-link'),
           type: "post",
           data: {id:$(this).attr('data-id')},
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
           data: {id:$(btn_remove).attr('data-id')},
           dataType: "json",
           success: function(){
               $(btn_remove).parent('td').parent('tr').remove();
           }
        });
    });
});