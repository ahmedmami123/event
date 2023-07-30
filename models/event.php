<?php 

class event{

    private $db;
    //constructor to initialize private to the database connection
    function __construct($conn)
    {
        $this->db=$conn;
    }
    //function to insert a new record into the attendee database
    public function insertEvent($eventname,$description,$date_debut,$date_fin,$event_affiche){
try {
    // define sql statement to be executed
    $sql='INSERT INTO event (eventname,description,date_debut,date_fin,event_affiche) VALUES(:evname,:descri,:d_debut,:d_fin,:event_affiche)';
    //prepare the sql statement to be executuin
    $stmt=$this->db->prepare($sql);
//bin all placeholders to the actual values
    $stmt->bindparam(':evname',$eventname);
    $stmt->bindparam(':descri',$description);
    $stmt->bindparam(':d_debut',$date_debut);
    $stmt->bindparam(':d_fin',$date_fin);
    $stmt->bindparam(':event_affiche',$event_affiche);



  

//execute statment
    $stmt->execute();
    return true;
} catch (PDOException $e) {
echo $e->getMessage();
return false;
}
    }
    public function GetEdit(){
        try{
            $sql="SELECT * FROM `event`";
            $results=$this->db->query($sql);
            return $results;
        }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    }

    public function getEventDetails($id){
        try{
            $sql="SELECT * FROM `event` where event_id = :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

}

public function DeleteEvent($id){
    try {
        $sql="DELETE from event where event_id=:id";
    $stmt=$this->db->prepare($sql);
    $stmt->bindparam(':id',$id);
    $stmt->execute();
    return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
public function EditEvent($id,$eventname,$description,$date_debut,$date_fin,$event_affiche){
    try {
        $sql="UPDATE `event` SET `eventname`=:evname,`description`=:descri,`date_debut`=:d_debut,`date_fin`=:d_fin,`event_affiche`=:event_affiche WHERE event_id= :id";
        $stmt=$this->db->prepare($sql);
        //bin all placeholders to the actual values
        $stmt->bindparam(':id',$id);
    
        $stmt->bindparam(':evname',$eventname);
        $stmt->bindparam(':descri',$description);
        $stmt->bindparam(':d_debut',$date_debut);
        $stmt->bindparam(':d_fin',$date_fin);
        $stmt->bindparam(':event_affiche',$event_affiche);
        //execute statment
            $stmt->execute();
            return true;   
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    
    }
    
}



 
?>