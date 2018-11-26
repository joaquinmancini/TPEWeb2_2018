 <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg mb-3 rounded">
        <a class="navbar-brand" href="#">Locos por el Cine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav listaanclas">
                <li class="nav-item">
                    <a class="nav-link enlaceacontenido" href="home">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link enlaceacontenido"  href="cines">Cines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link enlaceacontenido" href="peliculas">Peliculas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link enlaceacontenido" href="contacto">Contacto</a>
                </li>
                {if $User != null}
                    <li class="nav-item">
                        <a class="nav-link enlaceacontenido" href="logout">Logout</a>
                    </li>
                {else}
                    <li class="nav-item">
                        <a class="nav-link enlaceacontenido" href="login">Login</a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link enlaceacontenido" href="registro">Registro</a>
                    </li>
                {/if}
            </ul>
        </div>
</nav>
