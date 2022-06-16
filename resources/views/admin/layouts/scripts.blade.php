    <!-- plugins:js -->
    <script src="{{ asset('administracion/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('administracion/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('administracion/js/off-canvas.js') }}"></script>
    <script src="{{ asset('administracion/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('administracion/js/misc.js') }}"></script>
    <script src="{{ asset('administracion/js/settings.js') }}"></script>
    <script src="{{ asset('administracion/js/todolist.js') }}"></script>
    <script src="{{asset('administracion/js/select2.js')}}"></script>
    <script src="https://kit.fontawesome.com/50e215d7ac.js" crossorigin="anonymous"></script>
    {{-- <script src="{{asset('administracion/js/data-table.js')}}"></script> --}}
    <!-- endinject -->
    <!-- Custom js for this page-->
    {{-- <script src="{{ asset('administracion/js/dashboard.js') }}"></script>  este carga las animaciones de graficas y demas--}}

    @include('sweetalert::alert')
    <!-- End custom js for this page-->