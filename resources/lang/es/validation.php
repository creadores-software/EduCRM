<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El campo :Attribute debe ser aceptado.',
    'active_url' => 'El campo :Attribute no es una URL valida.',
    'after' => 'El campo :Attribute debe ser posterior a :date.',
    'after_or_equal' => 'El campo :Attribute debe ser igual o posterior a :date.',
    'alpha' => 'El campo :Attribute solo puede contener letras.',
    'alpha_dash' => 'El campo :Attribute solo puede contener letras, números, guiones o guiones bajo.',
    'alpha_num' => 'El campo :Attribute solo puede contener letras y números.',
    'array' => 'El campo :Attribute debe ser un arreglo.',
    'before' => 'El campo :Attribute debe ser antes de :date.',
    'before_or_equal' => 'El campo :Attribute debe ser igual o anterior a :date.',
    'between' => [
        'numeric' => 'El campo :Attribute debe ser un número entre :min y :max.',
        'file' => 'El campo :Attribute debe ser un archivo que pese entre :min y :max kilobytes.',
        'string' => 'El campo :Attribute debe contener entre :min y :max caracteres.',
        'array' => 'El arreglo :Attribute debe contener entre :min y :max items.',
    ],
    'boolean' => 'El campo :Attribute debe ser true (verdadero) o false (falso).',
    'confirmed' => 'La confirmación del campo :Attribute no coincide.',
    'date' => 'El campo :Attribute no corresponde a una fecha válida.',
    'date_equals' => 'El campo :Attribute debe ser igual a :date.',
    'date_format' => 'El campo :Attribute no coincide con el formato :format.',
    'different' => 'El campo :Attribute y el campo :other deben ser diferentes.',
    'digits' => 'El campo :Attribute debe ser de :digits digitos.',
    'digits_between' => 'El campo :Attribute debe contener entre :min y :max digitos.',
    'dimensions' => 'El campo :Attribute tiene unas dimensiones de imagen incorrecta.',
    'distinct' => 'El campo :Attribute tiene un valor duplicado.',
    'email' => 'El campo :Attribute debe ser un correo válido.',
    'ends_with' => 'El campo :Attribute debe terminar con uno de los siguientes valores: :values.',
    'exists' => 'El campo :Attribute no es válido.',
    'file' => 'El campo :Attribute debe ser un archivo.',
    'filled' => 'El campo :Attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El campo :Attribute debe ser un número mayor que :value.',
        'file' => 'El campo :Attribute debe ser un archivo que pese :value kilobytes.',
        'string' => 'El campo :Attribute debe contener más de :value caracteres.',
        'array' => 'El arreglo :Attribute debe contener más de :value items.',
    ],
    'gte' => [
        'numeric' => 'El campo :Attribute debe ser un número mayor o igual que :value.',
        'file' => 'El campo :Attribute debe ser un archivo que pese :value kilobytes o más.',
        'string' => 'El campo :Attribute debe contener :value caracteres o más.',
        'array' => 'El arreglo :Attribute debe contener :value items o más.',
    ],
    'image' => 'El campo :Attribute debe ser una imagen.',
    'in' => 'El campo :Attribute no es válido.',
    'in_array' => 'El campo :Attribute no existe en :other.',
    'integer' => 'El campo :Attribute debe ser un entero.',
    'ip' => 'El campo :Attribute debe ser una dirección IP válida.',
    'ipv4' => 'El campo :Attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El campo :Attribute debe ser una dirección IPv6 válida.',
    'json' => 'El campo :Attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El campo :Attribute debe ser un número menor que :value.',
        'file' => 'El campo :Attribute debe ser un archivo que pese menos de :value kilobytes.',
        'string' => 'El campo :Attribute debe contener menos de :value caracteres.',
        'array' => 'El arreglo :Attribute debe contener menos de :value items.',
    ],
    'lte' => [
        'numeric' => 'El campo :Attribute debe ser un número menor o igual que :value.',
        'file' => 'El campo :Attribute debe ser un archivo que pese :value kilobytes o menos.',
        'string' => 'El campo :Attribute debe contener :value caracteres o menos.',
        'array' => 'El arreglo :Attribute debe contener :value items o menos.',
    ],
    'max' => [
        'numeric' => 'El campo :Attribute no debe ser mayor que :max.',
        'file' => 'El campo :Attribute debe ser un archivo pese máximo :max kilobytes.',
        'string' => 'El campo :Attribute debe contener máximo :max caracteres.',
        'array' => 'El arreglo :Attribute debe contener máximo :max items.',
    ],
    'mimes' => 'El campo :Attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :Attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El campo :Attribute debe ser mayor que :min.',
        'file' => 'El campo :Attribute debe ser un archivo pese mínimo :min kilobytes.',
        'string' => 'El campo :Attribute debe contener mínimo :min caracteres.',
        'array' => 'El arreglo :Attribute debe contener mínimo :min items.',
    ],
    'not_in' => 'El campo :Attribute no es válido.',
    'not_regex' => 'El formato del campo :Attribute no es válido.',
    'numeric' => 'El campo :Attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :Attribute debe estar presente.',
    'regex' => 'El formato del campo :Attribute no es válido.',
    'required' => 'El campo :Attribute es requerido.',
    'required_if' => 'El campo :Attribute cuando el campo :other es :value.',
    'required_unless' => 'El campo :Attribute es requerido a menos que el campo :other sea :values.',
    'required_with' => 'El campo :Attribute es requerido cuando el valor :values esta presente.',
    'required_with_all' => 'El campo :Attribute es requerido cuando los campos :values estan presentes.',
    'required_without' => 'El campo :Attribute es requerido cuando el valor :values no está presente.',
    'required_without_all' => 'El campo :Attribute es requerido cuando ninguno de los valores :values están presentes.',
    'same' => 'El campo :Attribute y el campo :other deben coincidir.',
    'size' => [
        'numeric' => 'El campo :Attribute debe ser :size.',
        'file' => 'El campo :Attribute debe ser un archivo pese :size kilobytes.',
        'string' => 'El campo :Attribute debe contener :size caracteres.',
        'array' => 'El arreglo :Attribute debe contener :size items.',
    ],
    'starts_with' => 'El campo :Attribute debe iniciar con uno de los siguientes valores: :values.',
    'string' => 'El campo :Attribute debe ser un texto.',
    'timezone' => 'El campo :Attribute debe ser una zona horaria.',
    'unique' => 'El valor dado a :Attribute se encuentra en otro registro. No se debe repetir.',
    'iunique' => 'El valor dado a :Attribute se encuentra en otro registro. No se debe repetir.',
    'uploaded' => 'El campo :Attribute no se pudo cargar.',
    'url' => 'El formato del campo :Attribute no es válido.',
    'uuid' => 'El campo :Attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    /**
     * A continuación se tendrán los campos foraneos, 
     * con el fin de quitar la palabra id en la validación de errores
     */
    'attributes' => [
        'actitud_servicio_id' => 'Actitud Servicio',
        'actividad_economica_id' => 'Actividad Economica',
        'actividad_ocio_id' => 'Actividad Ocio',
        'beneficio_id' => 'Beneficio',
        'buyer_persona_id' => 'Buyer Persona',
        'campo_educacion_id' => 'Campo Educación',
        'categoria_actividad_economica_id' => 'Categoría',
        'categoria_campo_educacion_id' => 'Categoría',
        'contacto_id' => 'Contacto',
        'entidad_id' => 'Entidad',
        'estado_civil_id' => 'Estado Civil',
        'estado_disposicion_id' => 'Estado Disposición',
        'estatus_lealtad_id' => 'Estatus Lealtad',
        'estatus_usuario_id' => 'Estatus Usuario',
        'estilo_vida_id' => 'Estilo Vida',
        'facultad_id' => 'Facultad',
        'formacion_id' => 'Formación',
        'frecuencia_uso_id' => 'Frecuencia Uso',
        'generacion_id' => 'Generación',
        'genero_id' => 'Genero',
        'informacion_relacional_id' => 'Información Relacional',
        'lugar_id' => 'Ubicación',
        'maximo_nivel_formacion_id' => 'Máximo Nivel Formacion',
        'medio_comunicacion_id' => 'Medio Comunicación',
        'modalidad_id' => 'Modalidad',
        'nivel_academico_id' => 'Nivel Academico',
        'nivel_formacion_id' => 'Nivel Formación',
        'ocupacion_actual_id' => 'Ocupación Actual',
        'origen_id' => 'Origen',
        'padre_id' => 'Padre',
        'periodicidad_id' => 'Periodicidad',
        'personalidad_id' => 'Personalidad',
        'prefijo_id' => 'Prefijo',
        'raza_id' => 'Raza',
        'reconocimiento_id' => 'Reconocimiento',
        'referido_por_id' => 'Referido Por',
        'religion_id' => 'Religión',
        'sector_id' => 'Sector',
        'tipo_acceso_id' => 'Tipo Acceso',
        'tipo_contacto_id' => 'Tipo Contacto',
        'tipo_contrario_id' => 'Tipo Contrario',
        'tipo_documento_id' => 'Tipo Documento',
        'tipo_ocupacion_id' => 'Tipo Ocupación',
        'tipo_parentesco_id' => 'Tipo Parentesco',
        'today'=>'Hoy',
        'contacto_destino' => 'Pariente',
    ],

    /**
     * Traducción de valores en validaciones
     */
    'values' => [
        'tipo' => ['P' => 'Pais'],
        'fecha_nacimiento' => ['today'=>'hoy'],
        'fecha_inicio' => ['today'=>'hoy'],
        'fecha_grado' => ['today'=>'hoy'],
        'fecha_inicio' => ['today'=>'hoy'],
        'fecha_fin' => ['today'=>'hoy'],
     ],
];
