<?php
$title ='Login page';
require_once '../controller/user_controller.php' ;

//check if date submitted by post
Login($_user);
?>
<h1 class="text-center"><?php echo $title ?></h1>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
    <table class="table table-sm">
        <tr>
            <td><label for="email">Email : *</label></td>
            <td><input type="email" name="email" class="form-control" id="email"
                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['email'];?>"></td>
        </tr>
        <tr>
            <td><label for="password">Password : *</label></td>
            <td><input type="password" name="password" class="form-control" id="password"></td>
        </tr>
    </table><br><br>
    <input type="submit" value="Login" class="btn btn-primary btl-block"><br>
    <a href="">Forgot Password</a>
</form>
<br>
<?php require_once 'includes/footer.php'?>