<form action="<?=base_url("Users/store");?>" method="POST">
    <div class="row">
        <div class="col-md-12">
            <h1>Datos de la cuenta</h1>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreUsers">Nombre de usuario</label>
                <input type="text" class="form-control" name="nombreUsers" id="nombreUsers" placeholder="Inserte nombre de usuario" value="<?=set_value("nombreUsers");?>">
                <div class="text-danger">
                    <?=form_error("nombreUsers");?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" name="correo" id="correo" placeholder="correo@gmail.com" value="<?=set_value("correo");?>">
                <div class="text-danger"><?=form_error("correo");?></div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="rangoUsuario">Rango de usuario</label>
                <select name="rangoUsuario" id="rangoUsuario" class="form-control">
                    <option value="">Seleccione el rango</option>
                    <option <?=(set_value("rangoUsuario")=="admin")?"selected":"";?> value="admin">Administrador</option>
                    <option <?=(set_value("rangoUsuario")=="usuario")?"selected":"";?> value="usuario">Usuario</option>
                </select>
                <div class="text-danger">
                    <?=form_error("rangoUsuario");?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
            <h1>Información del usuario</h1>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre">Nombre(s)</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Inserte su nombre">
                <div class="text-danger">
                    <?=form_error("nombre");?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="app">Apellido(s)</label>
                <input type="text" class="form-control" name="app" id="app" placeholder="Inserte apellido(s)">
                <div class="text-danger">
                    <?=form_error("app");?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="area">Area</label>
                <select name="area" id="area" class="form-control">
                    <option value="">Seleccione el area</option>
                    <option value="medGen">Medico general</option>
                    <option value="gen">Genetica</option>
                    <option value="clinHig">Clinica de higado</option>
                </select>
                <div class="text-danger">
                    <?=form_error("area");?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-7">
            <div class="form-group">
                <label for="especialidad">Especialidad</label>
                <input type="text" class="form-control" name="especialidad" id="especialidad" placeholder="Ingrese la especialidad">
                <div class="text-danger">
                    <?=form_error("especialidad");?>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="cedula">Cedula</label>
                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="xxxxxxxxxx-x">
                <div class="text-danger">
                    <?=form_error("cedula");?>
                </div>
            </div>
        </div>

    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>