$(document).ready(function () {
    $('ol').sortable({
        axis: 'y',
        stop: function () {
            var data = $(this).sortable('serialize');
            $.ajax({
                data: data,
                type: 'PUT',
                url: '/list'
            })
            .fail(function(){
                $(location).attr('href', '/');
                return false;
            });
        }
    });
    $('#form').submit(function(event) {
        var item = $('#name').val();
        if (item !== '') {
            var ol = $('#sortable');
            ol.find('li:first').clone(true).prependTo(ol);

            $.ajax({
                type: 'POST',
                data: {name: item},
                url: '/list'
            })
            .fail(function(){
                $(location).attr('href', '/');
                return false;
            })
            .done(function(data){
                var ol = $('#sortable').find('li:first');

                if(ol.length === 0){
                    $('#sortable').append('<li id="item-1">first <span id="1" class="padder">&#10005;</span></li>');
                    ol = $('#sortable').find('li:first');
                }

                var span = ol.find('span').attr("id",data.item.id);
                ol.attr('id','item-'+data.item.id);
                ol.text(data.item.name+' ').append(span);
            });
        }
        $('#name').val('');
        event.preventDefault();
    });
    $('body').on("click", ".padder", function() {
        var id = $(this).attr('id');
        $.ajax({
            type: 'DELETE',
            url: '/list/'+id
        })
        .fail(function(){
            $(location).attr('href', '/');
            return false;
        })
        .done(function(data){
            $('#item-'+data.id).remove();
        });
    });
});