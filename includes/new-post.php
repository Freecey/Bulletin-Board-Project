<?php include 'connect.php'; ?>

<form id="newPostArea">
  <div class="form-group">
    <textarea type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your message"></textarea>
  </div>
  <button id="submitNewPost" type="submit" class="btn btn-primary">Submit</button>
</form>


<script>
    let postReply = document.getElementById("btnPostReply");
    let newPostContainer = document.getElementById("newPostArea");
    let submitNewPost = document.getElementById("submitNewPost");

    postReply.addEventListener("click", () => {
        
        if(getComputedStyle(newPostContainer).display != "none"){
            newPostContainer.style.display = "none";
        } else {
            newPostContainer.style.display = "block";
        }
    })

    submitNewPost.addEventListener("click", () => {
        if(getComputedStyle(newPostContainer).display != "none"){
            newPostContainer.style.display = "none";
        } else {
            newPostContainer.style.display = "block";
        }
    })
</script>
