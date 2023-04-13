<?php require_once('connection.php') ?>
<?php

include('includes/head.php');
include('includes/preloader.php');
include('includes/header.php');



?>

    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70 text-center">
                                <h2>User Profile</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
       <style>
         .custome-file{
        border:2px solid #ccc;
        border-radius:10px;
        margin-bottom: 5px;

    }
    .custome-file::-webkit-file-upload-button{
        background:#444;
        color:#fff;
        padding:5px;
        border:none;
        border-radius:10px;
        
    }
    button{
                border: none;
                padding: 5px;
                border-radius:5px;
                background:#444;
                color: #fff;
                cursor: pointer;
            }
            button:hover{
                background: #2C73D2;
            }
            .form-control{
              padding:15px;
            }
       </style>
        <!-- User profile  Area start -->
        <section>











          <div class="container rounded bg-white mt-5 mb-3">
            <div class="row">
              <div class="col-md-3 border-right">

                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <?php
                if($user['Account_Image']==0){
                    echo '<img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">';
                }else{
                    echo '<img class="rounded-circle mt-5" width="120px" src="profile-pictures/profile'.$user['AccountID'].'.jpg">';
                }

?>

<br>
                   <form action="upload.php" method="POST" enctype="multipart/form-data" class="choose-image">
                   <input type="file" name="file" class="custome-file">
                    <button type="submit" name="submit">Upload</button>  
                    </form>

                    <form action="includes/updateProfile.php" method="POST">
                   <span class="font-weight-bold"><?php echo ($user['Name']); ?></span><br>
                   <?php
                    if($user['Status']==null){
                        echo '<p>Non-Member</p>';
                    }else{
                        echo '<span class="text-black-50">'.$user['Status'].'</span>';
                    }
                   ?>
                   
                   <span class="text-black-50"><?php echo ($user['Email_Add']); ?></span><br>
                  </div>
                </div>

                <div class="col-md-5 border-right">
                 <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-7">
                <div class="col-md-12">
                    <label class="labels">Fullname</label>
                    <input type="text" class="form-control" placeholder="Fullname" value=" <?php echo ($user['Name']); ?>" name="fullname" required>
                </div>
                    <div class="col-md-6">
                        <label class="labels">Firstname</label>
                        <input type="text" class="form-control" placeholder="Firstname" value=" <?php echo ($user['Fname']); ?>" name="fname" required>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Lastname</label>
                        <input type="text" class="form-control"  placeholder="Lastname" name="lname" value=" <?php echo ($user['Lname']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Street</label>
                        <input type="text" class="form-control" placeholder="Street"  name="street" value=" <?php echo ($user['Street']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Barangay</label>
                        <input type="text" class="form-control" placeholder="Barangay"  name="barangay" value="<?php echo ($user['Barangay']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">City</label>
                        <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo ($user['City']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">ZipCode</label>
                        <input type="text" class="form-control" placeholder="ZipCode" name="zipcode" value="<?php echo ($user['Zip_Code']); ?>" required>
                    </div>
                  </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Contact Number</label>
                        <input type="text" class="form-control" placeholder="Contact Number" value="<?php echo ($user['Contact_Num']); ?>" name="contact" required>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email Address</label>
                        <input type="text" class="form-control" placeholder="Email Address" value=" <?php echo ($user['Email_Add']); ?>" name="email_add" required>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo ($user['Username']); ?>" required>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo ($user['Password']); ?>" required>
                    </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
            </div>    
          </div>
                            <section class="history_events">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">History Events</h4>
                                    </div>
                            </section>
           </div> 
          </div>
          </div>
          </div>
        </section>
        </form>
        <!-- User profile  Area End -->




    </main>
<?php
include 'includes/footer.php';
include 'includes/scripts.php';
?>