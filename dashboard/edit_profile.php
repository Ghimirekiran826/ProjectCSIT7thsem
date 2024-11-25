<?php 
include('top.php'); ?>
<?php
$user = $_SESSION['user_id'];
$sql = "SELECT * from users where id=$user";
$q = mysqli_query($con, $sql);
$user_detail = mysqli_fetch_array($q);

if($user_detail['gender'] == 'M') { $gender = 'male' ;}
if($user_detail['gender'] == 'F') { $gender = 'female' ;}
if($user_detail['gender'] == 'O') { $gender = 'other' ;}

//update the profile
if(isset($_POST['update'])){
    $fn = $_POST['fn'];
    $add = $_POST['add'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $update_sql = "UPDATE users set name='$fn', address='$add', phone='$phone', gender='$gender' where id='$user'";
    $update=mysqli_query($con, $update_sql); 
    if(!$update){
        echo 'failed'; die;
    }
    else{
        header("Location: profile1.php");
    }
}
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row mx-5 p-3 w-75  bg-light">
           
                <form action="edit_profile.php" method="post" class="col-12">
                    <div class="form-group d-flex justify-content-around ">
                        <label for="" class="form-label w-25">Full Name</label>
                        <input type="text" class="form-control" name="fn" value="<?php echo $user_detail['name'] ?>">
                    </div>
                    <div class="form-group d-flex justify-content-around ">
                        <label for="" class="form-label w-25">Email</label>
                        <input type="text" readonly class="form-control" name="email" value="<?php echo $user_detail['email'] ?>">
                    </div>
                    <div class="form-group d-flex justify-content-around">
                        <label for="" class="form-label w-25">Address</label>
                        <input type="text" class="form-control" name="add" value="<?php echo $user_detail['address'] ?>">
                    </div>
                    <div class="form-group d-flex justify-content-around">
                        <label for="" class="form-label w-25">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $user_detail['phone'] ?>">
                    </div>
                    <div class="form-group d-flex justify-content-around">
                        <label for="" class="form-label w-25">Gender</label>
                        <select name="gender" id="" class="form-control">
                            <option value="M" <?php echo ($user_detail['gender'] == 'M') ? 'selected' : ''  ?>>Male</option>
                            <option value="F"  <?php echo ($user_detail['gender'] == 'F') ? 'selected' : ''  ?>>Female</option>
                            <option value="O"  <?php echo ($user_detail['gender'] == 'O') ? 'selected' : ''  ?>>Other</option>
                        </select>
                    </div>
                    <button class="btn btn-success" name="update">Update</button>
               </form>
                
        </div>
    </div>
</section>