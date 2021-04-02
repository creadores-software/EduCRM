<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class LugarTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('lugar')->delete();
        
        DB::table('lugar')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Colombia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'nombre' => 'Antioquia',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            2 => 
            array (
                'id' => 8,
                'nombre' => 'Atlántico',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            3 => 
            array (
                'id' => 11,
                'nombre' => 'Bogotá, D.C.',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            4 => 
            array (
                'id' => 13,
                'nombre' => 'Bolívar',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            5 => 
            array (
                'id' => 15,
                'nombre' => 'Boyacá',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            6 => 
            array (
                'id' => 17,
                'nombre' => 'Caldas',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            7 => 
            array (
                'id' => 18,
                'nombre' => 'Caquetá',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            8 => 
            array (
                'id' => 19,
                'nombre' => 'Cauca',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            9 => 
            array (
                'id' => 20,
                'nombre' => 'Cesar',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            10 => 
            array (
                'id' => 23,
                'nombre' => 'Córdoba',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            11 => 
            array (
                'id' => 25,
                'nombre' => 'Cundinamarca',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            12 => 
            array (
                'id' => 27,
                'nombre' => 'Chocó',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            13 => 
            array (
                'id' => 41,
                'nombre' => 'Huila',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            14 => 
            array (
                'id' => 44,
                'nombre' => 'La Guajira',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            15 => 
            array (
                'id' => 47,
                'nombre' => 'Magdalena',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            16 => 
            array (
                'id' => 50,
                'nombre' => 'Meta',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            17 => 
            array (
                'id' => 52,
                'nombre' => 'Nariño',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            18 => 
            array (
                'id' => 54,
                'nombre' => 'Norte De Santander',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            19 => 
            array (
                'id' => 63,
                'nombre' => 'Quindio',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            20 => 
            array (
                'id' => 66,
                'nombre' => 'Risaralda',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            21 => 
            array (
                'id' => 68,
                'nombre' => 'Santander',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            22 => 
            array (
                'id' => 70,
                'nombre' => 'Sucre',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            23 => 
            array (
                'id' => 73,
                'nombre' => 'Tolima',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            24 => 
            array (
                'id' => 76,
                'nombre' => 'Valle Del Cauca',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            25 => 
            array (
                'id' => 81,
                'nombre' => 'Arauca',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            26 => 
            array (
                'id' => 85,
                'nombre' => 'Casanare',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            27 => 
            array (
                'id' => 86,
                'nombre' => 'Putumayo',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            28 => 
            array (
                'id' => 88,
                'nombre' => 'Archipiélago De San Andrés, Providencia Y Santa Catalina',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            29 => 
            array (
                'id' => 91,
                'nombre' => 'Amazonas',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            30 => 
            array (
                'id' => 94,
                'nombre' => 'Guainía',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            31 => 
            array (
                'id' => 95,
                'nombre' => 'Guaviare',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            32 => 
            array (
                'id' => 97,
                'nombre' => 'Vaupés',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            33 => 
            array (
                'id' => 99,
                'nombre' => 'Vichada',
                'tipo' => 'D',
                'padre_id' => 1,
            ),
            34 => 
            array (
                'id' => 1111,
                'nombre' => 'Andorra',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            35 => 
            array (
                'id' => 1112,
                'nombre' => 'Emiratos Arabes Unidos',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            36 => 
            array (
                'id' => 1113,
                'nombre' => 'Afganistan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            37 => 
            array (
                'id' => 1114,
                'nombre' => 'Antigua Y Barbuda',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            38 => 
            array (
                'id' => 1115,
                'nombre' => 'Anguila',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            39 => 
            array (
                'id' => 1116,
                'nombre' => 'Albania',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            40 => 
            array (
                'id' => 1117,
                'nombre' => 'Armenia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            41 => 
            array (
                'id' => 1118,
                'nombre' => 'Angola',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            42 => 
            array (
                'id' => 1119,
                'nombre' => 'Antartida',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            43 => 
            array (
                'id' => 1120,
                'nombre' => 'Argentina',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            44 => 
            array (
                'id' => 1121,
                'nombre' => 'Samoa Americana',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            45 => 
            array (
                'id' => 1122,
                'nombre' => 'Austria',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            46 => 
            array (
                'id' => 1123,
                'nombre' => 'Australia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            47 => 
            array (
                'id' => 1124,
                'nombre' => 'Aruba',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            48 => 
            array (
                'id' => 1125,
                'nombre' => 'Islas Åland',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            49 => 
            array (
                'id' => 1126,
                'nombre' => 'Azerbaiyan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            50 => 
            array (
                'id' => 1127,
                'nombre' => 'Bosnia Y Herzegovina',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            51 => 
            array (
                'id' => 1128,
                'nombre' => 'Barbados',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            52 => 
            array (
                'id' => 1129,
                'nombre' => 'Banglades',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            53 => 
            array (
                'id' => 1130,
                'nombre' => 'Belgica',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            54 => 
            array (
                'id' => 1131,
                'nombre' => 'Burkina Faso',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            55 => 
            array (
                'id' => 1132,
                'nombre' => 'Bulgaria',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            56 => 
            array (
                'id' => 1133,
                'nombre' => 'Barein',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            57 => 
            array (
                'id' => 1134,
                'nombre' => 'Burundi',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            58 => 
            array (
                'id' => 1135,
                'nombre' => 'Benin',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            59 => 
            array (
                'id' => 1136,
                'nombre' => 'San Bartolome',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            60 => 
            array (
                'id' => 1137,
                'nombre' => 'Bermudas',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            61 => 
            array (
                'id' => 1138,
                'nombre' => 'Brunei Darussalam',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            62 => 
            array (
                'id' => 1139,
                'nombre' => 'Bolivia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            63 => 
            array (
                'id' => 1140,
                'nombre' => 'Bonaire',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            64 => 
            array (
                'id' => 1141,
                'nombre' => 'Brasil',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            65 => 
            array (
                'id' => 1142,
                'nombre' => 'Bahamas',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            66 => 
            array (
                'id' => 1143,
                'nombre' => 'Butan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            67 => 
            array (
                'id' => 1144,
                'nombre' => 'Isla Bouvet',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            68 => 
            array (
                'id' => 1145,
                'nombre' => 'Botsuana',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            69 => 
            array (
                'id' => 1146,
                'nombre' => 'Bielorrusia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            70 => 
            array (
                'id' => 1147,
                'nombre' => 'Belice',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            71 => 
            array (
                'id' => 1148,
                'nombre' => 'Canada',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            72 => 
            array (
                'id' => 1149,
            'nombre' => 'Islas Cocos (Keeling)',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            73 => 
            array (
                'id' => 1150,
                'nombre' => 'Congo',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            74 => 
            array (
                'id' => 1151,
                'nombre' => 'Republica Centroafricana',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            75 => 
            array (
                'id' => 1152,
                'nombre' => 'Congo',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            76 => 
            array (
                'id' => 1153,
                'nombre' => 'Suiza',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            77 => 
            array (
                'id' => 1154,
                'nombre' => 'Costa De Marfil',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            78 => 
            array (
                'id' => 1155,
                'nombre' => 'Islas Cook',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            79 => 
            array (
                'id' => 1156,
                'nombre' => 'Chile',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            80 => 
            array (
                'id' => 1157,
                'nombre' => 'Camerun',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            81 => 
            array (
                'id' => 1158,
                'nombre' => 'China',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            82 => 
            array (
                'id' => 1159,
                'nombre' => 'Costa Rica',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            83 => 
            array (
                'id' => 1160,
                'nombre' => 'Cuba',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            84 => 
            array (
                'id' => 1161,
                'nombre' => 'Cabo Verde',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            85 => 
            array (
                'id' => 1162,
                'nombre' => 'Curazao',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            86 => 
            array (
                'id' => 1163,
                'nombre' => 'Isla De Navidad',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            87 => 
            array (
                'id' => 1164,
                'nombre' => 'Chipre',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            88 => 
            array (
                'id' => 1165,
                'nombre' => 'Republica Checa',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            89 => 
            array (
                'id' => 1166,
                'nombre' => 'Alemania',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            90 => 
            array (
                'id' => 1167,
                'nombre' => 'Yibuti',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            91 => 
            array (
                'id' => 1168,
                'nombre' => 'Dinamarca',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            92 => 
            array (
                'id' => 1169,
                'nombre' => 'Dominica',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            93 => 
            array (
                'id' => 1170,
                'nombre' => 'Republica Dominicana',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            94 => 
            array (
                'id' => 1171,
                'nombre' => 'Argelia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            95 => 
            array (
                'id' => 1172,
                'nombre' => 'Ecuador',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            96 => 
            array (
                'id' => 1173,
                'nombre' => 'Estonia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            97 => 
            array (
                'id' => 1174,
                'nombre' => 'Egipto',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            98 => 
            array (
                'id' => 1175,
                'nombre' => 'Sahara Occidental',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            99 => 
            array (
                'id' => 1176,
                'nombre' => 'Eritrea',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            100 => 
            array (
                'id' => 1177,
                'nombre' => 'España',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            101 => 
            array (
                'id' => 1178,
                'nombre' => 'Etiopia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            102 => 
            array (
                'id' => 1179,
                'nombre' => 'Finlandia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            103 => 
            array (
                'id' => 1180,
                'nombre' => 'Fiyi',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            104 => 
            array (
                'id' => 1181,
            'nombre' => 'Islas Falkland (Malvinas)',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            105 => 
            array (
                'id' => 1182,
                'nombre' => 'Micronesia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            106 => 
            array (
                'id' => 1183,
                'nombre' => 'Islas Feroe',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            107 => 
            array (
                'id' => 1184,
                'nombre' => 'Francia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            108 => 
            array (
                'id' => 1185,
                'nombre' => 'Gabon',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            109 => 
            array (
                'id' => 1186,
                'nombre' => 'Reino Unido',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            110 => 
            array (
                'id' => 1187,
                'nombre' => 'Granada',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            111 => 
            array (
                'id' => 1188,
                'nombre' => 'Georgia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            112 => 
            array (
                'id' => 1189,
                'nombre' => 'Guayana Francesa',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            113 => 
            array (
                'id' => 1190,
                'nombre' => 'Guernsey',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            114 => 
            array (
                'id' => 1191,
                'nombre' => 'Ghana',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            115 => 
            array (
                'id' => 1192,
                'nombre' => 'Gibraltar',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            116 => 
            array (
                'id' => 1193,
                'nombre' => 'Groenlandia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            117 => 
            array (
                'id' => 1194,
                'nombre' => 'Gambia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            118 => 
            array (
                'id' => 1195,
                'nombre' => 'Guinea',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            119 => 
            array (
                'id' => 1196,
                'nombre' => 'Guadalupe',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            120 => 
            array (
                'id' => 1197,
                'nombre' => 'Guinea Ecuatorial',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            121 => 
            array (
                'id' => 1198,
                'nombre' => 'Grecia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            122 => 
            array (
                'id' => 1199,
                'nombre' => 'Islas Georgias Del Sur Y Sandwich Del Sur',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            123 => 
            array (
                'id' => 1200,
                'nombre' => 'Guatemala',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            124 => 
            array (
                'id' => 1201,
                'nombre' => 'Guam',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            125 => 
            array (
                'id' => 1202,
                'nombre' => 'Guinea-Bisau',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            126 => 
            array (
                'id' => 1203,
                'nombre' => 'Guyana',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            127 => 
            array (
                'id' => 1204,
                'nombre' => 'Hong Kong',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            128 => 
            array (
                'id' => 1205,
                'nombre' => 'Islas Heard Y Mcdonald',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            129 => 
            array (
                'id' => 1206,
                'nombre' => 'Honduras',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            130 => 
            array (
                'id' => 1207,
                'nombre' => 'Croacia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            131 => 
            array (
                'id' => 1208,
                'nombre' => 'Haiti',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            132 => 
            array (
                'id' => 1209,
                'nombre' => 'Hungria',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            133 => 
            array (
                'id' => 1210,
                'nombre' => 'Indonesia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            134 => 
            array (
                'id' => 1211,
                'nombre' => 'Irlanda',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            135 => 
            array (
                'id' => 1212,
                'nombre' => 'Israel',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            136 => 
            array (
                'id' => 1213,
                'nombre' => 'Isla De Man',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            137 => 
            array (
                'id' => 1214,
                'nombre' => 'India',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            138 => 
            array (
                'id' => 1215,
                'nombre' => 'Territorio Britanico Del Oceano Indico',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            139 => 
            array (
                'id' => 1216,
                'nombre' => 'Irak',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            140 => 
            array (
                'id' => 1217,
                'nombre' => 'Iran',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            141 => 
            array (
                'id' => 1218,
                'nombre' => 'Islandia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            142 => 
            array (
                'id' => 1219,
                'nombre' => 'Italia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            143 => 
            array (
                'id' => 1220,
                'nombre' => 'Jersey',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            144 => 
            array (
                'id' => 1221,
                'nombre' => 'Jamaica',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            145 => 
            array (
                'id' => 1222,
                'nombre' => 'Jordania',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            146 => 
            array (
                'id' => 1223,
                'nombre' => 'Japon',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            147 => 
            array (
                'id' => 1224,
                'nombre' => 'Kenia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            148 => 
            array (
                'id' => 1225,
                'nombre' => 'Kirguistan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            149 => 
            array (
                'id' => 1226,
                'nombre' => 'Camboya',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            150 => 
            array (
                'id' => 1227,
                'nombre' => 'Kiribati',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            151 => 
            array (
                'id' => 1228,
                'nombre' => 'Comoras',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            152 => 
            array (
                'id' => 1229,
                'nombre' => 'San Cristobal Y Nieves',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            153 => 
            array (
                'id' => 1230,
                'nombre' => 'Corea',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            154 => 
            array (
                'id' => 1231,
                'nombre' => 'Corea',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            155 => 
            array (
                'id' => 1232,
                'nombre' => 'Kuwait',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            156 => 
            array (
                'id' => 1233,
                'nombre' => 'Islas Caiman',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            157 => 
            array (
                'id' => 1234,
                'nombre' => 'Kazajistan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            158 => 
            array (
                'id' => 1235,
                'nombre' => 'Republica Democratica Popular Lao',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            159 => 
            array (
                'id' => 1236,
                'nombre' => 'Libano',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            160 => 
            array (
                'id' => 1237,
                'nombre' => 'Santa Lucia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            161 => 
            array (
                'id' => 1238,
                'nombre' => 'Liechtenstein',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            162 => 
            array (
                'id' => 1239,
                'nombre' => 'Sri Lanka',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            163 => 
            array (
                'id' => 1240,
                'nombre' => 'Liberia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            164 => 
            array (
                'id' => 1241,
                'nombre' => 'Lesoto',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            165 => 
            array (
                'id' => 1242,
                'nombre' => 'Lituania',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            166 => 
            array (
                'id' => 1243,
                'nombre' => 'Luxemburgo',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            167 => 
            array (
                'id' => 1244,
                'nombre' => 'Letonia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            168 => 
            array (
                'id' => 1245,
                'nombre' => 'Libia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            169 => 
            array (
                'id' => 1246,
                'nombre' => 'Marruecos',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            170 => 
            array (
                'id' => 1247,
                'nombre' => 'Monaco',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            171 => 
            array (
                'id' => 1248,
                'nombre' => 'Moldavia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            172 => 
            array (
                'id' => 1249,
                'nombre' => 'Montenegro',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            173 => 
            array (
                'id' => 1250,
            'nombre' => 'San Martin (Parte Francesa)',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            174 => 
            array (
                'id' => 1251,
                'nombre' => 'Madagascar',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            175 => 
            array (
                'id' => 1252,
                'nombre' => 'Islas Marshall',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            176 => 
            array (
                'id' => 1253,
                'nombre' => 'Macedonia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            177 => 
            array (
                'id' => 1254,
                'nombre' => 'Mali',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            178 => 
            array (
                'id' => 1255,
                'nombre' => 'Myanmar Nota 1',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            179 => 
            array (
                'id' => 1256,
                'nombre' => 'Mongolia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            180 => 
            array (
                'id' => 1257,
                'nombre' => 'Macao',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            181 => 
            array (
                'id' => 1258,
                'nombre' => 'Islas Marianas Del Norte',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            182 => 
            array (
                'id' => 1259,
                'nombre' => 'Martinica',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            183 => 
            array (
                'id' => 1260,
                'nombre' => 'Mauritania',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            184 => 
            array (
                'id' => 1261,
                'nombre' => 'Montserrat',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            185 => 
            array (
                'id' => 1262,
                'nombre' => 'Malta',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            186 => 
            array (
                'id' => 1263,
                'nombre' => 'Mauricio',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            187 => 
            array (
                'id' => 1264,
                'nombre' => 'Maldivas',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            188 => 
            array (
                'id' => 1265,
                'nombre' => 'Malaui',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            189 => 
            array (
                'id' => 1266,
                'nombre' => 'Mexico',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            190 => 
            array (
                'id' => 1267,
                'nombre' => 'Malasia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            191 => 
            array (
                'id' => 1268,
                'nombre' => 'Mozambique',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            192 => 
            array (
                'id' => 1269,
                'nombre' => 'Nabimia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            193 => 
            array (
                'id' => 1270,
                'nombre' => 'Nueva Caledonia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            194 => 
            array (
                'id' => 1271,
                'nombre' => 'Niger',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            195 => 
            array (
                'id' => 1272,
                'nombre' => 'Isla Norfolk',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            196 => 
            array (
                'id' => 1273,
                'nombre' => 'Nigeria',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            197 => 
            array (
                'id' => 1274,
                'nombre' => 'Nicaragua',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            198 => 
            array (
                'id' => 1275,
                'nombre' => 'Paises Bajos',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            199 => 
            array (
                'id' => 1276,
                'nombre' => 'Noruega',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            200 => 
            array (
                'id' => 1277,
                'nombre' => 'Nepal',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            201 => 
            array (
                'id' => 1278,
                'nombre' => 'Nauru',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            202 => 
            array (
                'id' => 1279,
                'nombre' => 'Niue',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            203 => 
            array (
                'id' => 1280,
                'nombre' => 'Nueva Zelanda',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            204 => 
            array (
                'id' => 1281,
                'nombre' => 'Oman',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            205 => 
            array (
                'id' => 1282,
                'nombre' => 'Panama',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            206 => 
            array (
                'id' => 1283,
                'nombre' => 'Peru',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            207 => 
            array (
                'id' => 1284,
                'nombre' => 'Polinesia Francesa',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            208 => 
            array (
                'id' => 1285,
                'nombre' => 'Papua Nueva Guinea',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            209 => 
            array (
                'id' => 1286,
                'nombre' => 'Filipinas',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            210 => 
            array (
                'id' => 1287,
                'nombre' => 'Pakistan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            211 => 
            array (
                'id' => 1288,
                'nombre' => 'Polonia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            212 => 
            array (
                'id' => 1289,
                'nombre' => 'San Pedro Y Miquelon',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            213 => 
            array (
                'id' => 1290,
                'nombre' => 'Pitcairn',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            214 => 
            array (
                'id' => 1291,
                'nombre' => 'Puerto Rico',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            215 => 
            array (
                'id' => 1292,
                'nombre' => 'Palestina',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            216 => 
            array (
                'id' => 1293,
                'nombre' => 'Portugal',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            217 => 
            array (
                'id' => 1294,
                'nombre' => 'Palaos',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            218 => 
            array (
                'id' => 1295,
                'nombre' => 'Paraguay',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            219 => 
            array (
                'id' => 1296,
                'nombre' => 'Qatar',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            220 => 
            array (
                'id' => 1297,
                'nombre' => 'Reunion',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            221 => 
            array (
                'id' => 1298,
                'nombre' => 'Rumania',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            222 => 
            array (
                'id' => 1299,
                'nombre' => 'Serbia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            223 => 
            array (
                'id' => 1300,
                'nombre' => 'Federacion Rusa',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            224 => 
            array (
                'id' => 1301,
                'nombre' => 'Ruanda',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            225 => 
            array (
                'id' => 1302,
                'nombre' => 'Arabia Saudita',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            226 => 
            array (
                'id' => 1303,
                'nombre' => 'Islas Salomon',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            227 => 
            array (
                'id' => 1304,
                'nombre' => 'Seychelles',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            228 => 
            array (
                'id' => 1305,
                'nombre' => 'Sudan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            229 => 
            array (
                'id' => 1306,
                'nombre' => 'Suecia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            230 => 
            array (
                'id' => 1307,
                'nombre' => 'Singapur',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            231 => 
            array (
                'id' => 1308,
                'nombre' => 'Santa Helena Ascension Y Tristan De Acuña',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            232 => 
            array (
                'id' => 1309,
                'nombre' => 'Eslovenia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            233 => 
            array (
                'id' => 1310,
                'nombre' => 'Svalbard Y Jan Mayen',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            234 => 
            array (
                'id' => 1311,
                'nombre' => 'Eslovaquia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            235 => 
            array (
                'id' => 1312,
                'nombre' => 'Sierra Leona',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            236 => 
            array (
                'id' => 1313,
                'nombre' => 'San Marino',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            237 => 
            array (
                'id' => 1314,
                'nombre' => 'Senegal',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            238 => 
            array (
                'id' => 1315,
                'nombre' => 'Somalia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            239 => 
            array (
                'id' => 1316,
                'nombre' => 'Surinam',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            240 => 
            array (
                'id' => 1317,
                'nombre' => 'Sudan Del Sur',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            241 => 
            array (
                'id' => 1318,
                'nombre' => 'Santo Tome Y Principe',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            242 => 
            array (
                'id' => 1319,
                'nombre' => 'El Salvador',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            243 => 
            array (
                'id' => 1320,
            'nombre' => 'Sint Maarten (Parte Neerlandesa)',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            244 => 
            array (
                'id' => 1321,
                'nombre' => 'Republica Arabe De Siria',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            245 => 
            array (
                'id' => 1322,
                'nombre' => 'Suazilandia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            246 => 
            array (
                'id' => 1323,
                'nombre' => 'Islas Turcas Y Caicos',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            247 => 
            array (
                'id' => 1324,
                'nombre' => 'Chad',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            248 => 
            array (
                'id' => 1325,
                'nombre' => 'Territorios Australes Franceses',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            249 => 
            array (
                'id' => 1326,
                'nombre' => 'Togo',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            250 => 
            array (
                'id' => 1327,
                'nombre' => 'Tailandia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            251 => 
            array (
                'id' => 1328,
                'nombre' => 'Tayikistan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            252 => 
            array (
                'id' => 1329,
                'nombre' => 'Tokelau',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            253 => 
            array (
                'id' => 1330,
                'nombre' => 'Timor-Leste',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            254 => 
            array (
                'id' => 1331,
                'nombre' => 'Turkmenistan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            255 => 
            array (
                'id' => 1332,
                'nombre' => 'Tunez',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            256 => 
            array (
                'id' => 1333,
                'nombre' => 'Tonga',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            257 => 
            array (
                'id' => 1334,
                'nombre' => 'Turquia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            258 => 
            array (
                'id' => 1335,
                'nombre' => 'Trinidad Y Tobago',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            259 => 
            array (
                'id' => 1336,
                'nombre' => 'Tuvalu',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            260 => 
            array (
                'id' => 1337,
                'nombre' => 'Taiwan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            261 => 
            array (
                'id' => 1338,
                'nombre' => 'Tanzania',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            262 => 
            array (
                'id' => 1339,
                'nombre' => 'Ucrania',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            263 => 
            array (
                'id' => 1340,
                'nombre' => 'Uganda',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            264 => 
            array (
                'id' => 1341,
                'nombre' => 'Islas Ultramarinas Menores De Estados Unidos',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            265 => 
            array (
                'id' => 1342,
                'nombre' => 'Estados Unidos',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            266 => 
            array (
                'id' => 1343,
                'nombre' => 'Uruguay',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            267 => 
            array (
                'id' => 1344,
                'nombre' => 'Uzbekistan',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            268 => 
            array (
                'id' => 1345,
            'nombre' => 'Santa Sede (Ciudad Estado Vaticavo)',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            269 => 
            array (
                'id' => 1346,
                'nombre' => 'San Vicente Y Las Granadinas',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            270 => 
            array (
                'id' => 1347,
                'nombre' => 'Venezuela',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            271 => 
            array (
                'id' => 1348,
                'nombre' => 'Islas Virgenes Britanicas',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            272 => 
            array (
                'id' => 1349,
                'nombre' => 'Islas Virgenes De Los Estados Unidos',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            273 => 
            array (
                'id' => 1350,
                'nombre' => 'Viet Nam',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            274 => 
            array (
                'id' => 1351,
                'nombre' => 'Vanuatu',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            275 => 
            array (
                'id' => 1352,
                'nombre' => 'Wallis Y Futuna',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            276 => 
            array (
                'id' => 1353,
                'nombre' => 'Samoa',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            277 => 
            array (
                'id' => 1354,
                'nombre' => 'Yemen',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            278 => 
            array (
                'id' => 1355,
                'nombre' => 'Mayotte',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            279 => 
            array (
                'id' => 1356,
                'nombre' => 'Sudafrica',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            280 => 
            array (
                'id' => 1357,
                'nombre' => 'Zambia',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            281 => 
            array (
                'id' => 1358,
                'nombre' => 'Zimbabue',
                'tipo' => 'P',
                'padre_id' => NULL,
            ),
            282 => 
            array (
                'id' => 5001,
                'nombre' => 'Medellín',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            283 => 
            array (
                'id' => 5002,
                'nombre' => 'Abejorral',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            284 => 
            array (
                'id' => 5004,
                'nombre' => 'Abriaquí',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            285 => 
            array (
                'id' => 5021,
                'nombre' => 'Alejandría',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            286 => 
            array (
                'id' => 5030,
                'nombre' => 'Amagá',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            287 => 
            array (
                'id' => 5031,
                'nombre' => 'Amalfi',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            288 => 
            array (
                'id' => 5034,
                'nombre' => 'Andes',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            289 => 
            array (
                'id' => 5036,
                'nombre' => 'Angelópolis',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            290 => 
            array (
                'id' => 5038,
                'nombre' => 'Angostura',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            291 => 
            array (
                'id' => 5040,
                'nombre' => 'Anorí',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            292 => 
            array (
                'id' => 5042,
                'nombre' => 'Santa Fé De Antioquia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            293 => 
            array (
                'id' => 5044,
                'nombre' => 'Anzá',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            294 => 
            array (
                'id' => 5045,
                'nombre' => 'Apartadó',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            295 => 
            array (
                'id' => 5051,
                'nombre' => 'Arboletes',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            296 => 
            array (
                'id' => 5055,
                'nombre' => 'Argelia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            297 => 
            array (
                'id' => 5059,
                'nombre' => 'Armenia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            298 => 
            array (
                'id' => 5079,
                'nombre' => 'Barbosa',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            299 => 
            array (
                'id' => 5086,
                'nombre' => 'Belmira',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            300 => 
            array (
                'id' => 5088,
                'nombre' => 'Bello',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            301 => 
            array (
                'id' => 5091,
                'nombre' => 'Betania',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            302 => 
            array (
                'id' => 5093,
                'nombre' => 'Betulia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            303 => 
            array (
                'id' => 5101,
                'nombre' => 'Ciudad Bolívar',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            304 => 
            array (
                'id' => 5107,
                'nombre' => 'Briceño',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            305 => 
            array (
                'id' => 5113,
                'nombre' => 'Buriticá',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            306 => 
            array (
                'id' => 5120,
                'nombre' => 'Cáceres',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            307 => 
            array (
                'id' => 5125,
                'nombre' => 'Caicedo',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            308 => 
            array (
                'id' => 5129,
                'nombre' => 'Caldas',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            309 => 
            array (
                'id' => 5134,
                'nombre' => 'Campamento',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            310 => 
            array (
                'id' => 5138,
                'nombre' => 'Cañasgordas',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            311 => 
            array (
                'id' => 5142,
                'nombre' => 'Caracolí',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            312 => 
            array (
                'id' => 5145,
                'nombre' => 'Caramanta',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            313 => 
            array (
                'id' => 5147,
                'nombre' => 'Carepa',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            314 => 
            array (
                'id' => 5148,
                'nombre' => 'El Carmen De Viboral',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            315 => 
            array (
                'id' => 5150,
                'nombre' => 'Carolina',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            316 => 
            array (
                'id' => 5154,
                'nombre' => 'Caucasia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            317 => 
            array (
                'id' => 5172,
                'nombre' => 'Chigorodó',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            318 => 
            array (
                'id' => 5190,
                'nombre' => 'Cisneros',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            319 => 
            array (
                'id' => 5197,
                'nombre' => 'Cocorná',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            320 => 
            array (
                'id' => 5206,
                'nombre' => 'Concepción',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            321 => 
            array (
                'id' => 5209,
                'nombre' => 'Concordia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            322 => 
            array (
                'id' => 5212,
                'nombre' => 'Copacabana',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            323 => 
            array (
                'id' => 5234,
                'nombre' => 'Dabeiba',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            324 => 
            array (
                'id' => 5237,
                'nombre' => 'Donmatías',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            325 => 
            array (
                'id' => 5240,
                'nombre' => 'Ebéjico',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            326 => 
            array (
                'id' => 5250,
                'nombre' => 'El Bagre',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            327 => 
            array (
                'id' => 5264,
                'nombre' => 'Entrerríos',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            328 => 
            array (
                'id' => 5266,
                'nombre' => 'Envigado',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            329 => 
            array (
                'id' => 5282,
                'nombre' => 'Fredonia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            330 => 
            array (
                'id' => 5284,
                'nombre' => 'Frontino',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            331 => 
            array (
                'id' => 5306,
                'nombre' => 'Giraldo',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            332 => 
            array (
                'id' => 5308,
                'nombre' => 'Girardota',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            333 => 
            array (
                'id' => 5310,
                'nombre' => 'Gómez Plata',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            334 => 
            array (
                'id' => 5313,
                'nombre' => 'Granada',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            335 => 
            array (
                'id' => 5315,
                'nombre' => 'Guadalupe',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            336 => 
            array (
                'id' => 5318,
                'nombre' => 'Guarne',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            337 => 
            array (
                'id' => 5321,
                'nombre' => 'Guatapé',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            338 => 
            array (
                'id' => 5347,
                'nombre' => 'Heliconia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            339 => 
            array (
                'id' => 5353,
                'nombre' => 'Hispania',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            340 => 
            array (
                'id' => 5360,
                'nombre' => 'Itagüí',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            341 => 
            array (
                'id' => 5361,
                'nombre' => 'Ituango',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            342 => 
            array (
                'id' => 5364,
                'nombre' => 'Jardín',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            343 => 
            array (
                'id' => 5368,
                'nombre' => 'Jericó',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            344 => 
            array (
                'id' => 5376,
                'nombre' => 'La Ceja',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            345 => 
            array (
                'id' => 5380,
                'nombre' => 'La Estrella',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            346 => 
            array (
                'id' => 5390,
                'nombre' => 'La Pintada',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            347 => 
            array (
                'id' => 5400,
                'nombre' => 'La Unión',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            348 => 
            array (
                'id' => 5411,
                'nombre' => 'Liborina',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            349 => 
            array (
                'id' => 5425,
                'nombre' => 'Maceo',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            350 => 
            array (
                'id' => 5440,
                'nombre' => 'Marinilla',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            351 => 
            array (
                'id' => 5467,
                'nombre' => 'Montebello',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            352 => 
            array (
                'id' => 5475,
                'nombre' => 'Murindó',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            353 => 
            array (
                'id' => 5480,
                'nombre' => 'Mutatá',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            354 => 
            array (
                'id' => 5483,
                'nombre' => 'Nariño',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            355 => 
            array (
                'id' => 5490,
                'nombre' => 'Necoclí',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            356 => 
            array (
                'id' => 5495,
                'nombre' => 'Nechí',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            357 => 
            array (
                'id' => 5501,
                'nombre' => 'Olaya',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            358 => 
            array (
                'id' => 5541,
                'nombre' => 'Peñol',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            359 => 
            array (
                'id' => 5543,
                'nombre' => 'Peque',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            360 => 
            array (
                'id' => 5576,
                'nombre' => 'Pueblorrico',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            361 => 
            array (
                'id' => 5579,
                'nombre' => 'Puerto Berrío',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            362 => 
            array (
                'id' => 5585,
                'nombre' => 'Puerto Nare',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            363 => 
            array (
                'id' => 5591,
                'nombre' => 'Puerto Triunfo',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            364 => 
            array (
                'id' => 5604,
                'nombre' => 'Remedios',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            365 => 
            array (
                'id' => 5607,
                'nombre' => 'Retiro',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            366 => 
            array (
                'id' => 5615,
                'nombre' => 'Rionegro',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            367 => 
            array (
                'id' => 5628,
                'nombre' => 'Sabanalarga',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            368 => 
            array (
                'id' => 5631,
                'nombre' => 'Sabaneta',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            369 => 
            array (
                'id' => 5642,
                'nombre' => 'Salgar',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            370 => 
            array (
                'id' => 5647,
                'nombre' => 'San Andrés De Cuerquía',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            371 => 
            array (
                'id' => 5649,
                'nombre' => 'San Carlos',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            372 => 
            array (
                'id' => 5652,
                'nombre' => 'San Francisco',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            373 => 
            array (
                'id' => 5656,
                'nombre' => 'San Jerónimo',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            374 => 
            array (
                'id' => 5658,
                'nombre' => 'San José De La Montaña',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            375 => 
            array (
                'id' => 5659,
                'nombre' => 'San Juan De Urabá',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            376 => 
            array (
                'id' => 5660,
                'nombre' => 'San Luis',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            377 => 
            array (
                'id' => 5664,
                'nombre' => 'San Pedro De Los Milagros',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            378 => 
            array (
                'id' => 5665,
                'nombre' => 'San Pedro De Urabá',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            379 => 
            array (
                'id' => 5667,
                'nombre' => 'San Rafael',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            380 => 
            array (
                'id' => 5670,
                'nombre' => 'San Roque',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            381 => 
            array (
                'id' => 5674,
                'nombre' => 'San Vicente Ferrer',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            382 => 
            array (
                'id' => 5679,
                'nombre' => 'Santa Bárbara',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            383 => 
            array (
                'id' => 5686,
                'nombre' => 'Santa Rosa De Osos',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            384 => 
            array (
                'id' => 5690,
                'nombre' => 'Santo Domingo',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            385 => 
            array (
                'id' => 5697,
                'nombre' => 'El Santuario',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            386 => 
            array (
                'id' => 5736,
                'nombre' => 'Segovia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            387 => 
            array (
                'id' => 5756,
                'nombre' => 'Sonsón',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            388 => 
            array (
                'id' => 5761,
                'nombre' => 'Sopetrán',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            389 => 
            array (
                'id' => 5789,
                'nombre' => 'Támesis',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            390 => 
            array (
                'id' => 5790,
                'nombre' => 'Tarazá',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            391 => 
            array (
                'id' => 5792,
                'nombre' => 'Tarso',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            392 => 
            array (
                'id' => 5809,
                'nombre' => 'Titiribí',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            393 => 
            array (
                'id' => 5819,
                'nombre' => 'Toledo',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            394 => 
            array (
                'id' => 5837,
                'nombre' => 'Turbo',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            395 => 
            array (
                'id' => 5842,
                'nombre' => 'Uramita',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            396 => 
            array (
                'id' => 5847,
                'nombre' => 'Urrao',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            397 => 
            array (
                'id' => 5854,
                'nombre' => 'Valdivia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            398 => 
            array (
                'id' => 5856,
                'nombre' => 'Valparaíso',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            399 => 
            array (
                'id' => 5858,
                'nombre' => 'Vegachí',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            400 => 
            array (
                'id' => 5861,
                'nombre' => 'Venecia',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            401 => 
            array (
                'id' => 5873,
                'nombre' => 'Vigía Del Fuerte',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            402 => 
            array (
                'id' => 5885,
                'nombre' => 'Yalí',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            403 => 
            array (
                'id' => 5887,
                'nombre' => 'Yarumal',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            404 => 
            array (
                'id' => 5890,
                'nombre' => 'Yolombó',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            405 => 
            array (
                'id' => 5893,
                'nombre' => 'Yondó',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            406 => 
            array (
                'id' => 5895,
                'nombre' => 'Zaragoza',
                'tipo' => 'C',
                'padre_id' => 5,
            ),
            407 => 
            array (
                'id' => 8001,
                'nombre' => 'Barranquilla',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            408 => 
            array (
                'id' => 8078,
                'nombre' => 'Baranoa',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            409 => 
            array (
                'id' => 8137,
                'nombre' => 'Campo De La Cruz',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            410 => 
            array (
                'id' => 8141,
                'nombre' => 'Candelaria',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            411 => 
            array (
                'id' => 8296,
                'nombre' => 'Galapa',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            412 => 
            array (
                'id' => 8372,
                'nombre' => 'Juan De Acosta',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            413 => 
            array (
                'id' => 8421,
                'nombre' => 'Luruaco',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            414 => 
            array (
                'id' => 8433,
                'nombre' => 'Malambo',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            415 => 
            array (
                'id' => 8436,
                'nombre' => 'Manatí',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            416 => 
            array (
                'id' => 8520,
                'nombre' => 'Palmar De Varela',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            417 => 
            array (
                'id' => 8549,
                'nombre' => 'Piojó',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            418 => 
            array (
                'id' => 8558,
                'nombre' => 'Polonuevo',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            419 => 
            array (
                'id' => 8560,
                'nombre' => 'Ponedera',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            420 => 
            array (
                'id' => 8573,
                'nombre' => 'Puerto Colombia',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            421 => 
            array (
                'id' => 8606,
                'nombre' => 'Repelón',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            422 => 
            array (
                'id' => 8634,
                'nombre' => 'Sabanagrande',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            423 => 
            array (
                'id' => 8638,
                'nombre' => 'Sabanalarga',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            424 => 
            array (
                'id' => 8675,
                'nombre' => 'Santa Lucía',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            425 => 
            array (
                'id' => 8685,
                'nombre' => 'Santo Tomás',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            426 => 
            array (
                'id' => 8758,
                'nombre' => 'Soledad',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            427 => 
            array (
                'id' => 8770,
                'nombre' => 'Suan',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            428 => 
            array (
                'id' => 8832,
                'nombre' => 'Tubará',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            429 => 
            array (
                'id' => 8849,
                'nombre' => 'Usiacurí',
                'tipo' => 'C',
                'padre_id' => 8,
            ),
            430 => 
            array (
                'id' => 11001,
                'nombre' => 'Bogotá, D.C.',
                'tipo' => 'C',
                'padre_id' => 11,
            ),
            431 => 
            array (
                'id' => 13001,
                'nombre' => 'Cartagena De Indias',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            432 => 
            array (
                'id' => 13006,
                'nombre' => 'Achí',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            433 => 
            array (
                'id' => 13030,
                'nombre' => 'Altos Del Rosario',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            434 => 
            array (
                'id' => 13042,
                'nombre' => 'Arenal',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            435 => 
            array (
                'id' => 13052,
                'nombre' => 'Arjona',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            436 => 
            array (
                'id' => 13062,
                'nombre' => 'Arroyohondo',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            437 => 
            array (
                'id' => 13074,
                'nombre' => 'Barranco De Loba',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            438 => 
            array (
                'id' => 13140,
                'nombre' => 'Calamar',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            439 => 
            array (
                'id' => 13160,
                'nombre' => 'Cantagallo',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            440 => 
            array (
                'id' => 13188,
                'nombre' => 'Cicuco',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            441 => 
            array (
                'id' => 13212,
                'nombre' => 'Córdoba',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            442 => 
            array (
                'id' => 13222,
                'nombre' => 'Clemencia',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            443 => 
            array (
                'id' => 13244,
                'nombre' => 'El Carmen De Bolívar',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            444 => 
            array (
                'id' => 13248,
                'nombre' => 'El Guamo',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            445 => 
            array (
                'id' => 13268,
                'nombre' => 'El Peñón',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            446 => 
            array (
                'id' => 13300,
                'nombre' => 'Hatillo De Loba',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            447 => 
            array (
                'id' => 13430,
                'nombre' => 'Magangué',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            448 => 
            array (
                'id' => 13433,
                'nombre' => 'Mahates',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            449 => 
            array (
                'id' => 13440,
                'nombre' => 'Margarita',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            450 => 
            array (
                'id' => 13442,
                'nombre' => 'María La Baja',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            451 => 
            array (
                'id' => 13458,
                'nombre' => 'Montecristo',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            452 => 
            array (
                'id' => 13468,
                'nombre' => 'Mompós',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            453 => 
            array (
                'id' => 13473,
                'nombre' => 'Morales',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            454 => 
            array (
                'id' => 13490,
                'nombre' => 'Norosí',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            455 => 
            array (
                'id' => 13549,
                'nombre' => 'Pinillos',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            456 => 
            array (
                'id' => 13580,
                'nombre' => 'Regidor',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            457 => 
            array (
                'id' => 13600,
                'nombre' => 'Río Viejo',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            458 => 
            array (
                'id' => 13620,
                'nombre' => 'San Cristóbal',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            459 => 
            array (
                'id' => 13647,
                'nombre' => 'San Estanislao',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            460 => 
            array (
                'id' => 13650,
                'nombre' => 'San Fernando',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            461 => 
            array (
                'id' => 13654,
                'nombre' => 'San Jacinto',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            462 => 
            array (
                'id' => 13655,
                'nombre' => 'San Jacinto Del Cauca',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            463 => 
            array (
                'id' => 13657,
                'nombre' => 'San Juan Nepomuceno',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            464 => 
            array (
                'id' => 13667,
                'nombre' => 'San Martín De Loba',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            465 => 
            array (
                'id' => 13670,
                'nombre' => 'San Pablo',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            466 => 
            array (
                'id' => 13673,
                'nombre' => 'Santa Catalina',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            467 => 
            array (
                'id' => 13683,
                'nombre' => 'Santa Rosa',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            468 => 
            array (
                'id' => 13688,
                'nombre' => 'Santa Rosa Del Sur',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            469 => 
            array (
                'id' => 13744,
                'nombre' => 'Simití',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            470 => 
            array (
                'id' => 13760,
                'nombre' => 'Soplaviento',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            471 => 
            array (
                'id' => 13780,
                'nombre' => 'Talaigua Nuevo',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            472 => 
            array (
                'id' => 13810,
                'nombre' => 'Tiquisio',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            473 => 
            array (
                'id' => 13836,
                'nombre' => 'Turbaco',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            474 => 
            array (
                'id' => 13838,
                'nombre' => 'Turbaná',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            475 => 
            array (
                'id' => 13873,
                'nombre' => 'Villanueva',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            476 => 
            array (
                'id' => 13894,
                'nombre' => 'Zambrano',
                'tipo' => 'C',
                'padre_id' => 13,
            ),
            477 => 
            array (
                'id' => 15001,
                'nombre' => 'Tunja',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            478 => 
            array (
                'id' => 15022,
                'nombre' => 'Almeida',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            479 => 
            array (
                'id' => 15047,
                'nombre' => 'Aquitania',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            480 => 
            array (
                'id' => 15051,
                'nombre' => 'Arcabuco',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            481 => 
            array (
                'id' => 15087,
                'nombre' => 'Belén',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            482 => 
            array (
                'id' => 15090,
                'nombre' => 'Berbeo',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            483 => 
            array (
                'id' => 15092,
                'nombre' => 'Betéitiva',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            484 => 
            array (
                'id' => 15097,
                'nombre' => 'Boavita',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            485 => 
            array (
                'id' => 15104,
                'nombre' => 'Boyacá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            486 => 
            array (
                'id' => 15106,
                'nombre' => 'Briceño',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            487 => 
            array (
                'id' => 15109,
                'nombre' => 'Buenavista',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            488 => 
            array (
                'id' => 15114,
                'nombre' => 'Busbanzá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            489 => 
            array (
                'id' => 15131,
                'nombre' => 'Caldas',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            490 => 
            array (
                'id' => 15135,
                'nombre' => 'Campohermoso',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            491 => 
            array (
                'id' => 15162,
                'nombre' => 'Cerinza',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            492 => 
            array (
                'id' => 15172,
                'nombre' => 'Chinavita',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            493 => 
            array (
                'id' => 15176,
                'nombre' => 'Chiquinquirá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            494 => 
            array (
                'id' => 15180,
                'nombre' => 'Chiscas',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            495 => 
            array (
                'id' => 15183,
                'nombre' => 'Chita',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            496 => 
            array (
                'id' => 15185,
                'nombre' => 'Chitaraque',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            497 => 
            array (
                'id' => 15187,
                'nombre' => 'Chivatá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            498 => 
            array (
                'id' => 15189,
                'nombre' => 'Ciénega',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            499 => 
            array (
                'id' => 15204,
                'nombre' => 'Cómbita',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
        ));
        DB::table('lugar')->insert(array (
            0 => 
            array (
                'id' => 15212,
                'nombre' => 'Coper',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            1 => 
            array (
                'id' => 15215,
                'nombre' => 'Corrales',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            2 => 
            array (
                'id' => 15218,
                'nombre' => 'Covarachía',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            3 => 
            array (
                'id' => 15223,
                'nombre' => 'Cubará',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            4 => 
            array (
                'id' => 15224,
                'nombre' => 'Cucaita',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            5 => 
            array (
                'id' => 15226,
                'nombre' => 'Cuítiva',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            6 => 
            array (
                'id' => 15232,
                'nombre' => 'Chíquiza',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            7 => 
            array (
                'id' => 15236,
                'nombre' => 'Chivor',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            8 => 
            array (
                'id' => 15238,
                'nombre' => 'Duitama',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            9 => 
            array (
                'id' => 15244,
                'nombre' => 'El Cocuy',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            10 => 
            array (
                'id' => 15248,
                'nombre' => 'El Espino',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            11 => 
            array (
                'id' => 15272,
                'nombre' => 'Firavitoba',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            12 => 
            array (
                'id' => 15276,
                'nombre' => 'Floresta',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            13 => 
            array (
                'id' => 15293,
                'nombre' => 'Gachantivá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            14 => 
            array (
                'id' => 15296,
                'nombre' => 'Gámeza',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            15 => 
            array (
                'id' => 15299,
                'nombre' => 'Garagoa',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            16 => 
            array (
                'id' => 15317,
                'nombre' => 'Guacamayas',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            17 => 
            array (
                'id' => 15322,
                'nombre' => 'Guateque',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            18 => 
            array (
                'id' => 15325,
                'nombre' => 'Guayatá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            19 => 
            array (
                'id' => 15332,
                'nombre' => 'Güicán',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            20 => 
            array (
                'id' => 15362,
                'nombre' => 'Iza',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            21 => 
            array (
                'id' => 15367,
                'nombre' => 'Jenesano',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            22 => 
            array (
                'id' => 15368,
                'nombre' => 'Jericó',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            23 => 
            array (
                'id' => 15377,
                'nombre' => 'Labranzagrande',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            24 => 
            array (
                'id' => 15380,
                'nombre' => 'La Capilla',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            25 => 
            array (
                'id' => 15401,
                'nombre' => 'La Victoria',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            26 => 
            array (
                'id' => 15403,
                'nombre' => 'La Uvita',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            27 => 
            array (
                'id' => 15407,
                'nombre' => 'Villa De Leyva',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            28 => 
            array (
                'id' => 15425,
                'nombre' => 'Macanal',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            29 => 
            array (
                'id' => 15442,
                'nombre' => 'Maripí',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            30 => 
            array (
                'id' => 15455,
                'nombre' => 'Miraflores',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            31 => 
            array (
                'id' => 15464,
                'nombre' => 'Mongua',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            32 => 
            array (
                'id' => 15466,
                'nombre' => 'Monguí',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            33 => 
            array (
                'id' => 15469,
                'nombre' => 'Moniquirá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            34 => 
            array (
                'id' => 15476,
                'nombre' => 'Motavita',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            35 => 
            array (
                'id' => 15480,
                'nombre' => 'Muzo',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            36 => 
            array (
                'id' => 15491,
                'nombre' => 'Nobsa',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            37 => 
            array (
                'id' => 15494,
                'nombre' => 'Nuevo Colón',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            38 => 
            array (
                'id' => 15500,
                'nombre' => 'Oicatá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            39 => 
            array (
                'id' => 15507,
                'nombre' => 'Otanche',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            40 => 
            array (
                'id' => 15511,
                'nombre' => 'Pachavita',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            41 => 
            array (
                'id' => 15514,
                'nombre' => 'Páez',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            42 => 
            array (
                'id' => 15516,
                'nombre' => 'Paipa',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            43 => 
            array (
                'id' => 15518,
                'nombre' => 'Pajarito',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            44 => 
            array (
                'id' => 15522,
                'nombre' => 'Panqueba',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            45 => 
            array (
                'id' => 15531,
                'nombre' => 'Pauna',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            46 => 
            array (
                'id' => 15533,
                'nombre' => 'Paya',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            47 => 
            array (
                'id' => 15537,
                'nombre' => 'Paz De Río',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            48 => 
            array (
                'id' => 15542,
                'nombre' => 'Pesca',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            49 => 
            array (
                'id' => 15550,
                'nombre' => 'Pisba',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            50 => 
            array (
                'id' => 15572,
                'nombre' => 'Puerto Boyacá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            51 => 
            array (
                'id' => 15580,
                'nombre' => 'Quípama',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            52 => 
            array (
                'id' => 15599,
                'nombre' => 'Ramiriquí',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            53 => 
            array (
                'id' => 15600,
                'nombre' => 'Ráquira',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            54 => 
            array (
                'id' => 15621,
                'nombre' => 'Rondón',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            55 => 
            array (
                'id' => 15632,
                'nombre' => 'Saboyá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            56 => 
            array (
                'id' => 15638,
                'nombre' => 'Sáchica',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            57 => 
            array (
                'id' => 15646,
                'nombre' => 'Samacá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            58 => 
            array (
                'id' => 15660,
                'nombre' => 'San Eduardo',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            59 => 
            array (
                'id' => 15664,
                'nombre' => 'San José De Pare',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            60 => 
            array (
                'id' => 15667,
                'nombre' => 'San Luis De Gaceno',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            61 => 
            array (
                'id' => 15673,
                'nombre' => 'San Mateo',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            62 => 
            array (
                'id' => 15676,
                'nombre' => 'San Miguel De Sema',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            63 => 
            array (
                'id' => 15681,
                'nombre' => 'San Pablo De Borbur',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            64 => 
            array (
                'id' => 15686,
                'nombre' => 'Santana',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            65 => 
            array (
                'id' => 15690,
                'nombre' => 'Santa María',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            66 => 
            array (
                'id' => 15693,
                'nombre' => 'Santa Rosa De Viterbo',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            67 => 
            array (
                'id' => 15696,
                'nombre' => 'Santa Sofía',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            68 => 
            array (
                'id' => 15720,
                'nombre' => 'Sativanorte',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            69 => 
            array (
                'id' => 15723,
                'nombre' => 'Sativasur',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            70 => 
            array (
                'id' => 15740,
                'nombre' => 'Siachoque',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            71 => 
            array (
                'id' => 15753,
                'nombre' => 'Soatá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            72 => 
            array (
                'id' => 15755,
                'nombre' => 'Socotá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            73 => 
            array (
                'id' => 15757,
                'nombre' => 'Socha',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            74 => 
            array (
                'id' => 15759,
                'nombre' => 'Sogamoso',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            75 => 
            array (
                'id' => 15761,
                'nombre' => 'Somondoco',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            76 => 
            array (
                'id' => 15762,
                'nombre' => 'Sora',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            77 => 
            array (
                'id' => 15763,
                'nombre' => 'Sotaquirá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            78 => 
            array (
                'id' => 15764,
                'nombre' => 'Soracá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            79 => 
            array (
                'id' => 15774,
                'nombre' => 'Susacón',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            80 => 
            array (
                'id' => 15776,
                'nombre' => 'Sutamarchán',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            81 => 
            array (
                'id' => 15778,
                'nombre' => 'Sutatenza',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            82 => 
            array (
                'id' => 15790,
                'nombre' => 'Tasco',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            83 => 
            array (
                'id' => 15798,
                'nombre' => 'Tenza',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            84 => 
            array (
                'id' => 15804,
                'nombre' => 'Tibaná',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            85 => 
            array (
                'id' => 15806,
                'nombre' => 'Tibasosa',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            86 => 
            array (
                'id' => 15808,
                'nombre' => 'Tinjacá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            87 => 
            array (
                'id' => 15810,
                'nombre' => 'Tipacoque',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            88 => 
            array (
                'id' => 15814,
                'nombre' => 'Toca',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            89 => 
            array (
                'id' => 15816,
                'nombre' => 'Togüí',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            90 => 
            array (
                'id' => 15820,
                'nombre' => 'Tópaga',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            91 => 
            array (
                'id' => 15822,
                'nombre' => 'Tota',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            92 => 
            array (
                'id' => 15832,
                'nombre' => 'Tununguá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            93 => 
            array (
                'id' => 15835,
                'nombre' => 'Turmequé',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            94 => 
            array (
                'id' => 15837,
                'nombre' => 'Tuta',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            95 => 
            array (
                'id' => 15839,
                'nombre' => 'Tutazá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            96 => 
            array (
                'id' => 15842,
                'nombre' => 'Úmbita',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            97 => 
            array (
                'id' => 15861,
                'nombre' => 'Ventaquemada',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            98 => 
            array (
                'id' => 15879,
                'nombre' => 'Viracachá',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            99 => 
            array (
                'id' => 15897,
                'nombre' => 'Zetaquira',
                'tipo' => 'C',
                'padre_id' => 15,
            ),
            100 => 
            array (
                'id' => 17001,
                'nombre' => 'Manizales',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            101 => 
            array (
                'id' => 17013,
                'nombre' => 'Aguadas',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            102 => 
            array (
                'id' => 17042,
                'nombre' => 'Anserma',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            103 => 
            array (
                'id' => 17050,
                'nombre' => 'Aranzazu',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            104 => 
            array (
                'id' => 17088,
                'nombre' => 'Belalcázar',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            105 => 
            array (
                'id' => 17174,
                'nombre' => 'Chinchiná',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            106 => 
            array (
                'id' => 17272,
                'nombre' => 'Filadelfia',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            107 => 
            array (
                'id' => 17380,
                'nombre' => 'La Dorada',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            108 => 
            array (
                'id' => 17388,
                'nombre' => 'La Merced',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            109 => 
            array (
                'id' => 17433,
                'nombre' => 'Manzanares',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            110 => 
            array (
                'id' => 17442,
                'nombre' => 'Marmato',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            111 => 
            array (
                'id' => 17444,
                'nombre' => 'Marquetalia',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            112 => 
            array (
                'id' => 17446,
                'nombre' => 'Marulanda',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            113 => 
            array (
                'id' => 17486,
                'nombre' => 'Neira',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            114 => 
            array (
                'id' => 17495,
                'nombre' => 'Norcasia',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            115 => 
            array (
                'id' => 17513,
                'nombre' => 'Pácora',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            116 => 
            array (
                'id' => 17524,
                'nombre' => 'Palestina',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            117 => 
            array (
                'id' => 17541,
                'nombre' => 'Pensilvania',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            118 => 
            array (
                'id' => 17614,
                'nombre' => 'Riosucio',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            119 => 
            array (
                'id' => 17616,
                'nombre' => 'Risaralda',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            120 => 
            array (
                'id' => 17653,
                'nombre' => 'Salamina',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            121 => 
            array (
                'id' => 17662,
                'nombre' => 'Samaná',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            122 => 
            array (
                'id' => 17665,
                'nombre' => 'San José',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            123 => 
            array (
                'id' => 17777,
                'nombre' => 'Supía',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            124 => 
            array (
                'id' => 17867,
                'nombre' => 'Victoria',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            125 => 
            array (
                'id' => 17873,
                'nombre' => 'Villamaría',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            126 => 
            array (
                'id' => 17877,
                'nombre' => 'Viterbo',
                'tipo' => 'C',
                'padre_id' => 17,
            ),
            127 => 
            array (
                'id' => 18001,
                'nombre' => 'Florencia',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            128 => 
            array (
                'id' => 18029,
                'nombre' => 'Albania',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            129 => 
            array (
                'id' => 18094,
                'nombre' => 'Belén De Los Andaquíes',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            130 => 
            array (
                'id' => 18150,
                'nombre' => 'Cartagena Del Chairá',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            131 => 
            array (
                'id' => 18205,
                'nombre' => 'Curillo',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            132 => 
            array (
                'id' => 18247,
                'nombre' => 'El Doncello',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            133 => 
            array (
                'id' => 18256,
                'nombre' => 'El Paujíl',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            134 => 
            array (
                'id' => 18410,
                'nombre' => 'La Montañita',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            135 => 
            array (
                'id' => 18460,
                'nombre' => 'Milán',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            136 => 
            array (
                'id' => 18479,
                'nombre' => 'Morelia',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            137 => 
            array (
                'id' => 18592,
                'nombre' => 'Puerto Rico',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            138 => 
            array (
                'id' => 18610,
                'nombre' => 'San José Del Fragua',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            139 => 
            array (
                'id' => 18753,
                'nombre' => 'San Vicente Del Caguán',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            140 => 
            array (
                'id' => 18756,
                'nombre' => 'Solano',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            141 => 
            array (
                'id' => 18785,
                'nombre' => 'Solita',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            142 => 
            array (
                'id' => 18860,
                'nombre' => 'Valparaíso',
                'tipo' => 'C',
                'padre_id' => 18,
            ),
            143 => 
            array (
                'id' => 19001,
                'nombre' => 'Popayán',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            144 => 
            array (
                'id' => 19022,
                'nombre' => 'Almaguer',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            145 => 
            array (
                'id' => 19050,
                'nombre' => 'Argelia',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            146 => 
            array (
                'id' => 19075,
                'nombre' => 'Balboa',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            147 => 
            array (
                'id' => 19100,
                'nombre' => 'Bolívar',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            148 => 
            array (
                'id' => 19110,
                'nombre' => 'Buenos Aires',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            149 => 
            array (
                'id' => 19130,
                'nombre' => 'Cajibío',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            150 => 
            array (
                'id' => 19137,
                'nombre' => 'Caldono',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            151 => 
            array (
                'id' => 19142,
                'nombre' => 'Caloto',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            152 => 
            array (
                'id' => 19212,
                'nombre' => 'Corinto',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            153 => 
            array (
                'id' => 19256,
                'nombre' => 'El Tambo',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            154 => 
            array (
                'id' => 19290,
                'nombre' => 'Florencia',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            155 => 
            array (
                'id' => 19300,
                'nombre' => 'Guachené',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            156 => 
            array (
                'id' => 19318,
                'nombre' => 'Guapí',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            157 => 
            array (
                'id' => 19355,
                'nombre' => 'Inzá',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            158 => 
            array (
                'id' => 19364,
                'nombre' => 'Jambaló',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            159 => 
            array (
                'id' => 19392,
                'nombre' => 'La Sierra',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            160 => 
            array (
                'id' => 19397,
                'nombre' => 'La Vega',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            161 => 
            array (
                'id' => 19418,
                'nombre' => 'López De Micay',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            162 => 
            array (
                'id' => 19450,
                'nombre' => 'Mercaderes',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            163 => 
            array (
                'id' => 19455,
                'nombre' => 'Miranda',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            164 => 
            array (
                'id' => 19473,
                'nombre' => 'Morales',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            165 => 
            array (
                'id' => 19513,
                'nombre' => 'Padilla',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            166 => 
            array (
                'id' => 19517,
                'nombre' => 'Páez',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            167 => 
            array (
                'id' => 19532,
                'nombre' => 'Patía',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            168 => 
            array (
                'id' => 19533,
                'nombre' => 'Piamonte',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            169 => 
            array (
                'id' => 19548,
                'nombre' => 'Piendamó',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            170 => 
            array (
                'id' => 19573,
                'nombre' => 'Puerto Tejada',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            171 => 
            array (
                'id' => 19585,
                'nombre' => 'Puracé',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            172 => 
            array (
                'id' => 19622,
                'nombre' => 'Rosas',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            173 => 
            array (
                'id' => 19693,
                'nombre' => 'San Sebastián',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            174 => 
            array (
                'id' => 19698,
                'nombre' => 'Santander De Quilichao',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            175 => 
            array (
                'id' => 19701,
                'nombre' => 'Santa Rosa',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            176 => 
            array (
                'id' => 19743,
                'nombre' => 'Silvia',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            177 => 
            array (
                'id' => 19760,
                'nombre' => 'Sotara',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            178 => 
            array (
                'id' => 19780,
                'nombre' => 'Suárez',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            179 => 
            array (
                'id' => 19785,
                'nombre' => 'Sucre',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            180 => 
            array (
                'id' => 19807,
                'nombre' => 'Timbío',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            181 => 
            array (
                'id' => 19809,
                'nombre' => 'Timbiquí',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            182 => 
            array (
                'id' => 19821,
                'nombre' => 'Toribío',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            183 => 
            array (
                'id' => 19824,
                'nombre' => 'Totoró',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            184 => 
            array (
                'id' => 19845,
                'nombre' => 'Villa Rica',
                'tipo' => 'C',
                'padre_id' => 19,
            ),
            185 => 
            array (
                'id' => 20001,
                'nombre' => 'Valledupar',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            186 => 
            array (
                'id' => 20011,
                'nombre' => 'Aguachica',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            187 => 
            array (
                'id' => 20013,
                'nombre' => 'Agustín Codazzi',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            188 => 
            array (
                'id' => 20032,
                'nombre' => 'Astrea',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            189 => 
            array (
                'id' => 20045,
                'nombre' => 'Becerril',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            190 => 
            array (
                'id' => 20060,
                'nombre' => 'Bosconia',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            191 => 
            array (
                'id' => 20175,
                'nombre' => 'Chimichagua',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            192 => 
            array (
                'id' => 20178,
                'nombre' => 'Chiriguaná',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            193 => 
            array (
                'id' => 20228,
                'nombre' => 'Curumaní',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            194 => 
            array (
                'id' => 20238,
                'nombre' => 'El Copey',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            195 => 
            array (
                'id' => 20250,
                'nombre' => 'El Paso',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            196 => 
            array (
                'id' => 20295,
                'nombre' => 'Gamarra',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            197 => 
            array (
                'id' => 20310,
                'nombre' => 'González',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            198 => 
            array (
                'id' => 20383,
                'nombre' => 'La Gloria',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            199 => 
            array (
                'id' => 20400,
                'nombre' => 'La Jagua De Ibirico',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            200 => 
            array (
                'id' => 20443,
                'nombre' => 'Manaure Balcón Del Cesar',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            201 => 
            array (
                'id' => 20517,
                'nombre' => 'Pailitas',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            202 => 
            array (
                'id' => 20550,
                'nombre' => 'Pelaya',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            203 => 
            array (
                'id' => 20570,
                'nombre' => 'Pueblo Bello',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            204 => 
            array (
                'id' => 20614,
                'nombre' => 'Río De Oro',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            205 => 
            array (
                'id' => 20621,
                'nombre' => 'La Paz',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            206 => 
            array (
                'id' => 20710,
                'nombre' => 'San Alberto',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            207 => 
            array (
                'id' => 20750,
                'nombre' => 'San Diego',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            208 => 
            array (
                'id' => 20770,
                'nombre' => 'San Martín',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            209 => 
            array (
                'id' => 20787,
                'nombre' => 'Tamalameque',
                'tipo' => 'C',
                'padre_id' => 20,
            ),
            210 => 
            array (
                'id' => 23001,
                'nombre' => 'Montería',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            211 => 
            array (
                'id' => 23068,
                'nombre' => 'Ayapel',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            212 => 
            array (
                'id' => 23079,
                'nombre' => 'Buenavista',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            213 => 
            array (
                'id' => 23090,
                'nombre' => 'Canalete',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            214 => 
            array (
                'id' => 23162,
                'nombre' => 'Cereté',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            215 => 
            array (
                'id' => 23168,
                'nombre' => 'Chimá',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            216 => 
            array (
                'id' => 23182,
                'nombre' => 'Chinú',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            217 => 
            array (
                'id' => 23189,
                'nombre' => 'Ciénaga De Oro',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            218 => 
            array (
                'id' => 23300,
                'nombre' => 'Cotorra',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            219 => 
            array (
                'id' => 23350,
                'nombre' => 'La Apartada',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            220 => 
            array (
                'id' => 23417,
                'nombre' => 'Lorica',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            221 => 
            array (
                'id' => 23419,
                'nombre' => 'Los Córdobas',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            222 => 
            array (
                'id' => 23464,
                'nombre' => 'Momil',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            223 => 
            array (
                'id' => 23466,
                'nombre' => 'Montelíbano',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            224 => 
            array (
                'id' => 23500,
                'nombre' => 'Moñitos',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            225 => 
            array (
                'id' => 23555,
                'nombre' => 'Planeta Rica',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            226 => 
            array (
                'id' => 23570,
                'nombre' => 'Pueblo Nuevo',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            227 => 
            array (
                'id' => 23574,
                'nombre' => 'Puerto Escondido',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            228 => 
            array (
                'id' => 23580,
                'nombre' => 'Puerto Libertador',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            229 => 
            array (
                'id' => 23586,
                'nombre' => 'Purísima De La Concepción',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            230 => 
            array (
                'id' => 23660,
                'nombre' => 'Sahagún',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            231 => 
            array (
                'id' => 23670,
                'nombre' => 'San Andrés De Sotavento',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            232 => 
            array (
                'id' => 23672,
                'nombre' => 'San Antero',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            233 => 
            array (
                'id' => 23675,
                'nombre' => 'San Bernardo Del Viento',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            234 => 
            array (
                'id' => 23678,
                'nombre' => 'San Carlos',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            235 => 
            array (
                'id' => 23682,
                'nombre' => 'San José De Uré',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            236 => 
            array (
                'id' => 23686,
                'nombre' => 'San Pelayo',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            237 => 
            array (
                'id' => 23807,
                'nombre' => 'Tierralta',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            238 => 
            array (
                'id' => 23815,
                'nombre' => 'Tuchín',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            239 => 
            array (
                'id' => 23855,
                'nombre' => 'Valencia',
                'tipo' => 'C',
                'padre_id' => 23,
            ),
            240 => 
            array (
                'id' => 25001,
                'nombre' => 'Agua De Dios',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            241 => 
            array (
                'id' => 25019,
                'nombre' => 'Albán',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            242 => 
            array (
                'id' => 25035,
                'nombre' => 'Anapoima',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            243 => 
            array (
                'id' => 25040,
                'nombre' => 'Anolaima',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            244 => 
            array (
                'id' => 25053,
                'nombre' => 'Arbeláez',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            245 => 
            array (
                'id' => 25086,
                'nombre' => 'Beltrán',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            246 => 
            array (
                'id' => 25095,
                'nombre' => 'Bituima',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            247 => 
            array (
                'id' => 25099,
                'nombre' => 'Bojacá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            248 => 
            array (
                'id' => 25120,
                'nombre' => 'Cabrera',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            249 => 
            array (
                'id' => 25123,
                'nombre' => 'Cachipay',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            250 => 
            array (
                'id' => 25126,
                'nombre' => 'Cajicá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            251 => 
            array (
                'id' => 25148,
                'nombre' => 'Caparrapí',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            252 => 
            array (
                'id' => 25151,
                'nombre' => 'Cáqueza',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            253 => 
            array (
                'id' => 25154,
                'nombre' => 'Carmen De Carupa',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            254 => 
            array (
                'id' => 25168,
                'nombre' => 'Chaguaní',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            255 => 
            array (
                'id' => 25175,
                'nombre' => 'Chía',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            256 => 
            array (
                'id' => 25178,
                'nombre' => 'Chipaque',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            257 => 
            array (
                'id' => 25181,
                'nombre' => 'Choachí',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            258 => 
            array (
                'id' => 25183,
                'nombre' => 'Chocontá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            259 => 
            array (
                'id' => 25200,
                'nombre' => 'Cogua',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            260 => 
            array (
                'id' => 25214,
                'nombre' => 'Cota',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            261 => 
            array (
                'id' => 25224,
                'nombre' => 'Cucunubá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            262 => 
            array (
                'id' => 25245,
                'nombre' => 'El Colegio',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            263 => 
            array (
                'id' => 25258,
                'nombre' => 'El Peñón',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            264 => 
            array (
                'id' => 25260,
                'nombre' => 'El Rosal',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            265 => 
            array (
                'id' => 25269,
                'nombre' => 'Facatativá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            266 => 
            array (
                'id' => 25279,
                'nombre' => 'Fómeque',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            267 => 
            array (
                'id' => 25281,
                'nombre' => 'Fosca',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            268 => 
            array (
                'id' => 25286,
                'nombre' => 'Funza',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            269 => 
            array (
                'id' => 25288,
                'nombre' => 'Fúquene',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            270 => 
            array (
                'id' => 25290,
                'nombre' => 'Fusagasugá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            271 => 
            array (
                'id' => 25293,
                'nombre' => 'Gachalá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            272 => 
            array (
                'id' => 25295,
                'nombre' => 'Gachancipá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            273 => 
            array (
                'id' => 25297,
                'nombre' => 'Gachetá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            274 => 
            array (
                'id' => 25299,
                'nombre' => 'Gama',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            275 => 
            array (
                'id' => 25307,
                'nombre' => 'Girardot',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            276 => 
            array (
                'id' => 25312,
                'nombre' => 'Granada',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            277 => 
            array (
                'id' => 25317,
                'nombre' => 'Guachetá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            278 => 
            array (
                'id' => 25320,
                'nombre' => 'Guaduas',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            279 => 
            array (
                'id' => 25322,
                'nombre' => 'Guasca',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            280 => 
            array (
                'id' => 25324,
                'nombre' => 'Guataquí',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            281 => 
            array (
                'id' => 25326,
                'nombre' => 'Guatavita',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            282 => 
            array (
                'id' => 25328,
                'nombre' => 'Guayabal De Síquima',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            283 => 
            array (
                'id' => 25335,
                'nombre' => 'Guayabetal',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            284 => 
            array (
                'id' => 25339,
                'nombre' => 'Gutiérrez',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            285 => 
            array (
                'id' => 25368,
                'nombre' => 'Jerusalén',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            286 => 
            array (
                'id' => 25372,
                'nombre' => 'Junín',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            287 => 
            array (
                'id' => 25377,
                'nombre' => 'La Calera',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            288 => 
            array (
                'id' => 25386,
                'nombre' => 'La Mesa',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            289 => 
            array (
                'id' => 25394,
                'nombre' => 'La Palma',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            290 => 
            array (
                'id' => 25398,
                'nombre' => 'La Peña',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            291 => 
            array (
                'id' => 25402,
                'nombre' => 'La Vega',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            292 => 
            array (
                'id' => 25407,
                'nombre' => 'Lenguazaque',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            293 => 
            array (
                'id' => 25426,
                'nombre' => 'Machetá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            294 => 
            array (
                'id' => 25430,
                'nombre' => 'Madrid',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            295 => 
            array (
                'id' => 25436,
                'nombre' => 'Manta',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            296 => 
            array (
                'id' => 25438,
                'nombre' => 'Medina',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            297 => 
            array (
                'id' => 25473,
                'nombre' => 'Mosquera',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            298 => 
            array (
                'id' => 25483,
                'nombre' => 'Nariño',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            299 => 
            array (
                'id' => 25486,
                'nombre' => 'Nemocón',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            300 => 
            array (
                'id' => 25488,
                'nombre' => 'Nilo',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            301 => 
            array (
                'id' => 25489,
                'nombre' => 'Nimaima',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            302 => 
            array (
                'id' => 25491,
                'nombre' => 'Nocaima',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            303 => 
            array (
                'id' => 25506,
                'nombre' => 'Venecia',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            304 => 
            array (
                'id' => 25513,
                'nombre' => 'Pacho',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            305 => 
            array (
                'id' => 25518,
                'nombre' => 'Paime',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            306 => 
            array (
                'id' => 25524,
                'nombre' => 'Pandi',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            307 => 
            array (
                'id' => 25530,
                'nombre' => 'Paratebueno',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            308 => 
            array (
                'id' => 25535,
                'nombre' => 'Pasca',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            309 => 
            array (
                'id' => 25572,
                'nombre' => 'Puerto Salgar',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            310 => 
            array (
                'id' => 25580,
                'nombre' => 'Pulí',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            311 => 
            array (
                'id' => 25592,
                'nombre' => 'Quebradanegra',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            312 => 
            array (
                'id' => 25594,
                'nombre' => 'Quetame',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            313 => 
            array (
                'id' => 25596,
                'nombre' => 'Quipile',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            314 => 
            array (
                'id' => 25599,
                'nombre' => 'Apulo',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            315 => 
            array (
                'id' => 25612,
                'nombre' => 'Ricaurte',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            316 => 
            array (
                'id' => 25645,
                'nombre' => 'San Antonio Del Tequendama',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            317 => 
            array (
                'id' => 25649,
                'nombre' => 'San Bernardo',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            318 => 
            array (
                'id' => 25653,
                'nombre' => 'San Cayetano',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            319 => 
            array (
                'id' => 25658,
                'nombre' => 'San Francisco',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            320 => 
            array (
                'id' => 25662,
                'nombre' => 'San Juan De Rioseco',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            321 => 
            array (
                'id' => 25718,
                'nombre' => 'Sasaima',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            322 => 
            array (
                'id' => 25736,
                'nombre' => 'Sesquilé',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            323 => 
            array (
                'id' => 25740,
                'nombre' => 'Sibaté',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            324 => 
            array (
                'id' => 25743,
                'nombre' => 'Silvania',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            325 => 
            array (
                'id' => 25745,
                'nombre' => 'Simijaca',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            326 => 
            array (
                'id' => 25754,
                'nombre' => 'Soacha',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            327 => 
            array (
                'id' => 25758,
                'nombre' => 'Sopó',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            328 => 
            array (
                'id' => 25769,
                'nombre' => 'Subachoque',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            329 => 
            array (
                'id' => 25772,
                'nombre' => 'Suesca',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            330 => 
            array (
                'id' => 25777,
                'nombre' => 'Supatá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            331 => 
            array (
                'id' => 25779,
                'nombre' => 'Susa',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            332 => 
            array (
                'id' => 25781,
                'nombre' => 'Sutatausa',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            333 => 
            array (
                'id' => 25785,
                'nombre' => 'Tabio',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            334 => 
            array (
                'id' => 25793,
                'nombre' => 'Tausa',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            335 => 
            array (
                'id' => 25797,
                'nombre' => 'Tena',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            336 => 
            array (
                'id' => 25799,
                'nombre' => 'Tenjo',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            337 => 
            array (
                'id' => 25805,
                'nombre' => 'Tibacuy',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            338 => 
            array (
                'id' => 25807,
                'nombre' => 'Tibirita',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            339 => 
            array (
                'id' => 25815,
                'nombre' => 'Tocaima',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            340 => 
            array (
                'id' => 25817,
                'nombre' => 'Tocancipá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            341 => 
            array (
                'id' => 25823,
                'nombre' => 'Topaipí',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            342 => 
            array (
                'id' => 25839,
                'nombre' => 'Ubalá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            343 => 
            array (
                'id' => 25841,
                'nombre' => 'Ubaque',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            344 => 
            array (
                'id' => 25843,
                'nombre' => 'Villa De San Diego De Ubaté',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            345 => 
            array (
                'id' => 25845,
                'nombre' => 'Une',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            346 => 
            array (
                'id' => 25851,
                'nombre' => 'Útica',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            347 => 
            array (
                'id' => 25862,
                'nombre' => 'Vergara',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            348 => 
            array (
                'id' => 25867,
                'nombre' => 'Vianí',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            349 => 
            array (
                'id' => 25871,
                'nombre' => 'Villagómez',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            350 => 
            array (
                'id' => 25873,
                'nombre' => 'Villapinzón',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            351 => 
            array (
                'id' => 25875,
                'nombre' => 'Villeta',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            352 => 
            array (
                'id' => 25878,
                'nombre' => 'Viotá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            353 => 
            array (
                'id' => 25885,
                'nombre' => 'Yacopí',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            354 => 
            array (
                'id' => 25898,
                'nombre' => 'Zipacón',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            355 => 
            array (
                'id' => 25899,
                'nombre' => 'Zipaquirá',
                'tipo' => 'C',
                'padre_id' => 25,
            ),
            356 => 
            array (
                'id' => 27001,
                'nombre' => 'Quibdó',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            357 => 
            array (
                'id' => 27006,
                'nombre' => 'Acandí',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            358 => 
            array (
                'id' => 27025,
                'nombre' => 'Alto Baudó',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            359 => 
            array (
                'id' => 27050,
                'nombre' => 'Atrato',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            360 => 
            array (
                'id' => 27073,
                'nombre' => 'Bagadó',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            361 => 
            array (
                'id' => 27075,
                'nombre' => 'Bahía Solano',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            362 => 
            array (
                'id' => 27077,
                'nombre' => 'Bajo Baudó',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            363 => 
            array (
                'id' => 27099,
                'nombre' => 'Bojayá',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            364 => 
            array (
                'id' => 27135,
                'nombre' => 'El Cantón Del San Pablo',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            365 => 
            array (
                'id' => 27150,
                'nombre' => 'Carmen Del Darién',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            366 => 
            array (
                'id' => 27160,
                'nombre' => 'Cértegui',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            367 => 
            array (
                'id' => 27205,
                'nombre' => 'Condoto',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            368 => 
            array (
                'id' => 27245,
                'nombre' => 'El Carmen De Atrato',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            369 => 
            array (
                'id' => 27250,
                'nombre' => 'El Litoral Del San Juan',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            370 => 
            array (
                'id' => 27361,
                'nombre' => 'Istmina',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            371 => 
            array (
                'id' => 27372,
                'nombre' => 'Juradó',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            372 => 
            array (
                'id' => 27413,
                'nombre' => 'Lloró',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            373 => 
            array (
                'id' => 27425,
                'nombre' => 'Medio Atrato',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            374 => 
            array (
                'id' => 27430,
                'nombre' => 'Medio Baudó',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            375 => 
            array (
                'id' => 27450,
                'nombre' => 'Medio San Juan',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            376 => 
            array (
                'id' => 27491,
                'nombre' => 'Nóvita',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            377 => 
            array (
                'id' => 27495,
                'nombre' => 'Nuquí',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            378 => 
            array (
                'id' => 27580,
                'nombre' => 'Río Iró',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            379 => 
            array (
                'id' => 27600,
                'nombre' => 'Río Quito',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            380 => 
            array (
                'id' => 27615,
                'nombre' => 'Riosucio',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            381 => 
            array (
                'id' => 27660,
                'nombre' => 'San José Del Palmar',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            382 => 
            array (
                'id' => 27745,
                'nombre' => 'Sipí',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            383 => 
            array (
                'id' => 27787,
                'nombre' => 'Tadó',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            384 => 
            array (
                'id' => 27800,
                'nombre' => 'Unguía',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            385 => 
            array (
                'id' => 27810,
                'nombre' => 'Unión Panamericana',
                'tipo' => 'C',
                'padre_id' => 27,
            ),
            386 => 
            array (
                'id' => 41001,
                'nombre' => 'Neiva',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            387 => 
            array (
                'id' => 41006,
                'nombre' => 'Acevedo',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            388 => 
            array (
                'id' => 41013,
                'nombre' => 'Agrado',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            389 => 
            array (
                'id' => 41016,
                'nombre' => 'Aipe',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            390 => 
            array (
                'id' => 41020,
                'nombre' => 'Algeciras',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            391 => 
            array (
                'id' => 41026,
                'nombre' => 'Altamira',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            392 => 
            array (
                'id' => 41078,
                'nombre' => 'Baraya',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            393 => 
            array (
                'id' => 41132,
                'nombre' => 'Campoalegre',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            394 => 
            array (
                'id' => 41206,
                'nombre' => 'Colombia',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            395 => 
            array (
                'id' => 41244,
                'nombre' => 'Elías',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            396 => 
            array (
                'id' => 41298,
                'nombre' => 'Garzón',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            397 => 
            array (
                'id' => 41306,
                'nombre' => 'Gigante',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            398 => 
            array (
                'id' => 41319,
                'nombre' => 'Guadalupe',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            399 => 
            array (
                'id' => 41349,
                'nombre' => 'Hobo',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            400 => 
            array (
                'id' => 41357,
                'nombre' => 'Íquira',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            401 => 
            array (
                'id' => 41359,
                'nombre' => 'Isnos',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            402 => 
            array (
                'id' => 41378,
                'nombre' => 'La Argentina',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            403 => 
            array (
                'id' => 41396,
                'nombre' => 'La Plata',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            404 => 
            array (
                'id' => 41483,
                'nombre' => 'Nátaga',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            405 => 
            array (
                'id' => 41503,
                'nombre' => 'Oporapa',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            406 => 
            array (
                'id' => 41518,
                'nombre' => 'Paicol',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            407 => 
            array (
                'id' => 41524,
                'nombre' => 'Palermo',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            408 => 
            array (
                'id' => 41530,
                'nombre' => 'Palestina',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            409 => 
            array (
                'id' => 41548,
                'nombre' => 'Pital',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            410 => 
            array (
                'id' => 41551,
                'nombre' => 'Pitalito',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            411 => 
            array (
                'id' => 41615,
                'nombre' => 'Rivera',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            412 => 
            array (
                'id' => 41660,
                'nombre' => 'Saladoblanco',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            413 => 
            array (
                'id' => 41668,
                'nombre' => 'San Agustín',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            414 => 
            array (
                'id' => 41676,
                'nombre' => 'Santa María',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            415 => 
            array (
                'id' => 41770,
                'nombre' => 'Suaza',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            416 => 
            array (
                'id' => 41791,
                'nombre' => 'Tarqui',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            417 => 
            array (
                'id' => 41797,
                'nombre' => 'Tesalia',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            418 => 
            array (
                'id' => 41799,
                'nombre' => 'Tello',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            419 => 
            array (
                'id' => 41801,
                'nombre' => 'Teruel',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            420 => 
            array (
                'id' => 41807,
                'nombre' => 'Timaná',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            421 => 
            array (
                'id' => 41872,
                'nombre' => 'Villavieja',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            422 => 
            array (
                'id' => 41885,
                'nombre' => 'Yaguará',
                'tipo' => 'C',
                'padre_id' => 41,
            ),
            423 => 
            array (
                'id' => 44001,
                'nombre' => 'Riohacha',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            424 => 
            array (
                'id' => 44035,
                'nombre' => 'Albania',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            425 => 
            array (
                'id' => 44078,
                'nombre' => 'Barrancas',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            426 => 
            array (
                'id' => 44090,
                'nombre' => 'Dibulla',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            427 => 
            array (
                'id' => 44098,
                'nombre' => 'Distracción',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            428 => 
            array (
                'id' => 44110,
                'nombre' => 'El Molino',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            429 => 
            array (
                'id' => 44279,
                'nombre' => 'Fonseca',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            430 => 
            array (
                'id' => 44378,
                'nombre' => 'Hatonuevo',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            431 => 
            array (
                'id' => 44420,
                'nombre' => 'La Jagua Del Pilar',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            432 => 
            array (
                'id' => 44430,
                'nombre' => 'Maicao',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            433 => 
            array (
                'id' => 44560,
                'nombre' => 'Manaure',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            434 => 
            array (
                'id' => 44650,
                'nombre' => 'San Juan Del Cesar',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            435 => 
            array (
                'id' => 44847,
                'nombre' => 'Uribia',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            436 => 
            array (
                'id' => 44855,
                'nombre' => 'Urumita',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            437 => 
            array (
                'id' => 44874,
                'nombre' => 'Villanueva',
                'tipo' => 'C',
                'padre_id' => 44,
            ),
            438 => 
            array (
                'id' => 47001,
                'nombre' => 'Santa Marta',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            439 => 
            array (
                'id' => 47030,
                'nombre' => 'Algarrobo',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            440 => 
            array (
                'id' => 47053,
                'nombre' => 'Aracataca',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            441 => 
            array (
                'id' => 47058,
                'nombre' => 'Ariguaní',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            442 => 
            array (
                'id' => 47161,
                'nombre' => 'Cerro De San Antonio',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            443 => 
            array (
                'id' => 47170,
                'nombre' => 'Chivolo',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            444 => 
            array (
                'id' => 47189,
                'nombre' => 'Ciénaga',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            445 => 
            array (
                'id' => 47205,
                'nombre' => 'Concordia',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            446 => 
            array (
                'id' => 47245,
                'nombre' => 'El Banco',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            447 => 
            array (
                'id' => 47258,
                'nombre' => 'El Piñón',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            448 => 
            array (
                'id' => 47268,
                'nombre' => 'El Retén',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            449 => 
            array (
                'id' => 47288,
                'nombre' => 'Fundación',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            450 => 
            array (
                'id' => 47318,
                'nombre' => 'Guamal',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            451 => 
            array (
                'id' => 47460,
                'nombre' => 'Nueva Granada',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            452 => 
            array (
                'id' => 47541,
                'nombre' => 'Pedraza',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            453 => 
            array (
                'id' => 47545,
                'nombre' => 'Pijiño Del Carmen',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            454 => 
            array (
                'id' => 47551,
                'nombre' => 'Pivijay',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            455 => 
            array (
                'id' => 47555,
                'nombre' => 'Plato',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            456 => 
            array (
                'id' => 47570,
                'nombre' => 'Puebloviejo',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            457 => 
            array (
                'id' => 47605,
                'nombre' => 'Remolino',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            458 => 
            array (
                'id' => 47660,
                'nombre' => 'Sabanas De San Ángel',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            459 => 
            array (
                'id' => 47675,
                'nombre' => 'Salamina',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            460 => 
            array (
                'id' => 47692,
                'nombre' => 'San Sebastián De Buenavista',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            461 => 
            array (
                'id' => 47703,
                'nombre' => 'San Zenón',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            462 => 
            array (
                'id' => 47707,
                'nombre' => 'Santa Ana',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            463 => 
            array (
                'id' => 47720,
                'nombre' => 'Santa Bárbara De Pinto',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            464 => 
            array (
                'id' => 47745,
                'nombre' => 'Sitionuevo',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            465 => 
            array (
                'id' => 47798,
                'nombre' => 'Tenerife',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            466 => 
            array (
                'id' => 47960,
                'nombre' => 'Zapayán',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            467 => 
            array (
                'id' => 47980,
                'nombre' => 'Zona Bananera',
                'tipo' => 'C',
                'padre_id' => 47,
            ),
            468 => 
            array (
                'id' => 50001,
                'nombre' => 'Villavicencio',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            469 => 
            array (
                'id' => 50006,
                'nombre' => 'Acacías',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            470 => 
            array (
                'id' => 50110,
                'nombre' => 'Barranca De Upía',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            471 => 
            array (
                'id' => 50124,
                'nombre' => 'Cabuyaro',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            472 => 
            array (
                'id' => 50150,
                'nombre' => 'Castilla La Nueva',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            473 => 
            array (
                'id' => 50223,
                'nombre' => 'San Luis De Cubarral',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            474 => 
            array (
                'id' => 50226,
                'nombre' => 'Cumaral',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            475 => 
            array (
                'id' => 50245,
                'nombre' => 'El Calvario',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            476 => 
            array (
                'id' => 50251,
                'nombre' => 'El Castillo',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            477 => 
            array (
                'id' => 50270,
                'nombre' => 'El Dorado',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            478 => 
            array (
                'id' => 50287,
                'nombre' => 'Fuente De Oro',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            479 => 
            array (
                'id' => 50313,
                'nombre' => 'Granada',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            480 => 
            array (
                'id' => 50318,
                'nombre' => 'Guamal',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            481 => 
            array (
                'id' => 50325,
                'nombre' => 'Mapiripán',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            482 => 
            array (
                'id' => 50330,
                'nombre' => 'Mesetas',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            483 => 
            array (
                'id' => 50350,
                'nombre' => 'La Macarena',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            484 => 
            array (
                'id' => 50370,
                'nombre' => 'Uribe',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            485 => 
            array (
                'id' => 50400,
                'nombre' => 'Lejanías',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            486 => 
            array (
                'id' => 50450,
                'nombre' => 'Puerto Concordia',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            487 => 
            array (
                'id' => 50568,
                'nombre' => 'Puerto Gaitán',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            488 => 
            array (
                'id' => 50573,
                'nombre' => 'Puerto López',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            489 => 
            array (
                'id' => 50577,
                'nombre' => 'Puerto Lleras',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            490 => 
            array (
                'id' => 50590,
                'nombre' => 'Puerto Rico',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            491 => 
            array (
                'id' => 50606,
                'nombre' => 'Restrepo',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            492 => 
            array (
                'id' => 50680,
                'nombre' => 'San Carlos De Guaroa',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            493 => 
            array (
                'id' => 50683,
                'nombre' => 'San Juan De Arama',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            494 => 
            array (
                'id' => 50686,
                'nombre' => 'San Juanito',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            495 => 
            array (
                'id' => 50689,
                'nombre' => 'San Martín',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            496 => 
            array (
                'id' => 50711,
                'nombre' => 'Vistahermosa',
                'tipo' => 'C',
                'padre_id' => 50,
            ),
            497 => 
            array (
                'id' => 52001,
                'nombre' => 'Pasto',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            498 => 
            array (
                'id' => 52019,
                'nombre' => 'Albán',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            499 => 
            array (
                'id' => 52022,
                'nombre' => 'Aldana',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
        ));
        DB::table('lugar')->insert(array (
            0 => 
            array (
                'id' => 52036,
                'nombre' => 'Ancuyá',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            1 => 
            array (
                'id' => 52051,
                'nombre' => 'Arboleda',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            2 => 
            array (
                'id' => 52079,
                'nombre' => 'Barbacoas',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            3 => 
            array (
                'id' => 52083,
                'nombre' => 'Belén',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            4 => 
            array (
                'id' => 52110,
                'nombre' => 'Buesaco',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            5 => 
            array (
                'id' => 52203,
                'nombre' => 'Colón',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            6 => 
            array (
                'id' => 52207,
                'nombre' => 'Consacá',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            7 => 
            array (
                'id' => 52210,
                'nombre' => 'Contadero',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            8 => 
            array (
                'id' => 52215,
                'nombre' => 'Córdoba',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            9 => 
            array (
                'id' => 52224,
                'nombre' => 'Cuaspúd',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            10 => 
            array (
                'id' => 52227,
                'nombre' => 'Cumbal',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            11 => 
            array (
                'id' => 52233,
                'nombre' => 'Cumbitara',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            12 => 
            array (
                'id' => 52240,
                'nombre' => 'Chachagüí',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            13 => 
            array (
                'id' => 52250,
                'nombre' => 'El Charco',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            14 => 
            array (
                'id' => 52254,
                'nombre' => 'El Peñol',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            15 => 
            array (
                'id' => 52256,
                'nombre' => 'El Rosario',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            16 => 
            array (
                'id' => 52258,
                'nombre' => 'El Tablón De Gómez',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            17 => 
            array (
                'id' => 52260,
                'nombre' => 'El Tambo',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            18 => 
            array (
                'id' => 52287,
                'nombre' => 'Funes',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            19 => 
            array (
                'id' => 52317,
                'nombre' => 'Guachucal',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            20 => 
            array (
                'id' => 52320,
                'nombre' => 'Guaitarilla',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            21 => 
            array (
                'id' => 52323,
                'nombre' => 'Gualmatán',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            22 => 
            array (
                'id' => 52352,
                'nombre' => 'Iles',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            23 => 
            array (
                'id' => 52354,
                'nombre' => 'Imués',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            24 => 
            array (
                'id' => 52356,
                'nombre' => 'Ipiales',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            25 => 
            array (
                'id' => 52378,
                'nombre' => 'La Cruz',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            26 => 
            array (
                'id' => 52381,
                'nombre' => 'La Florida',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            27 => 
            array (
                'id' => 52385,
                'nombre' => 'La Llanada',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            28 => 
            array (
                'id' => 52390,
                'nombre' => 'La Tola',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            29 => 
            array (
                'id' => 52399,
                'nombre' => 'La Unión',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            30 => 
            array (
                'id' => 52405,
                'nombre' => 'Leiva',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            31 => 
            array (
                'id' => 52411,
                'nombre' => 'Linares',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            32 => 
            array (
                'id' => 52418,
                'nombre' => 'Los Andes',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            33 => 
            array (
                'id' => 52427,
                'nombre' => 'Magüí',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            34 => 
            array (
                'id' => 52435,
                'nombre' => 'Mallama',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            35 => 
            array (
                'id' => 52473,
                'nombre' => 'Mosquera',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            36 => 
            array (
                'id' => 52480,
                'nombre' => 'Nariño',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            37 => 
            array (
                'id' => 52490,
                'nombre' => 'Olaya Herrera',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            38 => 
            array (
                'id' => 52506,
                'nombre' => 'Ospina',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            39 => 
            array (
                'id' => 52520,
                'nombre' => 'Francisco Pizarro',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            40 => 
            array (
                'id' => 52540,
                'nombre' => 'Policarpa',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            41 => 
            array (
                'id' => 52560,
                'nombre' => 'Potosí',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            42 => 
            array (
                'id' => 52565,
                'nombre' => 'Providencia',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            43 => 
            array (
                'id' => 52573,
                'nombre' => 'Puerres',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            44 => 
            array (
                'id' => 52585,
                'nombre' => 'Pupiales',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            45 => 
            array (
                'id' => 52612,
                'nombre' => 'Ricaurte',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            46 => 
            array (
                'id' => 52621,
                'nombre' => 'Roberto Payán',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            47 => 
            array (
                'id' => 52678,
                'nombre' => 'Samaniego',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            48 => 
            array (
                'id' => 52683,
                'nombre' => 'Sandoná',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            49 => 
            array (
                'id' => 52685,
                'nombre' => 'San Bernardo',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            50 => 
            array (
                'id' => 52687,
                'nombre' => 'San Lorenzo',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            51 => 
            array (
                'id' => 52693,
                'nombre' => 'San Pablo',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            52 => 
            array (
                'id' => 52694,
                'nombre' => 'San Pedro De Cartago',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            53 => 
            array (
                'id' => 52696,
                'nombre' => 'Santa Bárbara',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            54 => 
            array (
                'id' => 52699,
                'nombre' => 'Santacruz',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            55 => 
            array (
                'id' => 52720,
                'nombre' => 'Sapuyes',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            56 => 
            array (
                'id' => 52786,
                'nombre' => 'Taminango',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            57 => 
            array (
                'id' => 52788,
                'nombre' => 'Tangua',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            58 => 
            array (
                'id' => 52835,
                'nombre' => 'San Andrés De Tumaco',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            59 => 
            array (
                'id' => 52838,
                'nombre' => 'Túquerres',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            60 => 
            array (
                'id' => 52885,
                'nombre' => 'Yacuanquer',
                'tipo' => 'C',
                'padre_id' => 52,
            ),
            61 => 
            array (
                'id' => 54001,
                'nombre' => 'Cúcuta',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            62 => 
            array (
                'id' => 54003,
                'nombre' => 'Ábrego',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            63 => 
            array (
                'id' => 54051,
                'nombre' => 'Arboledas',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            64 => 
            array (
                'id' => 54099,
                'nombre' => 'Bochalema',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            65 => 
            array (
                'id' => 54109,
                'nombre' => 'Bucarasica',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            66 => 
            array (
                'id' => 54125,
                'nombre' => 'Cácota',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            67 => 
            array (
                'id' => 54128,
                'nombre' => 'Cáchira',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            68 => 
            array (
                'id' => 54172,
                'nombre' => 'Chinácota',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            69 => 
            array (
                'id' => 54174,
                'nombre' => 'Chitagá',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            70 => 
            array (
                'id' => 54206,
                'nombre' => 'Convención',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            71 => 
            array (
                'id' => 54223,
                'nombre' => 'Cucutilla',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            72 => 
            array (
                'id' => 54239,
                'nombre' => 'Durania',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            73 => 
            array (
                'id' => 54245,
                'nombre' => 'El Carmen',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            74 => 
            array (
                'id' => 54250,
                'nombre' => 'El Tarra',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            75 => 
            array (
                'id' => 54261,
                'nombre' => 'El Zulia',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            76 => 
            array (
                'id' => 54313,
                'nombre' => 'Gramalote',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            77 => 
            array (
                'id' => 54344,
                'nombre' => 'Hacarí',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            78 => 
            array (
                'id' => 54347,
                'nombre' => 'Herrán',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            79 => 
            array (
                'id' => 54377,
                'nombre' => 'Labateca',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            80 => 
            array (
                'id' => 54385,
                'nombre' => 'La Esperanza',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            81 => 
            array (
                'id' => 54398,
                'nombre' => 'La Playa',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            82 => 
            array (
                'id' => 54405,
                'nombre' => 'Los Patios',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            83 => 
            array (
                'id' => 54418,
                'nombre' => 'Lourdes',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            84 => 
            array (
                'id' => 54480,
                'nombre' => 'Mutiscua',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            85 => 
            array (
                'id' => 54498,
                'nombre' => 'Ocaña',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            86 => 
            array (
                'id' => 54518,
                'nombre' => 'Pamplona',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            87 => 
            array (
                'id' => 54520,
                'nombre' => 'Pamplonita',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            88 => 
            array (
                'id' => 54553,
                'nombre' => 'Puerto Santander',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            89 => 
            array (
                'id' => 54599,
                'nombre' => 'Ragonvalia',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            90 => 
            array (
                'id' => 54660,
                'nombre' => 'Salazar',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            91 => 
            array (
                'id' => 54670,
                'nombre' => 'San Calixto',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            92 => 
            array (
                'id' => 54673,
                'nombre' => 'San Cayetano',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            93 => 
            array (
                'id' => 54680,
                'nombre' => 'Santiago',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            94 => 
            array (
                'id' => 54720,
                'nombre' => 'Sardinata',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            95 => 
            array (
                'id' => 54743,
                'nombre' => 'Silos',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            96 => 
            array (
                'id' => 54800,
                'nombre' => 'Teorama',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            97 => 
            array (
                'id' => 54810,
                'nombre' => 'Tibú',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            98 => 
            array (
                'id' => 54820,
                'nombre' => 'Toledo',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            99 => 
            array (
                'id' => 54871,
                'nombre' => 'Villa Caro',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            100 => 
            array (
                'id' => 54874,
                'nombre' => 'Villa Del Rosario',
                'tipo' => 'C',
                'padre_id' => 54,
            ),
            101 => 
            array (
                'id' => 63001,
                'nombre' => 'Armenia',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            102 => 
            array (
                'id' => 63111,
                'nombre' => 'Buenavista',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            103 => 
            array (
                'id' => 63130,
                'nombre' => 'Calarcá',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            104 => 
            array (
                'id' => 63190,
                'nombre' => 'Circasia',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            105 => 
            array (
                'id' => 63212,
                'nombre' => 'Córdoba',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            106 => 
            array (
                'id' => 63272,
                'nombre' => 'Filandia',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            107 => 
            array (
                'id' => 63302,
                'nombre' => 'Génova',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            108 => 
            array (
                'id' => 63401,
                'nombre' => 'La Tebaida',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            109 => 
            array (
                'id' => 63470,
                'nombre' => 'Montenegro',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            110 => 
            array (
                'id' => 63548,
                'nombre' => 'Pijao',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            111 => 
            array (
                'id' => 63594,
                'nombre' => 'Quimbaya',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            112 => 
            array (
                'id' => 63690,
                'nombre' => 'Salento',
                'tipo' => 'C',
                'padre_id' => 63,
            ),
            113 => 
            array (
                'id' => 66001,
                'nombre' => 'Pereira',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            114 => 
            array (
                'id' => 66045,
                'nombre' => 'Apía',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            115 => 
            array (
                'id' => 66075,
                'nombre' => 'Balboa',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            116 => 
            array (
                'id' => 66088,
                'nombre' => 'Belén De Umbría',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            117 => 
            array (
                'id' => 66170,
                'nombre' => 'Dosquebradas',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            118 => 
            array (
                'id' => 66318,
                'nombre' => 'Guática',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            119 => 
            array (
                'id' => 66383,
                'nombre' => 'La Celia',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            120 => 
            array (
                'id' => 66400,
                'nombre' => 'La Virginia',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            121 => 
            array (
                'id' => 66440,
                'nombre' => 'Marsella',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            122 => 
            array (
                'id' => 66456,
                'nombre' => 'Mistrató',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            123 => 
            array (
                'id' => 66572,
                'nombre' => 'Pueblo Rico',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            124 => 
            array (
                'id' => 66594,
                'nombre' => 'Quinchía',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            125 => 
            array (
                'id' => 66682,
                'nombre' => 'Santa Rosa De Cabal',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            126 => 
            array (
                'id' => 66687,
                'nombre' => 'Santuario',
                'tipo' => 'C',
                'padre_id' => 66,
            ),
            127 => 
            array (
                'id' => 68001,
                'nombre' => 'Bucaramanga',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            128 => 
            array (
                'id' => 68013,
                'nombre' => 'Aguada',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            129 => 
            array (
                'id' => 68020,
                'nombre' => 'Albania',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            130 => 
            array (
                'id' => 68051,
                'nombre' => 'Aratoca',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            131 => 
            array (
                'id' => 68077,
                'nombre' => 'Barbosa',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            132 => 
            array (
                'id' => 68079,
                'nombre' => 'Barichara',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            133 => 
            array (
                'id' => 68081,
                'nombre' => 'Barrancabermeja',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            134 => 
            array (
                'id' => 68092,
                'nombre' => 'Betulia',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            135 => 
            array (
                'id' => 68101,
                'nombre' => 'Bolívar',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            136 => 
            array (
                'id' => 68121,
                'nombre' => 'Cabrera',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            137 => 
            array (
                'id' => 68132,
                'nombre' => 'California',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            138 => 
            array (
                'id' => 68147,
                'nombre' => 'Capitanejo',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            139 => 
            array (
                'id' => 68152,
                'nombre' => 'Carcasí',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            140 => 
            array (
                'id' => 68160,
                'nombre' => 'Cepitá',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            141 => 
            array (
                'id' => 68162,
                'nombre' => 'Cerrito',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            142 => 
            array (
                'id' => 68167,
                'nombre' => 'Charalá',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            143 => 
            array (
                'id' => 68169,
                'nombre' => 'Charta',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            144 => 
            array (
                'id' => 68176,
                'nombre' => 'Chima',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            145 => 
            array (
                'id' => 68179,
                'nombre' => 'Chipatá',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            146 => 
            array (
                'id' => 68190,
                'nombre' => 'Cimitarra',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            147 => 
            array (
                'id' => 68207,
                'nombre' => 'Concepción',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            148 => 
            array (
                'id' => 68209,
                'nombre' => 'Confines',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            149 => 
            array (
                'id' => 68211,
                'nombre' => 'Contratación',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            150 => 
            array (
                'id' => 68217,
                'nombre' => 'Coromoro',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            151 => 
            array (
                'id' => 68229,
                'nombre' => 'Curití',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            152 => 
            array (
                'id' => 68235,
                'nombre' => 'El Carmen De Chucurí',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            153 => 
            array (
                'id' => 68245,
                'nombre' => 'El Guacamayo',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            154 => 
            array (
                'id' => 68250,
                'nombre' => 'El Peñón',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            155 => 
            array (
                'id' => 68255,
                'nombre' => 'El Playón',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            156 => 
            array (
                'id' => 68264,
                'nombre' => 'Encino',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            157 => 
            array (
                'id' => 68266,
                'nombre' => 'Enciso',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            158 => 
            array (
                'id' => 68271,
                'nombre' => 'Florián',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            159 => 
            array (
                'id' => 68276,
                'nombre' => 'Floridablanca',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            160 => 
            array (
                'id' => 68296,
                'nombre' => 'Galán',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            161 => 
            array (
                'id' => 68298,
                'nombre' => 'Gámbita',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            162 => 
            array (
                'id' => 68307,
                'nombre' => 'Girón',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            163 => 
            array (
                'id' => 68318,
                'nombre' => 'Guaca',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            164 => 
            array (
                'id' => 68320,
                'nombre' => 'Guadalupe',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            165 => 
            array (
                'id' => 68322,
                'nombre' => 'Guapotá',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            166 => 
            array (
                'id' => 68324,
                'nombre' => 'Guavatá',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            167 => 
            array (
                'id' => 68327,
                'nombre' => 'Güepsa',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            168 => 
            array (
                'id' => 68344,
                'nombre' => 'Hato',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            169 => 
            array (
                'id' => 68368,
                'nombre' => 'Jesús María',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            170 => 
            array (
                'id' => 68370,
                'nombre' => 'Jordán',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            171 => 
            array (
                'id' => 68377,
                'nombre' => 'La Belleza',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            172 => 
            array (
                'id' => 68385,
                'nombre' => 'Landázuri',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            173 => 
            array (
                'id' => 68397,
                'nombre' => 'La Paz',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            174 => 
            array (
                'id' => 68406,
                'nombre' => 'Lebrija',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            175 => 
            array (
                'id' => 68418,
                'nombre' => 'Los Santos',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            176 => 
            array (
                'id' => 68425,
                'nombre' => 'Macaravita',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            177 => 
            array (
                'id' => 68432,
                'nombre' => 'Málaga',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            178 => 
            array (
                'id' => 68444,
                'nombre' => 'Matanza',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            179 => 
            array (
                'id' => 68464,
                'nombre' => 'Mogotes',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            180 => 
            array (
                'id' => 68468,
                'nombre' => 'Molagavita',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            181 => 
            array (
                'id' => 68498,
                'nombre' => 'Ocamonte',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            182 => 
            array (
                'id' => 68500,
                'nombre' => 'Oiba',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            183 => 
            array (
                'id' => 68502,
                'nombre' => 'Onzaga',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            184 => 
            array (
                'id' => 68522,
                'nombre' => 'Palmar',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            185 => 
            array (
                'id' => 68524,
                'nombre' => 'Palmas Del Socorro',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            186 => 
            array (
                'id' => 68533,
                'nombre' => 'Páramo',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            187 => 
            array (
                'id' => 68547,
                'nombre' => 'Piedecuesta',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            188 => 
            array (
                'id' => 68549,
                'nombre' => 'Pinchote',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            189 => 
            array (
                'id' => 68572,
                'nombre' => 'Puente Nacional',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            190 => 
            array (
                'id' => 68573,
                'nombre' => 'Puerto Parra',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            191 => 
            array (
                'id' => 68575,
                'nombre' => 'Puerto Wilches',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            192 => 
            array (
                'id' => 68615,
                'nombre' => 'Rionegro',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            193 => 
            array (
                'id' => 68655,
                'nombre' => 'Sabana De Torres',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            194 => 
            array (
                'id' => 68669,
                'nombre' => 'San Andrés',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            195 => 
            array (
                'id' => 68673,
                'nombre' => 'San Benito',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            196 => 
            array (
                'id' => 68679,
                'nombre' => 'San Gil',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            197 => 
            array (
                'id' => 68682,
                'nombre' => 'San Joaquín',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            198 => 
            array (
                'id' => 68684,
                'nombre' => 'San José De Miranda',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            199 => 
            array (
                'id' => 68686,
                'nombre' => 'San Miguel',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            200 => 
            array (
                'id' => 68689,
                'nombre' => 'San Vicente De Chucurí',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            201 => 
            array (
                'id' => 68705,
                'nombre' => 'Santa Bárbara',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            202 => 
            array (
                'id' => 68720,
                'nombre' => 'Santa Helena Del Opón',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            203 => 
            array (
                'id' => 68745,
                'nombre' => 'Simacota',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            204 => 
            array (
                'id' => 68755,
                'nombre' => 'Socorro',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            205 => 
            array (
                'id' => 68770,
                'nombre' => 'Suaita',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            206 => 
            array (
                'id' => 68773,
                'nombre' => 'Sucre',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            207 => 
            array (
                'id' => 68780,
                'nombre' => 'Suratá',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            208 => 
            array (
                'id' => 68820,
                'nombre' => 'Tona',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            209 => 
            array (
                'id' => 68855,
                'nombre' => 'Valle De San José',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            210 => 
            array (
                'id' => 68861,
                'nombre' => 'Vélez',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            211 => 
            array (
                'id' => 68867,
                'nombre' => 'Vetas',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            212 => 
            array (
                'id' => 68872,
                'nombre' => 'Villanueva',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            213 => 
            array (
                'id' => 68895,
                'nombre' => 'Zapatoca',
                'tipo' => 'C',
                'padre_id' => 68,
            ),
            214 => 
            array (
                'id' => 70001,
                'nombre' => 'Sincelejo',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            215 => 
            array (
                'id' => 70110,
                'nombre' => 'Buenavista',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            216 => 
            array (
                'id' => 70124,
                'nombre' => 'Caimito',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            217 => 
            array (
                'id' => 70204,
                'nombre' => 'Coloso',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            218 => 
            array (
                'id' => 70215,
                'nombre' => 'Corozal',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            219 => 
            array (
                'id' => 70221,
                'nombre' => 'Coveñas',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            220 => 
            array (
                'id' => 70230,
                'nombre' => 'Chalán',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            221 => 
            array (
                'id' => 70233,
                'nombre' => 'El Roble',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            222 => 
            array (
                'id' => 70235,
                'nombre' => 'Galeras',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            223 => 
            array (
                'id' => 70265,
                'nombre' => 'Guaranda',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            224 => 
            array (
                'id' => 70400,
                'nombre' => 'La Unión',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            225 => 
            array (
                'id' => 70418,
                'nombre' => 'Los Palmitos',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            226 => 
            array (
                'id' => 70429,
                'nombre' => 'Majagual',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            227 => 
            array (
                'id' => 70473,
                'nombre' => 'Morroa',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            228 => 
            array (
                'id' => 70508,
                'nombre' => 'Ovejas',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            229 => 
            array (
                'id' => 70523,
                'nombre' => 'Palmito',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            230 => 
            array (
                'id' => 70670,
                'nombre' => 'Sampués',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            231 => 
            array (
                'id' => 70678,
                'nombre' => 'San Benito Abad',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            232 => 
            array (
                'id' => 70702,
                'nombre' => 'San Juan De Betulia',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            233 => 
            array (
                'id' => 70708,
                'nombre' => 'San Marcos',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            234 => 
            array (
                'id' => 70713,
                'nombre' => 'San Onofre',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            235 => 
            array (
                'id' => 70717,
                'nombre' => 'San Pedro',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            236 => 
            array (
                'id' => 70742,
                'nombre' => 'San Luis De Sincé',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            237 => 
            array (
                'id' => 70771,
                'nombre' => 'Sucre',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            238 => 
            array (
                'id' => 70820,
                'nombre' => 'Santiago De Tolú',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            239 => 
            array (
                'id' => 70823,
                'nombre' => 'Tolú Viejo',
                'tipo' => 'C',
                'padre_id' => 70,
            ),
            240 => 
            array (
                'id' => 73001,
                'nombre' => 'Ibagué',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            241 => 
            array (
                'id' => 73024,
                'nombre' => 'Alpujarra',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            242 => 
            array (
                'id' => 73026,
                'nombre' => 'Alvarado',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            243 => 
            array (
                'id' => 73030,
                'nombre' => 'Ambalema',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            244 => 
            array (
                'id' => 73043,
                'nombre' => 'Anzoátegui',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            245 => 
            array (
                'id' => 73055,
                'nombre' => 'Armero Guayabal',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            246 => 
            array (
                'id' => 73067,
                'nombre' => 'Ataco',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            247 => 
            array (
                'id' => 73124,
                'nombre' => 'Cajamarca',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            248 => 
            array (
                'id' => 73148,
                'nombre' => 'Carmen De Apicalá',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            249 => 
            array (
                'id' => 73152,
                'nombre' => 'Casabianca',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            250 => 
            array (
                'id' => 73168,
                'nombre' => 'Chaparral',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            251 => 
            array (
                'id' => 73200,
                'nombre' => 'Coello',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            252 => 
            array (
                'id' => 73217,
                'nombre' => 'Coyaima',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            253 => 
            array (
                'id' => 73226,
                'nombre' => 'Cunday',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            254 => 
            array (
                'id' => 73236,
                'nombre' => 'Dolores',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            255 => 
            array (
                'id' => 73268,
                'nombre' => 'Espinal',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            256 => 
            array (
                'id' => 73270,
                'nombre' => 'Falan',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            257 => 
            array (
                'id' => 73275,
                'nombre' => 'Flandes',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            258 => 
            array (
                'id' => 73283,
                'nombre' => 'Fresno',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            259 => 
            array (
                'id' => 73319,
                'nombre' => 'Guamo',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            260 => 
            array (
                'id' => 73347,
                'nombre' => 'Herveo',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            261 => 
            array (
                'id' => 73349,
                'nombre' => 'Honda',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            262 => 
            array (
                'id' => 73352,
                'nombre' => 'Icononzo',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            263 => 
            array (
                'id' => 73408,
                'nombre' => 'Lérida',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            264 => 
            array (
                'id' => 73411,
                'nombre' => 'Líbano',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            265 => 
            array (
                'id' => 73443,
                'nombre' => 'San Sebastián De Mariquita',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            266 => 
            array (
                'id' => 73449,
                'nombre' => 'Melgar',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            267 => 
            array (
                'id' => 73461,
                'nombre' => 'Murillo',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            268 => 
            array (
                'id' => 73483,
                'nombre' => 'Natagaima',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            269 => 
            array (
                'id' => 73504,
                'nombre' => 'Ortega',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            270 => 
            array (
                'id' => 73520,
                'nombre' => 'Palocabildo',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            271 => 
            array (
                'id' => 73547,
                'nombre' => 'Piedras',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            272 => 
            array (
                'id' => 73555,
                'nombre' => 'Planadas',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            273 => 
            array (
                'id' => 73563,
                'nombre' => 'Prado',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            274 => 
            array (
                'id' => 73585,
                'nombre' => 'Purificación',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            275 => 
            array (
                'id' => 73616,
                'nombre' => 'Rioblanco',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            276 => 
            array (
                'id' => 73622,
                'nombre' => 'Roncesvalles',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            277 => 
            array (
                'id' => 73624,
                'nombre' => 'Rovira',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            278 => 
            array (
                'id' => 73671,
                'nombre' => 'Saldaña',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            279 => 
            array (
                'id' => 73675,
                'nombre' => 'San Antonio',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            280 => 
            array (
                'id' => 73678,
                'nombre' => 'San Luis',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            281 => 
            array (
                'id' => 73686,
                'nombre' => 'Santa Isabel',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            282 => 
            array (
                'id' => 73770,
                'nombre' => 'Suárez',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            283 => 
            array (
                'id' => 73854,
                'nombre' => 'Valle De San Juan',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            284 => 
            array (
                'id' => 73861,
                'nombre' => 'Venadillo',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            285 => 
            array (
                'id' => 73870,
                'nombre' => 'Villahermosa',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            286 => 
            array (
                'id' => 73873,
                'nombre' => 'Villarrica',
                'tipo' => 'C',
                'padre_id' => 73,
            ),
            287 => 
            array (
                'id' => 76001,
                'nombre' => 'Cali',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            288 => 
            array (
                'id' => 76020,
                'nombre' => 'Alcalá',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            289 => 
            array (
                'id' => 76036,
                'nombre' => 'Andalucía',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            290 => 
            array (
                'id' => 76041,
                'nombre' => 'Ansermanuevo',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            291 => 
            array (
                'id' => 76054,
                'nombre' => 'Argelia',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            292 => 
            array (
                'id' => 76100,
                'nombre' => 'Bolívar',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            293 => 
            array (
                'id' => 76109,
                'nombre' => 'Buenaventura',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            294 => 
            array (
                'id' => 76111,
                'nombre' => 'Guadalajara De Buga',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            295 => 
            array (
                'id' => 76113,
                'nombre' => 'Bugalagrande',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            296 => 
            array (
                'id' => 76122,
                'nombre' => 'Caicedonia',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            297 => 
            array (
                'id' => 76126,
                'nombre' => 'Calima',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            298 => 
            array (
                'id' => 76130,
                'nombre' => 'Candelaria',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            299 => 
            array (
                'id' => 76147,
                'nombre' => 'Cartago',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            300 => 
            array (
                'id' => 76233,
                'nombre' => 'Dagua',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            301 => 
            array (
                'id' => 76243,
                'nombre' => 'El Águila',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            302 => 
            array (
                'id' => 76246,
                'nombre' => 'El Cairo',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            303 => 
            array (
                'id' => 76248,
                'nombre' => 'El Cerrito',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            304 => 
            array (
                'id' => 76250,
                'nombre' => 'El Dovio',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            305 => 
            array (
                'id' => 76275,
                'nombre' => 'Florida',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            306 => 
            array (
                'id' => 76306,
                'nombre' => 'Ginebra',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            307 => 
            array (
                'id' => 76318,
                'nombre' => 'Guacarí',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            308 => 
            array (
                'id' => 76364,
                'nombre' => 'Jamundí',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            309 => 
            array (
                'id' => 76377,
                'nombre' => 'La Cumbre',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            310 => 
            array (
                'id' => 76400,
                'nombre' => 'La Unión',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            311 => 
            array (
                'id' => 76403,
                'nombre' => 'La Victoria',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            312 => 
            array (
                'id' => 76497,
                'nombre' => 'Obando',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            313 => 
            array (
                'id' => 76520,
                'nombre' => 'Palmira',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            314 => 
            array (
                'id' => 76563,
                'nombre' => 'Pradera',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            315 => 
            array (
                'id' => 76606,
                'nombre' => 'Restrepo',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            316 => 
            array (
                'id' => 76616,
                'nombre' => 'Riofrío',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            317 => 
            array (
                'id' => 76622,
                'nombre' => 'Roldanillo',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            318 => 
            array (
                'id' => 76670,
                'nombre' => 'San Pedro',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            319 => 
            array (
                'id' => 76736,
                'nombre' => 'Sevilla',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            320 => 
            array (
                'id' => 76823,
                'nombre' => 'Toro',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            321 => 
            array (
                'id' => 76828,
                'nombre' => 'Trujillo',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            322 => 
            array (
                'id' => 76834,
                'nombre' => 'Tuluá',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            323 => 
            array (
                'id' => 76845,
                'nombre' => 'Ulloa',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            324 => 
            array (
                'id' => 76863,
                'nombre' => 'Versalles',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            325 => 
            array (
                'id' => 76869,
                'nombre' => 'Vijes',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            326 => 
            array (
                'id' => 76890,
                'nombre' => 'Yotoco',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            327 => 
            array (
                'id' => 76892,
                'nombre' => 'Yumbo',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            328 => 
            array (
                'id' => 76895,
                'nombre' => 'Zarzal',
                'tipo' => 'C',
                'padre_id' => 76,
            ),
            329 => 
            array (
                'id' => 81001,
                'nombre' => 'Arauca',
                'tipo' => 'C',
                'padre_id' => 81,
            ),
            330 => 
            array (
                'id' => 81065,
                'nombre' => 'Arauquita',
                'tipo' => 'C',
                'padre_id' => 81,
            ),
            331 => 
            array (
                'id' => 81220,
                'nombre' => 'Cravo Norte',
                'tipo' => 'C',
                'padre_id' => 81,
            ),
            332 => 
            array (
                'id' => 81300,
                'nombre' => 'Fortul',
                'tipo' => 'C',
                'padre_id' => 81,
            ),
            333 => 
            array (
                'id' => 81591,
                'nombre' => 'Puerto Rondón',
                'tipo' => 'C',
                'padre_id' => 81,
            ),
            334 => 
            array (
                'id' => 81736,
                'nombre' => 'Saravena',
                'tipo' => 'C',
                'padre_id' => 81,
            ),
            335 => 
            array (
                'id' => 81794,
                'nombre' => 'Tame',
                'tipo' => 'C',
                'padre_id' => 81,
            ),
            336 => 
            array (
                'id' => 85001,
                'nombre' => 'Yopal',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            337 => 
            array (
                'id' => 85010,
                'nombre' => 'Aguazul',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            338 => 
            array (
                'id' => 85015,
                'nombre' => 'Chámeza',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            339 => 
            array (
                'id' => 85125,
                'nombre' => 'Hato Corozal',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            340 => 
            array (
                'id' => 85136,
                'nombre' => 'La Salina',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            341 => 
            array (
                'id' => 85139,
                'nombre' => 'Maní',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            342 => 
            array (
                'id' => 85162,
                'nombre' => 'Monterrey',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            343 => 
            array (
                'id' => 85225,
                'nombre' => 'Nunchía',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            344 => 
            array (
                'id' => 85230,
                'nombre' => 'Orocué',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            345 => 
            array (
                'id' => 85250,
                'nombre' => 'Paz De Ariporo',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            346 => 
            array (
                'id' => 85263,
                'nombre' => 'Pore',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            347 => 
            array (
                'id' => 85279,
                'nombre' => 'Recetor',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            348 => 
            array (
                'id' => 85300,
                'nombre' => 'Sabanalarga',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            349 => 
            array (
                'id' => 85315,
                'nombre' => 'Sácama',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            350 => 
            array (
                'id' => 85325,
                'nombre' => 'San Luis De Palenque',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            351 => 
            array (
                'id' => 85400,
                'nombre' => 'Támara',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            352 => 
            array (
                'id' => 85410,
                'nombre' => 'Tauramena',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            353 => 
            array (
                'id' => 85430,
                'nombre' => 'Trinidad',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            354 => 
            array (
                'id' => 85440,
                'nombre' => 'Villanueva',
                'tipo' => 'C',
                'padre_id' => 85,
            ),
            355 => 
            array (
                'id' => 86001,
                'nombre' => 'Mocoa',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            356 => 
            array (
                'id' => 86219,
                'nombre' => 'Colón',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            357 => 
            array (
                'id' => 86320,
                'nombre' => 'Orito',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            358 => 
            array (
                'id' => 86568,
                'nombre' => 'Puerto Asís',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            359 => 
            array (
                'id' => 86569,
                'nombre' => 'Puerto Caicedo',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            360 => 
            array (
                'id' => 86571,
                'nombre' => 'Puerto Guzmán',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            361 => 
            array (
                'id' => 86573,
                'nombre' => 'Puerto Leguízamo',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            362 => 
            array (
                'id' => 86749,
                'nombre' => 'Sibundoy',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            363 => 
            array (
                'id' => 86755,
                'nombre' => 'San Francisco',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            364 => 
            array (
                'id' => 86757,
                'nombre' => 'San Miguel',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            365 => 
            array (
                'id' => 86760,
                'nombre' => 'Santiago',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            366 => 
            array (
                'id' => 86865,
                'nombre' => 'Valle Del Guamuez',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            367 => 
            array (
                'id' => 86885,
                'nombre' => 'Villagarzón',
                'tipo' => 'C',
                'padre_id' => 86,
            ),
            368 => 
            array (
                'id' => 88001,
                'nombre' => 'San Andrés',
                'tipo' => 'C',
                'padre_id' => 88,
            ),
            369 => 
            array (
                'id' => 88564,
                'nombre' => 'Providencia',
                'tipo' => 'C',
                'padre_id' => 88,
            ),
            370 => 
            array (
                'id' => 91001,
                'nombre' => 'Leticia',
                'tipo' => 'C',
                'padre_id' => 91,
            ),
            371 => 
            array (
                'id' => 91540,
                'nombre' => 'Puerto Nariño',
                'tipo' => 'C',
                'padre_id' => 91,
            ),
            372 => 
            array (
                'id' => 94001,
                'nombre' => 'Inírida',
                'tipo' => 'C',
                'padre_id' => 94,
            ),
            373 => 
            array (
                'id' => 94888,
                'nombre' => 'Morichal nuevo',
                'tipo' => 'C',
                'padre_id' => 94,
            ),
            374 => 
            array (
                'id' => 95001,
                'nombre' => 'San José Del Guaviare',
                'tipo' => 'C',
                'padre_id' => 95,
            ),
            375 => 
            array (
                'id' => 95015,
                'nombre' => 'Calamar',
                'tipo' => 'C',
                'padre_id' => 95,
            ),
            376 => 
            array (
                'id' => 95025,
                'nombre' => 'El Retorno',
                'tipo' => 'C',
                'padre_id' => 95,
            ),
            377 => 
            array (
                'id' => 95200,
                'nombre' => 'Miraflores',
                'tipo' => 'C',
                'padre_id' => 95,
            ),
            378 => 
            array (
                'id' => 97001,
                'nombre' => 'Mitú',
                'tipo' => 'C',
                'padre_id' => 97,
            ),
            379 => 
            array (
                'id' => 97161,
                'nombre' => 'Carurú',
                'tipo' => 'C',
                'padre_id' => 97,
            ),
            380 => 
            array (
                'id' => 97666,
                'nombre' => 'Taraira',
                'tipo' => 'C',
                'padre_id' => 97,
            ),
            381 => 
            array (
                'id' => 97889,
                'nombre' => 'Yavaraté',
                'tipo' => 'C',
                'padre_id' => 97,
            ),
            382 => 
            array (
                'id' => 99001,
                'nombre' => 'Puerto Carreño',
                'tipo' => 'C',
                'padre_id' => 99,
            ),
            383 => 
            array (
                'id' => 99524,
                'nombre' => 'La Primavera',
                'tipo' => 'C',
                'padre_id' => 99,
            ),
            384 => 
            array (
                'id' => 99624,
                'nombre' => 'Santa Rosalía',
                'tipo' => 'C',
                'padre_id' => 99,
            ),
            385 => 
            array (
                'id' => 99773,
                'nombre' => 'Cumaribo',
                'tipo' => 'C',
                'padre_id' => 99,
            ),
        ));
        
        
    }
}