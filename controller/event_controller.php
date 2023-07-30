<?php 
require_once '../db/config.php' ;
require_once '../models/event.php' ;
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
            $event_affiche = "$target_dir$eventname.$ext";

        }else{
            $event_affiche =null;
          

        }

        move_uploaded_file($orig_file,$event_affiche);

        
    
       
    $result=$event->insertEvent($eventname,$description,$date_debut,$date_fin,$event_affiche);
       
    
        if($result){
            echo 'succ';
        
        
        }
        else{
           echo 'error';
        
        
        } 
    }

}


function view_evenmentDet($event){
    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Please check details and tray again</h1>";
    
    }
    else{
    $id=$_GET['id'];
    $result=$event->getEventDetails($id);
    
    
    ?>
<h1 class="text-center">View details</h1>


<div class="card" style="width: 18rem;">
    <img src=<?php echo empty($result['event_affiche']) ? "Uploads\av.jpg" :$result['event_affiche']; ?>
        style="width:100%;" />

    <div class="card-body">
        <h5 class="card-title"><?php echo $result['eventname']?></h5>
        <h5 class="card-title"><?php echo $result['description']?></h5>

        <p class="card-text"> <?php echo 'Date de debut: '. $result['date_debut'];?></p>
        <p class="card-text"> <?php echo 'Date de fin: '. $result['date_debut'];?></p>




    </div>
</div>
<br>
<a href="view_event.php" class="btn btn-info">Back To List</a>
<a href="../views/Edit.php?id=<?php echo $result['event_id']?>" class="btn btn-warning">Edit</a>
<a onclick="return confirm('Are you sure you want to delete this record?');"
    href="../views/delet.php?id=<?php echo $result['event_id']?>" class="btn btn-danger">Delete</a>


<?php }
}
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
            $event_affiche = "$target_dir$eventname.$ext";

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
        // echo 'error';
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
function view_evenment($event){
    $result=$event->GetEdit();
    
    if($result){
        echo 'succ';
    
    
    }
    else{
       echo 'error';
    
    
    } 
    while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
<tr>
    <td><?php echo $r['event_id']?></td>

    <td><?php echo $r['eventname']?></td>
    <td><?php echo $r['description']?></td>
    <td><?php echo $r['date_debut']?></td>
    <td><?php echo $r['date_fin']?></td>

    <td>
        <a href="../views/veiw.php?id=<?php echo $r['event_id']?>" class="btn btn-primary">View</a>
        <a href="../views/Edit.php?id=<?php echo $r['event_id']?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete this record?');"
            href="../views/delet.php?id=<?php echo $r['event_id']?>" class="btn btn-danger">Delete</a>
    </td>





</tr>
<?php
    }
//affichage event detaile

}

?>