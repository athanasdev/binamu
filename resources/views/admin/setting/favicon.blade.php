 <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
  
                      <form class="form-horizontal" action="{{route('save-favicon')}}" method="post" enctype="multipart/form-data">
                          @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Favicon</label>
                        <div class="col-sm-6">
                            <img src="{{ asset($imge->favicon ?? '') }}" style="height: 100px; width: 100px;" />
                          <input type="file" name="fav_icon" class="form-control" id="inputName">
                            <input type="hidden" value="{{$imge->id ?? ''}}" name="fav_id" class="form-control" id="inputName">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>