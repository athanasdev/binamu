<!-- jQuery -->
<script src="{{asset('assets/backend/plugins/')}}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/backend/plugins/')}}/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/backend/plugins/')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('assets/backend/plugins/')}}/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('assets/backend/plugins/')}}/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('assets/backend/plugins/')}}/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('assets/backend/plugins/')}}/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/backend/plugins/')}}/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/backend/plugins/')}}/moment/moment.min.js"></script>
<script src="{{asset('assets/backend/plugins/')}}/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/backend/plugins/')}}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('assets/backend/plugins/')}}/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/backend/plugins/')}}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend/dist/')}}/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/backend/dist/')}}/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/backend/dist/')}}/js/pages/dashboard.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>


    let table = new DataTable('#example1');

    $(document).ready(function() {
      $('#summernote').summernote();
    });

    $(document).ready(function() {
      $('.summernote').summernote();
    });

    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch(type){
        case 'info':

            toastr.options.timeOut = 10000;
            toastr.info("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'success':

            toastr.options.timeOut = 10000;
            toastr.success("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
        case 'warning':

            toastr.options.timeOut = 10000;
            toastr.warning("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
        case 'error':

            toastr.options.timeOut = 10000;
            toastr.error("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
    }
    @endif
</script>

<script>


  $(document).on('click', '.addRow', function(){
          var html = `
      <tr class="product-item-row">
                            
        <td>
          <input type="text" class="form-control" name="demo_score[]" required>
        </td>
      
        <td>
          <input type="number" step="0.1" class="form-control " name="percentage[]" required>
        </td>
        
        <td>
          <select name="is_profitable[]" class="form-control" id="" required>
            <option value="0">No</option>
            <option value="1">Yes</option>
          </select>
        </td>
      
													
        <td>
            <select name="part[]" id="" class="form-control">
              <option value="1">First Half</option>
              <option value="2">Full Time</option>
            </select>
          </td>
												

        <td>
          <button id="addRow"  type="button" class="btn btn-light btn-sm addRow "><i class="fa fa-plus-circle"></i>    </button>   
          <button id="remove"  type="button" class="btn btn-light btn-sm remove "><i class="fa fa-minus-circle"></i>    </button>   
        </td>                                              
      </tr>
          `;
          $('#sellProduct').append(html);
      });
  
      $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });



  </script>