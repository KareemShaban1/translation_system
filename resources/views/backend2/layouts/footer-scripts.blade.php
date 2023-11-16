<!-- jquery -->
<script src="{{ URL::asset('backend2/assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('backend2/assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'backend2/assets/js/';
</script>

<!-- chart -->
{{-- <script src="{{ URL::asset('backend2/assets/js/chart-init.js') }}"></script> --}}

<!-- Page level custom scripts -->
<script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('backend/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('backend/js/demo/chart-bar-demo.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('backend2/assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('backend2/assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('backend2/assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('backend2/assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('backend2/assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->

<script src="{{ URL::asset('backend2/assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('backend2/assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('backend2/assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('backend2/assets/js/custom.js') }}"></script>

{{-- Datatables --}}
{{-- <script src="{{ URL::asset('backend2/assets/datatables/datatables.min.js') }}"></script> --}}


<script src="{{ asset('backend2/assets/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('backend2/assets/datatables/dataTables.responsive.min.js') }}"></script>

<script src="{{ asset('backend2/assets/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend2/assets/datatables/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend2/assets/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend2/assets/datatables/export-tables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend2/assets/datatables/export-tables/jszip.min.js') }}"></script>
<script src="{{ asset('backend2/assets/datatables/export-tables/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend2/assets/datatables/export-tables/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend2/assets/datatables/export-tables/buttons.print.min.js') }}"></script>

@stack('scripts')
