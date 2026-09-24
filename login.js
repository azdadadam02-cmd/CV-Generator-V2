const nameGroup = document.getElementById('name-group');
const formTitle = document.getElementById('form-title');
const formDesc = document.getElementById('form-desc');
const btnMain = document.getElementById('btn-main');
const btnToggle = document.getElementById('btn-toggle');
const formActions = document.getElementById('form-actions');
const actionType = document.getElementById('action_type');

btnToggle.addEventListener('click', function() {
    if (nameGroup.style.display === 'none') {
        nameGroup.style.display = 'flex'; 
        formTitle.innerText = 'Créer un compte'; 
        formDesc.innerText = 'Remplissez vos informations pour commencer.';
        btnMain.innerText = 'S\'inscrire'; 
        btnToggle.innerText = 'J\'ai déjà un compte'; 
        formActions.style.display = 'none'; 
        actionType.value = 'register';
    } 
    else {
        nameGroup.style.display = 'none'; 
        formTitle.innerText = 'Welcome';
        formDesc.innerText = 'Experience the new beauty in you.';
        btnMain.innerText = 'Connexion';
        btnToggle.innerText = 'Créer un compte';
        formActions.style.display = 'flex'; 
        actionType.value = 'login';
    }
});