{include file="head.tpl"}
{include file="header.tpl"}

    <div class="container">
      <h2>Modificar Pelicula {$Pelicula["nombre"]}</h2>
      <form method="post" action="guardarEditarPelicula" enctype="multipart/form-data" target="_self">
        <input type="hidden" class="form-control" id="id" name="id" value="{$Pelicula["id_pelicula"]}" required>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{$Pelicula["nombre"]}" required>
        </div>
        <div class="form-group">
          <label for="director">Director</label>
          <input type="text" class="form-control" id="director" name="director" value="{$Pelicula["director"]}" step="0.01" required>
        </div>
        <div class="form-group">
          <label for="rate">Rate</label>
          <input type="number" class="form-control" id="rate" name="rate" value="{$Pelicula["rate"]}" required>
        </div>
         <div class="form-group">
            <label for="horarios">Horario</label>
            <input type="time" class="form-control" id="horarios" name="horarios" required>
          </div>
         <input type="hidden" class="form-control" id="id_cine" name="id_cine" value="{$Pelicula["id_cine"]}" required>
       <input hidden class="form-control" id="IdPelicula" name="{$Pelicula['id_pelicula']}" value="{$Pelicula['id_pelicula']}" required>
           <div class="form-group">
           <label for="imagenes[]">Imágenes</label>
           <input type="file" class="form-control-file respuestas" id="imagenes[]" placeholder="" name="imagenes[]" multiple>
           </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </form>
      
    </div>


{include file="footer.tpl"}
