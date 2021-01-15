
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#DeleteFromList{{$album->id}}">
  delete
</button>


<!-- Modal -->
<div id="DeleteFromList{{$album->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@lang('home.header_delete_model')</h4>
      </div>
      <div class="modal-body">
        <p>@lang('home.body_delete_model')</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('home.close')</button>
        <a href="{{URL::to('/albums/').'/'.$album->id.'/delete'}}" class="btn btn-danger "> 
        @lang('home.delete')
        </a>

      </div>
    </div>

  </div>
</div>