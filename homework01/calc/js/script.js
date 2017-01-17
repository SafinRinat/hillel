$('.form-horizontal').on('submit', function (e) {
    e.preventDefault();

    $('#result').html('');

    $.ajax({
        type: 'POST',
        url: 'scripts/ajax.php',
        data: $(this).serialize(),
        dataType: 'json',
        async: true,
        success: function (data) {
            var yourRes = $('#result');
            if(data) {
                var error = data['error'],
                    res = data['result'],
                    resulMultiplication = '',
                    multiplication = data['multiplication'],
                    finalResult = '';

                if(data['result'] !== '' && data['error'] === false && typeof (data['multiplication']) !== 'object')
                {
                    finalResult = res;
                }
                else if (typeof (data['multiplication']) === 'object')
                {
                    var enterNumber = $('#enter_number').val(),
                        counter = 0;

                    $.each(multiplication, function () {
                        resulMultiplication += '<li>' + enterNumber + 'x' + $(this)[0] + '=' + $(this)[1] + '</li>';
                    });


                    finalResult = "<ol>" + resulMultiplication + "</ol>";

                    $('[data-dismiss="modal"]').on('click', function () {
                        window.location = window.location.href  + 'scripts/ajax.php?getcheck=true' + $('.form-horizontal').serialize();
                    })
                }
                else
                {
                    finalResult = error;
                }
                yourRes.append("<h2 class='text-center bold'>" + finalResult + "</h2>");
                $('#resModal').modal();
            }else {
                yourRes.val('Для совершения расчета необходимо заполнить оба поля.');
            }
        }
    });
});