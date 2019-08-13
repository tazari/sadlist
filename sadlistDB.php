<?php
//choosing not to include error messages so as not to confuse the user
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "username_project";

$cnxn = mysqli_connect($servername, $username, $password);

if (!$cnxn){
    echo "Could not connect: " . mysqli_connect_error();
}
else {
    $database = "username_project";
    $sql = "CREATE DATABASE $database";
    $query = (mysqli_query($cnxn, $sql));

    mysqli_select_db($cnxn, $database) or die ('Database inaccessible');

    $table = "azari_tanya_sadlist";
    $sql = "SHOW TABLES LIKE '$table'";
    $query = mysqli_query($cnxn, $sql);

    if (mysqli_num_rows($query) == 0) {
        $sql = "CREATE TABLE $table (
                                    sugNum SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                                    sugString VARCHAR(100), 
                                    outdoors VARCHAR(30), 
                                    physActivity VARCHAR(30),
                                    time VARCHAR(30), 
                                    money VARCHAR(4) 
                                    )"; /* potential to add more categories as more nuanced suggestions are added */
        $query = (mysqli_query($cnxn, $sql));
        if (!$query){
            echo "<p>Error creating table: " . mysqli_error($cnxn) . "</p>";
        }
    }

    $Suggestion = stripslashes($_POST['sugString']);
    $Location = stripslashes($_POST['outdoors']);
    $HaveToMove = stripslashes($_POST['physActivity']);
    $Duration = stripslashes($_POST['time']);
    $Cost = stripslashes($_POST['money']);

    $sql = "INSERT INTO $table VALUES (
                                        NULL, 
                                        '$Suggestion', 
                                        '$Location', 
                                        '$HaveToMove', 
                                        '$Duration', 
                                        '$Cost' 
                                        )";
    $query = mysqli_query($cnxn, $sql);

    if (!$query) {
        echo "<p>Error adding values: " . mysqli_error($cnxn) . "</p>";
    }
    else {
        echo "<h1>Thank you for your input!</h1>";
        echo"<p>Click <a href='sadlistTable.php'>HERE</a> to see all suggestions.</p>";
    }

    mysqli_close($cnxn);
}
?>

