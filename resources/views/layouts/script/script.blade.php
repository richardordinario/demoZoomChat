<script src="{{ asset('custom/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('custom/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('custom/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('custom/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('custom/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('custom/dist/js/demo.js') }}"></script>
<script src="{{ asset('custom/dist/js/pages/dashboard3.js') }}"></script>
<script src="{{asset('custom/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('custom/theme/nav.js') }}"></script>

<script src="{{ asset('custom/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('custom/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('custom/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('custom/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

@if(Auth::guard('admin')->check())
<script src="{{ asset('js/admin/dev.js') }}"></script>
@else
<script src="{{ asset('js/student/message.js') }}"></script>
@endif

