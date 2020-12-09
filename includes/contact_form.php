<form method="post">

    <div class="d-flex justify-content-between align-items-center mb-3 text-center">
        <h4 class="text-right">Contact Teams: </h4> 
    </div>
    <div class="row mt-3">
    <div class="col-md-6"><label class="labels">Your EMail :</label><input type="text" class="form-control" name="sendformemail" value="<?php echo $_SESSION[user_email]; ?>"></div>
    <div class="col-md-6"><label class="labels">Your Name/Alias :</label><input type="text" class="form-control" name="sendformname" value="<?php echo $_SESSION[user_name]; ?>"></div>
        <div class="col-md-6"><label class="labels">Subject :</label><input type="text" class="form-control" name="mail_subject" value="<?php echo $_POST[mail_subject]; ?>"></div>

    </div>
    <div class="row mt-3">
        <div class="col-md-12"><label for="user_sign">Message :</label>
            <textarea class="form-control" id="mail_msg" name="mail_msg" rows="5"><?php echo $_POST[mail_msg]; ?></textarea>
        </div>
    </div>

    <div class="my-5 text-center">
        <input type="submit" class="btn btn-primary rounded-pill" name = "sendformtomail" Value = "Send Message">
        <a class="text-white" href="/">
        <div class="btn btn-secondary rounded-pill" >Back to Home</div></a>
    </div>
</form>