

<?php
    $response = $conn->query('SELECT * FROM boards ORDER BY board_id');
    
?>

<section class="container mb-3">
    <?php while($board =  $response->fetch())
    {
    ?>
    <div class="row">
        <div class="col">
            <h2><?php echo $board['board_name'] ?></h2>
        </div>
    </div>
    
    <article class="row bg-light rounded-lg pb-3">
        <div class="col-lg-4 col-md-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col-auto">
                            <img src="" alt="">
                        </div>
                        <div class="col ml-2">
                            <h4 class="font-weight-bold">
                                Topic Type Demos
                            </h4>
                            <div>
                                <p>This forum demonstrates different topic types (stikies, attachments, polls, long posts, etc)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <?php
        }
        $board->closeCursor();
    ?>
</section>
