<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Prediction Page</title>
</head>
<body bgcolor="#F8ECA1">
<h2><center>Decisive Features for Prediction</h2>
<?php
// DB Connection details stored in here

$dbserver='localhost';
$dbuser='root';
$dbpass='';
$db='footballstats';

// DB Connection code taken from php.net
$link = mysqli_connect($dbserver,$dbuser,$dbpass,$db);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 1 - The Current rank of the home team. 

// S1: SELECT COUNT(*) QUERY
$q2="select rank from currentrank where Team='$hometeam';";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r1=$res2['rank'];
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 2 - The Current rank of the Away team. 

// S1: SELECT COUNT(*) QUERY
$q2="select rank from currentrank where Team='$awayteam';";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r2=$res2['rank'];
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 3 - The number of win games of the home team during the last five rounds. 
// S1: CREATE VIEW
$q1="create view v1 as select Date,HomeTeam,AwayTeam,FTR from seasons where (HomeTeam='$hometeam')OR(AwayTeam='$hometeam') order by `Div` desc limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
	//echo "Created! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from v1 where (HomeTeam='$hometeam' AND FTR='H')OR(AwayTeam='$hometeam' AND FTR='A');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r3=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view v1;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 4 - The number of draw games of the home team during the last five rounds. 
// S1: CREATE VIEW
$q1="create view v1 as select Date,HomeTeam,AwayTeam,FTR from seasons where (HomeTeam='$hometeam')OR(AwayTeam='$hometeam') order by `Div` desc limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
	//echo "Created! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from v1 where (HomeTeam='$hometeam' AND FTR='D')OR(AwayTeam='$hometeam' AND FTR='D');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r4=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view v1;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 5 - The number of draw games of the home team during the last five rounds. 
// S1: CREATE VIEW
$q1="create view v1 as select Date,HomeTeam,AwayTeam,FTR from seasons where (HomeTeam='$hometeam')OR(AwayTeam='$hometeam') order by `Div` desc limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
//echo "<br>Dropped!! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from v1 where (HomeTeam='$hometeam' AND FTR='L')OR(AwayTeam='$hometeam' AND FTR='L');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r5=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view v1;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 6 - The number of win games of the away team during the last five rounds. 
// S1: CREATE VIEW
$q1="create view v1 as select Date,HomeTeam,AwayTeam,FTR from seasons where (HomeTeam='$awayteam')OR(AwayTeam='$awayteam') order by `Div` desc limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
//echo "<br>Dropped!! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from v1 where (HomeTeam='$awayteam' AND FTR='H')OR(AwayTeam='$awayteam' AND FTR='A');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r6=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view v1;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 7 - The number of draw games of the away team during the last five rounds. 
// S1: CREATE VIEW
$q1="create view v1 as select Date,HomeTeam,AwayTeam,FTR from seasons where (HomeTeam='$awayteam')OR(AwayTeam='$awayteam') order by `Div` desc limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
//echo "<br>Dropped!! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from v1 where (HomeTeam='$awayteam' AND FTR='D')OR(AwayTeam='$awayteam' AND FTR='D');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r7=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view v1;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//	echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 8 - The number of lose games of the away team during the last five rounds. 
// S1: CREATE VIEW
$q1="create view v1 as select Date,HomeTeam,AwayTeam,FTR from seasons where (HomeTeam='$awayteam')OR(AwayTeam='$awayteam') order by `Div` desc limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
	//echo "Created! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from v1 where (HomeTeam='$awayteam' AND FTR='L')OR(AwayTeam='$awayteam' AND FTR='L');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r8=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view v1;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//	echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

$r9=$r3*3+$r4;
$r10=$r6*3+$r7;
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 11 - The number of win games of the home team during the last five home rounds. 
// S1: CREATE VIEW
$q1="create view Temp12 as select * from seasons where (HomeTeam = '$hometeam') order by `Div` DESC limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
	//echo "Created! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from Temp12 where (HomeTeam = '$hometeam' AND FTR = 'H');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r11=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view Temp12;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//	echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 12 - The number of draw games of the home team during the last five home rounds. 
// S1: CREATE VIEW
$q1="create view Temp12 as select * from seasons where (HomeTeam = '$hometeam') order by `Div` DESC limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
	////echo "Created! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from Temp12 where (HomeTeam = '$hometeam' AND FTR = 'D');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r12=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view Temp12;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//	echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 13 - The number of lose games of the home team during the last five home rounds. 
// S1: CREATE VIEW
$q1="create view Temp12 as select * from seasons where (HomeTeam = '$hometeam') order by `Div` DESC limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
	////echo "Created! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from Temp12 where (HomeTeam='$hometeam' AND FTR='A');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r13=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view Temp12;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//	echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 14 - The number of win games of the away team during the last five Away rounds. 
// S1: CREATE VIEW
$q1="create view Temp12 as select * from seasons where (AwayTeam = '$awayteam') order by `Div` DESC limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
	////echo "Created! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from Temp12 where (AwayTeam = '$awayteam' AND FTR = 'A');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r14=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view Temp12;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//	echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 15 - The number of draw games of the away team during the last five home rounds. 
// S1: CREATE VIEW
$q1="create view Temp12 as select * from seasons where (AwayTeam = '$awayteam') order by `Div` DESC limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
	////echo "Created! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from Temp12 where (AwayTeam = '$awayteam' AND FTR = 'D');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r15=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view Temp12;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//	echo "<br>Dropped!! Yay!";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 16 - The number of lose games of the away team during the last five home rounds. 
// S1: CREATE VIEW
$q1="create view Temp12 as select * from seasons where (AwayTeam = '$awayteam') order by `Div` DESC limit 5;";
$q1_executed=mysqli_query($link,$q1);
if($q1_executed)
	////echo "Created! Yay!";

// S2: SELECT COUNT(*) QUERY
$q2="select count(*) from Temp12 where (AwayTeam = '$awayteam' AND FTR = 'H');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r16=$res2['count(*)'];

// S3: DROP VIEW 
$q3="drop view Temp12;";
$q3_executed=mysqli_query($link,$q3);
if($q3_executed)
//	echo "<br>Dropped!! Yay!"."<br>";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 17 - Avg goals scored by the home team:
// S1: CREATE VIEW
// S2: SELECT COUNT(*) QUERY
$q2="select AVG(FTHG) from seasons where (HomeTeam = '$hometeam')OR(AwayTeam='$hometeam');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r17=$res2['AVG(FTHG)']."<br>";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 18 - Avg goals conceded by the home team:
// S1: CREATE VIEW
// S2: SELECT COUNT(*) QUERY
$q2="select AVG(FTAG) from seasons where (HomeTeam = '$hometeam')OR(AwayTeam='$hometeam');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r18=$res2['AVG(FTAG)']."<br>";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 19 - Avg goals scored by the away team:
// S1: CREATE VIEW
// S2: SELECT COUNT(*) QUERY
$q2="select AVG(FTHG) from seasons where (HomeTeam = '$awayteam')OR(AwayTeam='$awayteam');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r19=$res2['AVG(FTHG)']."<br>";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 20 - Avg goals conceded by the away team:
// S1: CREATE VIEW
// S2: SELECT COUNT(*) QUERY
$q2="select AVG(FTAG) from seasons where (HomeTeam = '$awayteam')OR(AwayTeam='$awayteam');";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r20=$res2['AVG(FTAG)']."<br>";
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 21 - The Current rank of the home team. 

// S1: SELECT COUNT(*) QUERY
$q2="select rank from previousrank where Team='$hometeam';";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r21=$res2['rank'];
//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
// FEATURE NUMBER 22 - The Current rank of the Away team. 

// S1: SELECT COUNT(*) QUERY
$q2="select rank from previousrank where Team='$awayteam';";
$q2_executed=mysqli_query($link,$q2);
$res2=mysqli_fetch_assoc($q2_executed);
$r22=$res2['rank'];
//-------------------------------------------------------------------------------------------------------------------------------------------------------------


/*$count=$res1->num_rows;
if($count==1)
//	echo "Welcome ";
else
//	echo "Invalid Details.";
// Close Connection at the end of the file*/



//Features variables
//$x2=;
/*$x3=;
$x4=;
$x5=;
$x6=;
$x7=;
$x8=;
$x9=;
$x10=;
$x11=;
$x12=;*/
?>
<!--
<table width="50%" border="5" align="center" cellpadding="5" cellspacing="5">
  <tbody>
    <tr>
      <td>Variable </td>
      <td>Feature </td>
      <td>Score</td>
    </tr>
    <tr>
      <td>X1</td>
      <td>The Current rank of the home Team</td>
      <td><?php echo $r1;?></td>
    </tr>
    <tr>
      <td>X2</td>
      <td>The Current rank of the away Team</td>
      <td><?php echo $r2;?></td>
    </tr>
    <tr>
      <td>X3</td>
      <td>The number of win games of the home team during the last five rounds</td>
      <td><?php echo $r3;?></td>
    </tr>
    <tr>
      <td>X4</td>
      <td>The number of draw games of the home team during the last five rounds</td>
      <td><?php echo $r4;?></td>
    </tr>
    <tr>
      <td>X5</td>
      <td>The number of lose games of the home team during the last five rounds</td>
      <td><?php echo $r5;?></td>
    </tr>
    <tr>
      <td>X6</td>
      <td>The number of win games of the away team during the last five rounds</td>
      <td><?php echo $r6;?></td>
    </tr>
    <tr>
      <td>X7</td>
      <td>The number of draw games of the away team during the last five rounds</td>
      <td><?php echo $r7;?></td>
    </tr>
    <tr>
      <td>X8</td>
      <td>The number of lose games of the away team during the last five rounds</td>
      <td><?php echo $r8;?></td>
    </tr>
    <tr>
      <td>X9</td>
      <td>The points earned by the home team during the last five rounds</td>
      <td><?php echo $r9;?></</td>
    </tr>
    <tr>
      <td>X10</td>
      <td>The points earned by the away team during the last five rounds</td>
      <td><?php echo $r10;?></</td>
    </tr>
    <tr>
      <td>X11</td>
      <td>The number of win games of the home team of its last five home games</td>
      <td><?php echo $r11;?></td>
    </tr>
    <tr>
      <td>X12</td>
      <td>The number of draw games of the home team of its last five home games</td>
      <td><?php echo $r12;?></td>
    </tr>
    <tr>
      <td>X13</td>
      <td>The number of lose games of the home team of its last five home games</td>
      <td><?php echo $r13;?></td>
    </tr>
    <tr>
      <td>X14</td>
      <td>The number of win games of the away team of its last five away games</td>
      <td><?php echo $r14;?></td>
    </tr>
    <tr>
      <td>X15</td>
      <td>The number of draw games of the away team of its last five away games</td>
      <td><?php echo $r15;?></td>
    </tr>
    <tr>
      <td>X16</td>
      <td>The number of lose games of the away team of its last five away games</td>
      <td><?php echo $r16;?></td>
    </tr>
    <tr>
      <td>X17</td>
      <td>The average goal scored of the home team</td>
      <td><?php echo $r17;?></td>
    </tr>
    <tr>
      <td>X18</td>
      <td>The average goal conceded of the home team</td>
      <td><?php echo $r18;?></td>
    </tr>
    <tr>
      <td>X19</td>
      <td>The average goal scored of the away team</td>
      <td><?php echo $r19;?></td>
    </tr>
    <tr>
      <td>X20</td>
      <td>The average goal conceded of the away team</td>
      <td><?php echo $r20;mysqli_close($link);?></td>
    </tr>
    <tr>
      <td>X21</td>
      <td>The rank of the home team last season</td>
      <td><?php echo $r21;?></td>
    </tr>
    <tr>
      <td>X22</td>
      <td>the rank of the away team last season</td>
      <td><?php echo $r22;?></td>
    </tr>
  </tbody>
</table>
</center>
-->
<?php
$team1_odd=(20-$r1)*3+$r3*10+$r4*5-$r5+$r9+$r11*20+$r12*7-$r13+$r17*10-$r18*10+(20-$r21)*2;
$team2_odd=(20-$r2)*3+$r6*10+$r7*5-$r8+$r10+$r14*20+$r15*7-$r16+$r19*10-$r20*10+(20-$r22)*2;
?>
<br>
<center> <h2>
TEAM 1 Points (If you bet 100 points, You will get -> ): <?php echo $team2_odd?><br>
TEAM 2 Points (If you bet 100 points, You will get -> ): <?php echo $team1_odd?>
</center></h2>
</body>
</html>


