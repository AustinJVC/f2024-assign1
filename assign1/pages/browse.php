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
        <div class='container'>  
            <aside>
                <?php
                    
                    include '../api/races.php';
                    
                    $races = json_decode(getAllRaces(), true);
                    
                    echo '<table>';
                    echo '<caption>2022 Races</caption>';
                    echo '<tr>
                                <th>Rnd</th>
                                <th>Circuit</th>
                            </tr>';

                    foreach($races as $race){
                        echo '<tr>';
                        echo "<td>".$race['name']."</td>";
                        echo "<td><a>Results</a></td>";
                        echo '</tr>';
                    };
                    
                ?>
            </aside>
            <div class='content'>
          
            </div>
        </div>
    </body>
</html>