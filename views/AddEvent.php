<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<?php
    $title = 'Index'; 
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
<br>
<h1 class="text-center">Ajouter Un Evenement </h1>
<div class="container mt-100">
    <form method="post" action="succ.php">
        <div class="form-group">
            <label for="eventname">titre d'evenement</label>
            <input required type="text" class="form-control" id="eventname" name="eventname">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input required type="text" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <br />



        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</div>
<br>