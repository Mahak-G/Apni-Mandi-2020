<?php

$link = mysqli_connect('localhost', 'root', '');
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$re= mysqli_query($link,"CREATE DATABASE apni");

$de=mysqli_query($link,"USE apni");

 $sql = "CREATE TABLE `COMMON` (
`USERID` varchar( 30 ) NOT NULL ,
`PSWD` varchar( 40 ) NOT NULL ,
`CONTACT` varchar( 10 ) NOT NULL ,
`EMAIL` varchar( 40 ) DEFAULT NULL ,
`CITY` varchar( 1000 ) NOT NULL ,
`VILLAGE` varchar( 1000 ) NOT NULL,
`ID` int( 11 ) NOT NULL,
`ORDID` int( 11 ) NOT NULL ,
`TOTALPRICE` int( 5 ) NOT NULL ,
`ORDDATE` datetime NOT NULL ,
`QUALITY` int( 4 ) NOT NULL ,
`PRODUCTID` int( 11 ) NOT NULL,
`UNITPRICE` int( 5 ) NOT NULL ,
`HARVESTED` date NOT NULL ,
`QTY` int( 11 ) NOT NULL ,
`BILLINGADD` varchar( 90 ) NOT NULL 
)";
$result=mysqli_query($link,$sql);
$sql="ALTER TABLE `users` ADD `aadhar` INT(12) NULL AFTER `ID`";
$sql = "ALTER TABLE `COMMON` ADD PRIMARY KEY ( `ID` , `ORDID` , `PRODUCTID` )  ";

$result=mysqli_query($link,$sql);

 $sql = "CREATE TABLE `USERS` (
`USERID` varchar( 60 ) UNIQUE KEY NOT NULL ,
`PSWD` varchar( 40 ) UNIQUE KEY NOT NULL ,
`ROLE` varchar( 10 )  NOT NULL ,
`CONTACT` varchar( 10 ) UNIQUE KEY NOT NULL ,
`EMAIL` varchar( 40 ) DEFAULT NULL ,
`CITY` varchar( 1000 ) NOT NULL ,
`VILLAGE` varchar( 1000 ) NOT NULL,
`aadhar` VARCHAR(12) NULL,
`ID` int( 11 ) PRIMARY KEY NOT NULL AUTO_INCREMENT 
)";

$result=mysqli_query($link,$sql);
 $sql = "CREATE TABLE `TRANSACTION` (
`NAME` varchar( 60 ) UNIQUE KEY NOT NULL ,
`CITY` varchar( 1000 ) NOT NULL ,
`VILLAGE` varchar( 1000 ) NOT NULL
)";


$result=mysqli_query($link,$sql);
 $sql = "CREATE TABLE `FARMER_PRODUCT` (
`FARMERID` varchar( 11 ) NOT NULL ,
`QTY` varchar( 7 ) NOT NULL ,
`QUALITY` varchar( 4 ) NOT NULL ,
`UNITPRICE` varchar( 5 ) NOT NULL ,
`PRODNAME` varchar( 15 ) NOT NULL,
`HARVESTED` date,
`PRODUCTID` int( 11 )  AUTO_INCREMENT PRIMARY KEY NOT NULL 
)";
$result=mysqli_query($link,$sql);
/*if($result === false){
    echo "not 3";
}
else
{
echo "<br>table successfully created <br>";
}*/
$sql = "CREATE TABLE `ORDER_CUST` (
`CUSTID` int( 11 ) NOT NULL,
 `BILLINGADD` varchar( 90 ) NOT NULL,
`DATE` datetime,
 `TOTALPRICE` int( 5 ) NOT NULL,
`ORDID` int(11) NOT NULL
)";
$result=mysqli_query($link,$sql);
$sql = "ALTER TABLE `ORDER_CUST` ADD PRIMARY KEY ( `ORDID` , `CUSTID` ) ; ";
$result=mysqli_query($link,$sql);

$sql = "CREATE TABLE `ORDERITEM` (
`ORDERID` int( 11 ) NOT NULL ,
`PRODUCTID` int( 11 ) NOT NULL ,
`QTY` int( 11 ) NOT NULL
)";
$result=mysqli_query($link,$sql);
$sql = "ALTER TABLE `ORDERITEM` ADD PRIMARY KEY ( `ORDERID` , `PRODUCTID` ) ; ";
$result=mysqli_query($link,$sql);
?>
