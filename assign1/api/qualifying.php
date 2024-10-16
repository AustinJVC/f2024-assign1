<?php

include 'db.inc.php';
function getQualifying($ref)
{
    
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
            [$ref]
        );

        echo json_encode($qualifyingResults);
}

if (isset($_GET['ref'])) {
    getQualifying($_GET['ref']);
}


?>