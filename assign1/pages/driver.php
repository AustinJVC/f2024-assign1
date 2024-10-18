<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/constructorsdrivers.css">
    </head>
    <body>
        <header>
        <h1> F1 Dashboard Project </h1>
        <nav>
            <a href='index.php'>Home</a>
            <a href='browse.php'>Browse</a>
            <a href='apis.php'>APIs</a>
        </nav>
        </header>
        <div class='container'>
            <aside>
                <?php
                    
                    include_once('../api/drivers.php');
                    $driverRef = $_GET['ref'];                    
                    
                    $driver = json_decode(getrefDrivers($driverRef), true);

                    $driver = $driver[0];

                    $now      = new DateTime();
                    $birthday = new DateTime($driver['dob']);
                    $age = $now->diff($birthday)->format('%y years');

                    echo "<h2>Driver Details</h2>";
                    echo "<ul>";
                    echo "<li class=name>".$driver['forename']." ".$driver['surname']."</li>";
                    echo "<li class=dob>".$driver['dob']."</li>";
                    echo "<li class=age>".$age."</li>";
                    echo "<li class=nationality>".$driver['nationality']."</li>";
                    echo "<li><a target=_blank href=".$driver['url'].">Website</a></li>";
                    echo "</ul>"
                
                    
                    
                ?>
            </aside>
            <div class='content'>

            <?php
                
                if (isset($_GET['ref'])) {
                    $driverRef = $_GET['ref'];
                    echo '<table>';
                    echo '<caption>Race Results</caption>';
                    echo '<tr>
                            <th>Rnd</th>
                            <th>Circuit</th>
                            <th>Pos</th>
                            <th>Points</th>
                          </tr>';
    
                include_once('../api/results.php');

                $results = json_decode(getDriverResults($driverRef), true);
                
                    foreach($results as $result){
                        echo '<tr>';
                        echo "<td>".$result['round']."</td>";
                        echo "<td>".$result['name']."</td>";
                        echo "<td>".$result['position']."</td>";
                        echo "<td>".$result['points']."</td>";
                        echo '</tr>';
                    };
                        echo "</table>";
                    } else {
                        echo '<h1>Select A Race</h1>';
        
                    }
                
            ?>
            </div>
        </div>
    </body>
</html>