<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>107期末測驗實作題</title>
</head>
<body>
    <form action="myPHP.php" id="form1" name="form1">
        <input type="submit" name="submit" id="submit" value="送出">
    </form>
</body>
</html>

<?php    
    session_start();
    //session_destroy();
    if(!isset($_SESSION['xnu']))
        $_SESSION['xnu']=array();

    //random 3 numbers
    $nums = array();
    while(count($nums)<3){
        $num = rand(0,9);
        if(!in_array($num, $nums)){
            $nums[] = $num;
        }
    }
    $numsString = implode('', $nums);
    //$_SESSION['nums'] = $nums;
    //$_SESSION['arr_num'] = $numsString;

    //show array in the first time
    if(!isset($_SESSION['array_called'])){
        $array = array();
        $i=0;
        while($i<3){
            $array[] .= "[".$i ."] => ". $nums[$i] ." ";
            $i++;
        }
        echo "Array(".implode("",$array).")";

        /*$array[] = $numsString;
        $_SESSION['array'] = $array;
        foreach($_SESSION['array'] as $key => $value){
            print_r($value);
        }*/

        $_SESSION['array_called']="true";
    }else{
        //show numsss
        if(!isset($_SESSION['count'])){
            $_SESSION['count']=0;
        }else{
            $_SESSION['count']++;
        }        
        
        //紀錄次數及隨機數字
        $_SESSION['xnu'][] = $_SESSION['count']."=".$numsString."<br>";  

        //按第二次後的顯示
        foreach($_SESSION['xnu'] as $value){
            echo $value;
        }
        /*if(isset($_SESSION['xnu'])){
            foreach($_SESSION['xnu'] as $value){
                echo $value;
            }
        }*/       
        
        //假設這 3 位數用 ABC 排列，如果abs(B-A)=abs(C-B)就停止
        $abs=abs($nums[1]-$nums[0]);
        $abs2=abs($nums[2]-$nums[1]);
        if($abs==$abs2 || $_SESSION['count'] >= 9){
            echo "總共試了10次或已找到數字了喔!";
            include 'insert.php';
            
        }
    }
    
?>
