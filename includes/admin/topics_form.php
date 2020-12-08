<php 
//topics_form.php

?>

<div class="container">
<h3 class="well text-center my-4">Topics Manager</h3>
 



<table class="table">
    <thead class="thead">
        <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>On Board</th>
            <th>Status</th>
            <th>by</th>
            <th>Nb post</th>
            </th>
            <th></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if($req_topics) { ?>
            <?php while($row = $req_topics->fetch()) { ?>
        <tr>
            <?php $i++; ?>
            <td><?php echo $row['topic_id']; ?></td>
            <td><?php echo $row['topic_subject'];?></td>
            <td><?php echo $row['topic_board'];?></td>
            <td><?php echo $row['topic_status'];?></td>
            <td><?php 
                    $key = array_search($row['topic_by'], array_column($new_array, 'user_id'));
                    $keyuser = $new_array[$key];
                    $useralias = $keyuser['user_name'];
                    echo $useralias ;?></td>
            <td> Soon </td>
            <td></td>  <!-- Remove if add second button -->
            <td><a href="topicsedit.php?edit_id=<?php echo $row['topic_id']; ?>" class="glyphicon glyphicon-edit btn btn-primary"> Edit</a></td>
            <!-- <td><a href="delete.php?id=<?php echo $row['topic_id']; ?>"  class="glyphicon glyphicon-remove btn btn-danger"> Delete</a></td> -->
            
    </tr>  
            <?php } ?>
            <?php }else{ echo "DATA NOT FOUND"; } ?>
    </tbody>
    <span>
    
        <div class="form-group row">
        <div class="row"><a href="../newtopic.php" class="btn btn-success">Add Topic</a></div>
            <div class="col-1"></div>
            <form method="GET" >
            <div class="">
            <button type="submit" class="btn btn-primary">Select Board</button>
            </div>
            <div class="col-6">
            <select class="form-control" id="SelectBoard" name="SelectBoard" >
                    <?php 
                if($req_boards) { 

                    
                    echo '<option >All</option>';
                    while($row = $req_boards->fetch()) {
                        echo '<option value="'.$row['board_id'].'"';  if($_GET['SelectBoard'] == $row['board_id'] ){echo 'selected';}; echo '>'.$row['board_name'].'</option>
                    ';}
                }
                ?>
            </select>
            </div>
            
            </form>
        </div>
    </span>

    
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


