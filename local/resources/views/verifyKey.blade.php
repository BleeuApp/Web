<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Verify</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<style type="text/css">
body{ background: #f3f3f3;  }
.error-template {padding: 40px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
</style>

<body>

@if(isset($_GET['error']))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>ERROR : </strong> {{ $_GET['error'] }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>

@endif


<div class="container">
<div class="row" style="border:1px solid gray;padding: 50px 10px;border-radius: 10px;margin-top: 5%;">
<div class="col-md-12">
<h1>Verify Your Purchase Code</h1><br><br>
</div>
<form action="{{ Asset('verifyKey') }}" method="post">

{!! csrf_field() !!}

<div class="col-md-6"><input type="text" name="__vcode" class="form-control" placeholder="Please enter Purchase Code Here" required="required"></div>
<div class="col-md-6"><button type="submit" class="btn btn-success">Verify</button></div>

</form>
</div>
</div>




</body>
</html>