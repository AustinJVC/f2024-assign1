<?php

include_once('db.inc.php');
header('Content-type: application/json');
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
            constructors.nationality,qualifying.q1,qualifying.q2,qualifying.q3
         FROM qualifying
         JOIN drivers ON qualifying.driverId = drivers.driverId
         JOIN races ON qualifying.raceId = races.raceId
         JOIN constructors ON qualifying.constructorId = constructors.constructorId
         WHERE qualifying.raceId = ? AND races.year=2022
         ORDER BY qualifying.position ASC",
        [$ref]
    );

    return json_encode($qualifyingResults);
}

if (isset($_GET['ref'])) {
    echo getQualifying($_GET['ref']);
}

?>