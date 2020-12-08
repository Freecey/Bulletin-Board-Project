<?php //require_once './includes/function/functions.php'; ?>
<?php 
// include './includes/function/functions2.php'; 
$Ann_id = $_GET['id'];

$query = $conn->prepare("SELECT * FROM announce WHERE ann_id = $Ann_id LIMIT 1");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$AnnounceDATA=$query->fetch();

$ANN_BY = $AnnounceDATA['ann_by'];
$query = $conn->prepare("SELECT * FROM users WHERE user_id = $ANN_BY LIMIT 1");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$UserByDATA=$query->fetch();

/// $AnnounceDATA = getAnn(`$Ann_id`);

// echo $AnnounceDATA['ann_id'];
// echo $AnnounceDATA['ann_subject'];
// echo $AnnounceDATA['ann_content'];
// echo $AnnounceDATA['ann_type'];
// echo $AnnounceDATA['ann_date'];
// echo $AnnounceDATA['ann_date_update'];
// echo $AnnounceDATA['ann_deleted'];
// echo $AnnounceDATA['ann_by'];
// echo $AnnounceDATA['ann_pin'];
?>

<!-- // id= announce id -->

<?php include 'includes/1head.php'; ?>
   <head>
        <link rel="stylesheet" href="css/simplemde.min.css">
        <script src="https://kit.fontawesome.com/ad9205c9ea.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
        <script src="js/simplemde.min.js"></script>
    </head>
    <body>
        
        <?php include('includes/header.php'); ?>
        <main class="pr-sm-5 pl-sm-5">
            <div class="container-fluid shadow rounded-lg" id="content">
                <div class="row">
                    <div class="col-12">
                        <?php include('includes/breadcrumb.php'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9 col-md-8">
                        <section id="comments" class="mb-3 pl-md-5">
                            <div class="row">
                                <div class="col">
                                    <h2>Announcement : <?php echo $AnnounceDATA['ann_subject'];?></h2>
                                </div>
                            </div>

                            <?php // require('includes/posts_pagination_reply.php'); ?>
                            <div class="row bg-light rounded-lg pb-3">
                                <div class="col">
                                    <?php
                                        $req = getBreadcrumbs();
                                        
                                    ?>
                                    <div class="card border-0 shadow-sm rounded-lg mt-3" id="<?php echo $AnnounceDATA['ann_id']; ?>">
                                        <div class="card-body row">
                                            <div class="col-12 col-sm-5 col-md-3 col-lg-2">
                                                <div class="row mb-2 text-md-center">
                                                    <div class="col-4 col-md-3 col-lg-12">
                                                        <img class="avatar rounded-circle" src="<?= $UserByDATA['user_image'] ?>" alt="<?= htmlspecialchars($UserByDATA['user_name']) ?>'s Avatar Picture" width="90">
                                                    </div>
                                                    <div class="col-8 col-md-9 col-lg-12">
                                                        <p class="mt-3 mb-0"><a href=member.php?view_user_id=<?php echo $UserByDATA['user_id'] ;?>><strong><?= htmlspecialchars($UserByDATA['user_name']) ?></strong></a></p>
                                                        <p>Posts: <strong>43</strong></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-7 col-md-9 col-lg-10">
                                                <p class="text-secondary">
                                                <?php
                                                    $date = new DateTime($AnnounceDATA['ann_date']);
                                                    echo $date->format('D M d, Y H:m:s');
                                                    if( $AnnounceDATA['ann_date_update'] == ''){

                                                    }else{
                                                        $dateupd = new DateTime($AnnounceDATA['ann_date_update']);
                                                        echo ' - last update ';
                                                        echo $dateupd->format('D M d, Y H:m:s');
                                                    }
                                                ?></p>
                                                <p class="post-content"><?= htmlspecialchars($AnnounceDATA['ann_content']) ?></p>
                                                <hr>
                                                <p class="small"><?= htmlspecialchars($UserByDATA['user_sign']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="row mt-4">
                                <a href="#" onclick="window.history.go(-1); return false;"><i class="fas fa-chevron-left"></i> Return to the topic section</a>
                            </div> -->
                            <?php // require('includes/posts_pagination_reply.php'); ?>
                        </section>
                        
                    </div>
                    <div class="col-xl-3 col-md-4 d-none d-md-block">
                        <?php include('includes/search.php'); ?>
                        <?php include('includes/signin.php'); ?>
                        <?php include('includes/sidebutton2.php'); ?>
                        <?php include('includes/last-posts.php'); ?>
                        <?php include('includes/last-active-user.php'); ?>
                    </div>
                </div>
            </div>
        </main>
        
        <?php include('includes/footer.php'); ?>
        
        <div id="scroll-up-btn" class="d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Go back to the top">
            <a href="#top"><i class="fas fa-arrow-up scroll-up-btn__icon"></i></a>
        </div>
        
        <script type="text/javascript" src="scroll-up-btn.js"></script>
        <script type="text/javascript" src="./node_modules/marked/marked.min.js"></script>
        <script type="text/javascript" src="./node_modules/dompurify/dist/purify.min.js"></script>
        <script type="text/javascript">
            let posts = document.getElementsByClassName('post-content');
            
            Array.from(posts).forEach(post => {
                const comment = post.innerHTML;
                const cleanComment = DOMPurify.sanitize(comment)
                post.innerHTML = marked(cleanComment);
            });
        </script>
        
    </body>
</html>