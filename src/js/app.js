document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode();
});

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    //Muestra los campos condicionales
    //seleciona los input que tengan el name contact
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click',mostrarMetodos))
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar')
}

function mostrarMetodos(e){
  const divContacto = document.querySelector('#contacto');
  
  if(e.target.value === 'telefono'){
    divContacto.innerHTML = `
    <label for="telefono">Teléfono</label>
    <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">
     
    <p>elija la fecha y la hora para ser contactado</p>


    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="contacto[fecha]">

    <label for="hora">Hora:</label>
    <input type="time" id="hora" min="09:00"  name="contacto[hora]">
    
    `;
  }else if(e.target.value==='email'){
    divContacto.innerHTML=`
        <label for="email">E-mail</label>
        <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
    `;
  }

}