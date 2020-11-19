<aside style="border: 1px solid coral;">
<?php 

?>


<?php
session_start();
try {
	include('connect.php');
	if(isset($_POST['signin'])){
		$user_name = $_POST['user_name'];
        $user_pass = $_POST['user_pass'];
        $user_pass = hash('sha512', $user_pass);

		$select = $conn->prepare("SELECT*FROM users where user_name='$user_name' and user_pass='$user_pass'");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();
		$data=$select->fetch();
		if($data['user_name']!=$user_name and $data['user_pass']!=$user_pass)
		{
            // $loginOK = false;
            echo "Invalid username or Password";
		}
		elseif($data['user_name']==$user_name and $data['user_pass']==$user_pass)
		{
            $loginOK = true;
			$_SESSION['user_name'] = $user_name;
            $_SESSION['loginOK'] = $loginOK;
            $_SESSION['user_level'] = $data['user_level'];
			// header("location:profile.php");
		}
	}
}
catch (PDOException $e) {

    echo "Error: ". $e -> getMessage();

}


if ($_SESSION['loginOK']  == true) {
    echo 'Welcome ';echo $_SESSION['user_name'];
    // echo 'Hello, ';echo $user_name;
    echo '<div>
        <a href="includes/profile.php">Your Profil</a>
    </div>';

    if($_GET['logout']==1) {
        $loginOK = false;
        session_destroy(); 
    }
    echo '
    <div>
        <a href="?logout=1">Logout</a>
    </div>';
    // echo '<pre>' . print_r($data, TRUE) . '</pre>';
    // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
} else {
    echo '<p>Need to login? or <br><a href="includes/signup.php"> click here to SignUP</a></p>';
    include('includes/signinform.php');
}



?>









</aside>
