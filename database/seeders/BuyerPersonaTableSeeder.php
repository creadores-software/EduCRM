<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class BuyerPersonaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('buyer_persona')->delete();
        
        DB::table('buyer_persona')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Juan Martines Lopez',
                'descripcion' => '<p><strong>DATOS SOCIODEMOGR&Aacute;FICOS</strong></p>

                    <p><strong><img alt="" src="https://findicons.com/files/icons/169/avatar_boy/128/boy_1.png" style="float:left; height:128px; width:128px" />Edad</strong>: 20 a&ntilde;os</p>

                    <p><strong>G&eacute;nero</strong>: Masculino</p>

                    <p><strong>Ciudad</strong>: Manizales</p>

                    <p><strong>Redes</strong> <strong>Sociales</strong>: Instagram, Facebook, WhatsApp, TikTok</p>

                    <p><strong>Nivel de estudios:</strong> Estudiante 7 semestre de ingenier&iacute;a industrial beca 40%.</p>

                    <p><strong>Rese&ntilde;a familiar: </strong>Hijo del medio de una familia constituida por sus padres y su hermana mayor y menor.</p>

                    <p><strong>Padres</strong>: Casados, profesionales, ocupan cargos medios en sus empresas con varios a&ntilde;os de servicio prestados. Tiene un peque&ntilde;o emprendimiento como ayuda a las finanzas del hogar.</p>

                    <p><strong>Hermanos:</strong> Hermana mayor estudia en otra Universidad privada con beca del 50%. Hermana menor, estudia 9 grado en colegio privado de la ciudad.</p>

                    <hr />
                    <p><strong>CARATER&Iacute;STICAS</strong></p>

                    <p><strong>Personalidad</strong>: T&iacute;mido, anal&iacute;stico, puntual, impaciente, ordenado, perfeccionista, creativo</p>

                    <p><strong>Gustos</strong>: La tecnolog&iacute;a, la ciencia, la investigaci&oacute;n, las creaciones, las redes sociales, series y pel&iacute;culas, la moda, la lectura, los videojuegos.</p>

                    <p><strong>Metas</strong>: Estabilidad laboral, autorealizaci&oacute;n, estabilidad econ&oacute;mica, continuar estudios de posgrados preferiblemente en el exterior y otras ciudades.</p>

                    <p><strong>Necesidades</strong>: Facilidad y rapidez en sus tr&aacute;mites, ahorrar tiempo para dedicarlo a sus hobbies o actividades personales, informaci&oacute;n clara y concreta.</p>

                    <p><strong>Qu&eacute; le motiva</strong>: Su realizaci&oacute;n personal, conocer nuevas culturas, adquirir nuevos conocimientos, cumplir metas y retos personales y estudiantiles.</p>

                    <p><strong>Qu&eacute; le desmotiva</strong>: Que tenga dudas y no las pueda aclarar, est&aacute; lejos de su familia, tener dificultades econ&oacute;micas, sentirse solo.</p>',
            ),
        ));
        
        
    }
}