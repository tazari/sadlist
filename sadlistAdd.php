<!doctype HTML>
<head>
    <link rel='icon' href='cherry-blossom_1f338.ico' type='image/x-icon'/ >
    <title>Add Suggestion</title>
    <style>
        #box {display: inline-block;
            margin-top: 10%;
            margin-left: 30%}
        body {background-color: #ffcfcc;}
    </style>
</head>
<body>
  <div id="box">

    <h1>Add suggestions here</h1>
    <form action="sadlistDB.php" method="post" id="sugForm">
        <p><strong>Suggestion:</strong>
            <textarea name="sugString" form="sugForm"></textarea></p>
        <p><strong>Is it indoors or outdoors?</strong><br/>
            <input type="radio" name="outdoors" value="indoors"> Indoors </input>
            <input type="radio" name="outdoors" value="outdoors">Outdoors </input></p>
        <p><strong>How much physical activity/ effort does it require?</strong><br/>
            <input type="radio" name="physActivity" value="Little to none">Little to none</input>
            <input type="radio" name="physActivity" value="Some">Some</input>
            <input type="radio" name="physActivity" value="A decent amount of moving">A decent amount of moving</input>
            <input type="radio" name="physActivity" value="Intensive Movement">Intensive Movement</input></p>
        <p><strong>How long does it take to do this activity?</strong><br/>
            <input type="radio" name="time" value="A few sec/min" />Not long at all</input>
            <input type="radio" name="time" value="20min +" />20 minutes or more</input>
            <input type="radio" name="time" value="1hr +" />At least an hour</input>
            <input type="radio" name="time" value="Days" />We're talking days here</input></p>
        <p><strong>How much does it cost?</strong><br/>
            <input type="radio" name="money" value="$">$</input>
            <input type="radio" name="money" value="$$">$$</input>
            <input type="radio" name="money" value="$$$">$$$</input>
            <input type="radio" name="money" value="$$$$">$$$$</input></p>
        <input type="submit" value="Add Suggestion" />
    </form>

    <br/>
    <br/>
    <a href="sadlistTable.php">View All Suggestions</a>

</div>

</body>
</html>