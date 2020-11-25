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

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'active_url' => 'El campo :attribute no es una URL valida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha igual o posterior a :date.',
    'alpha' => 'El campo :attribute solo puede contener letras.',
    'alpha_dash' => 'El campo :attribute solo puede contener letras, números, guiones o guiones bajo.',
    'alpha_num' => 'El campo :attribute solo puede contener letras y números.',
    'array' => 'El campo :attribute debe ser un arreglo.',
    'before' => 'El campo :attribute debe ser una fecha antes de :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha igual o anterior a :date.',
    'between' => [
        'numeric' => 'El campo :attribute debe ser un número entre :min y :max.',
        'file' => 'El campo :attribute debe ser un archivo que pese entre :min y :max kilobytes.',
        'string' => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array' => 'El arreglo :attribute debe contener entre :min y :max items.',
    ],
    'boolean' => 'El campo :attribute debe ser true (verdadero) o false (falso).',
    'confirmed' => 'La confirmación del campo :attribute no coincide.',
    'date' => 'El campo :attribute no corresponde a una fecha válida.',
    'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El campo :attribute no coincide con el formato :format.',
    'different' => 'El campo :attribute y el campo :other deben ser diferentes.',
    'digits' => 'El campo :attribute debe ser de :digits digitos.',
    'digits_between' => 'El campo :attribute debe contener entre :min y :max digitos.',
    'dimensions' => 'El campo :attribute tiene unas dimensiones de imagen incorrecta.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El campo :attribute debe ser un correo válido.',
    'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes valores: :values.',
    'exists' => 'El campo :attribute no es válido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El campo :attribute debe ser un número mayor que :value.',
        'file' => 'El campo :attribute debe ser un archivo que pese :value kilobytes.',
        'string' => 'El campo :attribute debe contener más de :value caracteres.',
        'array' => 'El arreglo :attribute debe contener más de :value items.',
    ],
    'gte' => [
        'numeric' => 'El campo :attribute debe ser un número mayor o igual que :value.',
        'file' => 'El campo :attribute debe ser un archivo que pese :value kilobytes o más.',
        'string' => 'El campo :attribute debe contener :value caracteres o más.',
        'array' => 'El arreglo :attribute debe contener :value items o más.',
    ],
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El campo :attribute no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe ser un entero.',
    'ip' => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El campo :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El campo :attribute debe ser un número menor que :value.',
        'file' => 'El campo :attribute debe ser un archivo que pese menos de :value kilobytes.',
        'string' => 'El campo :attribute debe contener menos de :value caracteres.',
        'array' => 'El arreglo :attribute debe contener menos de :value items.',
    ],
    'lte' => [
        'numeric' => 'El campo :attribute debe ser un número menor o igual que :value.',
        'file' => 'El campo :attribute debe ser un archivo que pese :value kilobytes o menos.',
        'string' => 'El campo :attribute debe contener :value caracteres o menos.',
        'array' => 'El arreglo :attribute debe contener :value items o menos.',
    ],
    'max' => [
        'numeric' => 'El campo :attribute no debe ser mayor que :value.',
        'file' => 'El campo :attribute debe ser un archivo pese máximo :value kilobytes.',
        'string' => 'El campo :attribute debe contener máximo :value caracteres.',
        'array' => 'El arreglo :attribute debe contener máximo :value items.',
    ],
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'file' => 'El campo :attribute debe ser un archivo pese mínimo :value kilobytes.',
        'string' => 'El campo :attribute debe contener mínimo :value caracteres.',
        'array' => 'El arreglo :attribute debe contener mínimo :value items.',
    ],
    'not_in' => 'El campo :attribute no es válido.',
    'not_regex' => 'El formato del campo :attribute no es válido.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato del campo :attribute no es válido.',
    'required' => 'El campo :attribute es requerido.',
    'required_if' => 'El campo :attribute cuando el campo :other es :value.',
    'required_unless' => 'El campo :attribute es requerido a menos que el campo :other se encuentre en :values.',
    'required_with' => 'El campo :attribute es requerido cuando el valor :values esta presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando los campos :values estan presentes.',
    'required_without' => 'El campo :attribute es requerido cuando el valor :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de los valores :values están presentes.',
    'same' => 'El campo :attribute y el campo :other deben coincidir.',
    'size' => [
        'numeric' => 'El campo :attribute debe ser :value.',
        'file' => 'El campo :attribute debe ser un archivo pese:value kilobytes.',
        'string' => 'El campo :attribute debe contener :value caracteres.',
        'array' => 'El arreglo :attribute debe contener :value items.',
    ],
    'starts_with' => 'El campo :attribute debe iniciar con uno de los siguientes valores: :values.',
    'string' => 'El campo :attribute debe ser un texto.',
    'timezone' => 'El campo :attribute debe ser una zona horaria.',
    'unique' => 'El campo :attribute se encuentra duplicado.',
    'uploaded' => 'El campo :attribute no se pudo cargar.',
    'url' => 'El formato del campo :attribute no es válido.',
    'uuid' => 'El campo :attribute debe ser un UUID válido.',

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

    'attributes' => [
    ],

];
