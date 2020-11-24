function displayTextEditor(){
    let btnPostReply = document.getElementById("btnPostReply");
    let newPostContainer = document.getElementById("newPostArea");
    let submitNewPost = document.getElementById("submitNewPost");

    newPostContainer.style.display = "none";  
    btnPostReply.addEventListener("click", () => {
    newPostContainer.style.display = "block"; 
    })
}