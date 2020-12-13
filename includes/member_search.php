<?PHP 
include 'req_member.php';
$req_member = $conn->query("SELECT * FROM users"); //request to get the users table

$user_lvl_text = array(
    "Viewer",
    "User",
    "Moderator",
    "Admin",
    "God",
    666 => "Devil",
); //to define what to write for each user-level

?>

<div class="container">
    <h3 class="well text-center">User Research for <em> <?= $search_Member; ?> </em> </h3>

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
    <!-- end search bar -->
    
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
            <?php $i = 0;
                if($req_member) {
                    while($user = $req_member->fetch()) { ?>
                    <tr>
                        <?php $i++; ?>

                        <td><?php echo $i; ?></td>

                        <td>
                            <img class="rounded-circle" src="data:image/webp;base64,'.base64_encode($mod['user_imgdata']).'" alt="'.$mod['user_name'].'s Avatar" width="40" height="40">
                        </td>

                        <td><?php echo $user['user_name']; ?></td>

                        <td>
                            <?php 
                                $nb_post = $conn->query("SELECT COUNT(post_id) FROM posts WHERE post_by=$user[user_id]")->fetchColumn(); 
                                echo $nb_post;
                            ?>
                        </td>

                        <td><?php echo $user_lvl_text[$user['user_level']];?></td>

                        <td><?php echo $user['user_active'];?></td>


                        <td><a href="?view_user_id=<?php echo $user['user_id']; ?>" class="glyphicon glyphicon-edit btn btn-primary">View</a></td>
                        
                    </tr> 

                    <?php }
                } else { echo "DATA NOT FOUND"; } 
            ?>
        </tbody>
    </table>
<<<<<<< HEAD
</div>
=======
</div>



>>>>>>> 9a9211462a1d3e4a7a290c02d82c11d3fddcb1e1
