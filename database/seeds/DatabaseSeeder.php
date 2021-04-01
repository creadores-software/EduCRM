<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(SectorTableSeeder::class);
        $this->call(CategoriaCampoEducacionTableSeeder::class);
        $this->call(ModalidadTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(TipoContactoTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(EstatusUsuarioTableSeeder::class);
        $this->call(EstiloVidaTableSeeder::class);
        $this->call(FacultadTableSeeder::class);
        $this->call(TipoAccesoTableSeeder::class);
        $this->call(PeriodicidadTableSeeder::class);
        $this->call(RazaTableSeeder::class);
        $this->call(FrecuenciaUsoTableSeeder::class);
        $this->call(PersonalidadTableSeeder::class);
        $this->call(ReconocimientoTableSeeder::class);
        $this->call(GeneroTableSeeder::class);
        $this->call(GeneracionTableSeeder::class);
        $this->call(OrigenTableSeeder::class);
        $this->call(EstadoDisposicionTableSeeder::class);
        $this->call(TipoOcupacionTableSeeder::class);
        $this->call(BeneficioTableSeeder::class);
        $this->call(CategoriaActividadEconomicaTableSeeder::class);
        $this->call(ActividadOcioTableSeeder::class);
        $this->call(ActitudServicioTableSeeder::class);
        $this->call(EstatusLealtadTableSeeder::class);
        $this->call(NivelAcademicoTableSeeder::class);
        $this->call(NivelFormacionTableSeeder::class);
        $this->call(PrefijoTableSeeder::class);
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(MedioComunicacionTableSeeder::class);
        $this->call(TipoParentescoTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        Schema::enableForeignKeyConstraints(); 
    }
}
