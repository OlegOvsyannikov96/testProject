/* Авторизация */
$('.sign-in-btn').click(function(e) {
    e.preventDefault();

    $('.error-message').addClass('invisible');

    let login = $('input[name="login"]').val();
    let password = $('input[name="password"]').val();

    $.ajax({
        url: 'include/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'login': login,
            'password': password
        },
        success: function(data) {
            if(data.status) {
                    document.location.href = 'profile.php';
            } else {
                data.messages.forEach(function(message) {
                    $('.' + message[0]).removeClass('invisible').text(message[1]);
                });
            }
        }
    });
});

/* Регистрация */
$('.sign-up-btn').click(function(e) {
    e.preventDefault();

    $('.error-message').addClass('invisible');

    let login = $('input[name="login"]').val();
    let name = $('input[name="name"]').val();
    let email = $('input[name="email"]').val();
    let password = $('input[name="password"]').val();
    let password_confirm = $('input[name="password-confirm"]').val();

    $.ajax({
        url: 'include/signup.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'login': login,
            'name': name,
            'email': email,
            'password': password,
            'password-confirm': password_confirm
        },
        success: function(data) {
            if(data.status) {
                document.location.href = 'index.php';
            } else {
                data.messages.forEach(function(message) {
                    $('.' + message[0]).removeClass('invisible').text(message[1]);
                });
            }
        }
    });
});