<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vue Draggable</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <div class="container">

                <div id="main">
                    <h1>Vue Draggable For</h1>

                    <div class="drag">
                        <h2>Draggable</h2>
                        <draggable :list="list" class="dragArea">
                            <div v-for="element in list">@{{ element.name }}</div>
                        </draggable>
                    </div>

                    <button @click="add">Add</button>
                    <button @click="replace">Replace</button>
                </div>

            </div>
        </div>>

        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $(document).ready( function () {
                    new Vue({
                    el: "#main",
                    data: {
                        list: [
                            { name: "John" },
                            { name: "Joao" },
                            { name: "Jean" }
                        ]
                    },
                    methods: {
                        add() {
                            this.list.push({ name: 'Juan' });
                        },
                        replace() {
                            this.list=[{ name: 'Edgard' }];
                        }
                    }
                });
            });
        </script>
    </body>
</html>
