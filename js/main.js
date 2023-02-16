
$('#login-btn').click(function (e) {
    e.preventDefault()
    let login = $('input[name="login"]').val();
    let password = $('input[name="password"]').val();
    $.ajax({
        url: 'inc/logon.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success: function (data) {
            if (data.status) {
                document.location.href = 'home.php'
            } else {
                $('#message').removeClass('none').text("Неверный логин или пароль");
            }
        }
    })
})

$('#register-btn').click(function (e) {
    e.preventDefault()
    let name = $('input[name="name"]').val();
    let login = $('input[name="login"]').val();
    let password = $('input[name="password"]').val();
    let confirm_password = $('input[name="confirm_password"]').val();
    let email = $('input[name="email"]').val();

    $.ajax({
        url: 'inc/verification.php',
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            login: login,
            password: password,
            confirm_password: confirm_password,
            email: email
        },
        success: function (data) {
            if (data.status_verification) {
                document.location.href = 'index.php'
            }
            data.status_login ? $('#errorLogin').text(data.error_login) : $('#errorLogin').text('');
            data.status_password ? $('#errorPassword').text(data.error_password) : $('#errorPassword').text('');
            data.status_name ? $('#errorName').text(data.error_name) : $('#errorName').text('');
            data.status_confirm_password ? $('#errorPasswordConfirm').text(data.error_confirm_password) : $('#errorPasswordConfirm').text('');
            data.status_email ? $('#errorEmail').text(data.error_email) : $('#errorEmail').text('');
        }
    })
})
