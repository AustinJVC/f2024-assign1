<?php
include_once('db.inc.php');

function getRaceResults($ref){
        $results = getData("SELECT drivers.driverRef, drivers.code, drivers.forename, drivers.surname, races.name, races.round, races.year, races.date, constructors.name, constructors.constructorRef, constructors.nationality 
        FROM results 
        JOIN drivers ON drivers.driverId=results.driverId 
        JOIN constructors ON constructors.constructorId=results.constructorId 
        JOIN races ON races.raceId=results.raceId WHERE results.raceId=? ", [$ref]);

        return json_encode($results); 
}
function getDriverResults($driver){
    $results = getData("SELECT drivers.forename, drivers.surname, results.position, results.points, races.round, circuits.name
        from results 
        join drivers on drivers.driverId = results.driverId 
        join races on races.raceId = results.raceId
        join circuits on circuits.circuitId = races.circuitId
        where drivers.driverRef=? AND races.year=2022", [$driver]);

        return json_encode($results); 
}
function getConstructorResults($constructorRef){
    $results = getData("SELECT drivers.forename, drivers.surname, results.position, results.points, races.round, circuits.name
        from results 
        join drivers on drivers.driverId = results.driverId 
        join races on races.raceId = results.raceId
        join circuits on circuits.circuitId = races.circuitId
        join constructors on constructors.constructorId = results.constructorId
        where constructors.constructorRef=? AND races.year=2022", [$constructorRef]);

        return json_encode($results); 
}

if(isset($_GET['ref'])){
    getRaceResults($_GET['ref']);
}elseif (isset($_GET['driver'])){
    getDriverResults($_GET['driver']);
}
elseif (isset($_GET['constructorRef'])){
    getConstructorResults($_GET['constructorRef']);
}
else{
    echo json_encode("No reference passed.");
}


?>