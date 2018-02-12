<!DOCTYPE html>
<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{url('css/materialize.min.css')}}"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{{url('css/materialize-colorpicker.min.css')}}"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
            
        @yield('content')

          <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="{{url('js/jquery-1.12.4.min.js')}}"></script>
        <script type="text/javascript" src="{{url('js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{url('js/materialize-colorpicker.min.js')}}"></script>

        @yield('footer')
    </body>
</html>
    