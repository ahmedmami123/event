<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>














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

<form method="post" action="succ.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input required type="password" class="form-control" id="password" name="password"
            aria-describedby="passwordHelp">
        <small id="passwordHelp" class="form-text text-muted">We'll never share your password with anyone
            else.</small>
    </div>

    <div class="form-group">
        <label for="dob">Date Of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob">
    </div>
    <br />
    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
        <label class="custom-file-label" for="avatar">Choose File</label>
        <small id="avatar" class="form-text text-danger">File Upload is Optional</small>

    </div>

    <input type="hidden" class="form-control" id="user_type" name="user_type" value="user">
    <br />

    <br>
    <br>
    <br>


    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>

</form>
<br>
<br>
<br>
<br>
<br>
<?php require_once '../views/includes/footer.php'; ?>