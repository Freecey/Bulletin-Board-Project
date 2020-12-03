<?php include('includes/footer.php'); ?>
        <div id="scroll-up-btn" class="d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Go back to the top">
            <a href="#top"><i class="fas fa-arrow-up scroll-up-btn__icon"></i></a>
        </div>

        <script type="text/javascript" src="js/scroll-up-btn.js"></script>
        <!-- comments scripts -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <script type="text/javascript" src="./node_modules/marked/marked.min.js"></script>
        <script type="text/javascript" src="./node_modules/dompurify/dist/purify.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script type="module" src="https://unpkg.com/emoji-picker-element@1"></script>
        <script type="text/javascript" src="./js/emoji-reaction.js"></script>

        <script type="text/javascript">
            let posts = document.getElementsByClassName('post-content');
            
            Array.from(posts).forEach(post => {
                const comment = post.innerHTML;
                const cleanComment = DOMPurify.sanitize(comment)
                post.innerHTML = marked(cleanComment);
            });
        </script>
        <!-- till here -->
    </body>
</html>