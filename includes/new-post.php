<?php include 'connect.php'; 

?>


<form id="newPostArea">
    <div class="form-group">
        <textarea type="email" class="form-control" aria-describedby="emailHelp" placeholder="Your message"></textarea>
    </div>
    <button id="submitNewPost" type="submit" class="btn btn-primary btn-rounded">Submit</button>
</form>


<script>
    let postReply = document.getElementById("btnPostReply");
    let newPostContainer = document.getElementById("newPostArea");
    let submitNewPost = document.getElementById("submitNewPost");

    newPostContainer.style.display = "none";  

    postReply.addEventListener("click", () => {
        newPostContainer.style.display = "block";  
    })
</script>
