


            <fieldset>
                <legend>Informacion general de nuestra propiedad</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo)?>">
                <label for="precio">Precio:</label>
                <input type="number" id="precio"name="propiedad[precio]"  placeholder="Precio propiedad"  value="<?php echo s($propiedad->precio) ?>">

                <label for="imagen">imagen</label>
                <input type="file"id="imagen" name="propiedad[imagen]"  accept="image/jpeg,image/png">
                <?php if($propiedad->imagen){ ?>
                    <img src="/br3/imagenes/<?php echo $propiedad->imagen ?>" alt="imagen propiedad" class="imagen-small">
                 <?php } ?>   

                <label for="descripcion">Descripcion</label>
                <textarea  id="descripcion" name="propiedad[descripcion]"> <?php echo s( $propiedad->descripcion)?></textarea>

            </fieldset> 

        
            <fieldset>
                <legend>Informacion de la propiead</legend>
                <label for="habitaciones"  >Habitaciones:<label>
                <input type="number"
                 id="habitaciones"
                name="propiedad[habitaciones]"
                placeholder="Ej 2" min="1" max="8" 
                value="<?php echo s( $propiedad->habitaciones)?>" >

               
                <label for="wc">Baños:<label>
                <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej 2" min="1" max="5" value="<?php echo s($propiedad->wc) ?>">

                <label for="estacionamiento">Estacionamiento:<label>
                <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej 2" min="1" max="3" value="<?php echo s($propiedad->estacionamiento) ?>">

            </fieldset>

            <fieldset>
            <legend>Vendedor</legend>

            <label for="vendedor">Vendedor</label>
            <select name="propiedad[vendedores_id]" id="vendedor">
            <option selected disabled value="">>-Seleccione<-</option>
                <?php foreach ($vendedores as $vendedor):?>
                    
                    <option 
                    <?php echo $propiedad->vendedores_id ===$vendedor->id ? 'selected' : ''; ?> 
                     value="<?php echo s($vendedor->id)  ?>">
                    <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
                    </option>

                  <?php endforeach; ?>  

            </select>
                
            </fieldset>
