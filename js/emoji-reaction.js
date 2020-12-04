//Add index to toggle button and style the popover
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

// open popover switch button
function toggle(index) {
    tooltips[index].classList.toggle('shown')
}

// on emoji click, save to DB with ajax
let pickers = Array.from(document.getElementsByTagName('emoji-picker'));
pickers.forEach(picker => {
    picker.addEventListener('emoji-click', event => {
        const post_id = picker.getAttribute('post_id');
        $.ajax({
            url: './includes/emojiReaction/addEmojiReaction.php',
            type: 'GET',
            data: 'post_id=' + post_id + '&emoji=' + event.detail.unicode,
            success: () => {
                updateEmojiButtons(post_id);
            },
            error: (result, status, error) => {
                console.log(result, status, error);
            }
        })
    });
});

//update the emoji reactions buttons (below message)
let updateEmojiButtons = (index) => {
    $.ajax({
        url: './includes/emojiReaction/updateEmojiReaction.php',
        type: 'GET',
        data: 'post_id=' + index,
        success: (data) => {
            $('[emojiPost_id=' + index + ']').html(data);
            console.log(data);
        },
        error: (data, status, error) => {
            console.log(data, status, error);
            
        }
    })
}

// delete an emoji button reaction only if you are the owner.
let deleteEmojiButton = (index, postId) => {
    $.ajax({
        url: './includes/emojiReaction/deleteEmojiReaction.php',
        type: 'GET',
        data: 'reaction_id=' + index,
        success: (data) => {
            if(data.status == 'success') {
                updateEmojiButtons(postId);
            } else {
                console.log(data.status);
            }
        },
        error: (data, status, error) => {
            console.log(data, status, error);
        }
    })
}