<div class="modal fade" id="largeModal{{ $row->id }}" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">@lang('app.Assign Categories')</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<form action="{{ Asset('storeCate') }}" method="post">

{!! csrf_field() !!}

<input type="hidden" name="id" value="{{ $row->id }}">

<div class="row">
@foreach($cates as $cate)
<div class="col-lg-2"><input type="checkbox" name="chk[]" value="{{ $cate->id }}" @if(in_array($cate->id,$row->getCate($row->id))) checked @endif> {{ $cate->name }}</div>
@endforeach
</div>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('app.Close')</button>
<button type="submit" class="btn btn-primary">@lang('app.Save Changes')</button>
</form>
</div>
</div>
</div>
</div><!-- End Large Modal-->