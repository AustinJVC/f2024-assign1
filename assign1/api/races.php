<?php
include 'db.inc.php';

function getAllRaces()
{
    $races = getData("SELECT name FROM races WHERE year = ? ORDER BY round", [2022]);

    return json_encode($races);
}

function getSpecificRaces($ref)
{
    $racesSpec = getData(
        "SELECT races.name, circuits.name, circuits.location, circuits.country 
        FROM races 
        JOIN circuits ON races.circuitId = circuits.circuitId 
        WHERE races.raceId=? AND races.year=2022",
        [$ref]
    );

    return json_encode($racesSpec);
}


if (isset($_GET["ref"])) {
    $response = getSpecificRaces($_GET['ref']);
    return $response;
} else {
    $response = getAllRaces();
    return $response;
}
?>