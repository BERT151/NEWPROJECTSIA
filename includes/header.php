<?php include 'session.php'

    ?>
<form action="logout.php" metod="post">
    <header>

        <!--? Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="index.html"><img src="assets/img/logo/rfg60-r.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="login-form.php">Shop</a></li>
                                            <li><a href="schedule.php">Schedule</a></li>
                                            <li><a href="gallery.php">Gallery</a></li>
                                            <li><a href="contact.php">Contact</a></li>

                                            <?php if (isset($_SESSION['id'])) {
                                                ?>
                                                <li><a href="user-profile.php">
                                                        <?php echo ($user['Name']); ?>
                                                    </a></li>

                                                <button class="btn btn-light" type="submit" id="btn" value="Login"
                                                    name="logout">Logout</button>
                                            <?php } ?>



                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <a href="memberForm.php" class="btn header-btn">Become a member</a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
</form>