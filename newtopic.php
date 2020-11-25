<?php 
//newtopic.php

include 'includes/1head.php';
include 'includes/2body.php';

if (empty($_GET['view_user_id'])) {
    include 'includes/topicnew_view.php';
    include 'includes/topicnew_form.php';

} else {
    include 'includes/member_view.php';
    include 'includes/member_form.php';
}

include 'includes/3body.php';
include 'includes/4foot.php';

?>