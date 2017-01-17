$('#registr').on('submit', function (e) {
    e.preventDefault();
    $('#result').html('');
    $.ajax({
        type: 'POST',
        url: 'scripts/ajaxRegister.php',
        data: $(this).serialize(),
        dataType: 'json',
        async: true,
        success: function (data) {
            var yourRes = $('#result');
            if(data) {
                var error = data['error'],
                    res = data['data'],
                    addData = '';
                if(error !== '')
                {
                    addData = error;
                }
                else
                {
                    $.each(res, function (_i, _val) {
                        addData += '<li>Имя поля: ' + _i + '</li>';
                        addData += '<li>Значение поля: ' + _val + '</li>';
                    });

                    $('[data-dismiss="modal"]').on('click', function () {
                        window.location = window.location.href  + '/scripts/ajaxRegister.php?getcheck=true&' + $('#registr').serialize();
                    })
                }

                yourRes.append("<h2 class='text-center bold'><ul>" + addData + "</ul></h2>");

                $('#resModal').modal();
            }
            else
            {
                yourRes.val('Заполните пожалуйста обязательные поля!');
            }
        }
    });
});