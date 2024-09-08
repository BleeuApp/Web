<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">Role Name <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="{{ $data->name }}">
</div>
</div>

<br>
<h5 class="card-title">Assign Permission <input type="checkbox" name="select_all" onchange="selectAll(this)" style="margin-left: 100px;"> Select All</h5>
@php($array = explode(",",$data->perm))

<div class="row">
<div class="col-lg-2">
<input type="checkbox" name="chk[]" value="1" @if(in_array('1',$array)) checked @endif> Manage User
</div>

<div class="col-lg-2">
<input type="checkbox" name="chk[]" value="2" @if(in_array('2',$array)) checked @endif> Manage User
</div>

<div class="col-lg-2">
<input type="checkbox" name="chk[]" value="3" @if(in_array('3',$array)) checked @endif> Manage User
</div>
</div>

<br>
<input type="submit" class="btn btn-primary" value="Submit">
</div>
</div>

<script>
    function selectAll(val)
    {
        let chk = document.getElementsByName("chk[]");
    
        for(var i = 0;i<chk.length;i++)
        {
            if(val.checked == true)
            {
                chk[i].checked = true;
            }
            else
            {
                chk[i].checked = false;
            }
        }
    }
    </script>