

    <style>
        
        .alert.alert-success {
            background: #05b974de;
            padding: 10px;
            text-align: center;
            margin: 10px 0px;
        }
        
        .alert.alert-danger {
            background: #b9054dde;
            padding: 10px;
            text-align: center;
            margin: 10px 0px;
        }

        
        .alert.alert-warning {
            background: #c39a02de;
            padding: 10px;
            text-align: center;
            margin: 10px 0px;
        }

        
        .alert.alert-info {
            background: #02b7c3de;
            padding: 10px;
            text-align: center;
            margin: 10px 0px;
        }

        strong{
            color: white;
        }

    </style>    

@if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	Please check the form below for errors
</div>
@endif

