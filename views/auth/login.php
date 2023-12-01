

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesion</h1>
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
       
       
        <form  class="formulario" method="POST" novalidate>
        <fieldset>
                <legend>Email y Password</legend>

                <label for="email">Email</label>
                <input type="email" name="email"  placeholder="Ingrese su email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Ingrese su password" id="password" required>

            </fieldset>

            <input type="submit" value="iniciar sesion" class="boton boton-verde">
        </form>
    </main>
