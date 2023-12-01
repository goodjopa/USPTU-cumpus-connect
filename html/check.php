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
	<table>
		<thead>
			<tr>
				<th>Название</th>
				<th>Кол-во</th>
				<th>Дата</th>
				<th>Описание</th>
				<th>Да</th>
				<th>Нет</th>
			</tr>
		</thead>
		<?php 
			require_once '../php-files/connect.php';
			$select = "Select * from request_to_create";
			$result = $connect->query($select);
			while($row = mysqli_fetch_array($result)):
		?>
		<tbody>
			<tr>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[4]; ?></td>
				<td><?php echo $row[3]; ?></td>
				<form action="../php-files/check-ivents.php" method="post">
					<td><button value="<?php echo $row[0]; ?>" name = "ok" class="buttonClub">Принять</button></td>
					<td><button value="<?php echo $row[0]; ?>" name = "notok" class="buttonClub">Отклонить</button></td>
				</form>
			</tr>
		</tbody>
		<?php endwhile; ?>
	</table>
	<a href="http://localhost/UsptuCamCon/html/main.php">
    	<img class="icon" src="../icon/Group 6.png"/>
    </a>
	</div>
</body>
</html>