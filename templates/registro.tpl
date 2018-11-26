{include file="head.tpl"}
{include file="header.tpl"}
  
    <div class="container">
      <div class="row">
        <div class="col-4 offset-4">
          <h1>{$Titulo}</h1>
          <form method="post" action="insertarUsuario">
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario</label>
              <input type="input" class="form-control" name="nombre" id="nombre" aria-describedby="usuarioId" placeholder="Ingrese Usuario" required>
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
            </div>
            <div>
              {$Message}
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
        </div>
      </div>
    </div>

{include file="footer.tpl"}