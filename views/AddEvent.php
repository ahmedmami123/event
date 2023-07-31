<?php
    $title = 'Index'; 

    require_once '../views/includes/header.php'; 
    require_once '../db/config.php'; 



?>
<!-- 
        - First name
        - Last Name
        - Date of Birth (Use DatePicker)
        - Specialty (Database Admin, SOftware Developer, Web Administrator, Other)
        - Email Address
        - Contact Number
     -->
<div class="viewstext">Ajouter un evenement</div>

<form method="post" action="succ_event.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="eventname">titre d'evenement</label>
        <input required type="text" placeholder="titre d'evenement" class="form-control" id="eventname"
            name="eventname">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input required type="text" placeholder="Description" class="form-control" id="description" name="description">
    </div>
    <div class="form-group">
        <label for="d_debut">date de début</label>
        <input type="date" class="form-control" id="d_debut" name="d_debut">
    </div>
    <div class="form-group">
        <label for="d_fin">Date Of Birth</label>
        <input type="date" class="form-control" id="d_fin" name="d_fin">
    </div>
    <br />
    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
        <label class="custom-file-label" for="avatar">Choose File</label>
        <small id="avatar" class="form-text text-danger">File Upload is Optional</small>

    </div>


    <button type="submit" name="submit" class="btn btn-secondary btn-block">Submit</button>
</form>
<br>
<br>
<br>
<br>
<br>
<?php require_once '../views/includes/footer.php'; ?>