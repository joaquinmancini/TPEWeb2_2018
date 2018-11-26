{include file="head.tpl"}
{include file="header.tpl"}

    <div class="container">
      <h2>Modificar Cines</h2>
      <form method="post" action="guardarEditar">
        <input type="hidden" class="form-control" id="id" name="id" value="{$Cine["id_cine"]}" required>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{$Cine["nombre"]}" required>
        </div>
        <div class="form-group">
          <label for="capacidad">Capacidad</label>
          <input type="number" class="form-control" id="capacidad" name="capacidad" value="{$Cine["capacidad"]}" required>
        </div>
        <div class="form-group">
          <label for="sala">Sala</label>
          <input type="number" class="form-control" id="sala" name="sala" value="{$Cine["sala"]}" required>
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </form>
    </div>


{include file="footer.tpl"}
