 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Avisen.me - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link href="{{ asset('css/main.css') }}" rel="stylesheet">
       <script src="{{ asset('js/app.js')}}" type="text/javascript" charset="utf-8"></script>

       <!-- favicons -->
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/site.webmanifest">

      <!-- Scripts -->

      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
      <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

      
      <script src="{{asset('js/auto-complete.min.js')}}"></script>
      <link rel="stylesheet" href="{{asset('css/auto-complete.css')}}">



        <!-- Styles -->
        <style>
          
           html {
            position: relative;
            min-height: 100%;
          }
          body {
            margin-bottom: 60px; /* Margin bottom by footer height */
          }
          .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px; /* Set the fixed height of the footer here */
            line-height: 60px; /* Vertically center the text there */
           
          }

        </style>
</head>