<?php
session_start();
$amount=$_SESSION['amt'];
$user=$_SESSION['username'];
$team=$_POST['team'];

if($_SESSION['hteam']==$team)
{
	$win_amount=$amount*$_SESSION[hodd];
}
else
	$win_amount=$amount*$_SESSION[aodd];

// DB Connection details stored in here

$dbserver='localhost';
$dbuser='root';
$dbpass='';
$db='footballstats';

// Create connection
$link=mysqli_connect($dbserver,$dbuser,$dbpass,$db);

// Check connection
if (!$link) {
    die('Connect Error: ' . mysqli_connect_error());
}
$sql1 ="select * from prediction where username='$user'";
echo $user;
$res1 = mysqli_query($link, $sql1);
$count1=mysqli_num_rows($res1);
if($count1==0)
{
	$sql2 ="INSERT INTO prediction(username,betting_amount,team,winning_amount) VALUES ('$user',$amount,'$team',$win_amount)";
	if (mysqli_query($link, $sql2))
	{	
		header('Location:/footpred/TournamentHome/Home.php');
		exit();
	}
	else
	{
		echo "Sorry. There is some Technical Problem. Please try again later.". mysqli_error($link);
	}
}
else
{	
	header('Location:/footpred/tournamentHome/prediction.php');
	exit();
}
// Close Connection at the end of the file
mysqli_close($link);
?>