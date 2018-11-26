{include file="head.tpl"}
{include file="header.tpl"}

<div class="container-fluid">
    <div class="col-12 rounded">
       <p>Si elimina el cine {$Cine['nombre']} se eliminarán todas las películas anexadas al mismo, ¿Ésta seguro?</p>
           <a href="borrar/{$Cine['id_cine']}" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Eliminar</a>
           <a href="cines" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Volver</a>
    </div>
</div>

{include file="footer.tpl"}