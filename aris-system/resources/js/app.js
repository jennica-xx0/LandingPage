// resources/js/app.js
import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const requestButton = document.querySelector('.hero .btn-primary');
    if(requestButton) {
        requestButton.addEventListener('click', () => {
            alert('You need to be logged in to request a document!');
            // Later, this would redirect to the login page
            // window.location.href = '/login';
        });
    }
});