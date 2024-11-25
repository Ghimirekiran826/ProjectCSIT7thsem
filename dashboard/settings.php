<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="profile.css" />
    <title>User Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">Thriftonic</div>
            <div class="list-group list-group-flush my-3">
                <a href="profile.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-circle me-2"></i>My Profile</a>
                        <a href="myorder.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>My Orders</a>
                        <a href="myreview.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>My Reviews</a>
                        <a href="settings.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-cog me-2"></i>Settings</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Welcome, User!!!</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </nav>

            <div class="container-fluid px-4">
            <form>
  <fieldset>
    <legend>Settings</legend>
    <div class="form-group">
      <fieldset disabled="">
        <label class="form-label" for="disabledInput">Email</label>
        <input class="form-control" id="disabledInput" type="email" placeholder="johndoe@email.com" disabled="">
      </fieldset>
    </div>
    <div class="form-group">
      <label for="email" class="form-label mt-4">Name</label>
      <input type="text" class="form-control" id="email-add" aria-describedby="emailHelp" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="password" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="address" class="form-label mt-4">Address</label>
      <input type="text" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Enter Address">
    </div>
    <div class="form-group">
      <label for="number" class="form-label mt-4">Phone Number</label>
      <input type="number" class="form-control" id="number" aria-describedby="emailHelp" placeholder="Enter Phone Number">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button> 
</form>
</div>
</div>



    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>