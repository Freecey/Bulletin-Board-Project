
<?php
include 'connect.php';

$response = $conn->query('SELECT * FROM topics');

if (isset($_GET['search']) AND !empty($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    $response = $conn->query('SELECT * FROM topics, users, boards, posts WHERE * LIKE "%' .$search. '%"');
}
?>

<form action="" methode="POST" >
    <input type="text" name="search" placeholder="Search...">
    <button type="submit" name="submit"><i class="fas fa-search"></i></button>
</form>

<?php
while ($datas = $response -> fetch()) 
{
?>
    <p>
        <?php echo $datas['']; ?>
        
    <?php
    }
    ?>


