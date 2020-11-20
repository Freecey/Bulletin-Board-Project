<?php
$req_topics = $conn->query('SELECT * FROM topics ORDER BY topic_id');
if (!$req_topics) {
    echo 'Unable to display the topics' .mysql_error();
} else {
?>

<section class="mb-3" id="topics">
    
    <article class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Topics' List</h2>
            </div>
        </div>
        <div class="row card bg-light rounded-lg pb-3">
            <div class="card-header d-flex">
                <div class="col-7">
                    <p class="h6 mb-1">Topics' List</p>
                </div>
                <div class="col-2"> <i class="fas fa-comments"></i> </div>
                <div class="col-1"> <i class="far fa-eye"></i> </div>
                <div class="col-2"> <i class="far fa-clock"></i> </div>
            </div>

            <div class="card-body">
                <?php
                while ($topic = $req_topics->fetch())
                { 
                ?>
                <div class="row">
                    <div class="card border-0">
                        <p>test</p>
                    </div>
                </div>
                
                <?php
                }
                $req_boards->closeCursor();
                ?>
            </div>
        </div>
    </article>
    
</section>
<?php
}
?>
