<footer>
    <div class="container text-center">
        <p>This website Design and Developed By WDPF R-45</p>
    </div>
</footer>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/js/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/js/moment.min.js') }}"></script>

<script src="{{ asset('assets/plugins/tableExport/tableExport.min.js') }}"></script>
{{-- For Export PDF --}}
<script src="{{ asset('assets/plugins/tableExport/libs/jsPDF/jspdf.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tableExport/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js') }}"></script>
{{-- For Export Xlsx --}}
<script src="{{ asset('assets/plugins/tableExport/libs/js-xlsx/xlsx.core.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
{{-- Datatable --}}
{{-- <script src="{{asset('assets/plugins/Datatable/datatables.min.js')}}"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="{{ asset('assets/custom.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var span = document.getElementById('span');

        function time() {
            var d = new Date();
            var s = d.getSeconds();
            var m = d.getMinutes();
            var h = d.getHours();
            span.textContent =
                ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
        }
        setInterval(time, 1000);
        $("#print").click(function() {
            window.print();
        });
        <?php if (session('fail')): ?>
        toastr.error('"<?php echo session('fail'); ?>!"')
        <?php endif; ?>
        <?php if (session('success')): ?>
        toastr.success('"<?php echo session('success'); ?>!"')
        <?php endif; ?>
        <?php if (session('warning')): ?>
        toastr.warning('"<?php echo session('warning'); ?>!"')
        <?php endif; ?>


    });
</script>
@yield('script')
</body>

</html>
