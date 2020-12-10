


<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#LeaveModalCenter">
  Close my account
</button>

<!-- Modal -->
<div class="modal fade" id="LeaveModalCenter" tabindex="-1" role="dialog" data-backdrop="false"  aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Close My account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      <p><b>Close my account,<br>
       this action is <color class="text-danger">not reversible</color></b>.<br>
       If you want to relogin, you should re sign up.</p>
        <div class="form-group">
    <label for="confirm-type">Please confirm you chose by type "i want to leave" <br> and click on confirm leave.</label>
    <form method="post" action="profile.php" >
    <input type="text" class="form-control" id="typed" name="typed" aria-describedby="sentenceInfo" placeholder="Confirm sentence">
    <small id="sentenceInfo" class="form-text text-muted">(key sensitive)</small>
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="btn_confirm">Confirm Leave</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
