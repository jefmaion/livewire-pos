<!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('template/dist/js/demo.js') }}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('swal', function(e) {
        Swal.fire({
            title: e.detail[0].title,
            icon: e.detail[0].icon,
            iconColor: e.detail[0].iconColor,
            timer: 3000,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
        });
    });
</script> --}}


    @yield('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.getElementById("toggleDarkMode");
            const body = document.body;
            const header = document.getElementById("main-header");
            const sidebar = document.querySelector("aside.main-sidebar");

            // Verifica se o modo escuro está ativado no Local Storage
            if (localStorage.getItem("darkMode") === "enabled") {
                body.classList.add("dark-mode");
                header.classList.remove("navbar-light")
                header.classList.add("navbar-dark")
                replaceSidebarTheme(sidebar, 'sidebar-light', 'sidebar-dark');
            }

            toggleButton.addEventListener("click", function() {
                body.classList.toggle("dark-mode");
                header.classList.toggle("navbar-dark");
                header.classList.toggle("navbar-light");


                // Salva a escolha do usuário no Local Storage
                if (body.classList.contains("dark-mode")) {
                    localStorage.setItem("darkMode", "enabled");
                    replaceSidebarTheme(sidebar, 'sidebar-light', 'sidebar-dark');
                } else {
                    localStorage.setItem("darkMode", "disabled");
                    replaceSidebarTheme(sidebar, 'sidebar-dark', 'sidebar-light');

                }
            });
        });

        function replaceSidebarTheme(element, fromPrefix, toPrefix) {
            const classes = Array.from(element.classList);
            classes.forEach(cls => {
                if (cls.startsWith(fromPrefix)) {
                    element.classList.remove(cls);
                    element.classList.add(cls.replace(fromPrefix, toPrefix));
                }
            });
        }
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
    window.addEventListener('toastr', function(e) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "3000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        // eval('toastr.'+e.detail[0].type+'('''+e.detail[0].message+''')')
        toastr[event.detail[0].type](event.detail[0].message);
    });
</script>
