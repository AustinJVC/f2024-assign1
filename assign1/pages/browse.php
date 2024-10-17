<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>F1 Dashboard Project</title>
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
    <section>
        <aside>
            <?php
            include_once('../api/races.php');
            $races = json_decode(getAllRaces(), true);

            echo '<table>';
            echo '<caption>2022 Races</caption>';
            echo '<tr>
                    <th>Rnd</th>
                    <th>Circuit</th>
                    <th>Action</th>
                  </tr>';
            $i = 1;
            foreach ($races as $race) {
                echo '<tr>';
                echo "<td>$i</td>";
                $i++;
                echo "<td>" . $race['name'] . "</td>";
                echo "<td><a href='browse.php?ref=" . $race['raceId'] . "'>Results</a></td>";
                echo '</tr>';
            }
            echo '</table>';
            ?>
        </aside>

        <div class='content'>
            <?php
            if (isset($_GET['ref'])) {
                $race = $_GET['ref'];
                echo "<h2>Qualifying</h2>";
                echo '<table>';
                echo '<caption>Qualifying Results</caption>';
                echo '<tr>
                        <th>Pos</th>
                        <th>Driver</th>
                        <th>Constructor</th>
                        <th>Q1</th>
                        <th>Q2</th>
                        <th>Q3</th>
                      </tr>';
            } else {
                echo '<h1>Select A Race</h1>';

            }

            include_once('../api/qualifying.php');
            $qualifying = json_decode(getQualifying($race), true);

                    foreach($qualifying as $qualifier){
                        echo '<tr>';
                        echo "<td>".$qualifier['position']."</td>";
                        echo "<td> <a href=driver.php?ref=".$qualifier['driverRef'].">".$qualifier['forename']." ".$qualifier['surname']."</a></td>";
                        echo "<td>".$qualifier['constructor_name']."</td>";
                        echo "<td>".$qualifier['q1']."</td>";
                        echo "<td>".$qualifier['q2']."</td>";
                        echo "<td>".$qualifier['q3']."</td>";
                        echo '</tr>';
                    };
                }
            ?>
        </div>
    </section>
</body>

</html>