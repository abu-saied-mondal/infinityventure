<?php
/*------------------------Matching--------------------------------------*/
$sqlpc="SELECT * FROM `iv_member_p4_count` WHERE `left`>0 AND `right`>0";
$respc=query($conn,$sqlpc);
$numpc=numrows($respc);
if($numpc>0)
{
while($fetchpc=fetcharray($respc))
{
$left=$fetchpc['left'];
$right=$fetchpc['right'];
$userc=$fetchpc['userid'];
  
if($left>0 && $right>0)
{
$leftmem=getDownlineCountP4($conn,$userc,'left');
$rightmem=getDownlineCountP4($conn,$userc,'right');
$minimum=min($left,$right);

//------------------------------------//

$bonus=getSettingsPackagename($conn,'P4','matchingbonus');

$capping=getSettingsPackagename($conn,'P4','dailycapping');
$ptoday=getTotalPairTodayp4($conn,$userc,date('Y-m-d'));

if($ptoday<$capping)
{
$remain=$capping-$ptoday;
if($bonus<=$remain)
{
$paybonus=$bonus;
}else{
if($bonus>$remain)
{
$paybonus=$remain;
}else{
$paybonus=$bonus;
}
}
}else{
$paybonus=0;
}



if($paybonus>0)
{
$sqlcm="INSERT INTO `iv_commission_matching_p4` (`userid`,`leftmem`,`rightmem`,`minimum`,`matchingbonus`,`bonus`,`date`) VALUES ('".$userc."','".$left."','".$right."','".$minimum."','".$bonus."','".$paybonus."','".date('Y-m-d')."')";
$rescm=query($conn,$sqlcm);
}

$remleft=$left-$minimum;
$remright=$right-$minimum;

$sqls9="UPDATE `iv_member_p4_count` SET `left`='".$remleft."',`right`='".$remright."' WHERE `userid`='".$userc."'";
$ress9=query($conn,$sqls9);

}
}
}
?>