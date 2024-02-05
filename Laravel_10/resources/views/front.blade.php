<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Timeline</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- AdminLTE css -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body>
    <!-- Site wrapper -->
    <div class="">
        <!-- Navbar -->
        @include('Components.navbar')
        <!-- /.navbar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="container pt-5">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        @include('Components.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#inputImage').change(function() {
                var input = this;
                var preview = $('#previewImage');

                var reader = new FileReader();
                reader.onload = function() {
                    preview.attr('src', reader.result)
                }

                if (input.files.length > 0) {
                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.attr('src', '');
                }
            });
            $('[id^="inputUpdate"]').change(function() {
                var input = this;
                var itemId = input.id.replace('inputUpdate', '');
                var preview = $('#previewUpdate' + itemId);

                var reader = new FileReader();
                reader.onload = function() {
                    preview.attr('src', reader.result);
                }

                if (input.files.length > 0) {
                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.attr('src', '');
                }
            });
        });
    </script>
</body>

</html>
