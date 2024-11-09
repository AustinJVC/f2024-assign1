<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/apis.css">

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
        <div class='content'>
            <?php
            $apiList = [
                ["/api/circuits.php", "Returns all the circuits for the season", "/circuits.php"],
                ["/api/circuits.php?ref=?", "Returns just the specified circuit (use the circuitRef field), e.g., /api/circuits.php?ref=monaco", "/circuits.php?ref=monaco"],
                ["/api/constructors.php", "Returns all the constructors for the season", "/constructors.php"],
                ["/api/constructors.php?ref=?", "Returns just the specified constructor (use the constructorRef field), e.g., /api/constructors/mclaren", "/constructors.php?ref=mclaren"],
                ["/api/drivers.php", "Returns all the drivers for the season", "/drivers.php"],
                ["/api/drivers.php?ref=?", "Returns just the specified driver (use the driverRef field), e.g., /api/drivers/hamilton", "/drivers.php?ref=hamilton"],
                ["/api/drivers.php?race=?", "Returns the drivers within a given race, e.g., /api/drivers/race/1074", "/drivers.php?race=1074"],
                ["/api/races.php?ref=?", "Returns just the specified race. Don’t provide the foreign key for the circuit; instead provide the circuit name, location, and country.", "/races.php?ref=1074"],
                ["/api/races.php", "Returns the races within the 2022 season ordered by round, e.g., /api/races/season/2022", "/races.php"],
                ["/api/qualifying.php?ref=?", "Returns the qualifying results for the specified race, e.g., /api/qualifying/1074", "/qualifying.php?ref=1074"],
                ["/api/results.php?ref=?", "Returns the results for the specified race, e.g., /api/results/1074", "/results.php?ref=1074"],
                ["/api/results.php?driver=?", "Returns all the results for a given driver, e.g., /api/results/driver/max_verstappen", "/results.php?driver=max_verstappen"],
            ]
                ?>
            <h2>API List</h2>
            <span>
                    <?php
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>URL</th>";
                    echo "<th>Description</th>";
                    echo "</tr>";
                    foreach ($apiList as $api) {
                        echo "</tr>";
                        echo "<td> <a target='__blank' href='https://api.austinvc.ca/f1/.$api[2]'> $api[0] </a> </td>";
                        echo "<td>$api[1]</td>";
                        echo "</tr>";
                    }
                    echo "</table>"
                        ?>
                </ul>
            </span>
        </div>
    </div>
</body>

</html>