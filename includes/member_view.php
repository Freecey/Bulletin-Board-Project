<?php
//member_view.php
include '../includes/admin/session_userlvl.php';
$view_user_id = $_GET['view_user_id'];

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
$user_id = $Edit_ID;

$select = $conn->prepare("SELECT*FROM users where user_id='$view_user_id' LIMIT 1");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data_Sel_USR = $select->fetch();

//  echo '<pre>' . print_r($data_Sel_USR, TRUE) . '</pre>';

if (isset($data_Sel_USR[user_id])) {
    $user_id_nok = '';
    $user_id_nok_class = '';
} else {
    $user_id_nok = "This User don't existe";
    $user_id_nok_class = 'bg-danger text-white';
}

// Popote pour la date et mis a 0 si autre selectionner
$user_datebirthday = $data_Sel_USR['user_datebirthday'];
// echo $user_datebirthday;
$dobdate = strtotime($user_datebirthday);
$dobday = date('d', $dobdate);
$dobmonth = date('m', $dobdate);
$dobyear = date('Y', $dobdate);

$dobday = (int) $dobday;
$dobmonth = (int) $dobmonth;
$dobyear = (int) $dobyear;

if ($user_datebirthday == '') {
    $dobday = '';
    $dobmonth = '';
    $dobyear = '';
}

// Set Text to User LVL
$user_lvl_text = array(
    "Viewer",
    "User",
    "Moderator",
    "Admin",
    "God",
    666 => "Devil",
);
