//
const buttons = Array.from(document.querySelectorAll('.emojiButton'));
const tooltips = Array.from(document.querySelectorAll('.emojiTooltip'));
buttons.forEach((button, index) => {
    button.setAttribute('onclick', `toggle(${index})`);
    Popper.createPopper(button, tooltips[index], {
        placement: 'left',
        modifiers: [
            {
                name: 'offset',
                options: {
                    offset: [0,8],
                },
            },
        ],
    });
})


function toggle(index) {
    tooltips[index].classList.toggle('shown')
}

let pickers = Array.from(document.getElementsByTagName('emoji-picker'));
pickers.forEach((picker, index) => {
    picker.addEventListener('emoji-click', event => {
        console.log(event.detail.unicode, index);
        const post_id = picker.getAttribute('post_id');
        $.ajax({
            url: 'http://localhost:8888/Bulletin-Board-Project/includes/emojiReaction/addEmojiReaction.php',
            type: 'GET',
            data: 'post_id=' + post_id + '&emoji=' + event.detail.unicode,
            //dataType: 'html',
            success: (code_html, status) => {
                console.log('code_html', status);
                updateEmojiButtons(post_id);
            },
            error: (result, status, error) => {
                console.log(result, status);
            },
            complete: (result, status) => {
                console.log(result, status);
            }

        })
    });
});

let updateEmojiButtons = (index) => {
    $.ajax({
        url: 'http://localhost:8888/Bulletin-Board-Project/includes/emojiReaction/updateEmojiReaction.php',
        type: 'GET',
        data: 'post_id=' + index,
        success: (data) => {
            $('[emojiPost_id=' + index + ']').html(data);
        },
        error: (data, status, error) => {
            console.log(data, status, error)
        }
    })
}