<h1 class="text-center">Editando Usuario</h1>
<?php
/* echo "<pre>";
var_dump($user);
echo "</pre>"; */
?>

<div class="container-fluid">
    <h4>Datos de la cuenta</h4>
    <form action="<?=base_url("Users/update")?>" method="POST">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Nombre de usuario</label>
                        <input type="text" value="<?= set_value("user",isset($user["nombre_usuario"])?$user["nombre_usuario"]:"");?>" class="form-control" name="user" readonly>
                        <input type="hidden" value="<?=set_value("_id",isset($user["id"])?$user["id"]:"");?>" name="_id" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Email</label>
                        <input type="text" value="<?=set_value("correo",isset($user["correo"])?$user["correo"]:"");?>" class="form-control" name="correo" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Estatus</label>
                        <input type="text" value="<?=set_value("status",isset($user["status"])?($user["status"]==1)?"Activo":"Inactivo":"");?>" name="status" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h4 class="text-center">Informacion personal</h4>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Nombe(s)</label>
                        <input type="text" name="nombre" value="<?=set_value("nombre",isset($user["nombre"])?$user["nombre"]:"");?>" class="form-control">
                        <?=form_error("nombre","<p class='text-danger'>","</p>");?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Apellidos</label>
                        <input type="text" name="apellidos" value="<?=set_value("apellidos",isset($user["apellido"])?$user["apellido"]:"");?>" class="form-control">
                        <?=form_error("apellidos","<p class='text-danger'>","</p>");?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Cédula</label>
                        <input type="text" name="cedula" value="<?=set_value("cedula",isset($user["cedula"])?$user["cedula"]:"");?>" class="form-control">
                        <?=form_error("cedula","<p class='text-danger'>","</p>");?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Especialidad</label>
                        <input type="text" name="especialidad" value="<?=set_value("especialidad",isset($user["especialidad"])?$user["especialidad"]:"");?>" class="form-control">
                        <?=form_error("especialidad","<p class='text-danger'>","</p>");?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Area</label>
                        <input type="text" name="area" value="<?=set_value("area",isset($user["area"])?$user["area"]:"");?>" class="form-control">
                        <?=form_error("area","<p class='text-danger'>","</p>");?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-lg" value="Actualizar">
    </form>
</div>