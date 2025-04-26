// Lecture des sons au clic sur les boutons
document.querySelectorAll('.animal-button').forEach(button => {
    button.addEventListener('click', () => {
        const sound = button.getAttribute('data-sound'); // Récupérer le chemin du son
        const audio = new Audio(sound);
        audio.play();
    });
});
