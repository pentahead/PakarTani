<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            position: relative;
        }
        .register-logo {
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            font-size: 50px;
            position: absolute;
            top: -160px;
            left: 50%;
            transform: translateX(-50%);
            color: #D8A800;
        }
        .register-btn {
            background-color: #D8A800;
            color: white;
            border: none;
            transition: all 0.3s ease;
        }
        .register-btn:hover {
            background-color: #D8A800;
        }
    </style>
</head>
<body>
    <div class="container register-container">
        <div class="register-logo">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" width="100">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center" style="font-weight: 600; font-family: 'Montserrat', sans-serif; font-size: 30px">Register</h1>
                        <div id="error-messages" class="alert alert-danger" style="display: none;">
                            <ul id="error-list"></ul>
                        </div>
                        <form id="register-form">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <button type="submit" class="btn register-btn btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#register-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                let formData = {
                    username: $('#username').val(),
                    password: $('#password').val(),
                    password_confirmation: $('#password_confirmation').val(),
                    alamat: $('#alamat').val(),
                    email: $('#email').val()
                };

                $.ajax({
                    url: "http://127.0.0.1:8000/api/register",
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function(response) {
                        window.location.href = '/login'; // Redirect to the login page
                    },
                    error: function(xhr) {
                        let errorMessages = xhr.responseJSON.errors;
                        $('#error-list').empty();
                        $.each(errorMessages, function(key, value) {
                            $('#error-list').append('<li>' + value[0] + '</li>');
                        });
                        $('#error-messages').show();
                    }
                });
            });
        });
    </script>
</body>
</html>
