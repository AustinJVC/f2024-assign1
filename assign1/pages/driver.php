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
                    
                    include_once('../api/drivers.php');
                    $driverRef = $_GET['ref'];                    
                    
                    $driver = json_decode(getrefDrivers($driverRef), true);

                    $driver = $driver[0];

                    $now      = new DateTime();
                    $birthday = new DateTime($driver['dob']);
                    $age = $now->diff($birthday)->format('%y years');


                    echo "<ul>";
                    echo "<li>".$driver['forename']." ".$driver['surname']."</li>";
                    echo "<li>".$driver['dob']."</li>";
                    echo "<li>".$age."</li>";
                    echo "<li>".$driver['nationality']."</li>";
                    echo "<li><a target=_blank href=".$driver['url'].">Website</a></li>";
                    
                
                    
                    
                ?>
            </aside>
        <div class='content'>
                    
            <?php
                
                
            ?>
        </div>
    </body>
</html>