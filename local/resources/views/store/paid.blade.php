@extends('layout.main')

@section('title') @lang('app.up') @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.up') </h1></div>

<section class="section">

{!! Form::open(['url' => [Asset('paid')],'files' => true]) !!}
<div class="card">
<div class="card-body"><br>

<input type="hidden" name="id" value="{{ $_GET['id'] }}">

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.paid_amount')</label>
<input type="number" class="form-control" id="inputNanme4" name="amount" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.date_added')</label>
<input type="text" class="form-control" id="datepicker" name="date_added" required value="{{ date("Y-m-d") }}" autocomplete="off">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label">@lang('app.any_notes')</label>
<input type="text" class="form-control" name="notes">
</div>
</div>
<br>
<input type="submit" class="btn btn-primary" value="@lang('app.update')">
</div>
</div>

<div class="card">
<div class="card-body">
<br><h4>@lang('app.paid_history')</h4><br>
<table class="table">
<tr>
<th>@lang('app.date_added')</th>
<th>@lang('app.amount')</th>
<th>@lang('app.notes')</th>
<th>@lang('app.Option')</th>

@foreach($data as $row)

<tr>
<td width="25%">{{ date('d-M-Y',strtotime($row->date_added)) }}</td>
<td width="25%">{{ $c.$row->amount }}</td>
<td width="25%">{{ $row->notes }}</td>
<td width="25%"><a class="btn btn-danger" onclick="return confirm('@lang('app.sure')')" href="{{ Asset('paidDelete?id='.$row->id) }}">@lang('app.delete')</a></td>
</tr>

@endforeach

</tr>
</table>
</div>
</div>


</form>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    $( "#datepicker2" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
});

  </script>
@endsection