<div class="card">
<div class="card-body">
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.name') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ $data->name }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Email') <span class="req">*</span></label>
<input type="email" class="form-control" id="inputNanme4" name="email" required value="{{ $data->email }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.Phone') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="phone" required value="{{ $data->phone }}">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
@if($data->id)
<label for="inputNanme4" class="form-label">{{ __('app.Change Password') }}</label>
<input type="password" class="form-control" id="inputNanme4" name="password">
@else
<label for="inputNanme4" class="form-label">{{ __('store.choose_pass') }} <span class="req">*</span></label>
<input type="password" class="form-control" id="inputNanme4" name="password" required>
@endif
</div>
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('store.d_charges_type')<span class="req">*</span></label>
<select name="type" class="form-control" required onchange="getType(this.value)">
<option value="0" @if($data->type == 0) selected @endif>@lang('store.fix')</option>
<option value="1" @if($data->type == 1) selected @endif>@lang('store.per_km')</option>
</select>
</div>

<div class="col-lg-4" id="per_delivery" @if(!$data->type == 0) style="display:none" @endif>
<label for="inputNanme4" class="form-label">@lang('store.per_d_charges') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="per_delivery" value="{{ $data->per_delivery }}">
</div>

<div class="col-lg-4" id="per_km" @if(!$data->type == 1) style="display:none" @endif>
<label for="inputNanme4" class="form-label"> @lang('store.Per KM Charges') <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="per_km" value="{{ $data->per_km }}">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">Vehicle Type<span class="req">*</span></label>
<select name="v_type" class="form-control" required>
<option value="">Select</option>
<option value="Bike" @if($data->v_type == "Bike") selected @endif>Bike</option>
<option value="Car" @if($data->v_type == "Car") selected @endif>Car</option>
<option value="Bicycle" @if($data->v_type == "Bicycle") selected @endif>Bicycle</option>
<option value="Truck" @if($data->v_type == "Truck") selected @endif>Truck</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"> Upload Driver ID</label>
<input type="file" name="driver_id" class="form-control" accept="image/png, image/gif, image/jpeg">

@if($data->driver_id)
<br>
<a href="{{ Asset('upload/delivery/'.$data->driver_id) }}" target="_blank"><img src="{{ Asset('upload/delivery/'.$data->driver_id) }}" style="height: 60px;"></a>
@endif

</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"> Upload Vehicle Document</label>
<input type="file" name="v_doc" class="form-control" accept="image/png, image/gif, image/jpeg">
@if($data->v_doc)
<br>
<a href="{{ Asset('upload/delivery/'.$data->v_doc) }}" target="_blank"><img src="{{ Asset('upload/delivery/'.$data->v_doc) }}" style="height: 60px;"></a>
@endif
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="@lang('app.Submit')">
</div>
</div>

<script>
function getType(val)
{
    var per_delivery = document.getElementById("per_delivery");
    var per_km       = document.getElementById("per_km");

    if(val == 0)
    {
	    per_delivery.removeAttribute("style");	

        var att 		 = document.createAttribute("style");
        att.value 		 = "display:none";
        per_km.setAttributeNode(att);	
    }
    else
    {
	    per_km.removeAttribute("style");	

        var att 		 = document.createAttribute("style");
        att.value 		 = "display:none";
        per_delivery.setAttributeNode(att);
    }
}
</script>