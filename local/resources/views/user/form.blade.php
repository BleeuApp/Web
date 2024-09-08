<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">Name <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ $data->name }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">Email <span class="req">*</span></label>
<input type="email" class="form-control" id="inputNanme4" name="email" required value="{{ $data->email }}">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">Username <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="username" required value="{{ $data->username }}">
</div>
</div>

<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">Select Role <span class="req">*</span></label>
<select name="role_id" class="form-control" required>
<option value="">Select</option>
@foreach($role as $r)
<option value="{{ $r->id }}" @if($r->id == $data->role_id) selected @endif>{{ $r->name }}</option>
@endforeach
</select>
</div>

<div class="col-lg-4">
@if($data->id)
<label for="inputNanme4" class="form-label">Change Password</label>
<input type="password" class="form-control" id="inputNanme4" name="password">
@else
<label for="inputNanme4" class="form-label">Password <span class="req">*</span></label>
<input type="password" class="form-control" id="inputNanme4" name="password" required>
@endif
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="Submit">
</div>
</div>

