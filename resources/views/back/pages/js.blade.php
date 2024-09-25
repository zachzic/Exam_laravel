<!-- jQuery 3 --> 
<script src="{{asset('back/dist/js/jquery.min.js')}}"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="{{asset('back/dist/bootstrap/js/bootstrap.min.js')}}"></script> 

<!-- template --> 
<script src="{{asset('back/dist/js/niche.js')}}"></script> 

<!-- Chartjs JavaScript --> 
<script src="{{asset('back/dist/plugins/chartjs/chart.min.js')}}"></script>
<script src="{{asset('back/dist/plugins/chartjs/chart-int.js')}}"></script>

<!-- Chartist JavaScript --> 
<script src="{{asset('back/dist/plugins/chartist-js/chartist.min.js')}}"></script> 
<script src="{{asset('back/dist/plugins/chartist-js/chartist-plugin-tooltip.js')}}"></script> 
<script src="{{asset('back/dist/plugins/functions/chartist-init.js')}}"></script>
<script src="{{asset('back/dist/plugins/datatables/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('back/dist/plugins/datatables/dataTables.bootstrap.min.js')}}"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script src="{{asset('back/js/exe.js')}}"></script>