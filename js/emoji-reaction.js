
// creation of every emoji picker in tooltip
let popperInstance = null;
const buttons = Array.from(document.querySelectorAll('.emojiButton'));
const tooltips = Array.from(document.querySelectorAll('.emojiTooltip'));

function create(index) {
    popperInstance = Popper.createPopper(buttons[index], tooltips[index], {
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
}

function destroy() {
    if (popperInstance) {
        popperInstance.destroy();
        popperInstance = null;
    }
}

function show(index) {
    tooltips[index].setAttribute('data-show', '');
    create(index);
}

function hide(index) {
    tooltips[index].removeAttribute('data-show');
    destroy();
}

buttons.forEach((button, index) => {
    
    button.addEventListener('mouseenter', () => {
        show(index);
    });
});

tooltips.forEach((tooltip, index) => {
    tooltip.addEventListener('mouseleave', () => {
        hide(index)
    });
});



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