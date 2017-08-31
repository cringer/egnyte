<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vue Table Component</title>

        <!-- Styles -->
        <link href="{{ asset('css/table-component.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app" class="container">
            <table-component
                :data="[
                { firstName: 'John', birthday: '04/10/1940', songs: 72 },
                { firstName: 'Paul', birthday: '18/06/1942', songs: 70 },
                { firstName: 'George', birthday: '25/02/1943', songs: 22 },
                { firstName: 'Ringo', birthday: '07/07/1940', songs: 2 },
                ]"
                sort-by="songs"
                sort-order="asc"
                >
                <table-column show="firstName" label="First name"></table-column>
                <table-column show="songs" label="Songs" data-type="numeric"></table-column>
                <table-column show="birthday" label="Birthday" :filterable="false" data-type="date:DD/MM/YYYY"></table-column>
            </table-component>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
