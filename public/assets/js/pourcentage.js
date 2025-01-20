document.querySelectorAll('.circle').forEach((circle) => {
    const percentage = parseInt(circle.getAttribute('data-percentage'), 10); // Récupérer le pourcentage
    const color = circle.getAttribute('data-color'); // Récupérer la couleur définie dans le data-attribute

    let currentPercentage = 0; // Pour l'animation progressive

    const interval = setInterval(() => {
        if (currentPercentage >= percentage) {
            clearInterval(interval); // Stop l'animation lorsque le pourcentage est atteint
        } else {
            currentPercentage++;
            circle.style.background = `conic-gradient(${color} 0% ${currentPercentage}%, #ddd ${currentPercentage}% 100%)`;
            circle.querySelector('span').innerText = `${currentPercentage}%`; // Met à jour le texte
        }
    }, 15); // Ajustez la vitesse d'animation
});
