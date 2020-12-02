<?php 
//log_form.php
?>


<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">


<table class="table table-sm table-striped ">
<h3 class="text-center mb-3">LOG : loggin Attempts </h3>
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">date</th>
            <th scope="col">IP</th>
            <th scope="col">email</th>
            <th scope="col">pass tried</th>
            <th scope="col">User Agent</th>
            <th scope="col">From URL</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if($req_logfail) { ?>
            <?php while($row = $req_logfail->fetch()) { ?>
        <form method="post">
        <tr>
            <?php $i++; ?>
            <td scope="row"><?php echo $row['logattempt_id']; ?></td>
            <td><?php echo $row['logattempt_date'];?></td>
            <td><?php echo $row['logattempt_ip']; ?></td>
            <td><?php echo $row['logattempt_email'];?></td>
            <td><?php echo $row['logattempt_pwd'];?></td>
            <td><?php echo $row['logattempt_browser'];?></td>
            <td><a href="<?php echo $row['logattempt_urlfrom'];?>"><?php echo $row['logattempt_urlfrom'];?></a></td>



            
            
    </tr>
    </form>  
            <?php } ?>
            <?php }else{ echo "DATA NOT FOUND"; } ?>
    </tbody>

</div>

<!-- loginok  -->



<div class="row">
<div class="<?php echo $UpdateOKClass; ?>"> <?php echo $UpdateOK;?></div>


<table class="table table-sm table-striped ">
<h3 class="text-center mb-3">LOG : loggin OK </h3>
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">date</th>
            <th scope="col">User</th>
            <th scope="col">IP</th>
            <th scope="col">User Agent</th>
            <th scope="col">From URL</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if($req_loginok) { ?>
            <?php while($row = $req_loginok->fetch()) { ?>
        <form method="post">
        <tr>
            <?php $i++; ?>
            <td scope="row"><?php echo $row['loginok_id']; ?></td>
            <td><?php echo $row['loginok_date'];?></td>
            <td><?php echo $row['loginok_user_id'];?></td>
            <td><?php echo $row['loginok_ip']; ?></td>            
            <td><?php echo $row['loginok_browser'];?></td>
            <td><a href="<?php echo $row['loginok_urlfrom'];?>"><?php echo $row['loginok_urlfrom'];?></a></td>



            
            
    </tr>
    </form>  
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
</div>

