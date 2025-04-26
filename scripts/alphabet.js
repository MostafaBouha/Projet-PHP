document.querySelectorAll('.letter-image').forEach(image => {
    image.addEventListener('click', () => {
        const letter = image.alt; // Utilisation de l'attribut alt pour identifier la lettre
        const audio = new Audio(`sounds_alphabet/${letter}.mp3`); // Lecture du fichier audio correspondant
        audio.play();
    });
});

