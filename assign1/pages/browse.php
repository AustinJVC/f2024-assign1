<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
       <header>
            <h1> F1 Dashboard Project </h1>
            <a href='home.php'>Home</a>
            <a href='browse.php'>Browse</a>
            <a href='apis.php'>APIs</a>
        </header>
        <sidebar>
            
            <?php
                $races=[
                    ["British Grand Prix","Link"],
                    ["Italian Grand Prix", "Link"],
                ];
                echo '<table>';
                echo '<caption>2022 Races</caption>';
                echo '<tr>
                            <th>Rnd</th>
                            <th>Circuit</th>
                        </tr>';

                
                foreach($races as $race){
                    echo '<tr>';
                    echo "<td>$race[0]</td>";
                    echo "<td><a href=$race[1]>Results</a></td>";
                    echo '</tr>';
                };
                
            ?>
        </sidebar>
        <div class='content'>

            <h2>Please Select a race</h2>        

        </div>
    </body>
</html>