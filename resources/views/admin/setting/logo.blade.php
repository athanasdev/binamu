<div class=" tab-pane" id="activity">
  <!-- Post -->
  <form class="form-horizontal" action="{{route('save-logo')}}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Logo</label>
      <div class="col-sm-6">
          <img src="{{ asset($imge->logo ?? '') }}" style="width: 100px;" />
        <input type="file" name="logo" class="form-control">
        <input type="hidden" value="{{$imge->id ?? ''}}" name="img_id" class="form-control" id="inputName">
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>

  <!-- /.post -->
</div>