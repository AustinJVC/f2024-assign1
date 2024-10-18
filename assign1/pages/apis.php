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
                ["/api/circuits.php", "Returns all the circuits for the season"],
                ["/api/circuits.php?ref=?", "Returns just the specified circuit (use the circuitRef field), e.g., /api/circuits.php?ref=monaco"],
                ["/api/constructors.php", "Returns all the constructors for the season"],
                ["/api/constructors.php?ref=?", "Returns just the specified constructor (use the constructorRef field), e.g., /api/constructors/mclaren"],
                ["/api/drivers.php", "Returns all the drivers for the season"],
                ["/api/drivers.php?ref=?", "Returns just the specified driver (use the driverRef field), e.g., /api/drivers/hamilton"],
                ["/api/drivers.php?race=?", "Returns the drivers within a given race, e.g., /api/drivers/race/1106"],
                ["/api/races.php?ref=?", "Returns just the specified race. Don’t provide the foreign key for the circuit; instead provide the circuit name, location, and country."],
                ["/api/races.php", "Returns the races within the 2022 season ordered by round, e.g., /api/races/season/2022"],
                ["/api/qualifying.php?ref=?", "Returns the qualifying results for the specified race, e.g., /api/qualifying/1106"],
                ["/api/results.php?ref=?", "Returns the results for the specified race, e.g., /api/results/1106"],
                ["/api/results.php?driver=?", "Returns all the results for a given driver, e.g., /api/results/driver/max_verstappen"],
            ]
                ?>
            <h2>API List</h2>
            <span>
                <h3>URL</h3>
                <ul>
                    <?php
                    echo "<ol>";
                    foreach ($apiList as $api) {
                        echo "<li>$api[0]</li>";
                    }
                    echo "</ol>"
                        ?>
                </ul>
            </span>
            <span>
                <h3>Description</h3>
                <ul>
                    <?php
                    echo "<ol>";
                    foreach ($apiList as $api) {
                        echo "<li>$api[1]</li>";
                    }
                    echo "</ol>";
                    ?>
                </ul>
            </span>
        </div>
    </div>
</body>

</html>