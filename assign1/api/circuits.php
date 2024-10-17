<?php

include "db.inc.php";

function getAllCircuits()
{

    $circuits = getData("SELECT circuits.circuitRef, races.year
    FROM circuits
    JOIN races ON circuits.circuitId=races.circuitId
    JOIN seasons ON races.year=seasons.year
    WHERE races.year=2022", []);

    return json_encode($circuits);

}

function getSpecificCircuits($ref)
{
    $circuits = getData("SELECT circuits.circuitRef, circuits.name, circuits.location, circuits.country, races.year
        FROM circuits
        JOIN races ON circuits.circuitId = races.circuitId
        WHERE circuits.circuitRef = ? AND races.year=2022
    ", [$ref]);

    return json_encode($circuits);
}

if (isset($_GET["ref"])) {
    getSpecificCircuits($_GET['ref']);
} else {
    getAllCircuits();
}
