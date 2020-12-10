


<div class="container">
    <h3 class="well text-center">User Research</h3>

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
                <th>active</th>
                <?php if(isset($_SESSION['user_lvl'])){ echo '<th></th>'; }; ?>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
                if($req_member) {
                    while($row = $req_member->fetch()) { ?>
                    <tr>
                        <?php $i++; ?>

                        <td><?php echo $i-1; ?></td>

                        <td><img class="rounded-circle" src="<?php echo $row['user_image']; ?>" width="35"></td>

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
                    <?php }
                } else { echo "DATA NOT FOUND"; } ?>
        </tbody>
    </table>
</div>


