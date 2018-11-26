{include file="head.tpl"}
{include file="header.tpl"}

    <h1>{$Titulo}</h1>
     {if $Cant}
    <form method="post" action="mostrarPeliculaCondicion">          
          <div class="form-group">
            <label for="rate">Seleccionar peliculas por puntuación</label>
            <input type="number" min=0 max=9 id="rate" name="rate"/>
             <button type="submit" class="btn btn-primary">Buscar</button> 
          </div>
    </form>
    {/if} 
    <div class="container">
      <div class="row">      
        <table class="table table-hover col-10 offset-1">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Director</th>
              <th scope="col">Rate</th>
              <th scope="col">Horario</th>
              {if (isset($smarty.session.User))}
              {if $smarty.session.admin == 1}
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
              {/if}
              {/if}
            </tr>
          </thead>
          <tbody>
          {if $Cant}
            {foreach from=$Peliculas item=pelicula}
                  <tr>
                    <td><a href="pelicula/{$pelicula['id_pelicula']}">{$pelicula['nombre']}</td>
                    <td>{$pelicula['director']}</td>
                    <td>{$pelicula['rate']}</td>
                    <td>{$pelicula['horarios']}</td>
                    {if (isset($smarty.session.User))}
                    {if $smarty.session.admin == 1}
                      <td><a href="borrarPelicula/{$pelicula['id_pelicula']}">BORRAR</a></td>
                      <td><a href="editarPelicula/{$pelicula['id_pelicula']}">EDITAR</a></td>
                      <td>
                    </td>
                    {/if}  
                    {/if} 
                  </tr>
            {/foreach}  
            {elseif $Peliculas != null}
            {if $Imagenes != null}
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner"> 
              <div class="carousel-item active imgporelmundo">
                <img class="d-block w-100" src="img/3d.png" alt="First slide">
              </div>
                {foreach from=$Imagenes item=imag}
                <div class="carousel-item">
                  <img class="d-block w-100" src={$imag['url']} >
                </div> 
                {/foreach}              
              </div>
               </div>
            {/if} 
            <tr>
                <td>{$Peliculas['nombre']}</td>
                <td>{$Peliculas['director']}</td>
                <td>{$Peliculas['rate']}</td>
                <td>{$Peliculas['horarios']}</td>
                {if (isset($smarty.session.User))}
                {if $smarty.session.admin == 1}
                    <td><a href="agregarImagen/{$pelicula['id_pelicula']}">AGREGAR IMAGEN</a></td>
                    <td><a href="borrarPelicula/{$pelicula['id_pelicula']}">BORRAR</a></td>
                    <td><a href="editarPelicula/{$pelicula['id_pelicula']}">EDITAR</a></td>
                {/if}
                {/if}  
            </tr>
            {/if} 
          </tbody>
        </table>
      </div>
    </div>
  
  
{include file="footer.tpl"}
