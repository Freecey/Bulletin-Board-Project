<?php
//profile.php
include('session.php');
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>
<head>
<link rel="stylesheet" href="../css/main.css">
</head>
<?php 
include('header.php');
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://cdn3.iconfinder.com/data/icons/avatars-9/145/Avatar_Alien-512.png" width="90"><span class="font-weight-bold"><?php echo $user_name ?></span><span class="text-black-50">test1@dom.com</span><span> </span></div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label for="user_sign">Signature</label><textarea class="form-control" id="user_sign" rows="3"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Registry Date</label><input type="text" class="form-control" placeholder="country" value="user_date" readonly></div>
                    <div class="col-md-6"><label class="labels">User Level</label><input type="text" class="form-control" value="" placeholder="user_level" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4"><label class="labels">Old Password</label><input type="password" class="form-control" placeholder="*******" value=""></div>
                    <div class="col-md-4"><label class="labels">New Password</label><input type="password" class="form-control" value="" ></div>
                    <div class="col-md-4"><label class="labels">Confirm New Password</label><input type="password" class="form-control" value="" ></div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="button">Back</button>
                    <button class="btn btn-primary profile-button" type="button">Save Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php
include('footer.php');
?>