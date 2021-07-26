<?php
session_start();
// echo $_SESSION['login'];
include ('header.php');
$userObject=new users();
$priceObject=new price();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];  
    $count = $userObject->unique("email ='$email'");
    if($count > 0){//right email
        $user = $userObject->whereSingle("email='$email'");
        if(password_verify($password,$user['password'])){
            $msg = '<p class="alert alert-success">Loged in Successfuly</p>';
            $_SESSION['login'] = $email;
            $_SESSION['role'] = $user['userGroup'];
            header("Location:admin.php");
        }else{
            $msg = '<p class="alert alert-danger">Wrong Password or Email</p>';
        }
    }else{
        $msg = '<p class="alert alert-danger">Wrong Password or Email</p>';
    }
}
?>
<div class="form">
    <form class="login" method="post">
        <?php 
            if(isset($msg)){
                echo $msg;
            }
        ?>
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="Password">
        <button>Login</button>
    </form>
</div>

<?php
include ('footer.php');