<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Starter Template</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.4/css/bootstrap.css" />
</head>
<body>
    <div class="container">
        <h1>Hello World</h1>

        @can('modify_settings')
            <a href="#">Edit Settings</a>
        @endcan
    </div>
</body>
</html>
