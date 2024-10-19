<?php
function getData($sql, $param){
    try {
    
    $db = new PDO("sqlite:../data/f1.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!is_array($param)){
        $param=[$param];
    };

    if(count($param) > 0){
        $stmt = $db->prepare($sql);
        for($i = 0; $i < count($param); $i++){
            $stmt->bindValue($i + 1, $param[$i]);
        }
        $stmt -> execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
        return $result;
        
    } else {
        // Execute the query directly if no parameters are needed
        $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
    }


    } catch (PDOException $e) {
        echo $e;
    }
}
?>