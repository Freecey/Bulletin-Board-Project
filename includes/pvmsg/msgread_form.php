


<div class="content">
    <div class="container p-0">

		<h1 class="h3 mb-3">Messages</h1>

		<div class="card">
			<div class="row g-0">
				<div class="col-12 col-lg-5 col-xl-3 border-right">

					<div class="px-4 d-none d-md-block">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1">
                            <form>
                                <select class="form-control my-3" name="sendto_id"  onchange="form.submit()" >
                                        <?php 
                                    if($req_USR_list) { 
										echo '<option value="0">Select User</option>';
                                        while($row = $req_USR_list->fetch()) {
                                            echo '<option value="'.$row['user_id'].'"';  if($_GET['sendto_id'] == $row['user_id'] ){echo 'selected';}; echo '>'.$row['user_name'].'</option>
                                        ';}
                                    }
                                    ?>
                                </select>
                            </form>
								<!-- <input type="text" class="" placeholder="Search..."> -->
							</div>
						</div>
					</div>


                    <?php 
                    $usrlst_arr = array('0');
                    $DISCACTUSR = 0;
                    if($req_PVMSG) { 

                     

                       while($rowDISC = $req_PVMSG->fetch()) { 
                           //if($DISC_USERDONE != $rowDISC['pvmsg_to'] ){
                            if (in_array($rowDISC['pvmsg_to'],$usrlst_arr, true)){ }else{

                            
                        $DISCACTUSR = $rowDISC['pvmsg_to'];
                        
                        array_push($usrlst_arr,$DISCACTUSR);
                        $key = array_search($rowDISC['pvmsg_to'], array_column($users_array, 'user_id'));
                        $keyuser = $users_array[$key];
                        $useralias = $keyuser['user_name'];
                        $userimage = $keyuser['user_imgdata'];

                                             
                           echo '
					<a href="msg.php?sendto_id='.$DISCACTUSR.'" class="list-group-item list-group-item-action border-0 form-color">';
                        if( $rowDISC['pvmsg_read'] == 0){
                        echo '<div class="badge bg-success float-right">unread</div>';
                        }
                        echo '<div class="d-flex align-items-start">
							<img src="data:image/webp;base64,'.base64_encode($userimage).'" class="rounded-circle mr-1" alt="'.$useralias.'s avatar" width="40" height="40">
							<div class="flex-grow-1 ml-3">';
                            
                            
                    echo $useralias ;

                                 //<div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                                 echo'
							</div>
						</div>
					</a>';
                }
                          $DISC_USERDONE = $DISCACTUSR;
                          }}?>

					<hr class="d-block d-lg-none mt-1 mb-0">
				</div>
				<div class="col-12 col-lg-7 col-xl-9">
					<div class="py-2 px-4 border-bottom d-none d-lg-block">
						<div class="d-flex align-items-center py-1">
							<div class="position-relative">
                            <?php
								if ($sendto_id == '0' ) { echo 'Welcome to your private inbox'; }else{

                                $key = array_search($sendto_id, array_column($users_array, 'user_id'));
                                $keyuser = $users_array[$key];
                                $useralias = $keyuser['user_name'];
                                $userimage = $keyuser['user_imgdata'];
                                echo'
								<img src="data:image/webp;base64,'.base64_encode($userimage).'" class="rounded-circle mr-1" alt="'.$useralias.' avatar" width="40" height="40">
							</div>
							<div class="flex-grow-1 pl-3">
								<strong>'.$useralias.'</strong>';
                            
								echo '<!-- <div class="text-muted small"><em>Typing...</em></div> -->';
							} ?>
							</div>
							<div>
								<!-- <button class="btn btn-primary btn-lg mr-1 px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone feather-lg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></button>
								<button class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video feather-lg"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></button>
								<button class="btn btn-light border btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal feather-lg"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></button> -->
							</div>
						</div>
					</div>

					<div class="position-relative">
						<div class="chat-messages p-4">
<!-- ME START-->    <?php 
			$nmb_msg_disp = 1;
            if($req_PVMSG2) { 
                    while($rowDMSG = $req_PVMSG2->fetch()) { 
						if( $nmb_msg_disp <= 10) {
							
                        $MSG_DATE = strtotime($rowDMSG['pvmsg_date']);
                        
                        if( ($rowDMSG['pvmsg_action'] == 'SEND') AND ($rowDMSG['pvmsg_to'] == $sendto_id) ){
                        echo '
							<div class="chat-message-right pb-4">
								<div>
									<img src="data:image/webp;base64,'.base64_encode($CURRENT_IMAGE).'" class="rounded-circle mr-1" alt="'.$CURRENT_UNAME.'" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">'.humanTiming($MSG_DATE).'</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
									<div class="font-weight-bold mb-1">You</div>
									'.$rowDMSG['pvmsg_content'] .'
								</div>
                            </div>
                        
<!-- ME END -->
<!-- YOU START -->';    $nmb_msg_disp = $nmb_msg_disp+1;
						}elseif(  $rowDMSG['pvmsg_to'] == $sendto_id ){
                        
                        echo '
                            <div class="chat-message-left pb-4">
								<div>
									<img src="data:image/webp;base64,'.base64_encode($userimage).'" class="rounded-circle mr-1" alt="'.$useralias.'" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">'.humanTiming($MSG_DATE).'</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
									<div class="font-weight-bold mb-1">'.$useralias.'</div>
									'.$rowDMSG['pvmsg_content'] .'
								</div>
                            </div>
                            
						';
						$nmb_msg_disp = $nmb_msg_disp+1;}
                    }
                    
			}}
			if ($sendto_id == '0' ) { echo '<img src="/assets/other/mailbox.webp" class="rounded mx-auto d-block" alt="Welcome in inbox">'; } ?>
<!-- YOU END -->


						</div>
					</div>

					<div class="flex-grow-0 py-3 px-4 border-top">
					<?php if ($sendto_id == '0' ) { }else echo '
                    	<form method="POST" action="'.$_SERVER['REQUEST_URI'].'">
						<div class="input-group">
                            <input type="hidden" name="sendto_id" value="'.$_GET['sendto_id'].'">
							<input type="text"  name="pvmsg_cont" class="form-control" placeholder="Type your message">
							<button type="submit" name="SEND_MSG" class="btn btn-primary">Send</button>
						</div>
                        </form>';?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>



<?php

    // echo '<pre>' . print_r($usrlst_arr, TRUE) . '</pre>';

?>
