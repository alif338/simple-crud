<!DOCTYPE html>
<html lang="en" class="w-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cover Template · Bootstrap v5.0</title>


    <!-- Bootstrap core CSS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom styles for this template -->
    <link href={{ URL::asset("css/cover.css") }} rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header>
            <div>
                <h3 class="float-md-start mb-0">Todo List</h3>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="mt-auto text-white-50">
            <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
        </footer>
    </div>

    <script>
        var root_url = <?php echo json_encode(route('data')) ?>;
        var store = <?php echo json_encode(route('notes.store'))?>;
    </script>
    @stack('ajax_crud')

</body>

</html>
