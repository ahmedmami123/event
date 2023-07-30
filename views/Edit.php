<?php
    $title = 'Index'; 

    require_once '../views/includes/header.php'; 
    require_once '../db/config.php'; 
    if(!isset($_GET['id'])){
        // echo 'error';
echo 'error';
        header("location:view_event.php");
    
    }
    else
    {
        $id=$_GET['id'];
        $result=$event->getEventDetails($id);

?>
<!-- 
        - First name
        - Last Name
        - Date of Birth (Use DatePicker)
        - Specialty (Database Admin, SOftware Developer, Web Administrator, Other)
        - Email Address
        - Contact Number
     -->
<h1 class="text-center">Add Event</h1>

<form method="post" action="editPost.php" enctype="multipart/form-data">
    <input required type="hidden" placeholder="titre d'evenement" class="form-control" id="id" name="id"
        value="<?php echo $result['event_id']?>" />

    <div class="form-group">
        <label for="eventname">titre d'evenement</label>
        <input required type="text" placeholder="titre d'evenement" class="form-control" id="eventname" name="eventname"
            value="<?php echo $result['eventname']?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input required type="text" placeholder="Description" class="form-control" id="description" name="description"
            value="<?php echo $result['description']?>">
    </div>
    <div class="form-group">
        <label for="d_debut">date de début</label>
        <input type="date" class="form-control" id="d_debut" name="d_debut" value="<?php echo $result['date_debut']?>">
    </div>
    <div class="form-group">
        <label for="d_fin">Date Of Birth</label>
        <input type="date" class="form-control" id="d_fin" name="d_fin" value="<?php echo $result['date_fin']?>">
    </div>
    <br />
    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
        <label class="custom-file-label" for="avatar">Choose File</label>
        <small id="avatar" class="form-text text-danger">File Upload is Optional</small>

    </div>


    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
<?php } ?>

<br>
<br>
<br>
<br>
<br>
<?php require_once '../views/includes/footer.php'; ?>