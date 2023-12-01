<?php
    require_once 'connect.php';

    $user_id = $_COOKIE['user_id'];
    $user_came_Y = $_POST['yes'];
    $user_came_N = $_POST['no'];

    if(isset($user_came_Y)){
        $upd = "update users
                set Rating = Rating + 2
                where Student_id = '$user_came_Y'";
        $connect->query($upd);
        $del = "delete from
                events_come where Student_id = '$user_came_Y' and Event_id in (SELECT Event_id
                                                                                from events
                                                                                where Student_id = '$user_id')";
        $event = "SELECT Event_id
                    from event_come
                    where Student_id = '$user_came_Y'";
        $event_id = $connect->query($event);
        $inser = "insert into friends (Student_id, Event_id)
                    values('$user_came_Y', '$event_id')";
        $connect->query($inser);
    } else if(isset($user_came_N)){
        $upd = "update users
        set Rating = Rating - 4
        where Student_id = '$user_came_N'";
        $connect->query($upd);
        
        $del = "delete
        from events_come
        where Student_id = '$user_came_N' and Event_id in (SELECT Event_id
                                                from events
                                                where Student_id = '$user_id')";
    }
    $connect->query($del);
    header('Location: http://localhost/UsptuCamCon/html/came-to-user.php');