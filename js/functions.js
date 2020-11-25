function displayTextEditor(){
    let btnPostReply = document.getElementById("btn-post-reply");
    let newPostContainer = document.getElementById("newPostArea");
    let submitNewPost = document.getElementById("btn-submit-post");

    newPostContainer.style.display = "none";  
    btnPostReply.addEventListener("click", () => {
    newPostContainer.style.display = "block"; 
    })
}