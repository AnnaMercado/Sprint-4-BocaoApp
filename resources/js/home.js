document.addEventListener("DOMContentLoaded", () => {
    // Dynamically generate feature cards with animations
    const cardsData = [
        {
            icon: 'fas fa-clipboard-list',
            title: 'Registra tus visitas',
            text: 'Olvídate de intentar recordar el nombre de ese restaurante. Registra los sitios que has probado y los tendrás siempre a mano cuando los necesites.',
            bg: 'bg-teal-300'
        },
        {
            icon: 'fas fa-search',
            title: 'Encuentra lo que buscas',
            text: '¿Te apetece japo? ¿Algo abierto en domingo? Usa nuestro buscador y las etiquetas para encontrarlo en segundos. ¡Nunca más perderás tiempo buscando!',
            bg: 'bg-pink-300'
        },
        {
            icon: 'fas fa-star',
            title: 'Tu lista de pendientes',
            text: '¿Hay restaurantes que siempre has querido visitar? Agrega todos esos lugares a tu lista de pendientes y cuando llegue el momento, ya sabrás a dónde ir.',
            bg: 'bg-yellow-300'
        }
    ];

    const featureCardsContainer = document.querySelector('.feature-cards-container');
    cardsData.forEach(card => {
        const cardElement = document.createElement('div');
        cardElement.classList.add('feature-card', 'transition-transform', 'transform', 'hover:scale-105', 'rounded-lg', 'shadow-lg', 'p-6', 'text-center', card.bg);
        cardElement.innerHTML = `
            <i class="${card.icon} text-4xl text-white mb-4"></i>
            <h3 class="text-xl text-gray-800 font-semibold">${card.title}</h3>
            <p class="text-gray-600 mt-2">${card.text}</p>
        `;
        featureCardsContainer.appendChild(cardElement);
    });


});
