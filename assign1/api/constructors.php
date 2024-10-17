<?php

include_once("db.inc.php");

function getAllConstructors()
{
    $constructors = getData(" SELECT DISTINCT constructors.constructorRef, races.year 
        FROM constructors 
        JOIN constructorResults ON constructors.constructorId = constructorResults.constructorId
        JOIN races ON constructorResults.raceId = races.raceId
        WHERE races.year=2022
    ", []);

    return json_encode($constructors);
}


function getSpecificConstructors($ref)
{
    $constructors = getData(
        "SELECT DISTINCT constructors.name, constructors.constructorId, races.year, constructors.nationality, constructors.url
        FROM constructors 
        JOIN constructorResults ON constructors.constructorId = constructorResults.constructorId
        JOIN races ON constructorResults.raceId = races.raceId
        WHERE constructors.constructorRef = ? AND races.year=2022",
        [$ref]
    );

    return json_encode($constructors);
}
if (isset($_GET["ref"])) {
    getSpecificConstructors($_GET['ref']);
} else {
    getAllConstructors();
}
