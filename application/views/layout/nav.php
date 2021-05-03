<!--BARRA DE NAVEGACION-->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <span class="navbar-text navbar-brand">Desarrollo sistema Hospital</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link disabled"><strong>Rango: </strong><?= $this->session->rango; ?></a>
            </li>
            <li class="nav-item divider">
                <a href="#" class="nav-link disabled"><strong>Nombre de usuario: </strong> <?php echo $this->session->nombreusuario; ?></a>
            </li>
            <li class="nav-item" style="margin-left:2em;">
                <a href="<?=base_url("login/logout");?>" class="btn btn-warning"><strong>Cerrar Sesion</strong></a>
            </li>
        </ul>
    </div>
</nav>