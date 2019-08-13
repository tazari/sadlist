<?php
$colors = array("#ffd295","#ffe490", "#F5DDAF", "#FEDEAC", "#F9DFA9", "#f7d691",
                "#FED8AF", "#f4cec3", "#fed493", "#fecb9d", "#FFC4A2", "#f9cb91",
                "#eeccb9", "#e4c9b9", "#f7c7b0", "#f6cfa5", "#F5D5CB", "#ffe4d4",
                "#fdd7c3", "#f6e2e0", "#fddec8", "#f8d5c4", "#dbcad1", "#fde2c8");
$randomColor = $colors[array_rand($colors)];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel='icon' href='cherry-blossom_1f338.ico' type='image/x-icon'/ >
    <title>Sadlist</title>
    <style>
        body {background-color: <?php echo $randomColor; ?>;}
        #daddyBox {text-align: center;}
        #box, {text-align: center;
               display: inline-block;}
        #box {margin-top: 20%;}
        #sug {position: relative;}

    </style>
</head>

<body>

<div id="daddyBox">
    <div id="box">
        <p id="sug">
            <?php
            $user="root";
            $password="";
            $host="localhost";

            $cnxn = mysqli_connect($host, $user, $password);

                $database = "username_project";
                $query = mysqli_select_db($cnxn, $database);

                if (!$query)
                    echo "<p>There are no suggestions for what to do when you're sad. <br/> <a href='sadlistAdd.php'>Add One!</a></p>";
                else {
                    $table = "azari_tanya_sadlist";
                    $sql = "SELECT sugString FROM $table";
                    $query = mysqli_query($cnxn, $sql);

                    if (mysqli_num_rows($query) == 0)
                        echo "<p>There are no suggestions for what to do when you're sad. <a href='sadlistAdd.php'>Add One!</a></p>";
                    else {
                        $sql = "SELECT * FROM $table ORDER BY rand() LIMIT 1";
                        $query = mysqli_query($cnxn, $sql);

                        while ($results = $query->fetch_assoc()) {
                            echo "<p><h1>" . $results['sugString'] . "</h1></p><br/>";
                        }

                        echo"<br/><br/><br/>";
                        echo"<button id=\"new\" onclick=window.location.href=\"sadlist.php\";>Hmmm... <br/>give me something else</button>";
                        /* eventually I want to add a button that says "I don't want to go outside/ pay that much money/ move around so much"
                        /* the text content of the button would depend on the data input into the table for each result
                        /* then, when the user clicks that button, it would use an sql request to filter out any sugString with a value of 'outdoors' / $$$/ etc.
                        /* however, I've worked over 20 hours on this site, and still am not sure how to complete that task in time for tomorrow...
                        /* ...so I am setting it aside as my post-classes summer project! */
                        echo"<br/><br/>";
                        echo"<button id=\"add\" onclick=window.location.href=\"sadlistAdd.php\";>Can I make a suggestion?</button>";


                    }

                    mysqli_free_result($query);
                }

                mysqli_close($cnxn);
            ?>
        </p>
    </div>
    <br/>
</div>

</body>
</html>
