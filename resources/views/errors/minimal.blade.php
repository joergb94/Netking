<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>

<script src="https://kit.fontawesome.com/7267d16efc.js" crossorigin="anonymous"></script>
<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-social.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/azzara.css') }}">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Sans:wght@300&family=Island+Moments&family=M+PLUS+1p&family=Playfair+Display:ital@1&family=Pushster&family=Roboto+Mono:wght@200&family=Roboto:wght@100&family=Shizuru&display=swap" rel="stylesheet">
<style>
    h4{
        color: #253858;
        margin-bottom: .8rem;
        position: relative;
        font-family: 'Raleway', sans-serif;
        font-size: 1.5rem;
    }
    p{
        margin-top: 0;
        margin-bottom: 1rem;
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        color: rgb(113, 120, 126);
        font-family: 'Lato', sans-serif;
    }
 
    .btn-round {
        border-radius: 30px !important;
        text-decoration: none;
    }

    .btn {
        font-size: 15px;
        font-weight: 600;
        padding: 9px 25px;
        border-width: 2px;
        box-shadow: 0 3px 8px 0 rgba(41,49,89,.15), inset 0 0 0 1px hsla(0,0%,100%,.1);
    }
    .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .btn:not(:disabled):not(.disabled) {
        cursor: pointer;
    }
    /*[404 error page]
--------------------------*/
    .error-content {
        padding: 0 0 70px;
    }
    .error-text{
        text-align: center;
    }
    .error {
        font-size: 180px;
        font-weight: 100;
    }
    @keyframes bob {
        0% {
            top: 0;
        }
        50% {
            top: 0.2em;
        }
    }
    .im-sheep {
        display: inline-block;
        position: relative;
        font-size: 1em;
        margin-bottom: 70px;
    }
    .im-sheep * {
        transition: transform 0.3s;
    }
    .im-sheep .top {
        position: relative;
        top: 0;
        animation: bob 1s infinite;
    }
    .im-sheep:hover .head {
        transform: rotate(0deg);
    }
    .im-sheep:hover .head .im-eye {
        width: 1.25em;
        height: 1.25em;
    }
    .im-sheep:hover .head .im-eye:before {
        right: 30%;
    }
    .im-sheep:hover .top {
        animation-play-state: paused;
    }
    .im-sheep .head {
        display: inline-block;
        width: 5em;
        height: 5em;
        border-radius: 100%;
        background: #253858;
        vertical-align: middle;
        position: relative;
        top: 1em;
        transform: rotate(30deg);
    }
    .im-sheep .head:before {
        content: '';
        display: inline-block;
        width: 80%;
        height: 50%;
        background: #253858;
        position: absolute;
        bottom: 0;
        right: -10%;
        border-radius: 50% 40%;
    }
    .im-sheep .head:hover .im-ear.one, .im-sheep .head:hover .im-ear.two {
        transform: rotate(0deg);
    }
    .im-sheep .head .im-eye {
        display: inline-block;
        width: 1em;
        height: 1em;
        border-radius: 100%;
        background: white;
        position: absolute;
        overflow: hidden;
    }
    .im-sheep .head .im-eye:before {
        content: '';
        display: inline-block;
        background: black;
        width: 50%;
        height: 50%;
        border-radius: 100%;
        position: absolute;
        right: 10%;
        bottom: 10%;
        transition: all 0.3s;
    }
    .im-sheep .head .im-eye.one {
        right: -2%;
        top: 1.7em;
    }
    .im-sheep .head .im-eye.two {
        right: 2.5em;
        top: 1.7em;
    }
    .im-sheep .head .im-ear {
        background: #253858;
        width: 50%;
        height: 30%;
        border-radius: 100%;
        position: absolute;
    }
    .im-sheep .head .im-ear.one {
        left: -10%;
        top: 5%;
        transform: rotate(-30deg);
    }
    .im-sheep .head .im-ear.two {
        top: 2%;
        right: -5%;
        transform: rotate(20deg);
    }
    .im-sheep .body {
        display: inline-block;
        width: 7em;
        height: 7em;
        border-radius: 100%;
        background: #0054D1;
        position: relative;
        vertical-align: middle;
        margin-right: -3em;
    }
    .im-sheep .im-legs {
        display: inline-block;
        position: absolute;
        top: 80%;
        left: 10%;
        z-index: -1;
    }
    .im-sheep .im-legs .im-leg {
        display: inline-block;
        background: #141214;
        width: 0.5em;
        height: 2.5em;
        margin: 0.2em;
    }
    .im-sheep::before {
        left: 0;
        content: '';
        display: inline-block;
        position: absolute;
        top: 112%;
        width: 100%;
        height: 18%;
        border-radius: 100%;
        background: rgba(0, 0, 0, 0.2);
    }
</style>
</head>
    <body class="antialiased">
        <div class="error-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="error-text">
                            <h1 class="error">@yield('code')</h1>
                            <div class="im-sheep">
                                <img class="img-fluid x-auto d-block" src="{{ asset('img/errors.png') }}" alt="Chania">
                            </div>
                            <h4>Oops! This page Could Not Be Found!</h4>
                            <p>@yield('message')</p>
                            <a href="/" class="btn btn-warning-keypl btn-round">
                                <h2><i class="fas fa-home"></i></h2>
                                back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
