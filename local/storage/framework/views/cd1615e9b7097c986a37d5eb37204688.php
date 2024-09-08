<title><?php echo app('translator')->get('app.create_qr'); ?></title>

<h3 align="center"><?php echo app('translator')->get('app.qr_desc'); ?></h3>
<br>
<p align="center">
    <?php echo QrCode::size(300)->generate($data->web_app.'/'.$_GET['id']); ?>


    <br><br><br>
    <br><br><br>



<a href="data:image/png;base64, <?php echo base64_encode(QrCode::format('png')->size(300)->generate('Generate any QR Code!')); ?> " style="background: green;padding:10px 10px;text-decoration: none;color:white;border-radius: 5px;">Download QR Code</a>


</p>

<br>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store/qr.blade.php ENDPATH**/ ?>