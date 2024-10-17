<?php
include_once('db.inc.php');

function getRaceResults($raceId){
        $results = getData("SELECT drivers.driverRef, drivers.code, drivers.forename, drivers.surname, races.name, races.round, races.year, races.date, constructors.name, constructors.constructorRef, constructors.nationality 
        FROM results 
        JOIN drivers ON drivers.driverId=results.driverId 
        JOIN constructors ON constructors.constructorId=results.constructorId 
        JOIN races ON races.raceId=results.raceId WHERE results.raceId=? ", [$raceId]);

        return json_encode($results); 
}
function getDriverResults($driver){
    $results = getData("SELECT drivers.forename, drivers.surname, results.position 
        from results 
        join drivers on drivers.driverId = results.driverId 
        where drivers.driverRef=?", [$driver]);

        return json_encode($results); 
}

if(isset($_GET['ref'])){
    getRaceResults($_GET['ref']);
}elseif (isset($_GET['driver'])){
    getDriverResults($_GET['driver']);
}
else{
    echo json_encode("No reference passed.");
}


?>