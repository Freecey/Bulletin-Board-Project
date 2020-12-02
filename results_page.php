<?php 
if ($_GET[search] == 'ilovepizzawithananas'){
    header("location:/board_is_secret.php?id=6ilovepizzawithananas"); 
}


    include 'includes/1head.php';
    include 'includes/2body.php';
    include 'includes/req_search.php';
   
?>
    
<div class="row container-fluid">
    <div class="col">
        <h2>Search results for <em><?php echo $search; ?></em> </h2>
    </div>
</div>

<div class="container-fluid bg-light rounded-lg m-2">
    <div class="gradient-header row d-flex align-items-center">
        <div class="card-header__element col-7">
            <p class="h6 mb-1">Topics Results</p>
        </div>
    </div>
    
    <div class="card-body">
        <div class="card border-0 m-1">
            <div class="ann-list-item card-body w-100 d-flex align-items-center">
                <?php include 'includes/topics_results.php';?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-light rounded-lg m-2">
    <div class="gradient-header row d-flex align-items-center">
        <div class="card-header__element col-7">
            <p class="h6 mb-1">Posts Results</p>
        </div>
    </div>
    <div  class="card-body">
        <div class="card border-0 m-1">
            <div class="ann-list-item card-body w-100 d-flex align-items-center">
                <?php include 'includes/posts_results.php';?>
            </div>
        </div>
    </div>  
</div>



<?php
    include 'includes/3body.php';
    include 'includes/4foot.php';
?>

