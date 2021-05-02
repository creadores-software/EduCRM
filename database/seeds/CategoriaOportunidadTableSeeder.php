<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CategoriaOportunidadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('categoria_oportunidad')->delete();
        
        DB::table('categoria_oportunidad')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Cliente platino',
                'descripcion' => 'Son los clientes más rentables de la empresa con una alta tasa de compra y poco sensibles al precio. Hay que averiguar qué necesidades tienen para darles nuevos ofrecimientos y mantener su compromiso con la empresa.',
                'interes_minimo' => 6,
                'interes_maximo' => 10,
                'capacidad_minima' => 6,
                'capacidad_maxima' => 10,
                'color_hexadecimal' => '#8CC',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Cliente oro',
                'descripcion' => 'Dan una alta rentabilidad, aunque inferior a los de nivel “platino”. Desean continuos descuentos sobre el precio y no son tan leales, pues suelen minimizar el riesgo comparando a varios proveedores.',
                'interes_minimo' => 1,
                'interes_maximo' => 5,
                'capacidad_minima' => 6,
                'capacidad_maxima' => 10,
                'color_hexadecimal' => '#CC8',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Cliente plata',
            'descripcion' => 'Son clientes que dan “volumen” (cuota de mercado) a la empresa, pero provocan mayores gastos, menor rentabilidad y no son totalmente leales.',
                'interes_minimo' => 6,
                'interes_maximo' => 10,
                'capacidad_minima' => 1,
                'capacidad_maxima' => 5,
                'color_hexadecimal' => '#AAA',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Cliente plomo',
                'descripcion' => 'Son aquellos clientes que cuestan dinero a la empresa y no son leales.',
                'interes_minimo' => 1,
                'interes_maximo' => 5,
                'capacidad_minima' => 1,
                'capacidad_maxima' => 5,
                'color_hexadecimal' => '#CA8',
            ),
        ));
        
        
    }
}