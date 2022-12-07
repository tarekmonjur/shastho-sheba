<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | {{$title or ''}}</title>
    <!-- Styles -->
    <link href="{{asset('assets/admin/css/app.css')}}" rel="stylesheet">
    <style>
        .form-control{border-radius: 0px!important;}
        .mt50{margin-top: 50px;}
        .panel-heading h3{font-weight: bold;}
        .control-label{padding-right: 0px!important; font-size: 14px;}
        .logo{margin: auto!important; width: 160px!important;}
    </style>
</head>
<body>

<div id="app">
    @yield('content')
</div>

<nav class="navbar navbar-fixed-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 pull-right text-center" style="margin-bottom: 10px">
                Design & Developed
                <h4>CodevelSoft.com</h4>
            </div>
        </div>
    </div>
</nav>

<script src="{{asset('assets/admin/js/app.js')}}"></script>
</body>
</html>