<?php

namespace App\Exports\Contactos;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ContactoExport implements FromView
{
    public function view(): View
    {
        return view('contactos.contactos.ejemplo_importacion');
    }
}
