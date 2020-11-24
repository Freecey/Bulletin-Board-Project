<php 
//boards_form.php


?>



<div class="container">
<h3 class="well text-center">Boards Manager</h3>
 
<table class="table">
    <thead class="thead">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if($req_boards) { ?>
            <?php while($row = $req_boards->fetch()) { ?>
        <tr>
            <?php $i++; ?>
            <td><?php echo $row['board_id']; ?></td>
            <td><img src=../<?php echo $row['board_image']; ?> width="30"></td>
            <td><?php echo $row['board_name'];?></td>
            <td><?php echo $row['board_description'];?></td>
            <td></td>  <!-- Remove if add second button -->
            <td><a href="boardsedit.php?edit_id=<?php echo $row['board_id']; ?>" class="glyphicon glyphicon-edit btn btn-primary"> Edit</a></td>
            <!-- <td><a href="delete.php?id=<?php echo $row['board_id']; ?>"  class="glyphicon glyphicon-remove btn btn-danger"> Delete</a></td> -->
            
    </tr>  
            <?php } ?>
            <?php }else{ echo "DATA NOT FOUND"; } ?>
    </tbody>

    <span><a href="boardscreat.php" class="btn btn-success">Add Board</a></span>
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


