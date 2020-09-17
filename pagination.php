Simple Pagination by PHP


<!DOCTYPE html>
<html>
<body>

<?php
$con=mysqli_connect("localhost","root","","wefix_school_erp");

$page=$_GET['page'];

if($page=="9" || $page=="1")
{
	$page1=0;
}
else
{
	$page1=($page*5)-5;
}

$query=mysqli_query($con,"select * from class limit $page1,5");
while($row=mysqli_fetch_array($query))
{
	echo $row['id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['class']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['section'];
	echo "<br>";
}

$real=mysqli_query($con,"select * from class");
$coun=mysqli_num_rows($real);
$a=$coun/5;
$a=ceil($a);
echo "<br>";

for($b=1;$b<=$a;$b++)
{
	?>
	<a href="push.php?page=<?php echo $b; ?>" style="text-decoration: none;"><?php echo $b." "; ?> </a> <?php 
}
?>
</body>
</html>
