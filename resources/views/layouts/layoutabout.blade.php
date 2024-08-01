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
        .rr___Container-module__container___kYNEt {
            color: #fff;
            padding: 40px 0;
        }

        .rr___Footer-module__logo_contact_navs___hIUag {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .rr___Footer-module__logo_and_contact___uZ8dP {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            width: 100%;
            max-width: 500px;
        }

        .rr___Footer-module__tiket_logo___IO10Y {
            margin-bottom: 20px;
        }

        .rr___Footer-module__contacts_container___ABr01 {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .rr___Footer-module__contact___udm6N {
            display: flex;
            align-items: center;
        }

        .rr___Footer-module__contact_image___sC2F5 {
            margin-right: 10px;
            font-size: 2.5rem;
        }

        .rr___Footer-module__contact_title___Afy_E {
            font-size: 1rem;
            font-weight: bold;
        }

        .rr___Footer-module__contact_info___bhEm_ {
            font-size: 0.9rem;
        }

        .rr___Footer-module__column_2___iQWgG {
            flex: 1;
            max-width: 300px;
            margin-top: 20px;
        }

        .rr___Footer-module__nav___O3GwE {
            display: flex;
            flex-direction: column;
        }

        .rr___Footer-module__link___HqcLA {
            color: #fff;
            text-decoration: none;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .rr___Footer-module__link___HqcLA:hover {
            color: #f1c40f;
        }

        .rr___Footer-module__divider___34Rog {
            border-top: 1px solid #fff;
            margin: 20px 0;
        }

        .rr___Footer-module__copyright___2kPz5 {
            text-align: center;
            font-size: 0.9rem;
        }
        .image-container {
            position: relative;
            width: 70%;
            height: 100%;
            margin: 3% auto;
            overflow: hidden;
        }

        .image-frame {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 5px solid #000;
            box-sizing: border-box;
        }

        .image-container img {
            display: block;
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="hold-transition">

@include('layouts.inc_tamu.navbar')

<div class="container-fluid p-0">
    <div class="image-container">
        <div class="image-frame"></div>
        <img src="images/banner.jpg" class="img img-fluid w-100">
    </div>
</div>

<div class="container content">
    @yield('content')
</div>

<x-footer/>

<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
