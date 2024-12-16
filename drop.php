<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create tables PHP Script</title>
</head>

<body>
    <?php
    require("db.php");

    $sql = "DROP TABLE card;";

    if ($conn->query($sql) === TRUE) {
        echo "dropped table card";
    } else {
        echo "Table buyer already exists";
    }

    $conn->close();
    ?>
    <div>
        <a href="signup.php"><input type="button" id="btn1" value="Home"></a>
    </div>
</body>

</html>