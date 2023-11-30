function changeJokee(index) {
    let id = $('#hidden').val();
    if (id != '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/',
            type: "POST",
            data: {
                status: index,
                id: id
            }
        }).done(function (data) {
            if (typeof data == 'object') {
                $('._text').html(data.content);
                $('#hidden').val(data.id);
            } else {
                $('._text').html(data);
            }
        });
    }

}