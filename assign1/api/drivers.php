
<?php
include 'db.inc.php';
function getAllDrivers(){
        $drivers = getData("SELECT forename FROM drivers", []); 
        echo json_encode($drivers);
}
function getRaceDrivers($raceId){
        $drivers = getData("SELECT drivers.forename, drivers.surname FROM drivers join results ON drivers.driverId=results.driverId JOIN races on results.raceId = races.raceId where races.raceId=?", [$raceId]);

        echo json_encode($drivers); 
}
function getrefDrivers($ref){
    $driver = getData("SELECT * FROM drivers  where driverRef=?", [$ref]);

        echo json_encode($driver); 
}

if(isset($_GET['race'])){
    getRaceDrivers($_GET['race']);
}elseif (isset($_GET['ref'])){
    getRefDrivers($_GET['ref']);
}
else{
    getAllDrivers();
}


?>