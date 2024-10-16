</p>
/api/drivers.php
Returns all the drivers for the season
/api/drivers.php?ref=?
Returns just the specified driver (use the driverRef field), e.g., /api/drivers/hamilton
/api/drivers.php?race=?
Returns the drivers within a given race, e.g., /api/drivers/race/1106
<p>

<?php
include 'db.inc.php';

    $drivers = getData("SELECT forename FROM drivers", []);
    
    foreach ($drivers as $driver) {
        echo $driver['forename'] . "<br>"; 
    }
    



?>