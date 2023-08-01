<link href="style1.css" rel="stylesheet">
<?php 
require_once '../db/config.php' ;
require_once '../models/event.php' ;
require_once '../controller/insecri_controller.php' ;
require_once '../controller/user_controller.php' ;



// inseretion event
function insert_event($event){
    
    if(isset($_POST['submit'])){
    
        $eventname=$_POST['eventname'];
        $description=$_POST['description'];
        
        $date_debut=$_POST['d_debut'];
        $date_fin=$_POST['d_fin'];
        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = '../uploads/';
        if($orig_file!=null){
            $event_affiche = "$target_dir$date_debut.$ext";

        }else{
            $event_affiche =null;
          

        }

        move_uploaded_file($orig_file,$event_affiche);

        
    
       
    $result=$event->insertEvent($eventname,$description,$date_debut,$date_fin,$event_affiche);
       
    
        if($result){
            header("location:view_event.php");
        
        
        }
        else{
           echo 'error';
        
        
        } 
    }

}


function view_evenmentDet($event,$inscri,$_user){
    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Please check details and tray again</h1>";
    
    }
    else{
    $id=$_GET['id'];
    $result=$event->getEventDetails($id);
    
    
    ?>

<div class="viewstext">View details</div>

<div class="viewD">
    <div class="d1">
        <img src=<?php echo empty($result['event_affiche']) ? "Uploads\av.jpg" :$result['event_affiche']; ?>
            style="width:80%;" />
    </div>
    <div class="d2">

        <div class="h1"><?php echo $result['eventname']?></div>
        <div class="h3"> <?php echo 'Date de debut : '. $result['date_debut'].'-/- Date de fin :'.$result['date_fin']?>



        </div>
        <div class="h6"><?php echo $result['description']?></div>
        <br>
        <div class="btns">
            <a href="view_event.php" style="width: 187px; margin-top: 10px;" class="btn btn-info">Back To List</a>
            <?php 
$user_id=$_SESSION['user_id'];

$rt=$inscri->getUserEventByid($user_id,$id); 
$rt2=$_user->getUserByUser_id($user_id);




if($rt2['user_type']=='admin'){?>
            <a href="../views/Edit.php?id=<?php echo $result['event_id']?>" class="btn btn-warning"
                style="width: 187px; margin-top: 10px;">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record?');"
                href="../views/delet.php?id=<?php echo $result['event_id']?>" class="btn btn-danger"
                style="width: 187px; margin-top: 10px;">Delete</a>
            <?php }

if($rt['num']<=0 ){
?>
            <a href="../views/inscri.php?id=<?php echo $result['event_id']?>" class="btn btn-primary"
                style="width: 187px; margin-top: 10px;">Reservation</a>
            <?php 
}else{?>
            <a onclick="return confirm('Are you sure you want to delete this record?');"
                href="../views/delInscri.php?id=<?php echo $result['event_id']?>" class="btn btn-dark"
                style="width: 187px; margin-top: 10px;">Annuler
                Reservation</a>



            <?php } 
if($rt2['user_type']=='admin'){


?>
            <a style="width: 187px; margin-top: 10px;"
                href="../views/view_reserv.php?id=<?php echo $result['event_id']?>" class="btn btn-primary"> Views
                Reservation</a>
            <?php
}

}?>
        </div>
    </div>


</div>
</div>

<?php }
function upadteEvent($event){

if(isset($_POST['submit'])){
$id=$_POST['id'];

$eventname=$_POST['eventname'];
$description=$_POST['description'];

$date_debut=$_POST['d_debut'];
$date_fin=$_POST['d_fin'];
$orig_file = $_FILES["avatar"]["tmp_name"];
$ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
$target_dir = '../uploads/';
if($orig_file!=null){
$event_affiche = "$target_dir$date_debut.$ext";


}
else
{
$event_affiche =null;


}
move_uploaded_file($orig_file,$event_affiche);

$result=$event->EditEvent($id,$eventname,$description,$date_debut,$date_fin,$event_affiche);
if($result){
header("location:view_event.php");}
else
{
echo 'error';}}
else{
echo 'error';
}

}
function delete_event($event)
{
if(!$_GET['id']){

echo 'error';
header("location:view_event.php");

}else{
//get id values
$id=$_GET['id'];
// Call Crud Function
$result=$event->DeleteEvent($id);
//Redirct TO index.php
if($result){
header("location:view_event.php");}
else
{
echo 'error';
}
}
}
//affichage event
function view_evenment($event,$_user){
$result=$event->GetEvent();


while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
<tr>
    <td><?php echo $r['event_id']?></td>

    <td><?php echo $r['eventname']?></td>

    <td><?php echo $r['date_debut']?></td>
    <td><?php echo $r['date_fin']?></td>

    <td>
        <a href="../views/veiw.php?id=<?php echo $r['event_id']?>" class="btn btn-primary">View</a>
        <?php $user_id=$_SESSION['user_id'];


$rt2=$_user->getUserByUser_id($user_id);
if($rt2['user_type']=='admin'){?>
        <a href="../views/Edit.php?id=<?php echo $r['event_id']?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete this record?');"
            href="../views/delet.php?id=<?php echo $r['event_id']?>" class="btn btn-danger">Delete</a>
        <?php }?>
    </td>





</tr>
<?php
    }
//affichage event detaile

}

?>