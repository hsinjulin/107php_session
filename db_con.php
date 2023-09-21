<?php
$link = mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    '107php');
    

    /*create table mymaster(
        id char(14) ,
        freq int,
        PRIMARY KEY (id)
    )
    CREATE TABLE mydetail (
        id CHAR(14),
        turn INT,
        rec CHAR(3),
        PRIMARY KEY (id, turn),//雙主鍵
        FOREIGN KEY (id) REFERENCES mymaster(id)//外鍵
    ); 

    */
?>

