import { EmojiButton } from '@joeattardi/emoji-button';

const picker = new EmojiButton();
const trigger = document.querySelector('#emoji-trigger');
console.log(trigger);
picker.on('emoji', selection => {
    // handle the selected emoji here
    console.log(selection.emoji);
});

trigger.addEventListener('click', () => picker.togglePicker(trigger));