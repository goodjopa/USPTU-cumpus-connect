
<?php 
    require_once 'connect.php';
    $query = "SELECT u1.id
                FROM users u1
                JOIN events_come e1 ON u1.Student_id = e1.Student_id
                JOIN events_come e2 ON u1.Student_id = e2.Student_id
                WHERE e1.Student_id <> e2.Student_id
                GROUP BY u1.Student_id
                HAVING COUNT(DISTINCT e1.Student_id) >= 1";
    $result = $connect->query($query);
    if($result->num_rows > 0):
        while($row = $result->fetch_assoc()) {
            echo "User ID: " . $row['Student_id']. "<br>";
        }
    endif;
?>