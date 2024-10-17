<?php
include 'db.inc.php';

function getRaceResults($raceId){
<<<<<<< HEAD
        $results = getData("SELECT drivers.driverRef, drivers.code, drivers.forename, drivers.surname, races.name, races.round, races.year, races.date, constructors.name, constructors.constructorRef, constructors.nationality from results join drivers on drivers.driverId=results.driverId join constructors on constructors.constructorId=results.constructorId join races on races.raceId=results.raceId where results.raceId=? ", [$raceId]);
=======
        $results = getData("SELECT drivers.driverRef, drivers.code, drivers.forename, drivers.surname,races.name, races.round, races.year, races.date,constructors.name, constructors.constructorRef, constructors.nationality 
        FROM results 
        JOIN races ON results.raceId = races.raceId 
        JOIN drivers ON results.driverId = drivers.driverId 
        JOIN constructors ON results.constructorId = constructors.constructorId   
        WHERE races.raceId=? 
        ORDER BY results.grid ASC", [$raceId]);
>>>>>>> de6192122374b9efae08dd3fdc226811974007c2

        echo json_encode($results); 
}
function getDriverResults($driver){
    $results = getData("SELECT drivers.forename, drivers.surname, results.position 
        from results 
        join drivers on drivers.driverId = results.driverId 
        where drivers.driverRef=?", [$driver]);

        echo json_encode($results); 
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