<?PHP 
require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');

$searchMember = false; 

if (isset($_GET['search_member']) AND !empty($_GET['search_member'])) {

$search_Member = $conn->prepare("SELECT * FROM users WHERE users_name LIKE %mysql% AND user_active != 2")
$search_Member->execute();
return $search_Member;
}
?>