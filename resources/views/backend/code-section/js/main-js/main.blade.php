        <!-- Vendor js -->
        <script src="{{asset('backend/mrs-code/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset('backend/mrs-code/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/dropzone/min/dropzone.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/select2/js/select2.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/autonumeric/autoNumeric-min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{asset('backend/mrs-code/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

        <script src="{{asset('backend/mrs-code/libs/selectize/js/standalone/selectize.min.js')}}"></script>

        <!-- Bootstrap Tables js -->
        <script src="{{asset('backend/mrs-code/libs/bootstrap-table/bootstrap-table.min.js')}}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{asset('backend/mrs-code/js/pages/dashboard-1.init.js')}}"></script>

        <!-- Init js-->
        <script src="{{asset('backend/mrs-code/js/pages/create-project.init.js')}}"></script>
        <script src="{{asset('backend/mrs-code/js/pages/form-pickers.init.js')}}"></script>

        <!-- App js-->
        <script src="{{asset('backend/mrs-code/js/app.min.js')}}"></script>

        <!-- Footable js -->
        <script src="{{asset('backend/mrs-code/libs/footable/footable.all.min.js')}}"></script>
        
        <!-- Init js -->
        <script src="{{asset('backend/mrs-code/js/pages/foo-tables.init.js')}}"></script>
        <script src="{{asset('backend/mrs-code/js/pages/form-masks.init.js')}}"></script>
        <script src="{{asset('backend/mrs-code/js/pages/bootstrap-tables.init.js')}}"></script>

        <!---tostr--->
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

        <!---image show---->
        
      <script type="text/javascript">
        $(document).ready(function () {
        $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
        });
        });
      </script>
