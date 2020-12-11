<?php 
//member.php

include 'includes/1head.php';
include 'includes/2body.php';

if (empty($_GET['view_user_id'])) {
    include 'includes/memberdir_view.php';
    include 'includes/memberdir_form.php';

    if ($search_Member = true) {
        include 'includes/member_search.php';
    }

} else {
    include 'includes/member_view.php';
    include 'includes/member_form.php';
}

include 'includes/3body.php';
include 'includes/4foot.php';

?>