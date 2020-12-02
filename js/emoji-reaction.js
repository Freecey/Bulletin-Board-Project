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
        const topic_id = picker.getAttribute('post_id');
        $.ajax({
            url: 'http://localhost:8888/Bulletin-Board-Project/includes/emojiReaction.php',
            type: 'GET',
            data: 'post_id=' + topic_id + '&emoji=' + event.detail.unicode,
            //dataType: 'html',
            success: (code_html, status) => {
                console.log(code_html, status);
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