

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="row">

    <div class="form-group col-6">
        <label for="FormControlSelect1">Send To:</label>
        <select class="form-control" id="SelectUSR" name="SelectUSR" >
                        <?php 
                    if($req_USR_list) { 

                        while($row = $req_USR_list->fetch()) {
                            echo '<option value="'.$row['user_id'].'"';  if($_GET['sendto_id'] == $row['user_id'] ){echo 'selected';}; echo '>'.$row['user_name'].'</option>
                        ';}
                    }
                    ?>
                </select>
    </div>

    <div class="form-group col-6"">
        <label for="">Subject :</label>
        <input type="text" class="form-control" id="" placeholder="" name="pvmsg_sub">
    </div>

    <div class="form-group col-12">
        <label for="exampleFormControlTextarea1">You Message:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="pvmsg_cont"></textarea>
    </div>

    <div class="form-group col-12">
        <button type="submit" class="btn btn-primary" name="SEND_MSG" >Send Message</button>
    </div>

</div>
</form>


<form>
<div class="col-12">
<select name="sendto_id"  onchange="form.submit()">
<option  value="0">Send to</option>
<option  value="1">Option One</option>
  <option value ="2">Option Two</option>
  <option value="4">Option three</option>
  <option value="16">Option three</option>
</select>
</div>
</form>
