<form method="post">

    <div class="d-flex justify-content-between align-items-center mb-3 text-center">
        <h4 class="text-right">Test mail Config: </h4> 
    </div>
    <div class="row mt-3">
        <div class="col-md-6"><label class="labels">Send a Email to:</label><input type="email" class="form-control" name="test_mail_to" value="<?php echo $_SESSION['user_email'] ?>"></div>
        <div class="col-md-6"><label class="labels">Subject :</label><input type="text" class="form-control" name="test_mail_subject" value="TEST MAIL : <?php  $word = randword(); echo $word . ' ' . date("h:i:sa") ;?>"></div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12"><label for="user_sign">Message :</label>
            <textarea class="form-control" id="user_sign" name="test_mail_msg" rows="3">
<?php 
    $nb_word = rand(10,50);
for ($i=1; $i <= $nb_word; $i++ ) {
    $user_secansw = randword();
    $user_secansw = preg_replace( "/\r|\n/", "", $user_secansw );
    echo $user_secansw .' '; }?></textarea>
        </div>
    </div>

    <div class="my-5 text-center">
        <input type="submit" class="btn btn-primary rounded-pill" name = "testmail" Value = "TEST">
        <a class="text-white" href="setting.php#mailset">
        <div class="btn btn-secondary rounded-pill" >Back to Setting</div></a>
    </div>
</form>