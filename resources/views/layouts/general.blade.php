<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts/head')

<body>

    <div class="cotainer">

        @include('layouts/nav')

        <main>

            <hr>
            @yield('content')
        </main>

    @include('layouts/footer')
</body>

</html>