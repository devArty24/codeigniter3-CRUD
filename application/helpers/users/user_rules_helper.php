<?php
if(!function_exists("getUpdateUserRules")){
    function getUpdateUserRules(){
        return array(
                array(
                        'field' => 'nombre',
                        'label' => 'Nombre',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'El %s es incorrecto.'
                        ),
                ),
                array(
                        'field' => 'apellidos',
                        'label' => 'Apellidos',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'Los %s son incorrectos.'
                        ),
                ),
                array(
                        'field' => 'area',
                        'label' => 'Area',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'El %s es incorrecta.'
                        ),
                ),
                array(
                        'field' => 'especialidad',
                        'label' => 'Especialidad',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'La %s es incorrecta.'
                        ),
                ),
                array(
                        'field' => 'cedula',
                        'label' => 'Cedula',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'La %s es incorrecta.'
                        ),
                )
        );
    }
}

if(!function_exists("getCreateUserRules")){
    function getCreateUserRules(){

        return array(
            array(
                    'field' => 'nombreUsers',
                    'label' => 'Usuario',
                    'rules' => 'required|max_length[100]',
                    'errors' => array(
                        'required' => 'El %s es requerido.',
                        'max_length' => 'El %s es demaciado grande.'
                ),
            ),
            array(
                    'field' => 'correo',
                    'label' => 'Correo',
                    'rules' => 'required|valid_email',
                    'errors' => array(
                            'required' => 'El %s es incorrecto.',
                            'valid_email' => 'El %s debe contener una direccion valida.',
                    ),
            ),
            array(
                    'field' => 'rangoUsuario',
                    'label' => 'Rango',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'El %s es incorrecto.'
                    ),
            ),
            array(
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'El %s es incorrecto.'
                    ),
            ),
            array(
                    'field' => 'app',
                    'label' => 'Apellidos',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'Los %s son incorrectos.'
                    ),
            ),
            array(
                    'field' => 'area',
                    'label' => 'Area',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'El %s es incorrecta.'
                    ),
            ),
            array(
                    'field' => 'especialidad',
                    'label' => 'Especialidad',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'La %s es incorrecta.'
                    ),
            ),
            array(
                    'field' => 'cedula',
                    'label' => 'Cedula',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'La %s es incorrecta.'
                    ),
            )
        );
    
    }
}