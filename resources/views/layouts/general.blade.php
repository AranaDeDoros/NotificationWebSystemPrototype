<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts/head')

<body>

    

        @include('layouts/nav')

        <main>

            
            @yield('content')
        </main>
    

    {{--@include('layouts/footer')--}}
</body>

</html>