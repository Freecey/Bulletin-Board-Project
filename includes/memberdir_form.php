<php 
//memberdir_form.php


?>



<div class="container">
<h3 class="well text-center">User Manager</h3>

<!-- search bar to search members -->
<form action="/member.php?search_member=<?php echo $_GET['user'];?>" methode="GET" class="form-group">	
    <div class="bg-light rounded rounded-pill shadow-sm">	
        <div class="input-group">	
            <input type="search" name="search_member" placeholder="Search member..." aria-describedby="button-addon1" class="form-control border-0 bg-light rounded-pill ">	
            <div class="input-group-append">	
                <button type="submit" class="btn btn-link text-primary" ><i class="fa fa-search"></i></button>	
            </div>	
        </div>	
    </div>	
</form>
<!-- end search  bar -->
 
<table class="table">
    <thead class="thead">
        <tr>
            <th>#</th>
            <th></th>
            <th>Alias</th>
            <th>Total Post</th>
            <th>Level</th>
            <th>Active</th>
            <?php if(isset($_SESSION['user_lvl'])){ echo '<th></th>'; }; ?>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if($req_member) { ?>
            <?php while($row = $req_member->fetch()) { ?>
        <tr>
            <?php $i++; ?>
            <td><?php echo $i-1; ?></td>
            <td><img class="rounded-circle" src="data:image/webp;base64,<?php echo base64_encode($row['user_imgdata']); ?>" width="35" alt="user's avatar"></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php 

                $nb_post = $conn->query("SELECT COUNT(post_id) FROM posts WHERE post_by=$row[user_id]")->fetchColumn(); 
                echo $nb_post;

            ?>
            </td>
            <td><?php echo $user_lvl_text[$row['user_level']];?></td>
            <td><?php echo $row['user_active'];?></td>


            <td><a href="?view_user_id=<?php echo $row['user_id']; ?>" class="glyphicon glyphicon-edit btn btn-primary">View</a></td>
            <?php if(isset($_SESSION['user_level'])) {echo '<td><a href="msg.php?sendto_id='.$row['user_id'].'"  class="glyphicon glyphicon-remove btn btn-primary">Send MSG</a></td>';} ?>
            
    </tr>  
            <?php } ?>
            <?php }else{ echo "DATA NOT FOUND"; } ?>
    </tbody>

    <!-- <span><a href="create.php" class="btn btn-success">Add Users</a></span> -->
</table>
            <!-- <div class="clearfix text-center">
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
            </div> -->
</div>


