<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<?php
    $title = 'Index'; 
    require_once '../db/config.php'; 
require_once 'includes/header.php';

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
<h1 class="viewstex">Edit User </h1>
<?php $id=$_GET['id'];
$result=$_user->getUserDetails($id);
    


?>
<div class="container mt-100">
    <form method="post" action="editpostUser.php">
        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $result['user_id']?>">

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname"
                value="<?php echo $result['firstname']?>">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input value="<?php echo $result['lastname']?>" type="text" class="form-control" id="lastname"
                name="lastname">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input value="<?php echo $result['email']?>" type="email" class="form-control" id="email" name="email"
                aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
            <small id="passwordHelp" class="form-text text-muted">We'll never share your password with anyone
                else.</small>
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input value="<?php echo $result['dob']?>" type="date" class="form-control" id="dob" name="dob">
        </div>
        <select class="form-select" aria-label="Default select example" name="user_type">

            <option value="user" <?php if($result['user_type']=='user'){echo 'selected';}  ?>>user</option>
            <option value="admin" <?php if($result['user_type']=='admin'){echo 'selected';}  ?>>Admin</option>
            < </select>
                <br />
                <br />
                <br />
                <br />



                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>