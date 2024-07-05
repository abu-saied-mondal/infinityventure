<?php include('header.php');
$left=51;
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
<h4 class="card-title"> Transfer Fund To Others Statement</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div cla
<div class="table-responsive">
<table width="100%">
<tr>
<td>
<div align="left" style="margin-left:10px;"><a href="transfer-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</td>
<td>
<div align="right" style="padding:5px;"><form name="frm1" method="post" action="transfer.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" style="width:150px;" />
</form></div>
</td>
</tr>
</table>

<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td width="10%" align="center"><strong>Sl_No</strong></td>
<td width="10%" align="center"><strong>User_ID</strong></td>
<td width="10%" align="center"><strong>Name</strong></td>
<td width="10%" align="center"><strong>To_ID</strong></td>
<td width="10%" align="center"><strong>Name</strong></td>
<td width="10%" align="center"><strong>Fund</strong></td>
<td width="10%" align="center"><strong>Date</strong></td>
</tr>
</thead>
<tbody>

<?php
$tname='iv_transfer_fund_others';
$lim=100;
$tpage='transfer.php';
if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim($_POST['search'])."'  ORDER BY `id` DESC";
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
<td align="center" style="padding:5px;"><?=$i?></td>
<td align="center" style="padding:5px;"><?=$fetch['userid']?></a></td>
<td align="center" style="padding:5px;"><?=getMemberUserID($conn,$fetch['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch['toid']?></a></td>
<td align="center" style="padding:5px;"><?=getMemberUserID($conn,$fetch['toid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch['fund']?></td>
<td align="center" style="padding:5px;"><?=getDateConvert($fetch['date'])?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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