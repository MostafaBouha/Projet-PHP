document.querySelectorAll('.color-button').forEach(button => {
    button.addEventListener('click', () => {
        const sound = button.getAttribute('data-sound'); // Récupère le chemin du son
        const audio = new Audio(sound);
        audio.play();
    });
});