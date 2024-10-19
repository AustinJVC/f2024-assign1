
<?php
include_once('db.inc.php');
header('Content-type: application/json');
function getAllDrivers(){
        $drivers = getData("SELECT forename, surname FROM drivers WHERE driverId IN (SELECT DISTINCT driverId FROM results WHERE raceId IN (SELECT raceId FROM races WHERE year = 2022))", []); 
        return json_encode($drivers);
}
function getRaceDrivers($raceId){
        $drivers = getData("SELECT drivers.forename, drivers.surname FROM drivers join results ON drivers.driverId=results.driverId JOIN races on results.raceId = races.raceId where races.raceId=?", [$raceId]);

        return json_encode($drivers); 
}
function getrefDrivers($ref){
    $driver = getData("SELECT * FROM drivers  where driverRef=?", [$ref]);

        return json_encode($driver); 
}

if(isset($_GET['race'])){
    echo getRaceDrivers($_GET['race']);
}elseif (isset($_GET['ref'])){
    echo getRefDrivers($_GET['ref']);
}
else{
    echo getAllDrivers();
}


?>