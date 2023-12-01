<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
	<link rel="stylesheet" href="../css/ch.css"/>
	<title>Check ivents</title>
</head>
<body>
	<div class="container">
	<?php 
		require_once '../php-files/connect.php';
		$user_id = $_COOKIE['user_id'];
		$select_event = "select * from events where '$user_id' = Student_id";
		$result_event_name = $connect->query($select_event);
		while($name_event = mysqli_fetch_array($result_event_name)):
	?>
	<p>
		<?php 
			echo $name_event[1], ' ', $name_event[2], ' ', $name_event[5];
		?>
	</p>
	<table>
		<thead>
			<tr>
				<th>Имя</th>
				<th>Фамилия</th>
				<th>Пришел?</th>
			</tr>
		</thead>
		<?php 
			$select = "SELECT users.Student_id
						FROM users
						WHERE users.Student_id in (SELECT events_come.Student_id
													FROM events_come
													join events on events_come.Event_id = events.Event_id
													WHERE events.Student_id = '$user_id')";
			$result = $connect->query($select);
			while($row = mysqli_fetch_array($result)):
		?>
		<tbody>
			<tr>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
				<form action="../php-files/approve-students.php" method="post">
					<td>
						<button value="<?php echo $row[0]; ?>" name = "yes" class="buttonClub">Да</button>
						<button value="<?php echo $row[0]; ?>" name = "no" class="buttonClub">Нет</button>
					</td>
				</form>
			</tr>
		</tbody>
		<?php 
			endwhile;
		endwhile;
		?>
	</table>
	<a href="http://localhost/UsptuCamCon/html/main.php">
    	<img class="icon" src="../icon/Group 6.png"/>
    </a> 
	</div>
</body>
</html>