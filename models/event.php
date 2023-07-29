<?php 

class event{

    private $db;
    //constructor to initialize private to the database connection
    function __construct($conn)
    {
        $this->db=$conn;
    }
    //function to insert a new record into the attendee database
    public function insertEvent($fname,$lname,$dob,$email,$contact,$specialty,$avatar_path){
try {
    // define sql statement to be executed
    $sql='INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id,avatar_path) VALUES(:fname,:lname,:dob,:email,:contact,:specialty,:avatar_path)';
    //prepare the sql statement to be executuin
    $stmt=$this->db->prepare($sql);
//bin all placeholders to the actual values
    $stmt->bindparam(':fname',$fname);
    $stmt->bindparam(':lname',$lname);
    $stmt->bindparam(':dob',$dob);
    $stmt->bindparam(':email',$email);
    $stmt->bindparam(':contact',$contact);
    $stmt->bindparam(':specialty',$specialty);
    $stmt->bindparam(':avatar_path',$avatar_path);

//execute statment
    $stmt->execute();
    return true;
} catch (PDOException $e) {
echo $e->getMessage();
return false;
}
    }
    //edit records
    public function EditEvent($id,$fname,$lname,$dob,$email,$contact,$specialty){
try {
    $sql="UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id= :id";
    $stmt=$this->db->prepare($sql);
    //bin all placeholders to the actual values
    $stmt->bindparam(':id',$id);

        $stmt->bindparam(':fname',$fname);
        $stmt->bindparam(':lname',$lname);
        $stmt->bindparam(':dob',$dob);
        $stmt->bindparam(':email',$email);
        $stmt->bindparam(':contact',$contact);
        $stmt->bindparam(':specialty',$specialty);
    //execute statment
        $stmt->execute();
        return true;   
} catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

}
 public function GetEvent(){
    try{
        $sql="SELECT * FROM `attendee` ";
        $results=$this->db->query($sql);
        return $results;
    }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

 }
 public function getAttendeeDetails($id){
    try{
        $sql="SELECT * FROM `attendee` where attendee_id = :id";
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
 public function DeleteAttendee($id){
    try {
        $sql="DELETE from attendee where attendee_id=:id";
    $stmt=$this->db->prepare($sql);
    $stmt->bindparam(':id',$id);
    $stmt->execute();
    return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }



 }}
?>