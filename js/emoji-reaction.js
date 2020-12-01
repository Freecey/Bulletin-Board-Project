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
    console.log(index);
    tooltips[index].classList.toggle('shown')
}

document.querySelector('emoji-picker')
    .addEventListener('emoji-click', event => console.log(event.detail));