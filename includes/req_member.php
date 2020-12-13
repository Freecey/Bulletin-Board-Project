<?PHP 
require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');

$searchMember = false; 

if (isset($_GET['search_member']) AND !empty($_GET['search_member'])) {
$requete = htmlspecialchars($_GET['requete']);
$search_Member = $conn->prepare("SELECT * FROM users WHERE user_name LIKE %requete% AND user_active != 2");

return $search_Member;

$searchMember = true; 
}
?>