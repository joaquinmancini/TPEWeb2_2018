{include file="head.tpl"}
{include file="header.tpl"}

    <h1>{$Titulo}</h1>
    <div class="container">
      <div class="row">
        <table class="table table-hover col-10 offset-1">
          <thead>
            <tr>
              <th scope="col">Cine</th>
              <th scope="col">Capacidad</th>
              <th scope="col">Salas</th>
              <th scope="col">Peliculas</th>
              {if (isset($smarty.session.User))}
              {if $smarty.session.admin == 1}
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
              {/if}
              {/if}
            </tr>
          </thead>
          <tbody>
            {foreach from=$Cines item=cine}
              <tr>
                <td><a href="peliculasPorCine/{$cine['id_cine']}/{$User}">{$cine['nombre']}</td>
                <td>{$cine['capacidad']}</td>
                <td>{$cine['sala']}</td>
                <td>
                  <select name=pelicula>
                    {foreach from=$Peliculas item=pelicula}
                      {if $cine['id_cine'] == $pelicula['id_cine']}
                          {html_options values={$pelicula['id_pelicula']} output={$pelicula['nombre']}}
                      {/if}
                    {/foreach}  
                  </select>
                </td>
                {if (isset($smarty.session.User))}
                {if $smarty.session.admin == 1}
                  <td><a href="alertBorrar/{$cine['id_cine']}">BORRAR</a></td>
                  <td><a href="editar/{$cine['id_cine']}">EDITAR</a></td>
                {/if}
                {/if}
              </tr>
            {/foreach}            
          </tbody>
        </table>
      </div>
    </div>
{if (isset($smarty.session.User))}
{if $smarty.session.admin == 1}
    <div class="container">
      <h2>Agregar Cine</h2>
      <form method="post" action="agregar">
        <div class="form-group">
          <label for="nombre">Cine</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
          <label for="capacidad">Capacidad</label>
          <input type="text" class="form-control" id="capacidad" name="capacidad" required>
        </div>
        <div class="form-group">
          <label for="sala">Sala</label>
          <input type="text" class="form-control" id="sala" name="sala" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>
  {/if}
  {/if}
  
  
{include file="footer.tpl"}
