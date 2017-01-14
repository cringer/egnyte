<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Egnyte - Snowline Hospice</title>

        <link href="https://fonts.googleapis.com/css?family=Exo+2:500" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

        <style>
            a, a:link, a:visited, a:hover, a:focus, a:active {
                color: #4d4d4d;
                text-decoration: none;
            }
            body
            {
                font-family: 'Exo 2', sans-serif;
                background-image: url("images/slh-bg.jpg");
                background-position: center;
                background-size: 1440px;
                background-repeat: no-repeat;
            }
            .wrap-inline-block {
                font-size: 0.0001px;
                text-align: center;
            }
            .wrap-inline-block:before {
                content: '';
                display: inline-block;
                height: 100%;
                vertical-align: middle;
            }
            .inner-inline-block {
                display: inline-block;
                vertical-align: middle;
                position: relative;
                width: 80%;
            }
            .inner-inline-block img {
                position: absolute;
                top: 0;
                right: 0;
            }
            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="wrap-inline-block">
            <div class="inner-inline-block">
                <a class="title" href="{{ url('/newhire') }}">
                    <i class="fa fa-fire" aria-hidden="true"></i><br />Egnyte
                </a>
                <img src="images/slh-logo.png" />
            </div>
        </div>
    </body>
</html>