<?php	session_start();	require_once('../config.php');		if(!isset($_SESSION['id'])) {		header('Location:../index.php');	}?><!DOCTYPE html><html><head>	<title>User's Account Activiation/Deactivation</title>		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">		<link rel="stylesheet" type="text/css" href="css/style1.css"></head><body><nav class="navbar navbar-inverse">	<div class="container-fluid">		<div class="navbar-header">			<a class="navbar-brand" href="https://www.sourcecodester.com">Sourcecodester</a>		</div>		<ul class="nav navbar-nav">			<li><a href="#">Home</a></li>			<li><a href="#">About</a></li>			<li class="active"><a href="#">Account's</a></li>		</ul>		<ul class="nav navbar-nav navbar-right">			<li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>		</ul>	</div></nav><div class="container"><h2>Account's Information</h2>	<table class="table">		<thead>			<tr>				<th>ID</th>				<th>Username</th>				<th>Function</th>			</tr>		</thead>		<tbody>			<?php				$result=$dbh->prepare("Select * From tb_users Order By id ASC");				$result->execute();				while($row = $result->fetch(PDO::FETCH_ASSOC)){						echo "<tr>";					echo "<td>".$row['id']."</td>";					echo "<td>".$row['username']."</td>";					if($row['user_status']=='Active') {						echo "<td><a href='update_status.php?userid=$row[id]' class='btn btn-success'>".$row['user_status']."</a></td>";					}else{						echo "<td><a href='update_status.php?userid=$row[id]' class='btn btn-warning'>".$row['user_status']."</a></td>";					}					echo "</tr>";				}			?>		</tbody>	</table></div><div align="center">	<footer><p><em>Sourcodester</em>&copy2016</p></footer></div></body></html>