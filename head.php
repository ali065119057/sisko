<?php  ?>
<html>
<!-- Head START -->

<head>

    <title>SIsKO 1.0.10</title>

    <!-- Meta START -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <!-- Meta END -->

    <!--[if lt IE 9]>
    <script src="../asset/js/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Global style START -->
    <link type="text/css" rel="stylesheet" href="asset/css/materialize.css">
    <style type="text/css">
        body {
            background: #fff;
        }

        .bg::before {
            content: '';
            background-image: url('./asset/img/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            position: absolute;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0.15;
            filter: alpha(opacity=15);
            height: 100%;
            width: 100%;
        }

        @media only screen and (min-width: 993px) {
            .container {
                width: 60% !important;
            }
        }

        .container {
            max-width: 100%;
            margin-top: 5rem;
        }

        #logo {
            display: block;
            margin: -20px auto -5px;
        }

        img {
            border-radius: 50%;
            margin: 0 auto;
            width: 100px;
            height: 100px;
        }

        #smk {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .batas {
            border-bottom: 1px dotted #444;
            margin: 0 auto;
            width: 90%;
        }

        #title {
            margin: 5px 0 35px;
        }

        .btn-large {
            font-size: 1.25rem;
            margin: 0;
        }

        #alert-message {
            border-radius: 3px;
            color: #f44336;
            font-size: 1.15rem;
            margin: 15px 15px -15px;
        }

        .error {
            padding: 10px;
        }

        .upss {
            font-size: 1.2rem;
            margin-left: 20px;
        }

        .pace {
            -webkit-pointer-events: none;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            -webkit-transform: translate3d(0, -50px, 0);
            -ms-transform: translate3d(0, -50px, 0);
            transform: translate3d(0, -50px, 0);
            -webkit-transition: -webkit-transform .5s ease-out;
            -ms-transition: -webkit-transform .5s ease-out;
            transition: transform .5s ease-out;
        }

        .pace.pace-active {
            -webkit-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .pace .pace-progress {
            display: block;
            position: fixed;
            z-index: 2000;
            top: 0;
            right: 100%;
            width: 100%;
            height: 3px;
            background: #2196f3;
            pointer-events: none;
        }

        noscript {
            color: #42a5f5;
        }

        .input-field label {
            font-size: 1.2rem;
        }

        .input-field label.active {
            font-size: 1rem;
        }
    </style>
    <!-- Global style END 

</head>
     Head END -->

</html>