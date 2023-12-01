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
				<th>
					<form method="post">
						<button name="sort_date">Дата</button>
					</form>
				</th>
				<th>Описание</th>
				<th>Присоединиться</th>
			</tr>
		</thead>
		<?php 
			require_once '../php-files/connect.php';
			$user_id = $_COOKIE['user_id'];
			if(isset($_POST['sort_date'])){
				$sort_results = '1';
			} else{
				$sort_results = "0";
			}
			$querry = "CALL SortEventsDate('$user_id', '$sort_results')";
			$result = $connect->query($querry);
			while($row = mysqli_fetch_row($result)):
		?>
		<tbody>
			<tr>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[3]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td><?php echo $row[2]; ?></td>
					<td><form action="../php-files/join-to-event.php" method="post"><button value="<?php echo $row[0]; ?>" name = "ok" class="buttonClub">Присоединиться</button></td>
				</form>
			</tr>
		</tbody>
		<?php
			endwhile;
        ?>
	</table> 

    <table>
		<thead>
			<tr>
				<th>Название</th>
				<th>Кол-во</th>
				<th>Дата</th>
				<th>Описание</th>
				<th>Отмена</th>
			</tr>
		</thead>
		<?php
			$text = "Присоединился\n";
			file_put_contents('../textjoin.txt',$text);
			$connect->next_result();
			$select = "SELECT * from events";
			$result2 = $connect->query($select);
			while($row = mysqli_fetch_row($result2)):
                $select_stud = "SELECT * FROM events_come WHERE Event_id = '$row[0]' AND Student_id = '$user_id'";
				$connect->next_result();
                $stud_id = $connect->query($select_stud);
                if($stud_id->num_rows > 0):
					$row2 = mysqli_fetch_array($stud_id);
		?>
		<tbody>
			<tr>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[3]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td><?php echo $row[2]; ?></td>
				<form action="../php-files/join-to-event.php" method="post">
					<td><button value="<?php echo $row2[1]; ?>"name = "notok" class="buttonClub">Отмена</button></td>
				</form>
			</tr>
		</tbody>
		<?php
			file_put_contents('../textjoin.txt', "Название: ". $row[1] . " Кол-во мест: ". $row[3] ." Дата и время: ". $row[5] ."\n", FILE_APPEND);
            endif;
            endwhile;
        ?>
	</table>
	</div>
	<a href="http://localhost/UsptuCamCon/html/main.php">
    	<img class="icon" src="../icon/Group 6.png"/>
    </a> 
</body>
</html>