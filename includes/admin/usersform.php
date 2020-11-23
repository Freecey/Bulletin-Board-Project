<php 
//userform.php


?>



<div class="container">
<h3 class="well text-center">User Manager</h3>
 
<table class="table">
    <thead class="thead">
        <tr>
            <th>ID</th>
            <th>Alias</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>email</th>
            <th>Level</th>
            <th>active</th>
            <th>last log</th>
            <th>last IP</th>
            <th></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if($req_user) { ?>
            <?php while($row = $req_user->fetch()) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['user_fname'];?></td>
            <td><?php echo $row['user_lname'];?></td>
            <td><?php echo $row['user_email'];?></td>
            <td><?php echo $row['user_level'];?></td>
            <td><?php echo $row['user_active'];?></td>
            <td><?php echo $row['user_datelastlog'];?></td>
            <td><?php echo $row['user_last_ip'];?></td>
            <td><a href="usersedit.php?edit_id=<?php echo $row['user_id']; ?>" class="glyphicon glyphicon-edit btn btn-primary"> Edit</a></td>
            <td><a href="ban.php?id=<?php echo $row['user_id']; ?>"  class="glyphicon glyphicon-remove btn btn-danger"> BAN</a></td>
            <!-- <td><a href="delete.php?id=<?php echo $row['user_id']; ?>"  class="glyphicon glyphicon-remove btn btn-danger"> Delete</a></td> -->
            
    </tr>  
            <?php } ?>
            <?php }else{ echo "DATA NOT FOUND"; } ?>
    </tbody>

    <!-- <span><a href="create.php" class="btn btn-success">Add Users</a></span> -->
</table>
            <div class="clearfix text-center">
                <div class="hint-text">Showing <b><?php echo $i-1; ?></b> out of <b><?php echo $i-1; ?></b> entries</div>
                    <ul class="pagination">
                        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-left"></i></a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
            </div>
</div>


<!-- 
<div class="btn-toolbar">
    <button class="btn btn-primary">New User</button>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
          <th style="width: 36px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Mark</td>
          <td>Tompson</td>
          <td>the_mark7</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Ashley</td>
          <td>Jacobs</td>
          <td>ash11927</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>Audrey</td>
          <td>Ann</td>
          <td>audann84</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td>John</td>
          <td>Robinson</td>
          <td>jr5527</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>5</td>
          <td>Aaron</td>
          <td>Butler</td>
          <td>aaron_butler</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>6</td>
          <td>Chris</td>
          <td>Albert</td>
          <td>cab79</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
</div>
<div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text">Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>
 -->
