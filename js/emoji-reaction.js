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
const pickers = Array.from(document.getElementsByTagName('emoji-picker'));

pickers.forEach((picker, index) => {
    picker.addEventListener('emoji-click', event => {
        console.log(event.detail.unicode, index);
        // $.ajax({
        //     url: 'emoji-reaction.php',
        //     type: 'GET',
        //     data: 'id=' + topic_id,
        //     dataType: 'html'
        // })
    });
});