/api/results.php?ref=?
Returns the results for the specified race, e.g., /api/results/1106
Don’t provide the foreign keys for the race, driver, and constructor; instead provide the following fields: driver
(driverRef, code, forename, surname), race (name, round, year, date), constructor (name, constructorRef, nationality).
Sort by the field grid in ascending order (1st place first, 2nd place second, etc).
/api/results.php?driver=?
Returns all the results for a given driver, e.g., /api/results/driver/max_verstappen


<?php
include 'db.inc.php';

function getRaceResults($raceId){
        $results = getData("SELECT drivers.driverRef, drivers.code, drivers.forename, drivers.surname,races.name, races.round, races.year, races.date,constructors.name, constructors.constructorRef, constructors.nationality 
        FROM results 
        JOIN races ON results.raceId = races.raceId 
        JOIN drivers ON results.driverId = drivers.driverId 
        JOIN constructors ON results.constructorId = constructors.constructorId   
        WHERE races.raceId=? 
        ORDER BY results.grid ASC", [$raceId]);

        echo json_encode($results); 
}
function getDriverResults($driver){
    $results = getData("SELECT", [$driver]);

        echo json_encode($results); 
}

if(isset($_GET['ref'])){
    getRaceResults($_GET['ref']);
}elseif (isset($_GET['driver'])){
    getDriverResults($_GET['driver']);
}


?>