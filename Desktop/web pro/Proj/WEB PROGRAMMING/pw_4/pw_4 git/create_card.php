<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create tables PHP Script</title>
</head>

<body style="text-align: center;">
    <?php
require("db.php");

$sql = "CREATE TABLE card(
id int(6) unsigned auto_increment primary key,
address varchar(30) not null, 
age int(6) not null, 
bed int(6) not null, 
ad int (6) not null, 
garden varchar(20) not null, 
pa varchar(20) not null,  
tax int(20) not null,
image BLOB not null
);";

if ($conn->query($sql) === TRUE) {
    echo "Table card created";
} else {
    echo "Table card already exists";
}

$conn->close();
?>


    <div>
        <a href="signup.php"><input type="button" id="btn1" value="Home"></a>
    </div>
</body>

</html>