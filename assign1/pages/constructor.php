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

            include_once('../api/constructors.php');
            $constructorRef = $_GET['ref'];


            $constructor = json_decode(getSpecificConstructors($constructorRef), true);

            $constructor = $constructor[0];



            echo "<h2>Constructor Details</h2>";
            echo "<ul>";
            echo "<li> Name: " . $constructor['name'] . "</li>";
            echo "<li> Nationality: " . $constructor['nationality'] . "</li>";
            echo "<li><a target=_blank href=" . $constructor['url'] . ">Website</a></li>";




            ?>

        </aside>
        <div class='content'>

            <?php

            if (isset($_GET['ref'])) {
                $constructorRef = $_GET['ref'];
                echo '<table>';
                echo '<caption>Race Results</caption>';
                echo '<tr>
                            <th>Rnd</th>
                            <th>Circuit</th>
                            <th>Driver</th>
                            <th>Pos</th>
                            <th>Points</th>
                        </tr>';

                include_once('../api/results.php');

                $results = json_decode(getConstructorResults($constructorRef), true);

                foreach ($results as $result) {
                    echo '<tr>';
                    echo "<td>" . $result['round'] . "</td>";
                    echo "<td>" . $result['name'] . "</td>";
                    echo "<td>" . $result['forename'] . " " . $result['surname'] . "</td>";
                    echo "<td>" . $result['position'] . "</td>";
                    echo "<td>" . $result['points'] . "</td>";
                    echo '</tr>';
                }
                ;
                echo "</table>";
            }

            ?>
        </div>
    </div>
</body>

</html>