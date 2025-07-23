<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('layouts.parts.head')
    <style>
        .page-item.active .page-link {
            z-index: 3;
            color: var(--white);
            background-color: var(--{{ color() }});
            border-color: var(--{{ color() }});
        }

        .dark-mode .page-item.active .page-link {
            background-color: color-mix(in srgb, var(--{{ color() }}) 80%, black);
            /* border-color: color-mix(in srgb, var(--{{ color() }}) 80%, black); */
            border-color: #3f6791;
            color: var(--white);
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.parts.navbar')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.parts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content pt-4">
                <div class="container-fluid">
                    {{ $slot }}
                    <livewire:common.modal-alert />
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('layouts.parts.scripts')
    <script>
        window.addEventListener('show-modal-alert', () => {
            $('#modal-alert').modal('show');
        });

    </script>


</body>

</html>
