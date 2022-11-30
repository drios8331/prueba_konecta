const logout = document.querySelector('#logOut');

logout.addEventListener('click', cerrarSesion);

function cerrarSesion() {
    window.location = '../../index.php';
}