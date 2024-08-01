<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title.' | '.config('app.name') : config('app.name') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
    
        .container {
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            padding: 0 20px;
        }
    
        h1 {
            text-align: center;
            margin-top: 40px;
            color: #333;
        }
    
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
    
        .col-md-6 {
            flex: 0 0 48%;
            margin-bottom: 20px;
            background: #fff;
            padding: 20px;
        }
    
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    
        form {
            margin-top: 20px;
        }
    
        .form-group {
            margin-bottom: 20px;
        }
    
        label {
            font-weight: bold;
        }
    
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="hold-transition">

@include('layouts.inc_tamu.navbar')

<div class="container content">
@yield('content')
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted"><strong>Copyright &copy; 2022 Booking Hotel.</strong> All rights reserved.</span>
    </div>
</footer>

<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
