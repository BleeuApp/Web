<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome - Landing Page</title>
    <link href="{{ Asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container text-center" style="margin-top: 100px;">
        <img src="{{ Asset('assets/img/logo.png') }}" alt="Logo" style="max-width:200px;">
        <h1>Welcome to Our Service</h1>
        <p>Select your portal:</p>
        <a href="{{ Asset('admin') }}" class="btn btn-primary m-2">Admin Login</a>
        <a href="{{ Asset(env('store') . '/login') }}" class="btn btn-success m-2">Store Login</a>
    </div>
</body>

</html>
