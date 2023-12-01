<fieldset>
                <legend>Informacion Personal</legend>

                <label for="titulo">Nombre</label>
                <input type="text" id="titulo" name="vendedor[nombre]" placeholder="Nombre del vendedores" value="<?php echo s($vendedor->nombre)?>">

                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido del vendedor" value="<?php echo s($vendedor->apellido) ?>">

</fieldset>      

<fieldset>
    <legend>Inforamacion de contacto</legend>
    <label for="telefono">Telefono</label>
                <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono del vendedor" value="<?php echo s($vendedor->telefono) ?>">

    <label for="email">Email</label>
    <input type="email" id="email" name="vendedor[email]" placeholder="Email del vendedor" value="<?php echo s($vendedor->email) ?>" >
        
</fieldset>