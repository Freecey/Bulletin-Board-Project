<?php 
//profileform.php
//mise en page formutaire
?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">
        <div class="col-xl-3 col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="" width="90"><span class="font-weight-bold"><?php echo $data['user_name'] ?></span><span class="text-black-50"><?php echo $data['user_email'] ?></span><span> </span></div>
                              
        </div>
        <div class="col-xl-9 col-md-9 border-right">
        <h4 class="text-center">some statistics : </h4> 
            <div class="p-3 py-5">
            
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        
                    </div>
                    <div class="col col-md-12">
						<div class="row">
                        <div class="col col-md-4">
								<h4>Nb of post:</h4>
                                <?php
                                    $dtoday = date("Y-m-d");
                                    for ($i = 1; $i <= 7; $i++) {

                                    $dtoday_1 = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 

                                    $select2 = $conn->prepare("SELECT COUNT(*) 
                                                        FROM posts
                                                        WHERE post_date BETWEEN '$dtoday_1' and '$dtoday'" );
                                    $select2->setFetchMode(PDO::FETCH_ASSOC);
                                    // echo $select2;
                                    $select2->execute();
                                    $data2=$select2->fetchColumn();
                                    $dtoday = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 
                                    ?>



                                     
                                    <?php echo
										 '<div class="progress m-0">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45"aria-valuemin="0" aria-valuemax="100" style="width:'.($data2*2).'%">'.$data2.'</div>
										</div>
                                        ';}?>

							</div>
							<div class="col col-md-4">

								<h4>.</h4>
                                <?php 
                                $dtoday = date("Y-m-d"); 
                                for ($i = 1; $i <= 7; $i++) {
                                 $dtoday = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 
                                 ?>
                                   <?php echo 
										 '<div class="progress">

                                            <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="15"aria-valuemin="0" aria-valuemax="100" style="width:100%">'.$dtoday.'</div>
                                        </div>'
                                            ;}?>
                                </div>
							
							<div class="col col-md-4">
								<h4>Nb Register:</h4>
                                <?php
                                    $dtoday = date("Y-m-d");

                                    $dtoday_1 = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 
                                    for ($i = 1; $i <= 7; $i++) {


                                    $select2 = $conn->prepare("SELECT COUNT(*) 
                                                        FROM users
                                                        WHERE user_date BETWEEN '$dtoday_1' and '$dtoday'" );
                                    $select2->setFetchMode(PDO::FETCH_ASSOC);
                                    // echo $select2;
                                    $select2->execute();
                                    $data2=$select2->fetchColumn();
                                    $dtoday = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 
                                    $dtoday_1 = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 

                                    ?>



                                     
                                    <?php echo
										 '<div class="progress m-0">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45"aria-valuemin="0" aria-valuemax="100" style="width:'.$data2.'0%">'.$data2.'</div>
										</div>
                                        ';}?>


       
							</div>
						</div>




                    <div class="row mt-3">
                    <div class="col col-md-4">
								<h4>Login OK:</h4>
                                <?php

                                    $dtoday = date("Y-m-d");
                                    $dtoday_1 = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday)));   
                                    for ($i = 1; $i <= 7; $i++) {
                                    

                                    $select2 = $conn->prepare("SELECT COUNT(*) 
                                                        FROM loginok
                                                        WHERE loginok_date BETWEEN '$dtoday_1' and '$dtoday'" );
                                    $select2->setFetchMode(PDO::FETCH_ASSOC);
                                    // echo $select2;
                                    $select2->execute();
                                    $data2=$select2->fetchColumn();
                                    $dtoday = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 

                                    $dtoday_1 = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 
                                    ?>



                                     
                                    <?php echo
										 '<div class="progress m-0">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45"aria-valuemin="0" aria-valuemax="100" style="width:'.($data2*2).'%">'.$data2.'</div>
										</div>
                                        ';}?>

							</div>
							<div class="col col-md-4">

								<h4>.</h4>
                                <?php 
                                $dtoday = date("Y-m-d");   
                                for ($i = 1; $i <= 7; $i++) {
                                 
                                 
                                 ?>
                                   <?php echo 
										 '<div class="progress">
                                            <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="15"aria-valuemin="0" aria-valuemax="100" style="width:100%">'.$dtoday.'</div>
                                        </div>'
                                            ;
                                            $dtoday = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 
                                        }?>
                                </div>
							
							<div class="col col-md-4">
								<h4>Login Fail:</h4>
                                <?php

                                    $dtoday = date("Y-m-d");  
                                    $dtoday_1 = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday)));  
                                    for ($i = 1; $i <= 7; $i++) {

                                    

                                    $select2 = $conn->prepare("SELECT COUNT(*) 
                                                        FROM logattempts
                                                        WHERE logattempt_date BETWEEN '$dtoday_1' and '$dtoday'" );
                                    $select2->setFetchMode(PDO::FETCH_ASSOC);
                                    // echo $select2;
                                    $select2->execute();
                                    $data2=$select2->fetchColumn();
                                    $dtoday = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 

                                    $dtoday_1 = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 
                                    ?>



                                     
                                    <?php echo
										 '<div class="progress m-0">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45"aria-valuemin="0" aria-valuemax="100" style="width:'.$data2.'0%">'.$data2.'</div>
										</div>
                                        ';}?>


       
							</div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels"><?php 
                        $endtime = microtime(true);
                        $duration = $endtime - $starttime; //calculates total time taken
                        echo 'Query took : '.$duration.' seconds';
                        ?>
                        </label></div>
                        <div class="col-md-6"><label class="labels">Soon 4</label></div>
                    </div>



                    <div class="row mt-3">
                        <div class="col-md-12"><label for="user_sign">Soon 5</label>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                    </div>

                    <div class="mt-5 text-center">
                    </div>

                    <div class="row mt-3">
                    </div>

                    <div class="mt-5 text-center">
                    </div>
                
            </div>
        </div>
    </div>
</div>










<!------ Include the above in your HEAD tag ---------->

    		<nav class="navbar navbar-default navbar-static-top">
				<div class="container-fluid">
					
				</nav>
				<div class="container-fluid">
					<div class="col col-md-3">			
					
					</div>
			
					</div>
				</div>