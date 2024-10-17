<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1> F1 Dashboard Project </h1>
    <nav>
        <a href='index.php'>Home</a>
        <a href='browse.php'>Browse</a>
        <a href='apis.php'>APIs</a>
    </nav>
    <aside>
        <?php

        include_once('../api/constructors.php');
        $constructorRef = $_GET['ref'];

        $constructor = json_decode(getSpecificConstructors($constructorRef), true);
        var_dump($constructor);





        echo "Constructor Details";
        echo "<ul>";
        echo "<li>" . $constructor['name'] . "</li>";
        echo "<li>" . $constructor['nationality'] . "</li>";
        echo "<li><a target=_blank href=" . $constructor['url'] . ">Website</a></li>";




        ?>
    </aside>
    <div class='content'>

        <?php
        echo "<h2>Race Results</h2>";
        //Add the race results.
        
        ?>
    </div>
</body>

</html>