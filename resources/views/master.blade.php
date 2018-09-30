<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
     @yield('content')

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      @yield('script')
    </script>
  </body>
</html>
