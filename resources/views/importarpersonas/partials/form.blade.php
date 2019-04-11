
              <div class="row">
    <div class="col-md-6">
    <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">    <label for="link">Archivo Excel</label>


                <input type="file" class="form-control"  accept=".xls,.xlsx" name="file" /> 
                @if ($errors->has('file'))
        <span class="help-block">
          <strong>{{ $errors->first('file') }}</strong>
        </span>
      @endif
              </div>
            </div>
            </div>


     
        

<div class="form-group text-center">
    <a href="{{ route('persona.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>

  {{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
</div>

@section('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <!-- iCheck -->
  <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
  <!-- iCheck -->
  <script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
  <!-- Select2 -->
  <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>


     <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('css/datepicker3.css')}}">
        <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">

    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    
  <script>
    $(function(){
        $(".select").select2();
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
    })
  </script>


  <script>
    $('.datepicker').datepicker({
      //  format: "dd/mm/yyyy",
                format: "yyyy/mm/dd",

        language: "es",
        autoclose: true
    });
</script>
  <!--<script>

$(".datepicker").datepicker({
    format: "yyyy",
    startView: 'decade',
            language: "es",

    minView: 'decade',
    viewSelect: 'decade',
    autoclose: true,
});


</script>-->
@endsection

