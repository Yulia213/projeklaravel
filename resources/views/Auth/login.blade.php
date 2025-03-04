<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Global Styles */
body {
    font-family: Arial, sans-serif;
    background-color:rgb(235, 235, 235);
    color: #fff;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    width: 40%;
    padding: 20px;
    background-color: rgb(255, 255, 255);
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(172, 158, 158, 0.3);
    text-align: center;
}

h2 {
    font-size: 2rem;
    text-align: center;
    color: rgb(0, 0, 0);
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    font-size: 1rem;
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    color: black;
}

input[type="email"], input[type="password"] {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 2px solid #444;
    background-color: #fff;
    border-radius: 5px;
    box-sizing: border-box;
    transition: 0.3s;
}

input[type="email"]:focus, input[type="password"]:focus {
    border-color: #c6ff00;
    outline: none;
    box-shadow: 0 0 10px #c6ff00;
}

.btn-primary {
    background-color:rgb(0, 0, 0);
    color: #fff;
    padding: 12px 20px;
    font-size: 1.2rem;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    width: 100%;
}

.btn-primary:hover {
    background-color: #aaff00;
    transform: scale(1.05);
}

.alert {
    background-color: #f8d7da;
    color: #721c24;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
}

p {
    margin-top: 15px;
    color: #34495E;
}

a {
    color: #4A628A;
    font-weight: bold;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Responsiveness */
@media (max-width: 768px) {
    .login-container {
        width: 80%;
    }
}

    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

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

    <form action="{{ url('login') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </form>
</div>

</body>
</html>