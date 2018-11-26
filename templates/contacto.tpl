{include file="head.tpl"}
{include file="header.tpl"}

<div class="container-fluid">
    <div class="col-12 rounded">
        <h2>Nosotros...</h2>
        <p>Somos una pagina dedicada a noticias tanto de peliculas, series y estamos ampliandonos al mundo del videojuego. Mantenete
            en contacto para saber en todo momento lo mas nuevo de la indutria del entretenimiento.</p>
    </div>
    <div class="row">
        <div class="col-6 offset-3 bg-danger rounded pt-3 pb-3">
            <h3>Contacto</h3>
            <form>
                <div class="form-group">
                    <label for="InputName">Nombre</label>
                    <input type="text" class="form-control js-nombre-contacto" id="InputName" placeholder="Ingresá nombre">
                </div>
                <div class="form-group">
                    <label for="InputSurname">Apellido</label>
                    <input type="text" class="form-control js-apellido-contacto" id="InputSurname" placeholder="Ingresá apellido">
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input type="email" class="form-control js-email-contacto" id="InputEmail" aria-describedby="emailHelp" placeholder="Ingresá email">
                    <small id="emailHelp" class="form-text text-muted">Tranqui, no vamos a compartir tu email con nadie.</small>
                </div>
                <div class="form-group">
                    <label for="InputPhone">Telefono</label>
                    <input type="tel" class="form-control js-tel-contacto" id="InputPhone" placeholder="Ingresá telefono">
                </div>
                <div class="form-group">
                    <label class="form-control" for="Control">Suscripción</label>
                    <select class="form-control js-suscripcion-contacto" id="Control">
                        <option>Desplegá</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <button class="btn btn-primary  js-agregar-contacto">Agregar contacto</button>
            </form>
        </div>
    </div>
</div>
</div>

{include file="footer.tpl"}