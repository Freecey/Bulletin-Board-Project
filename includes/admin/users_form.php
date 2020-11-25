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
            <?php $i++; ?>
            <td><?php echo $row['user_id']; ?></td>
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


