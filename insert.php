<?php
    require_once 'db_con.php';
    $xe = $_SESSION['count'];
    $data = date('YmdHis');
    //master
    $master = "INSERT INTO mymaster VALUES ('$data', '".($xe+1)."')";
    $result = mysqli_query($link, $master);
    //detail
    foreach($_SESSION['xnu'] as $i => $value){
        $num = explode("=", $value)[1];
        $tail = "INSERT INTO mydetail VALUES ('$data','".($i+1)."','$num')";
        $result = mysqli_query($link, $tail);
    }

    mysqli_close($link);
    session_destroy();
?>
