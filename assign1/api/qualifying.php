/api/qualifying.php?ref=?
Returns the qualifying results for the specified race, e.g., /api/qualifying/1106
Provide the same fields as with results for the foreign keys.
Sort by the field position in ascending order.

<?php

include 'db_connection.php';
function getQualifying()
{
    if (isset($_GET['raceID'])) {
        $raceRef = $_GET['raceID'];

        $qualifyingResults = getData(
            "SELECT
            qualifying.position,
            drivers.driverRef,
            drivers.code,
            drivers.forename,
            drivers.surname,
            races.name AS race_name,
            races.round,
            races.year,
            races.date,
            constructors.name AS constructor_name,
            constructors.constructorRef,
            constructors.nationality
         FROM qualifying
         JOIN drivers ON qualifying.driverId = drivers.driverId
         JOIN races ON qualifying.raceId = races.raceId
         JOIN constructors ON qualifying.constructorId = constructors.constructorId
         WHERE qualifying.raceId = ?
         ORDER BY qualifying.position ASC",
            [$raceRef]
        );

        return json_encode($qualifyingResults);
    } else {
        return json_encode(['error' => 'Race reference not provided.']);
    }

}
?>