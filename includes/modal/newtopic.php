    <!-- <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    </head>
 -->



<!-- <div class="d-flex justify-content-start"> -->
        <div class="mr-3">
        <button type="button" id="btn-post-reply" class="btn btn-primary btn-rounded p-3" data-toggle="modal" data-target="#NewPostModal">New Topic <i class="fas fa-pencil-alt"></i></button>
            <!-- Modal -->
            <div class="modal fade" id="NewPostModal" tabindex="1" role="dialog" data-backdrop="false" aria-labelledby="NewPostModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 10">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="NewPostModalLabel" data-backdrop="true">Create New Topic</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/topicnew_view.php');
                                  include($_SERVER['DOCUMENT_ROOT'].'/includes/topicnew_form.php');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script type="text/javascript">
            let posts = document.getElementsByClassName('post-content');
            
            Array.from(posts).forEach(post => {
                const comment = post.innerHTML;
                const cleanComment = DOMPurify.sanitize(comment)
                post.innerHTML = marked(cleanComment);
            });
        </script> -->
