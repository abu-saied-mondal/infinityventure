<?php include('header.php');
$left=4;
?>

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<script src="assets/js/ajax.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="pagination.css">
<link rel="stylesheet" href="assets/css/style.css">
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Commission Boosting Level Bonus Statement</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in" style="padding:5px">
<div class="row">
<div class="col-md-2"><div style="padding:5px;"></div></div>

<form name="frm1" method="post" action="commission-boosting-level-bonus.php?act=search">

<div class="col-md-2"><div style="padding:5px;"><input type="date" name="fromdate" id="fromdate" value="<?=$_REQUEST['fromdate']?>" required class="form-control input-line input-medium" /></div></div>

<div class="col-md-2"><div style="padding:5px;"><input type="date" name="todate" id="todate" value="<?=$_REQUEST['todate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="submit" name="submit" value="Search" class="btn" style="background:#009900;color:#FFFFFF;" /></div></div>

<div class="col-md-1"></div>
</form>


<div class="col-md-3">
<div align="right" style="padding:5px;">
<form name="frm1" method="post" action="commission-boosting-level-bonus.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID, From ID" style="width:100%;" />
</form>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">User_ID</th>
<th style="text-align:center;">Original_User_ID</th>
<th style="text-align:center;">Name</th>
<th style="text-align:center;">Amount</th>
<th style="text-align:center;">Current(%)</th>
<th style="text-align:center;">Bonus</th>
<th style="text-align:center;">Boosting(%)</th>
<th style="text-align:center;">Boosting</th>
<th style="text-align:center;">Date</th>
</tr>
</thead>
<tbody>

<?php
$tname='iv_commission_boosting_level';
$lim=100;
$tpage='commission-boosting-level-bonus.php';
$search=trim($_REQUEST['search']);
$fromdate=trim($_REQUEST['fromdate']);
$todate=trim($_REQUEST['todate']);

if($_REQUEST['act']=='search')
{
if(trim($_REQUEST['fromdate'])!='' && trim($_REQUEST['todate'])!='')
{
$where="WHERE `date` BETWEEN '".trim($_REQUEST['fromdate'])."' AND '".trim($_REQUEST['todate'])."'  ORDER BY `id` DESC";
}else{
$where="WHERE `orguserid` LIKE '".trim($_REQUEST['search'])."' ORDER BY `id` DESC";
}
}else{
$where="ORDER BY `id` DESC";
}
include('pagination.php');

$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?> 
<tr>
<td style="text-align:center;padding:2px;"><?=$i?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['userid']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['orguserid']?></td>
<td style="text-align:center;padding:2px;"><?=ucwords(getFromUserID($conn,$fetch['orguserid'],'name'))?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['amount']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['currentper']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['bonus']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['boostingper']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['boosting']?></td>
<td style="text-align:center;padding:2px;"><?=getDateConvert($fetch['date'])?> </td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="10" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>

</tbody>
</table>
</div>
<div align="center"><?=$pagination?></div>
</div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>


<?php include('footer.php') ?>

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- END VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>