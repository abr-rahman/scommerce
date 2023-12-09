<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@props(['title' => null])

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ $title === null ? config('app.name') : $title . ' | ' . config('app.name') }}</title> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/fave-logo.jpg.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    {{--
    <link rel="stylesheet" href="/asset/plugins/daterangepicker/daterangepicker.css"> --}}
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/toastr/toastr.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    @stack('css')

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="{{ asset('asset/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

    <link rel="stylesheet" href="{{ asset('asset/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <style>
        .select2-container .select2-selection--single {
            height: 35px;
            padding: 5px;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
        }
        .tox-statusbar {
            display: none !important;
        }
        .card-body {
            background: #f1f1f1 !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            border: 1px solid #645d5d;
            border-radius: 4px !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: #000 !important;
        }
        .select2-container--default .select2-search--inline .select2-search__field {
           display: none !important;
        }
        .tox-tinymce {
            height: 78vh !important;
            font-size: 11px !important;
        }

        .tox-notification.tox-notification--in.tox-notification--warning {
            display: none !important;
        }
        .jconfirm .jconfirm-box .jconfirm-buttons button.btn-default {
            background-color: #1ba552 !important;
            float: inline-end !important;
            color: #fff !important;
        }
        .brand-color{
            color: #ff9900 !important;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200;300;400;500;600;700&display=swap">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts._nav')
        @include('layouts._left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="py-2">
                    @yield('section')
                    {{-- {{ $slot }} --}}
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        @include('layouts._footer')
        @include('layouts._right-sidebar')

        <form id="deleted_form" method="post">
            @csrf
            @method('DELETE')
        </form>
        <div class="modal fade" tabindex="-1" id="modal"></div>

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('layouts._javascript')
    @stack('js')
    @stack('datatable')

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                fontNames: ['Exo 2', 'Sans-serif','Arial', 'Helvetica', 'Times New Roman', 'Courier New', 'Verdana'],
                height: 300 // Adjust the height as needed
            });
        });
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
        tinymce.init({
            selector: '.tEditor',
            font_formats: 'Exo 2',

            plugins: 'image code',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist| code | table | image ',
            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,

            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                    };

                    input.click();
                },
            content_style: 'body { font-family:Exo 2,sans-serif; font-size:14px }'
        });
    </script>
</body>

</html>
