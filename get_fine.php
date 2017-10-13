	

<?php
include('dbcon.php');

// echo $id;
 $id=$_GET['id'];

$result=mysql_query("SELECT date_borrow FROM borrow WHERE borrow_id='$id' ");
$date1=mysql_result($result, 0);
$d=strtotime($date1);
$date1=date("Y/m/d", $d);
$date2=date("Y/m/d");
$diff=date_diff(date_create($date2),date_create($date1));


$days= $diff->format("%R%a");

if (abs($days) >15) {
	$fine_amount = (abs($days)-15);
	$str= $fine_amount;

echo "<script type='text/javascript'>alert('$str');

window.location.href='view_borrow.php';
</script>";


}
else{
echo "<script type='text/javascript'>alert('No Fine');
window.location.href='view_borrow.php';
</script>";
}

?>





	