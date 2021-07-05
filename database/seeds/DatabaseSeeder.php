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
        //Usuarios y permisos
        $this->call(UsersTableSeeder::class);        
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        //Campos de parametrización básica
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
        $this->call(BuyerPersonaTableSeeder::class);
        $this->call(JornadaTableSeeder::class);
        $this->call(PeriodoAcademicoTableSeeder::class);
        $this->call(SisbenTableSeeder::class);
        //Seeders con más campos
        $this->call(NivelAcademicoTableSeeder::class);
        $this->call(NivelFormacionTableSeeder::class);
        $this->call(PrefijoTableSeeder::class);
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(MedioComunicacionTableSeeder::class);
        $this->call(TipoParentescoTableSeeder::class);
        $this->call(CategoriaOportunidadTableSeeder::class);
        $this->call(TipoEstadoColorTableSeeder::class);
        $this->call(TipoInteraccionTableSeeder::class);
        $this->call(EstadoInteraccionTableSeeder::class);
        $this->call(TipoInteraccionEstadosTableSeeder::class);        
        //Información más completa
        $this->call(ActividadEconomicaTableSeeder::class);
        $this->call(CampoEducacionTableSeeder::class);
        $this->call(OcupacionTableSeeder::class);
        $this->call(LugarTableSeeder::class);
        $this->call(EntidadTableSeeder::class);
        $this->call(FormacionTableSeeder::class);     
        //Con información de pruebas
        $this->call(SegmentoTableSeeder::class);
        $this->call(TipoCampaniaTableSeeder::class);
        $this->call(EquipoMercadeoTableSeeder::class);
        $this->call(CampaniaTableSeeder::class);
        $this->call(ContactoTableSeeder::class);
        $this->call(InformacionRelacionalTableSeeder::class);
        $this->call(ParentescoTableSeeder::class);
        $this->call(TipoCampaniaEstadosTableSeeder::class);
        $this->call(JustificacionEstadoCampaniaTableSeeder::class);
        $this->call(EstadoCampaniaTableSeeder::class);
        $this->call(OportunidadTableSeeder::class);
        $this->call(InteraccionTableSeeder::class);
        $this->call(PertenenciaEquipoMercadeoTableSeeder::class);  
        
        Schema::enableForeignKeyConstraints(); 
    }
}
