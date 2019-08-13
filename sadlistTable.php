<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='icon' href='cherry-blossom_1f338.ico' type='image/x-icon'/ >
    <title>Candidate Interviews</title>
    <style>
        #footer{position: fixed; left: 0; bottom: 1%; width: 100%; text-align: center;}
        h1 {text-align: center;}
        body {background-color: #ffe1df;}
    </style>
</head>
<body>
<?php

//choosing not to include error messages so as not to confuse the user
error_reporting(0);

$user="root";
$password="";
$host="localhost";

$cnxn = mysqli_connect($host, $user, $password);

    $database = "username_project";
    $query = mysqli_select_db($cnxn, $database);

    if (!$query)
        echo "<p style='display:inline-block;margin-top:15%;margin-left:35%;text-align:center;'>There are no suggestions for what to do when you're sad. <br/><a href='sadlistAdd.php'>Add One!</a></p>";
    else {
        $table = "azari_tanya_sadlist";
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($cnxn, $sql);

        if (mysqli_num_rows($query) == 0)
            echo "<p style='display:inline-block;margin-top:15%;margin-left:35%;text-align:center;'>There are no suggestions for what to do when you're sad. <a href='sadlistAdd.php'>Add One!</a></p>";
        else {
            echo "<h1>Suggestions</h1>";
            echo "<table width='100%' border='1'><style> table {border-collapse: collapse; background-color: white;} th {background-color: lightgray;}</style>";
            echo "<tr><th>Suggestion</th><th>Outdoors/Indoors</th><th>Level of movement required</th>";
            echo "<th>Duration</th><th>Cost</th></tr>";

            while ($tableRow = mysqli_fetch_array($query)) {
                echo "<tr><td>{$tableRow['sugString']}</td>";
                echo "<td>{$tableRow['outdoors']}</td>";
                echo "<td>{$tableRow['physActivity']}</td>";
                echo "<td>{$tableRow['time']}</td>";
                echo "<td>{$tableRow['money']}</td></tr>";
            }
        }

        mysqli_free_result($query);
    }

    mysqli_close($cnxn);



?>

<div id="footer">
    <button onclick="window.location.href = 'sadlistAdd.php'">add another suggestion</button>
    <button onclick="window.location.href= 'sadlist.html'">back to sadlist</button>
</div>

</body>
</html>

