<php 
//announce_form.php


?>



<div class="container">
<h3 class="well text-center">Announces Manager</h3>
 
<table class="table">
    <thead class="thead">
        <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Content</th>
            <th>Status</th>
            <th>by</th>
            </th>
            <th></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if($req_announces) { ?>
            <?php while($row = $req_announces->fetch()) { ?>
        <tr>
            <?php $i++; ?>
            <td><?php echo $row['ann_id']; ?></td>
            <td><?php echo $row['ann_subject'];?></td>
            <td><?php echo $row['ann_content'];?></td>
            <td><?php echo $row['ann_status'];?></td>
            <td><?php 
                    $key = array_search($row['ann_by'], array_column($new_array, 'user_id'));
                    $keyuser = $new_array[$key];
                    $useralias = $keyuser['user_name'];
                    echo $useralias ;?></td>
            <td></td>  <!-- Remove if add second button -->
            <td><a href="announceedit.php?edit_id=<?php echo $row['ann_id']; ?>" class="glyphicon glyphicon-edit btn btn-primary"> Edit</a></td>
            <!-- <td><a href="delete.php?id=<?php echo $row['ann_id']; ?>"  class="glyphicon glyphicon-remove btn btn-danger"> Delete</a></td> -->
            
    </tr>  
            <?php } ?>
            <?php }else{ echo "DATA NOT FOUND"; } ?>
    </tbody>

    <span><a href="announceadd.php" class="btn btn-success">Add Announce</a></span>
</table>
            <div class="clearfix text-center">
                <div class="hint-text">Showing <b><?php echo $i-1; ?></b> out of <b><?php echo $i-1; ?></b> entries</div>
            <!--         <ul class="pagination">
                        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-left"></i></a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul> -->
            </div> 
</div>


