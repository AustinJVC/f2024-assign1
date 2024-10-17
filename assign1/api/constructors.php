
<?php

include "db.inc.php";

function getAllConstructors()
{
    $constructors = getData(" SELECT constructors.constructorRef, races.year
        FROM constructors 
        JOIN constructorResults ON constructors.constructorId = constructorResults.constructorId
        JOIN races ON constructorResults.raceId = races.raceId
        WHERE races.year=2022
    ", []);

    echo json_encode($constructors);
}


function getSpecificConstructors($ref)
{
    $constructors = getData(
        "SELECT constructors.constructorRef, constructors.constructorId, races.year
        FROM constructors 
        JOIN constructorResults ON constructors.constructorId = constructorResults.constructorId
        JOIN races ON constructorResults.raceId = races.raceId
        WHERE constructors.constructorRef = ? AND races.year=2022",
        [$ref]
    );

    echo json_encode($constructors);
}
if (isset($_GET["ref"])) {
    getSpecificConstructors($_GET['ref']);
} else {
    getAllConstructors();
}
