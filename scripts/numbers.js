document.querySelectorAll('.number-button').forEach(button => {
    button.addEventListener('click', () => {
        const sound = button.getAttribute('data-sound');
        const audio = new Audio(sound);
        audio.play();
    });
});