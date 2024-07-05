<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,trim($_SESSION['mid']),'userid');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background-color: #fff;">
<div class="wrapper">

<!-- Sidebar -->
<?php include('header.php')?>
<?php include('leftmenu.php')?>


<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner">
<div class="card" style="z-index:9999; margin-top:50px; ">
<div class="card-header">
<div class="card-title"><a href="javascript:history.go(-1)"><img src="images/back-page.png" height="16" width="20"> &nbsp; Current Wallet To Boosting Wallet</a>   </div>
</div>
</div>




<div class="content">
<div class="page-inner">

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">

<div class="card">


<div class="card-body" style="background:#FFFFFF;">
<?php if($_REQUEST['k']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Maximum Transfer Amount is &nbsp;<?=getSettingsTransfer($conn,'maximum')?></p><?php }?>

<?php if($_REQUEST['m']==1){?><div align="center" style="color:#00CC00;background:#FFFFFF;height:30px;line-height:30px;">New Transfer successfully completed!</div><?php }?>
<?php if($_REQUEST['e']==1){?><div align="center" style="color:#FF0000;background:#FFFFFF;height:30px;line-height:30px;">Transfer value must be greater than 0!</div><?php }?>
<?php if($_REQUEST['e']==2){?><div align="center" style="color:#FF0000;background:#FFFFFF;height:30px;line-height:30px;">Insufficient Balance!</div><?php }?>
<?php if($_REQUEST['s']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Minimum Transfer Amount is &nbsp;<?=getSettingsTransfer($conn,'minimum')?></p><?php }?>
<?php if($_REQUEST['s']==4){?><div align="center" style="color:#FF0000;background:#FFFFFF;height:30px;line-height:30px;">Wrong Transaction Password!</div><?php }?>

<?php if(getSettingsOnoff($conn,'current_to_boosting')=='A'){?>

<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='A')
{
?>
<h3 align="center" style="color:#660000;">Current Wallet: <?=$currency?> <?=getAvailableWallet($conn,$userid)?> </h3>
<h3 align="center" style="color:#660000;">Boosting Wallet: <?=$currency?> <?=getBoostingWallet($conn,$userid)?></h3>
<div>&nbsp;</div>


<form class="form" action="boosting-process.php" method="post">
<div class="col-md-12">
<div class="form-group form-group-default">
<label>Transfer Amount<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="current" id="current" placeholder="Amount" value="" required>
</div>
</div>

<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-3 mb-3" style="padding-left:36%">
<button class="btn btn-success">Transfer Now</button>
</div>
</div>
</div>
</form>
<?php }else{?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;"><br />Click here <a href="activation.php">Activation</a> to Activate your account!</h3>
<?php }?>
<?php }else{?>
<div style="text-align:center;color:#ff0000;  font-size:18px; border-radius:10px;padding:10px; margin-top:10px;">System Is Under Upgradation!<br>Check After Some Time!</div><?php }?>
<div>&nbsp;</div>
<div>&nbsp;</div>
</div>

</div>
</div>

</div>
</div>
</div>

















</div>

</div>

<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>
</div>
<!--   Core JS Files   -->
<?php include('footer.php')?>
<script>
function copyToClipboard(element) {
var $temp = $("<input>");
$("body").append($temp);
$temp.val($(element).text()).select();
document.execCommand("copy");
$temp.remove();
document.getElementById('cpbutton').innerHTML='COPIED';
}
</script>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script><!-- DateTimePicker -->
<script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>
<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script>
$('#datepicker').datetimepicker({
format: 'MM/DD/YYYY',
});
</script>
</body>
</html>