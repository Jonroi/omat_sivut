function calculateDaysFromDate(targetDate) {
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const target = new Date(targetDate);
    target.setHours(0, 0, 0, 0);

    const timeDifference = today.getTime() - target.getTime();
    const daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

    return daysDifference;
}

function updateDaysPassed() {
    const cardTextElements = document.querySelectorAll('.card-text small.text-muted[data-date]');

    cardTextElements.forEach(cardTextElement => {
        const givenDate = new Date(cardTextElement.getAttribute('data-date'));

        const daysPassed = calculateDaysFromDate(givenDate);

        cardTextElement.textContent = `Last updated ${daysPassed} days ago`;
    });
}

updateDaysPassed();
