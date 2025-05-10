<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php'; ?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>

<div class="container">
    <div class="page-inner">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Profile Card -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <!-- Profile Picture Section -->
                            <div class="col-md-4 text-center">
                                <div class="profile-pic-wrapper mb-3">
                                    <img src="../assets/img/profile.jpg" class="img-fluid rounded-circle border border-primary" alt="Profile Picture">
                                </div>
                                <h4 class="card-title">John Doe</h4>
                                <p class="text-muted">@johndoe</p>
                                <a href="#edit" class="btn btn-outline-primary btn-sm">Edit Profile</a>
                            </div>
                            <!-- Profile Details Section -->
                            <div class="col-md-8">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <h5 class="mb-3">Profile Details</h5>
                                        <p><strong>Email:</strong> johndoe@example.com</p>
                                        <p><strong>Phone:</strong> +123456789</p>
                                        <p><strong>Address:</strong> 123 Main Street, Anytown, USA</p>
                                        <p><strong>Bio:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel urna sed velit tincidunt pulvinar.</p>
                                    </div>
                                    <div class="row text-center mt-4">
                                        <!-- Stats Section -->
                                        <div class="col">
                                            <h6>Posts</h6>
                                            <p class="lead">123</p>
                                        </div>
                                        <div class="col">
                                            <h6>Followers</h6>
                                            <p class="lead">456</p>
                                        </div>
                                        <div class="col">
                                            <h6>Following</h6>
                                            <p class="lead">789</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Section with Form -->
                <div class="card shadow-sm" id="edit">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Profile</h4>

                        <!-- Profile Update Form -->
                        <form>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" value="johndoe@example.com">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" value="+123456789">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" value="123 Main Street, Anytown, USA">
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" id="bio" rows="3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel urna sed velit tincidunt pulvinar.</textarea>
                            </div>
                            <!-- Image Input Element -->
                            <div class="form-group">
                                <label for="propertyImages">Profile Picture</label>
                                <input type="file" class="form-control-file" id="propertyImages" accept="image/*">
                            </div>
                            <!-- Show new Imges   -->
                            <h6 class="d-none mt-4" id="newImage">New Images</h6>
                            <div class="row" id="imagePreviewContainer">
                                <!-- Selected images will be displayed here -->
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include  $mphpToInc . 'footer.php'; ?>
<?php include  $mphpToInc . 'endlinks.php'; ?>