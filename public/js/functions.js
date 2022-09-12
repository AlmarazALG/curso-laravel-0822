//Funciones JS
$(document).ready(function () {
    $('.change_lang_menu').click(function () {
        var newLocale = $(this).data('locale_id');

        /*var URL_REQUEST = 'http://curso-laravel-agosto.com/changeLangGET/'+ newLocale;
        $.ajax({
            url: URL_REQUEST,
            method: 'GET',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            done: function (data) {
                location.reload();
            },
            error: function (data) {
                console.log(data);
            },
            beforeSend: function() {
            }
        });
*/

        var URL_REQUEST = 'http://curso-laravel-agosto.com/changeLang';
        $.ajax({
            url: URL_REQUEST,
            method: 'POST',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {newLocale: newLocale},
            success: function (data) {
                location.reload();
            },
            error: function (data) {
                console.log(data);
            },
            beforeSend: function() {
            }
        });
    });
});

$(document).ready(function () {
    $('.delete').click(function () {
        var newLocale = $(this).data('locale_id');

        var URL_REQUEST = 'http://curso-laravel-agosto.com/empleado.destroy';
        $.ajax({
            url: URL_REQUEST,
            method: 'DELETE',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {newLocale: newLocale},
            success: function (data) {
                location.reload();
            },
            error: function (data) {
                console.log(data);
            },
            beforeSend: function() {
            }
        });
    });
});