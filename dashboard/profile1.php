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

//save profile
if(isset($_POST['save_avatar'])){
    $image = $_FILES['avatar'];
    $fileName = $_FILES['avatar']['name'];
    $fileTempName = $_FILES['avatar']['tmp_name'];
    $uploads_dir ="./uploads";
    // chmod($uploads_dir, 0777);
    if(move_uploaded_file($fileTempName,$uploads_dir.'/'.$fileName)){

        $update_sql = "UPDATE users set avatar='$fileName' where id='$user'";
        $update=mysqli_query($con, $update_sql); 
        if(!$update){
            echo 'failed'; 
        }
        else{
            header("Location: profile1.php");
        }
    }
    else{
        echo "File could not be uploaded!";
    }
}
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row mx-5 p-3 w-75  bg-light position-relative">
                <span class="position-absolute" style="right:0">
                    <a href="edit_profile.php"><i class="fa-solid fa-user-pen"></i></a>
                </span> 
            <span class="d-flex justify-content-center avatar w-100 ">
                <img src="./uploads/<?php echo $user_detail['avatar'] ?>" alt="" style="height:98px;width:98px;border-radius:50%;outline:4px solid #709B30;border:4px solid white">
                     
            </span>
            <span class="d-flex justify-content-center w-100 ">
                <form action="profile1.php" enctype="multipart/form-data" method="post">
                    <label for="avatar" class="btn btn-secondary btn-xs mt-2">Upload Image</label>
                    <input type="file" name="avatar" style="display:none" id="avatar" />
                    <button id="save_avatar" class="btn btn-xs btn-success " name="save_avatar">Save</button>
                </form>
            </span>
            <div class="w-100 my-3">
                <div class="d-flex justify-content-between py-2">
                    <span><b>Full Name</b></span>
                    <span class="text-muted"><?php echo $user_detail['name']; ?></span>
                </div>
                <div class="d-flex justify-content-between py-2 bg-light">
                    <span><b>Email</b></span>
                    <span class="text-muted"><?php echo $user_detail['email']; ?></span>
                </div>
                <div class="d-flex justify-content-between py-2">
                    <span><b>Phone</b></span>
                    <span class="text-muted"><?php echo $user_detail['phone']; ?></span>
                </div>
                <div class="d-flex justify-content-between py-2 bg-light">
                    <span><b>Address</b></span>
                    <span class="text-muted"><?php echo $user_detail['address']; ?></span>
                </div>
                <div class="d-flex justify-content-between py-2">
                    <span><b>Gender</b></span>
                    <span class="text-muted"><?php echo $gender; ?></span>
                </div>
              
            </div>
        </div>
    </div>
</section>
<script>
    var avatar = document.getElementById('avatar');
    var save_avatar = document.getElementById('save_avatar');
    save_avatar.style.display = 'none'
    avatar.addEventListener('click', function(){
        save_avatar.style.display = 'inline-block'
    })
</script>