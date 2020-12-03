<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 
?>
<div class="container-fluid bg-light rounded-lg col-lg-12 col-xl-7 ">
                                <div class="gradient-header row d-flex align-items-center blue-gradient">

                                        <div class="card-header__element col-12"> <p class="h6 mb-1 text-center">Announcements</p></div>

                                    </div>

                                    <div id="announce-list" class="card-body">
                                    <?php
                                        $req_announce = getAnnounces();
                                            while ($ann = $req_announce->fetch())
                                            { 
                                            ?>
                                            <div class="card border-0 ">
                                                <div class="ann-list-item card-body w-100 d-flex align-items-center">
                                                    <div class="col-9">
                                                        <?php echo '<a href="./announce.php?id=' . $ann['ann_id'] . '">' . $ann['ann_subject'] . '</a>'?>
                                                    </div>
                                                    <div class="ann-details col-3 text-right">
                                                        <!-- DATE -->
                                                        <?php 
                                                            $req_user = getLastAnnouce();
                                                            while($user = $req_user->fetch()) {
                                                        ?>
                                                         <div class=" <!--d-flex--> "> 
                                                            <!-- <div class="font-weight-light pr-1"></div> -->
                                                            <small> by </small>
                                                            <a href="member.php?view_user_id=<?= $user['user_id']; ?>" >
                                                            <small><strong> 
                                                                    <?= ' '.ucwords($user['user_name']); ?>
                                                            </strong></small>
                                                            </a>
                                                        </div>
                                                        <div class="font-weight-light">
                                                            <?php
                                                                $annDate = new DateTime($ann['ann_date']);
                                                                echo '<small>'.$annDate->format('D M d, H:i').'</small>';
                                                            ?>
                                                        </div>
                                                        <?php
                                                            }
                                                            $req_user->closeCursor();
                                                            ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                        $req_announce->closeCursor();
                                        ?>
                                    </div>
                                </div>