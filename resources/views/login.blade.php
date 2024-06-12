<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form id="login-form" method="POST" action="http://127.0.0.1:8000/login">
        @csrf
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#login-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: '/api/login',
            type: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            data: {
                username: $('#username').val(),
                password: $('#password').val(),
            },
            success: function(response) {
                localStorage.setItem('token', response.token);
            },
            error: function(error) {
                console.error('Login failed:', error);
                alert('Login failed. Please check your credentials and try again.');
            }
        });
    });
</script>
</body>
</html>