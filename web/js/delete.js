// delete information
$('body').delegate('.delete-button', 'click', function(e) {
    e.preventDefault();
    const url = $(this).attr('href');
    const language = $(this).attr('data-id');

    let title = 'Are you sure?';
    let text = 'You won\'t be able to revert this!';
    let yes = 'Yes, delete it!';
    let no = 'No, cancel!';
    let canceled = 'Canceled.';
    let canceledText = 'Deletion canceled!';

    if (language === 'uz') {
        title = 'Ishonchingiz komilmi?';
        text = 'Siz buni qaytarib ololmaysiz!';
        yes = 'Ha, o\'chirilsin!';
        no = 'Yo\'q, bekor qiling!';
        canceled = 'Bekor qilindi.';
        canceledText = 'Yo\'q qilish bekor qilindi!';
    }

    if (language === 'ru') {
        title = 'Ты уверен?';
        text = 'Вы не сможете отменить это!';
        yes = 'Да удалите!';
        no = 'Нет, отменить!';
        canceled = 'Отменено.';
        canceledText = 'Удаление отменено!';
    }

    Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: yes,
        cancelButtonText: no,
        reverseButtons: true
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                url: url,
                type:'GET',
                success: function(response){
                    if(response['status'] === 'true'){
                        Swal.fire(
                            response['saved'],
                            '',
                            'success'
                        );
                        setTimeout(location.reload.bind(location), 1200);
                    } else {
                        Swal.fire(
                            response['error'],
                            '',
                            'error'
                        );
                        setTimeout(location.reload.bind(location), 1200);
                    }

                }
            });
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                canceled,
                canceledText,
                'error'
            )
        }
    });
});