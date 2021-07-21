<?php
$host="localhost";
$user="root";
$psw="naruto563610";
$for_query=mysqli_connect($host,$user,$psw);
$db_name="editor";
$tbl="editor";
$db_list=mysqli_query($for_query, "SHOW DATABASES;");

$flag=0;

while ($row=mysqli_fetch_object($db_list)){ //проверка наличия БД
    if ($row->Database==$db_name){
        $flag=1;
    }
}

if ($flag==0){
    mysqli_query($for_query, "CREATE DATABASE ".$db_name.";");
}

mysqli_query($for_query, "USE ".$db_name.";");
$tbl_list=mysqli_query($for_query, "SHOW TABLES;");
$flag=0;

while ($row=mysqli_fetch_row($tbl_list)){ //проверка наличия таблицы
    if ($row[0]==$tbl) $flag=1;
}

if ($flag==0){//создание таблицы
    mysqli_query($for_query, "CREATE TABLE ".$tbl."(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name varchar(50) NOT NULL,
        item_id int NOT NULL,
        item_name text NOT NULL,
		text text);");
}
?>