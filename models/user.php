<?php 
class _user{
    private $db;
    //constructor to initialize private to the database connection
    function __construct($conn)
    {
        $this->db=$conn;
    }
    public function InsertUser($firstname,$lastname,$email,$password,$dob,$user_type){
        try {
            $result=$this->getUserByEmail($email);
            if($result['num']>0){
                return false;
            }
            else{
                $new_password=md5($password.$email);
    // define sql statement to be executed
    $sql='INSERT INTO user (firstname,lastname,email,password,dob,user_type) VALUES(:fname,:lname,:email,:password,:dob,:user_type)';
    //prepare the sql statement to be executuin
    $stmt=$this->db->prepare($sql);
//bin all placeholders to the actual values
    $stmt->bindparam(':fname',$firstname);
    $stmt->bindparam(':lname',$lastname);
    $stmt->bindparam(':email',$email);
    $stmt->bindparam(':password',$new_password);
    $stmt->bindparam(':dob',$dob);
    $stmt->bindparam(':user_type',$user_type);



 
//execute statment
    $stmt->execute();
    return true;
            }
        
        } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
        }
    }

    //login
    
    public function GettUser($email,$password){
        try{
            $sql="SELECT * FROM user where email=:email and password=:password";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':password',$password);

            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUserByEmail($email){
        try{
            $sql="SELECT count(*) as num FROM user where email= :email";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':email',$email);

            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
?>