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
      $('#tmbhbtn').on('click', function() {
        $('#tmbhform').submit();
      });

      $('#edtbtn').on('click', function() {
        $('#edtform').submit();
      });

      $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nama = button.data('nama')
        var email = button.data('email')
        var id = button.data('id')
        var kota = button.data('kota')
        var tahun = button.data('tahun')
        var modal = $(this)
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #edtid').val(id);
        modal.find('.modal-body #kota').val(kota);
        modal.find('.modal-body #tahun').val(tahun);
      })

      $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('.modal-body #delid').val(id);
      })
    </script>
  </body>
</html>
