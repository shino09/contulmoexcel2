<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/js/adminlte.min.js') }}"></script>

<!--Datatables-->
<script src="{{ asset('plugins/datatables.net/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-responsive/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>

<!-- Script personalizados-->
<script src="{{ asset('js/scripts.js') }}"></script>

<!-- Scripts agregados dinamicamente por las vistas-->
@yield('scripts')
