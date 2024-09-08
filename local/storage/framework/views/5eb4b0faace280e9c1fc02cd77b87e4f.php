<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>License Not Activated</title>
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

<div class="container">
<div class="row" style="border:1px solid gray;padding: 10px 10px;border-radius: 10px;margin-top: 5%;">
<div class="col-md-12">
<div class="error-template">
<h1>
License Not Activated</h1>
<h2>Please verify your purchase code from codecanyon.</h2>
<br>
<div class="error-actions">
<a href="<?php echo e(Asset('keyVerify')); ?>" class="btn btn-primary btn-lg">
Verify Now </a>

<a href="mailto:sushilasaharan9988@gmail.com" class="btn btn-default btn-lg">Contact Support </a>
</div>
</div>
</div>
</div>


<div class="row" style="border:1px solid gray;padding: 10px 10px;border-radius: 10px;margin-top: 5%;">
<div class="col-md-12"><h1>How to get purchase code?</h1></div>

<ul>
<li>Go to <a href="https://codecanyon.net" target="_blank">Codecanyon</a> Website</li>
<li>Login there if you are not logged in</li>
<li>After login, Go to <a href="https://codecanyon.net/downloads" target="_blank">download section</a> from right top Menu</li>
<li>You will see a list of your purchases item, Click on Download Button, You will see option <b>Download Purchase Code</b> in PDF or Text file format</li>
<li>Copy that purchase code and <a href="<?php echo e(Asset('verifyKey')); ?>">Verify here</a></li>
<li>Have fun & enjoy Easy Invoicing.</li>
</ul>

</div>

</div>

</body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/key.blade.php ENDPATH**/ ?>