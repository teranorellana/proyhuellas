document.getElementById('file-input-avatar').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar-img').src = e.target.result;
            document.getElementById('avatar-url').value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('file-input-portada').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('portada-perfil').style.backgroundImage = `url(${e.target.result})`;
            document.getElementById('portada-url').value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('boton-actualizar-nombre-usuario').addEventListener('click', function() {
    var inputNombreUsuario = document.getElementById('nuevo-nombre-usuario');
    var h4NombreUsuario = document.getElementById('nombre-usuario');
    if (inputNombreUsuario.style.display === 'none' || inputNombreUsuario.style.display === '') {
        inputNombreUsuario.style.display = 'inline-block';
        inputNombreUsuario.value = h4NombreUsuario.textContent;
        h4NombreUsuario.style.display = 'none';
        inputNombreUsuario.focus();
    } else {
        inputNombreUsuario.style.display = 'none';
        h4NombreUsuario.style.display = 'inline-block';
        h4NombreUsuario.textContent = inputNombreUsuario.value;
        document.getElementById('nombre-usuario-hidden').value = inputNombreUsuario.value;
    }
});

document.getElementById('cambiar-foto-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    fetch('perfil.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert('Perfil actualizado exitosamente');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al actualizar el perfil');
    });
});
