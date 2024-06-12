<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            position: relative;
        }
        .login-logo {
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            font-size: 50px;
            position: absolute;
            top: -160px;
            left: 50%;
            transform: translateX(-50%);
            color: #D8A800;
        }
        .login-btn {
            background-color: #D8A800;
            color: white;
            border: none;
            transition: all 0.3s ease;
        }
        .login-btn:hover {
            background-color: #D8A800;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="login-logo">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" width="100">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center" style="font-weight: 600; font-family: 'Montserrat', sans-serif; font-size: 30px">Login</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form id="login-form" method="POST" action="http://127.0.0.1:8000/login">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn login-btn btn-block">Login</button>
                        </form>
                        <br>
                        <p class="text-center"><a href="/register">Register?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</body>
</html>
