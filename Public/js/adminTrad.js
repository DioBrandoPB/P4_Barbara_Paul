document.querySelectorAll('.signalement').forEach(el => {
    if (el.textContent.trim() === '0') {
        el.textContent = 'Aucun'
    }
    if (el.textContent.trim() === '1') {
        el.textContent = 'Oui'
    }
});
document.querySelectorAll('.validation').forEach(el => {
    if (el.textContent.trim() === '0') {
        el.textContent = 'Non'
    }
    if (el.textContent.trim() === '1') {
        el.textContent = 'Oui'
    }
});
document.querySelectorAll('.statut').forEach(el => {
    if (el.textContent.trim() === '0') {
        el.textContent = 'Publié'
    }
    if (el.textContent.trim() === '1') {
        el.textContent = 'Brouillon'
    }
});