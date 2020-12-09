<?php

// $email = $_SESSION[user_email];
$default = "bbs-queen.neant.be/homestar.jpg";
// $size = '';
// session_start();
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;



//for testing
$gravemail = md5( strtolower( trim( $email ) ) );
$gravcheck = "http://www.gravatar.com/avatar/".$gravemail."?d=404";
$response = get_headers($gravcheck);
// print_r($response);
if ($response[0] != "HTTP/1.1 404 Not Found"){
    $img = $grav_url;
} else {
    $grav_url = 'https://bbs-queen.neant.be/assets/avatar/projectavatar.webp';
}
// echo $grav_url;

/* <img src="<?php echo $grav_url; ?>" alt="" /> */
?>
