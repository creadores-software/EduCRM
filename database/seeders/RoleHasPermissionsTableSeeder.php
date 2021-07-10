<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('role_has_permissions')->delete();
        
        DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
            ),
            2 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
            ),
            3 => 
            array (
                'permission_id' => 4,
                'role_id' => 1,
            ),
            4 => 
            array (
                'permission_id' => 5,
                'role_id' => 1,
            ),
            5 => 
            array (
                'permission_id' => 6,
                'role_id' => 1,
            ),
            6 => 
            array (
                'permission_id' => 7,
                'role_id' => 1,
            ),
            7 => 
            array (
                'permission_id' => 8,
                'role_id' => 1,
            ),
            8 => 
            array (
                'permission_id' => 9,
                'role_id' => 1,
            ),
            9 => 
            array (
                'permission_id' => 10,
                'role_id' => 1,
            ),
            10 => 
            array (
                'permission_id' => 11,
                'role_id' => 1,
            ),
            11 => 
            array (
                'permission_id' => 12,
                'role_id' => 1,
            ),
            12 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
            ),
            13 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
            ),
            14 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
            ),
            15 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
            ),
            16 => 
            array (
                'permission_id' => 17,
                'role_id' => 1,
            ),
            17 => 
            array (
                'permission_id' => 18,
                'role_id' => 1,
            ),
            18 => 
            array (
                'permission_id' => 19,
                'role_id' => 1,
            ),
            19 => 
            array (
                'permission_id' => 20,
                'role_id' => 1,
            ),
            20 => 
            array (
                'permission_id' => 21,
                'role_id' => 1,
            ),
            21 => 
            array (
                'permission_id' => 22,
                'role_id' => 1,
            ),
            22 => 
            array (
                'permission_id' => 23,
                'role_id' => 1,
            ),
            23 => 
            array (
                'permission_id' => 24,
                'role_id' => 1,
            ),
            24 => 
            array (
                'permission_id' => 25,
                'role_id' => 1,
            ),
            25 => 
            array (
                'permission_id' => 26,
                'role_id' => 1,
            ),
            26 => 
            array (
                'permission_id' => 27,
                'role_id' => 1,
            ),
            27 => 
            array (
                'permission_id' => 28,
                'role_id' => 1,
            ),
            28 => 
            array (
                'permission_id' => 29,
                'role_id' => 1,
            ),
            29 => 
            array (
                'permission_id' => 30,
                'role_id' => 1,
            ),
            30 => 
            array (
                'permission_id' => 31,
                'role_id' => 1,
            ),
            31 => 
            array (
                'permission_id' => 32,
                'role_id' => 1,
            ),
            32 => 
            array (
                'permission_id' => 33,
                'role_id' => 1,
            ),
            33 => 
            array (
                'permission_id' => 34,
                'role_id' => 1,
            ),
            34 => 
            array (
                'permission_id' => 35,
                'role_id' => 1,
            ),
            35 => 
            array (
                'permission_id' => 36,
                'role_id' => 1,
            ),
            36 => 
            array (
                'permission_id' => 37,
                'role_id' => 1,
            ),
            37 => 
            array (
                'permission_id' => 38,
                'role_id' => 1,
            ),
            38 => 
            array (
                'permission_id' => 39,
                'role_id' => 1,
            ),
            39 => 
            array (
                'permission_id' => 40,
                'role_id' => 1,
            ),
            40 => 
            array (
                'permission_id' => 41,
                'role_id' => 1,
            ),
            41 => 
            array (
                'permission_id' => 42,
                'role_id' => 1,
            ),
            42 => 
            array (
                'permission_id' => 43,
                'role_id' => 1,
            ),
            43 => 
            array (
                'permission_id' => 44,
                'role_id' => 1,
            ),
            44 => 
            array (
                'permission_id' => 45,
                'role_id' => 1,
            ),
            45 => 
            array (
                'permission_id' => 46,
                'role_id' => 1,
            ),
            46 => 
            array (
                'permission_id' => 47,
                'role_id' => 1,
            ),
            47 => 
            array (
                'permission_id' => 48,
                'role_id' => 1,
            ),
            48 => 
            array (
                'permission_id' => 49,
                'role_id' => 1,
            ),
            49 => 
            array (
                'permission_id' => 50,
                'role_id' => 1,
            ),
            50 => 
            array (
                'permission_id' => 51,
                'role_id' => 1,
            ),
            51 => 
            array (
                'permission_id' => 52,
                'role_id' => 1,
            ),
            52 => 
            array (
                'permission_id' => 53,
                'role_id' => 1,
            ),
            53 => 
            array (
                'permission_id' => 54,
                'role_id' => 1,
            ),
            54 => 
            array (
                'permission_id' => 55,
                'role_id' => 1,
            ),
            55 => 
            array (
                'permission_id' => 56,
                'role_id' => 1,
            ),
            56 => 
            array (
                'permission_id' => 57,
                'role_id' => 1,
            ),
            57 => 
            array (
                'permission_id' => 58,
                'role_id' => 1,
            ),
            58 => 
            array (
                'permission_id' => 59,
                'role_id' => 1,
            ),
            59 => 
            array (
                'permission_id' => 60,
                'role_id' => 1,
            ),
            60 => 
            array (
                'permission_id' => 61,
                'role_id' => 1,
            ),
            61 => 
            array (
                'permission_id' => 62,
                'role_id' => 1,
            ),
            62 => 
            array (
                'permission_id' => 63,
                'role_id' => 1,
            ),
            63 => 
            array (
                'permission_id' => 64,
                'role_id' => 1,
            ),
            64 => 
            array (
                'permission_id' => 65,
                'role_id' => 1,
            ),
            65 => 
            array (
                'permission_id' => 66,
                'role_id' => 1,
            ),
            66 => 
            array (
                'permission_id' => 67,
                'role_id' => 1,
            ),
            67 => 
            array (
                'permission_id' => 68,
                'role_id' => 1,
            ),
            68 => 
            array (
                'permission_id' => 69,
                'role_id' => 1,
            ),
            69 => 
            array (
                'permission_id' => 70,
                'role_id' => 1,
            ),
            70 => 
            array (
                'permission_id' => 71,
                'role_id' => 1,
            ),
            71 => 
            array (
                'permission_id' => 72,
                'role_id' => 1,
            ),
            72 => 
            array (
                'permission_id' => 73,
                'role_id' => 1,
            ),
            73 => 
            array (
                'permission_id' => 74,
                'role_id' => 1,
            ),
            74 => 
            array (
                'permission_id' => 75,
                'role_id' => 1,
            ),
            75 => 
            array (
                'permission_id' => 76,
                'role_id' => 1,
            ),
            76 => 
            array (
                'permission_id' => 77,
                'role_id' => 1,
            ),
            77 => 
            array (
                'permission_id' => 78,
                'role_id' => 1,
            ),
            78 => 
            array (
                'permission_id' => 79,
                'role_id' => 1,
            ),
            79 => 
            array (
                'permission_id' => 80,
                'role_id' => 1,
            ),
            80 => 
            array (
                'permission_id' => 81,
                'role_id' => 1,
            ),
            81 => 
            array (
                'permission_id' => 82,
                'role_id' => 1,
            ),
            82 => 
            array (
                'permission_id' => 83,
                'role_id' => 1,
            ),
            83 => 
            array (
                'permission_id' => 84,
                'role_id' => 1,
            ),
            84 => 
            array (
                'permission_id' => 85,
                'role_id' => 1,
            ),
            85 => 
            array (
                'permission_id' => 86,
                'role_id' => 1,
            ),
            86 => 
            array (
                'permission_id' => 87,
                'role_id' => 1,
            ),
            87 => 
            array (
                'permission_id' => 88,
                'role_id' => 1,
            ),
            88 => 
            array (
                'permission_id' => 89,
                'role_id' => 1,
            ),
            89 => 
            array (
                'permission_id' => 90,
                'role_id' => 1,
            ),
            90 => 
            array (
                'permission_id' => 91,
                'role_id' => 1,
            ),
            91 => 
            array (
                'permission_id' => 92,
                'role_id' => 1,
            ),
            92 => 
            array (
                'permission_id' => 93,
                'role_id' => 1,
            ),
            93 => 
            array (
                'permission_id' => 94,
                'role_id' => 1,
            ),
            94 => 
            array (
                'permission_id' => 95,
                'role_id' => 1,
            ),
            95 => 
            array (
                'permission_id' => 96,
                'role_id' => 1,
            ),
            96 => 
            array (
                'permission_id' => 97,
                'role_id' => 1,
            ),
            97 => 
            array (
                'permission_id' => 98,
                'role_id' => 1,
            ),
            98 => 
            array (
                'permission_id' => 99,
                'role_id' => 1,
            ),
            99 => 
            array (
                'permission_id' => 100,
                'role_id' => 1,
            ),
            100 => 
            array (
                'permission_id' => 101,
                'role_id' => 1,
            ),
            101 => 
            array (
                'permission_id' => 102,
                'role_id' => 1,
            ),
            102 => 
            array (
                'permission_id' => 103,
                'role_id' => 1,
            ),
            103 => 
            array (
                'permission_id' => 104,
                'role_id' => 1,
            ),
            104 => 
            array (
                'permission_id' => 105,
                'role_id' => 1,
            ),
            105 => 
            array (
                'permission_id' => 106,
                'role_id' => 1,
            ),
            106 => 
            array (
                'permission_id' => 107,
                'role_id' => 1,
            ),
            107 => 
            array (
                'permission_id' => 108,
                'role_id' => 1,
            ),
            108 => 
            array (
                'permission_id' => 109,
                'role_id' => 1,
            ),
            109 => 
            array (
                'permission_id' => 110,
                'role_id' => 1,
            ),
            110 => 
            array (
                'permission_id' => 111,
                'role_id' => 1,
            ),
            111 => 
            array (
                'permission_id' => 112,
                'role_id' => 1,
            ),
            112 => 
            array (
                'permission_id' => 113,
                'role_id' => 1,
            ),
            113 => 
            array (
                'permission_id' => 114,
                'role_id' => 1,
            ),
            114 => 
            array (
                'permission_id' => 115,
                'role_id' => 1,
            ),
            115 => 
            array (
                'permission_id' => 116,
                'role_id' => 1,
            ),
            116 => 
            array (
                'permission_id' => 117,
                'role_id' => 1,
            ),
            117 => 
            array (
                'permission_id' => 118,
                'role_id' => 1,
            ),
            118 => 
            array (
                'permission_id' => 119,
                'role_id' => 1,
            ),
            119 => 
            array (
                'permission_id' => 120,
                'role_id' => 1,
            ),
            120 => 
            array (
                'permission_id' => 121,
                'role_id' => 1,
            ),
            121 => 
            array (
                'permission_id' => 122,
                'role_id' => 1,
            ),
            122 => 
            array (
                'permission_id' => 123,
                'role_id' => 1,
            ),
            123 => 
            array (
                'permission_id' => 124,
                'role_id' => 1,
            ),
            124 => 
            array (
                'permission_id' => 125,
                'role_id' => 1,
            ),
            125 => 
            array (
                'permission_id' => 126,
                'role_id' => 1,
            ),
            126 => 
            array (
                'permission_id' => 127,
                'role_id' => 1,
            ),
            127 => 
            array (
                'permission_id' => 128,
                'role_id' => 1,
            ),
            128 => 
            array (
                'permission_id' => 129,
                'role_id' => 1,
            ),
            129 => 
            array (
                'permission_id' => 130,
                'role_id' => 1,
            ),
            130 => 
            array (
                'permission_id' => 131,
                'role_id' => 1,
            ),
            131 => 
            array (
                'permission_id' => 132,
                'role_id' => 1,
            ),
            132 => 
            array (
                'permission_id' => 133,
                'role_id' => 1,
            ),
            133 => 
            array (
                'permission_id' => 134,
                'role_id' => 1,
            ),
            134 => 
            array (
                'permission_id' => 135,
                'role_id' => 1,
            ),
            135 => 
            array (
                'permission_id' => 136,
                'role_id' => 1,
            ),
            136 => 
            array (
                'permission_id' => 137,
                'role_id' => 1,
            ),
            137 => 
            array (
                'permission_id' => 138,
                'role_id' => 1,
            ),
            138 => 
            array (
                'permission_id' => 139,
                'role_id' => 1,
            ),
            139 => 
            array (
                'permission_id' => 140,
                'role_id' => 1,
            ),
            140 => 
            array (
                'permission_id' => 141,
                'role_id' => 1,
            ),
            141 => 
            array (
                'permission_id' => 142,
                'role_id' => 1,
            ),
            142 => 
            array (
                'permission_id' => 143,
                'role_id' => 1,
            ),
            143 => 
            array (
                'permission_id' => 144,
                'role_id' => 1,
            ),
            144 => 
            array (
                'permission_id' => 145,
                'role_id' => 1,
            ),
            145 => 
            array (
                'permission_id' => 146,
                'role_id' => 1,
            ),
            146 => 
            array (
                'permission_id' => 147,
                'role_id' => 1,
            ),
            147 => 
            array (
                'permission_id' => 148,
                'role_id' => 1,
            ),
            148 => 
            array (
                'permission_id' => 149,
                'role_id' => 1,
            ),
            149 => 
            array (
                'permission_id' => 150,
                'role_id' => 1,
            ),
            150 => 
            array (
                'permission_id' => 151,
                'role_id' => 1,
            ),
            151 => 
            array (
                'permission_id' => 152,
                'role_id' => 1,
            ),
            152 => 
            array (
                'permission_id' => 153,
                'role_id' => 1,
            ),
            153 => 
            array (
                'permission_id' => 154,
                'role_id' => 1,
            ),
            154 => 
            array (
                'permission_id' => 155,
                'role_id' => 1,
            ),
            155 => 
            array (
                'permission_id' => 156,
                'role_id' => 1,
            ),
            156 => 
            array (
                'permission_id' => 157,
                'role_id' => 1,
            ),
            157 => 
            array (
                'permission_id' => 158,
                'role_id' => 1,
            ),
            158 => 
            array (
                'permission_id' => 159,
                'role_id' => 1,
            ),
            159 => 
            array (
                'permission_id' => 160,
                'role_id' => 1,
            ),
            160 => 
            array (
                'permission_id' => 161,
                'role_id' => 1,
            ),
            161 => 
            array (
                'permission_id' => 162,
                'role_id' => 1,
            ),
            162 => 
            array (
                'permission_id' => 163,
                'role_id' => 1,
            ),
            163 => 
            array (
                'permission_id' => 164,
                'role_id' => 1,
            ),
            164 => 
            array (
                'permission_id' => 165,
                'role_id' => 1,
            ),
            165 => 
            array (
                'permission_id' => 166,
                'role_id' => 1,
            ),
            166 => 
            array (
                'permission_id' => 167,
                'role_id' => 1,
            ),
            167 => 
            array (
                'permission_id' => 168,
                'role_id' => 1,
            ),
            168 => 
            array (
                'permission_id' => 169,
                'role_id' => 1,
            ),
            169 => 
            array (
                'permission_id' => 170,
                'role_id' => 1,
            ),
            170 => 
            array (
                'permission_id' => 171,
                'role_id' => 1,
            ),
            171 => 
            array (
                'permission_id' => 172,
                'role_id' => 1,
            ),
            172 => 
            array (
                'permission_id' => 173,
                'role_id' => 1,
            ),
            173 => 
            array (
                'permission_id' => 174,
                'role_id' => 1,
            ),
            174 => 
            array (
                'permission_id' => 175,
                'role_id' => 1,
            ),
            175 => 
            array (
                'permission_id' => 176,
                'role_id' => 1,
            ),
            176 => 
            array (
                'permission_id' => 177,
                'role_id' => 1,
            ),
            177 => 
            array (
                'permission_id' => 178,
                'role_id' => 1,
            ),
            178 => 
            array (
                'permission_id' => 179,
                'role_id' => 1,
            ),
            179 => 
            array (
                'permission_id' => 180,
                'role_id' => 1,
            ),
            180 => 
            array (
                'permission_id' => 181,
                'role_id' => 1,
            ),
            181 => 
            array (
                'permission_id' => 182,
                'role_id' => 1,
            ),
            182 => 
            array (
                'permission_id' => 183,
                'role_id' => 1,
            ),
            183 => 
            array (
                'permission_id' => 184,
                'role_id' => 1,
            ),
            184 => 
            array (
                'permission_id' => 185,
                'role_id' => 1,
            ),
            185 => 
            array (
                'permission_id' => 186,
                'role_id' => 1,
            ),
            186 => 
            array (
                'permission_id' => 187,
                'role_id' => 1,
            ),
            187 => 
            array (
                'permission_id' => 188,
                'role_id' => 1,
            ),
            188 => 
            array (
                'permission_id' => 189,
                'role_id' => 1,
            ),
            189 => 
            array (
                'permission_id' => 190,
                'role_id' => 1,
            ),
            190 => 
            array (
                'permission_id' => 191,
                'role_id' => 1,
            ),
            191 => 
            array (
                'permission_id' => 192,
                'role_id' => 1,
            ),
            192 => 
            array (
                'permission_id' => 193,
                'role_id' => 1,
            ),
            193 => 
            array (
                'permission_id' => 194,
                'role_id' => 1,
            ),
            194 => 
            array (
                'permission_id' => 195,
                'role_id' => 1,
            ),
            195 => 
            array (
                'permission_id' => 196,
                'role_id' => 1,
            ),
            196 => 
            array (
                'permission_id' => 197,
                'role_id' => 1,
            ),
            197 => 
            array (
                'permission_id' => 198,
                'role_id' => 1,
            ),
            198 => 
            array (
                'permission_id' => 199,
                'role_id' => 1,
            ),
            199 => 
            array (
                'permission_id' => 200,
                'role_id' => 1,
            ),
            200 => 
            array (
                'permission_id' => 201,
                'role_id' => 1,
            ),
            201 => 
            array (
                'permission_id' => 202,
                'role_id' => 1,
            ),
            202 => 
            array (
                'permission_id' => 203,
                'role_id' => 1,
            ),
            203 => 
            array (
                'permission_id' => 204,
                'role_id' => 1,
            ),
            204 => 
            array (
                'permission_id' => 205,
                'role_id' => 1,
            ),
            205 => 
            array (
                'permission_id' => 206,
                'role_id' => 1,
            ),
            206 => 
            array (
                'permission_id' => 207,
                'role_id' => 1,
            ),
            207 => 
            array (
                'permission_id' => 208,
                'role_id' => 1,
            ),
            208 => 
            array (
                'permission_id' => 209,
                'role_id' => 1,
            ),
            209 => 
            array (
                'permission_id' => 210,
                'role_id' => 1,
            ),
            210 => 
            array (
                'permission_id' => 211,
                'role_id' => 1,
            ),
            211 => 
            array (
                'permission_id' => 212,
                'role_id' => 1,
            ),
            212 => 
            array (
                'permission_id' => 213,
                'role_id' => 1,
            ),
            213 => 
            array (
                'permission_id' => 214,
                'role_id' => 1,
            ),
            214 => 
            array (
                'permission_id' => 215,
                'role_id' => 1,
            ),
            215 => 
            array (
                'permission_id' => 216,
                'role_id' => 1,
            ),
            216 => 
            array (
                'permission_id' => 217,
                'role_id' => 1,
            ),
            217 => 
            array (
                'permission_id' => 218,
                'role_id' => 1,
            ),
            218 => 
            array (
                'permission_id' => 219,
                'role_id' => 1,
            ),
            219 => 
            array (
                'permission_id' => 220,
                'role_id' => 1,
            ),
            220 => 
            array (
                'permission_id' => 221,
                'role_id' => 1,
            ),
            221 => 
            array (
                'permission_id' => 222,
                'role_id' => 1,
            ),
            222 => 
            array (
                'permission_id' => 223,
                'role_id' => 1,
            ),
            223 => 
            array (
                'permission_id' => 224,
                'role_id' => 1,
            ),
            224 => 
            array (
                'permission_id' => 225,
                'role_id' => 1,
            ),
            225 => 
            array (
                'permission_id' => 226,
                'role_id' => 1,
            ),
            226 => 
            array (
                'permission_id' => 227,
                'role_id' => 1,
            ),
            227 => 
            array (
                'permission_id' => 228,
                'role_id' => 1,
            ),
            228 => 
            array (
                'permission_id' => 229,
                'role_id' => 1,
            ),
            229 => 
            array (
                'permission_id' => 230,
                'role_id' => 1,
            ),
            230 => 
            array (
                'permission_id' => 231,
                'role_id' => 1,
            ),
            231 => 
            array (
                'permission_id' => 232,
                'role_id' => 1,
            ),
            232 => 
            array (
                'permission_id' => 233,
                'role_id' => 1,
            ),
            233 => 
            array (
                'permission_id' => 234,
                'role_id' => 1,
            ),
            234 => 
            array (
                'permission_id' => 235,
                'role_id' => 1,
            ),
            235 => 
            array (
                'permission_id' => 236,
                'role_id' => 1,
            ),
            236 => 
            array (
                'permission_id' => 237,
                'role_id' => 1,
            ),
            237 => 
            array (
                'permission_id' => 238,
                'role_id' => 1,
            ),
            238 => 
            array (
                'permission_id' => 239,
                'role_id' => 1,
            ),
            239 => 
            array (
                'permission_id' => 240,
                'role_id' => 1,
            ),
            240 => 
            array (
                'permission_id' => 241,
                'role_id' => 1,
            ),
            241 => 
            array (
                'permission_id' => 242,
                'role_id' => 1,
            ),
            242 => 
            array (
                'permission_id' => 243,
                'role_id' => 1,
            ),
            243 => 
            array (
                'permission_id' => 244,
                'role_id' => 1,
            ),
            244 => 
            array (
                'permission_id' => 245,
                'role_id' => 1,
            ),
            245 => 
            array (
                'permission_id' => 246,
                'role_id' => 1,
            ),
            246 => 
            array (
                'permission_id' => 247,
                'role_id' => 1,
            ),
            247 => 
            array (
                'permission_id' => 248,
                'role_id' => 1,
            ),
            248 => 
            array (
                'permission_id' => 249,
                'role_id' => 1,
            ),
            249 => 
            array (
                'permission_id' => 250,
                'role_id' => 1,
            ),
            250 => 
            array (
                'permission_id' => 251,
                'role_id' => 1,
            ),
            251 => 
            array (
                'permission_id' => 252,
                'role_id' => 1,
            ),
            252 => 
            array (
                'permission_id' => 253,
                'role_id' => 1,
            ),
            253 => 
            array (
                'permission_id' => 254,
                'role_id' => 1,
            ),
            254 => 
            array (
                'permission_id' => 255,
                'role_id' => 1,
            ),
            255 => 
            array (
                'permission_id' => 256,
                'role_id' => 1,
            ),
            256 => 
            array (
                'permission_id' => 257,
                'role_id' => 1,
            ),
            257 => 
            array (
                'permission_id' => 258,
                'role_id' => 1,
            ),
            258 => 
            array (
                'permission_id' => 259,
                'role_id' => 1,
            ),
            259 => 
            array (
                'permission_id' => 260,
                'role_id' => 1,
            ),
            260 => 
            array (
                'permission_id' => 261,
                'role_id' => 1,
            ),
            261 => 
            array (
                'permission_id' => 262,
                'role_id' => 1,
            ),
            262 => 
            array (
                'permission_id' => 1,
                'role_id' => 2,
            ),
            263 => 
            array (
                'permission_id' => 2,
                'role_id' => 2,
            ),
            264 => 
            array (
                'permission_id' => 3,
                'role_id' => 2,
            ),
            265 => 
            array (
                'permission_id' => 4,
                'role_id' => 2,
            ),
            266 => 
            array (
                'permission_id' => 5,
                'role_id' => 2,
            ),
            267 => 
            array (
                'permission_id' => 9,
                'role_id' => 2,
            ),
            268 => 
            array (
                'permission_id' => 10,
                'role_id' => 2,
            ),
            269 => 
            array (
                'permission_id' => 11,
                'role_id' => 2,
            ),
            270 => 
            array (
                'permission_id' => 12,
                'role_id' => 2,
            ),
            271 => 
            array (
                'permission_id' => 13,
                'role_id' => 2,
            ),
            272 => 
            array (
                'permission_id' => 17,
                'role_id' => 2,
            ),
            273 => 
            array (
                'permission_id' => 18,
                'role_id' => 2,
            ),
            274 => 
            array (
                'permission_id' => 19,
                'role_id' => 2,
            ),
            275 => 
            array (
                'permission_id' => 20,
                'role_id' => 2,
            ),
            276 => 
            array (
                'permission_id' => 21,
                'role_id' => 2,
            ),
            277 => 
            array (
                'permission_id' => 22,
                'role_id' => 2,
            ),
            278 => 
            array (
                'permission_id' => 23,
                'role_id' => 2,
            ),
            279 => 
            array (
                'permission_id' => 24,
                'role_id' => 2,
            ),
            280 => 
            array (
                'permission_id' => 25,
                'role_id' => 2,
            ),
            281 => 
            array (
                'permission_id' => 26,
                'role_id' => 2,
            ),
            282 => 
            array (
                'permission_id' => 27,
                'role_id' => 2,
            ),
            283 => 
            array (
                'permission_id' => 28,
                'role_id' => 2,
            ),
            284 => 
            array (
                'permission_id' => 29,
                'role_id' => 2,
            ),
            285 => 
            array (
                'permission_id' => 30,
                'role_id' => 2,
            ),
            286 => 
            array (
                'permission_id' => 31,
                'role_id' => 2,
            ),
            287 => 
            array (
                'permission_id' => 32,
                'role_id' => 2,
            ),
            288 => 
            array (
                'permission_id' => 33,
                'role_id' => 2,
            ),
            289 => 
            array (
                'permission_id' => 34,
                'role_id' => 2,
            ),
            290 => 
            array (
                'permission_id' => 35,
                'role_id' => 2,
            ),
            291 => 
            array (
                'permission_id' => 36,
                'role_id' => 2,
            ),
            292 => 
            array (
                'permission_id' => 37,
                'role_id' => 2,
            ),
            293 => 
            array (
                'permission_id' => 38,
                'role_id' => 2,
            ),
            294 => 
            array (
                'permission_id' => 39,
                'role_id' => 2,
            ),
            295 => 
            array (
                'permission_id' => 40,
                'role_id' => 2,
            ),
            296 => 
            array (
                'permission_id' => 41,
                'role_id' => 2,
            ),
            297 => 
            array (
                'permission_id' => 42,
                'role_id' => 2,
            ),
            298 => 
            array (
                'permission_id' => 43,
                'role_id' => 2,
            ),
            299 => 
            array (
                'permission_id' => 44,
                'role_id' => 2,
            ),
            300 => 
            array (
                'permission_id' => 45,
                'role_id' => 2,
            ),
            301 => 
            array (
                'permission_id' => 46,
                'role_id' => 2,
            ),
            302 => 
            array (
                'permission_id' => 47,
                'role_id' => 2,
            ),
            303 => 
            array (
                'permission_id' => 48,
                'role_id' => 2,
            ),
            304 => 
            array (
                'permission_id' => 49,
                'role_id' => 2,
            ),
            305 => 
            array (
                'permission_id' => 50,
                'role_id' => 2,
            ),
            306 => 
            array (
                'permission_id' => 51,
                'role_id' => 2,
            ),
            307 => 
            array (
                'permission_id' => 52,
                'role_id' => 2,
            ),
            308 => 
            array (
                'permission_id' => 53,
                'role_id' => 2,
            ),
            309 => 
            array (
                'permission_id' => 54,
                'role_id' => 2,
            ),
            310 => 
            array (
                'permission_id' => 55,
                'role_id' => 2,
            ),
            311 => 
            array (
                'permission_id' => 56,
                'role_id' => 2,
            ),
            312 => 
            array (
                'permission_id' => 57,
                'role_id' => 2,
            ),
            313 => 
            array (
                'permission_id' => 58,
                'role_id' => 2,
            ),
            314 => 
            array (
                'permission_id' => 59,
                'role_id' => 2,
            ),
            315 => 
            array (
                'permission_id' => 60,
                'role_id' => 2,
            ),
            316 => 
            array (
                'permission_id' => 61,
                'role_id' => 2,
            ),
            317 => 
            array (
                'permission_id' => 62,
                'role_id' => 2,
            ),
            318 => 
            array (
                'permission_id' => 63,
                'role_id' => 2,
            ),
            319 => 
            array (
                'permission_id' => 64,
                'role_id' => 2,
            ),
            320 => 
            array (
                'permission_id' => 65,
                'role_id' => 2,
            ),
            321 => 
            array (
                'permission_id' => 66,
                'role_id' => 2,
            ),
            322 => 
            array (
                'permission_id' => 67,
                'role_id' => 2,
            ),
            323 => 
            array (
                'permission_id' => 68,
                'role_id' => 2,
            ),
            324 => 
            array (
                'permission_id' => 69,
                'role_id' => 2,
            ),
            325 => 
            array (
                'permission_id' => 70,
                'role_id' => 2,
            ),
            326 => 
            array (
                'permission_id' => 71,
                'role_id' => 2,
            ),
            327 => 
            array (
                'permission_id' => 72,
                'role_id' => 2,
            ),
            328 => 
            array (
                'permission_id' => 73,
                'role_id' => 2,
            ),
            329 => 
            array (
                'permission_id' => 74,
                'role_id' => 2,
            ),
            330 => 
            array (
                'permission_id' => 75,
                'role_id' => 2,
            ),
            331 => 
            array (
                'permission_id' => 76,
                'role_id' => 2,
            ),
            332 => 
            array (
                'permission_id' => 77,
                'role_id' => 2,
            ),
            333 => 
            array (
                'permission_id' => 78,
                'role_id' => 2,
            ),
            334 => 
            array (
                'permission_id' => 79,
                'role_id' => 2,
            ),
            335 => 
            array (
                'permission_id' => 80,
                'role_id' => 2,
            ),
            336 => 
            array (
                'permission_id' => 81,
                'role_id' => 2,
            ),
            337 => 
            array (
                'permission_id' => 82,
                'role_id' => 2,
            ),
            338 => 
            array (
                'permission_id' => 83,
                'role_id' => 2,
            ),
            339 => 
            array (
                'permission_id' => 84,
                'role_id' => 2,
            ),
            340 => 
            array (
                'permission_id' => 85,
                'role_id' => 2,
            ),
            341 => 
            array (
                'permission_id' => 86,
                'role_id' => 2,
            ),
            342 => 
            array (
                'permission_id' => 87,
                'role_id' => 2,
            ),
            343 => 
            array (
                'permission_id' => 88,
                'role_id' => 2,
            ),
            344 => 
            array (
                'permission_id' => 89,
                'role_id' => 2,
            ),
            345 => 
            array (
                'permission_id' => 90,
                'role_id' => 2,
            ),
            346 => 
            array (
                'permission_id' => 91,
                'role_id' => 2,
            ),
            347 => 
            array (
                'permission_id' => 92,
                'role_id' => 2,
            ),
            348 => 
            array (
                'permission_id' => 93,
                'role_id' => 2,
            ),
            349 => 
            array (
                'permission_id' => 94,
                'role_id' => 2,
            ),
            350 => 
            array (
                'permission_id' => 95,
                'role_id' => 2,
            ),
            351 => 
            array (
                'permission_id' => 96,
                'role_id' => 2,
            ),
            352 => 
            array (
                'permission_id' => 97,
                'role_id' => 2,
            ),
            353 => 
            array (
                'permission_id' => 98,
                'role_id' => 2,
            ),
            354 => 
            array (
                'permission_id' => 99,
                'role_id' => 2,
            ),
            355 => 
            array (
                'permission_id' => 100,
                'role_id' => 2,
            ),
            356 => 
            array (
                'permission_id' => 101,
                'role_id' => 2,
            ),
            357 => 
            array (
                'permission_id' => 102,
                'role_id' => 2,
            ),
            358 => 
            array (
                'permission_id' => 103,
                'role_id' => 2,
            ),
            359 => 
            array (
                'permission_id' => 104,
                'role_id' => 2,
            ),
            360 => 
            array (
                'permission_id' => 105,
                'role_id' => 2,
            ),
            361 => 
            array (
                'permission_id' => 106,
                'role_id' => 2,
            ),
            362 => 
            array (
                'permission_id' => 107,
                'role_id' => 2,
            ),
            363 => 
            array (
                'permission_id' => 108,
                'role_id' => 2,
            ),
            364 => 
            array (
                'permission_id' => 109,
                'role_id' => 2,
            ),
            365 => 
            array (
                'permission_id' => 110,
                'role_id' => 2,
            ),
            366 => 
            array (
                'permission_id' => 111,
                'role_id' => 2,
            ),
            367 => 
            array (
                'permission_id' => 112,
                'role_id' => 2,
            ),
            368 => 
            array (
                'permission_id' => 113,
                'role_id' => 2,
            ),
            369 => 
            array (
                'permission_id' => 114,
                'role_id' => 2,
            ),
            370 => 
            array (
                'permission_id' => 115,
                'role_id' => 2,
            ),
            371 => 
            array (
                'permission_id' => 116,
                'role_id' => 2,
            ),
            372 => 
            array (
                'permission_id' => 117,
                'role_id' => 2,
            ),
            373 => 
            array (
                'permission_id' => 118,
                'role_id' => 2,
            ),
            374 => 
            array (
                'permission_id' => 119,
                'role_id' => 2,
            ),
            375 => 
            array (
                'permission_id' => 120,
                'role_id' => 2,
            ),
            376 => 
            array (
                'permission_id' => 121,
                'role_id' => 2,
            ),
            377 => 
            array (
                'permission_id' => 122,
                'role_id' => 2,
            ),
            378 => 
            array (
                'permission_id' => 123,
                'role_id' => 2,
            ),
            379 => 
            array (
                'permission_id' => 124,
                'role_id' => 2,
            ),
            380 => 
            array (
                'permission_id' => 125,
                'role_id' => 2,
            ),
            381 => 
            array (
                'permission_id' => 126,
                'role_id' => 2,
            ),
            382 => 
            array (
                'permission_id' => 127,
                'role_id' => 2,
            ),
            383 => 
            array (
                'permission_id' => 128,
                'role_id' => 2,
            ),
            384 => 
            array (
                'permission_id' => 129,
                'role_id' => 2,
            ),
            385 => 
            array (
                'permission_id' => 130,
                'role_id' => 2,
            ),
            386 => 
            array (
                'permission_id' => 131,
                'role_id' => 2,
            ),
            387 => 
            array (
                'permission_id' => 132,
                'role_id' => 2,
            ),
            388 => 
            array (
                'permission_id' => 133,
                'role_id' => 2,
            ),
            389 => 
            array (
                'permission_id' => 134,
                'role_id' => 2,
            ),
            390 => 
            array (
                'permission_id' => 135,
                'role_id' => 2,
            ),
            391 => 
            array (
                'permission_id' => 136,
                'role_id' => 2,
            ),
            392 => 
            array (
                'permission_id' => 137,
                'role_id' => 2,
            ),
            393 => 
            array (
                'permission_id' => 138,
                'role_id' => 2,
            ),
            394 => 
            array (
                'permission_id' => 139,
                'role_id' => 2,
            ),
            395 => 
            array (
                'permission_id' => 140,
                'role_id' => 2,
            ),
            396 => 
            array (
                'permission_id' => 141,
                'role_id' => 2,
            ),
            397 => 
            array (
                'permission_id' => 142,
                'role_id' => 2,
            ),
            398 => 
            array (
                'permission_id' => 143,
                'role_id' => 2,
            ),
            399 => 
            array (
                'permission_id' => 144,
                'role_id' => 2,
            ),
            400 => 
            array (
                'permission_id' => 145,
                'role_id' => 2,
            ),
            401 => 
            array (
                'permission_id' => 146,
                'role_id' => 2,
            ),
            402 => 
            array (
                'permission_id' => 147,
                'role_id' => 2,
            ),
            403 => 
            array (
                'permission_id' => 148,
                'role_id' => 2,
            ),
            404 => 
            array (
                'permission_id' => 149,
                'role_id' => 2,
            ),
            405 => 
            array (
                'permission_id' => 150,
                'role_id' => 2,
            ),
            406 => 
            array (
                'permission_id' => 151,
                'role_id' => 2,
            ),
            407 => 
            array (
                'permission_id' => 152,
                'role_id' => 2,
            ),
            408 => 
            array (
                'permission_id' => 153,
                'role_id' => 2,
            ),
            409 => 
            array (
                'permission_id' => 154,
                'role_id' => 2,
            ),
            410 => 
            array (
                'permission_id' => 155,
                'role_id' => 2,
            ),
            411 => 
            array (
                'permission_id' => 156,
                'role_id' => 2,
            ),
            412 => 
            array (
                'permission_id' => 157,
                'role_id' => 2,
            ),
            413 => 
            array (
                'permission_id' => 158,
                'role_id' => 2,
            ),
            414 => 
            array (
                'permission_id' => 159,
                'role_id' => 2,
            ),
            415 => 
            array (
                'permission_id' => 160,
                'role_id' => 2,
            ),
            416 => 
            array (
                'permission_id' => 161,
                'role_id' => 2,
            ),
            417 => 
            array (
                'permission_id' => 162,
                'role_id' => 2,
            ),
            418 => 
            array (
                'permission_id' => 163,
                'role_id' => 2,
            ),
            419 => 
            array (
                'permission_id' => 164,
                'role_id' => 2,
            ),
            420 => 
            array (
                'permission_id' => 165,
                'role_id' => 2,
            ),
            421 => 
            array (
                'permission_id' => 166,
                'role_id' => 2,
            ),
            422 => 
            array (
                'permission_id' => 167,
                'role_id' => 2,
            ),
            423 => 
            array (
                'permission_id' => 168,
                'role_id' => 2,
            ),
            424 => 
            array (
                'permission_id' => 169,
                'role_id' => 2,
            ),
            425 => 
            array (
                'permission_id' => 170,
                'role_id' => 2,
            ),
            426 => 
            array (
                'permission_id' => 171,
                'role_id' => 2,
            ),
            427 => 
            array (
                'permission_id' => 172,
                'role_id' => 2,
            ),
            428 => 
            array (
                'permission_id' => 173,
                'role_id' => 2,
            ),
            429 => 
            array (
                'permission_id' => 174,
                'role_id' => 2,
            ),
            430 => 
            array (
                'permission_id' => 175,
                'role_id' => 2,
            ),
            431 => 
            array (
                'permission_id' => 176,
                'role_id' => 2,
            ),
            432 => 
            array (
                'permission_id' => 177,
                'role_id' => 2,
            ),
            433 => 
            array (
                'permission_id' => 178,
                'role_id' => 2,
            ),
            434 => 
            array (
                'permission_id' => 179,
                'role_id' => 2,
            ),
            435 => 
            array (
                'permission_id' => 180,
                'role_id' => 2,
            ),
            436 => 
            array (
                'permission_id' => 181,
                'role_id' => 2,
            ),
            437 => 
            array (
                'permission_id' => 182,
                'role_id' => 2,
            ),
            438 => 
            array (
                'permission_id' => 183,
                'role_id' => 2,
            ),
            439 => 
            array (
                'permission_id' => 184,
                'role_id' => 2,
            ),
            440 => 
            array (
                'permission_id' => 185,
                'role_id' => 2,
            ),
            441 => 
            array (
                'permission_id' => 186,
                'role_id' => 2,
            ),
            442 => 
            array (
                'permission_id' => 187,
                'role_id' => 2,
            ),
            443 => 
            array (
                'permission_id' => 188,
                'role_id' => 2,
            ),
            444 => 
            array (
                'permission_id' => 189,
                'role_id' => 2,
            ),
            445 => 
            array (
                'permission_id' => 190,
                'role_id' => 2,
            ),
            446 => 
            array (
                'permission_id' => 191,
                'role_id' => 2,
            ),
            447 => 
            array (
                'permission_id' => 192,
                'role_id' => 2,
            ),
            448 => 
            array (
                'permission_id' => 193,
                'role_id' => 2,
            ),
            449 => 
            array (
                'permission_id' => 194,
                'role_id' => 2,
            ),
            450 => 
            array (
                'permission_id' => 195,
                'role_id' => 2,
            ),
            451 => 
            array (
                'permission_id' => 196,
                'role_id' => 2,
            ),
            452 => 
            array (
                'permission_id' => 197,
                'role_id' => 2,
            ),
            453 => 
            array (
                'permission_id' => 198,
                'role_id' => 2,
            ),
            454 => 
            array (
                'permission_id' => 199,
                'role_id' => 2,
            ),
            455 => 
            array (
                'permission_id' => 200,
                'role_id' => 2,
            ),
            456 => 
            array (
                'permission_id' => 201,
                'role_id' => 2,
            ),
            457 => 
            array (
                'permission_id' => 202,
                'role_id' => 2,
            ),
            458 => 
            array (
                'permission_id' => 203,
                'role_id' => 2,
            ),
            459 => 
            array (
                'permission_id' => 204,
                'role_id' => 2,
            ),
            460 => 
            array (
                'permission_id' => 205,
                'role_id' => 2,
            ),
            461 => 
            array (
                'permission_id' => 206,
                'role_id' => 2,
            ),
            462 => 
            array (
                'permission_id' => 207,
                'role_id' => 2,
            ),
            463 => 
            array (
                'permission_id' => 208,
                'role_id' => 2,
            ),
            464 => 
            array (
                'permission_id' => 209,
                'role_id' => 2,
            ),
            465 => 
            array (
                'permission_id' => 210,
                'role_id' => 2,
            ),
            466 => 
            array (
                'permission_id' => 211,
                'role_id' => 2,
            ),
            467 => 
            array (
                'permission_id' => 212,
                'role_id' => 2,
            ),
            468 => 
            array (
                'permission_id' => 213,
                'role_id' => 2,
            ),
            469 => 
            array (
                'permission_id' => 214,
                'role_id' => 2,
            ),
            470 => 
            array (
                'permission_id' => 215,
                'role_id' => 2,
            ),
            471 => 
            array (
                'permission_id' => 216,
                'role_id' => 2,
            ),
            472 => 
            array (
                'permission_id' => 217,
                'role_id' => 2,
            ),
            473 => 
            array (
                'permission_id' => 218,
                'role_id' => 2,
            ),
            474 => 
            array (
                'permission_id' => 219,
                'role_id' => 2,
            ),
            475 => 
            array (
                'permission_id' => 220,
                'role_id' => 2,
            ),
            476 => 
            array (
                'permission_id' => 221,
                'role_id' => 2,
            ),
            477 => 
            array (
                'permission_id' => 222,
                'role_id' => 2,
            ),
            478 => 
            array (
                'permission_id' => 223,
                'role_id' => 2,
            ),
            479 => 
            array (
                'permission_id' => 224,
                'role_id' => 2,
            ),
            480 => 
            array (
                'permission_id' => 225,
                'role_id' => 2,
            ),
            481 => 
            array (
                'permission_id' => 226,
                'role_id' => 2,
            ),
            482 => 
            array (
                'permission_id' => 227,
                'role_id' => 2,
            ),
            483 => 
            array (
                'permission_id' => 228,
                'role_id' => 2,
            ),
            484 => 
            array (
                'permission_id' => 229,
                'role_id' => 2,
            ),
            485 => 
            array (
                'permission_id' => 230,
                'role_id' => 2,
            ),
            486 => 
            array (
                'permission_id' => 231,
                'role_id' => 2,
            ),
            487 => 
            array (
                'permission_id' => 232,
                'role_id' => 2,
            ),
            488 => 
            array (
                'permission_id' => 233,
                'role_id' => 2,
            ),
            489 => 
            array (
                'permission_id' => 234,
                'role_id' => 2,
            ),
            490 => 
            array (
                'permission_id' => 235,
                'role_id' => 2,
            ),
            491 => 
            array (
                'permission_id' => 236,
                'role_id' => 2,
            ),
            492 => 
            array (
                'permission_id' => 237,
                'role_id' => 2,
            ),
            493 => 
            array (
                'permission_id' => 238,
                'role_id' => 2,
            ),
            494 => 
            array (
                'permission_id' => 239,
                'role_id' => 2,
            ),
            495 => 
            array (
                'permission_id' => 240,
                'role_id' => 2,
            ),
            496 => 
            array (
                'permission_id' => 241,
                'role_id' => 2,
            ),
            497 => 
            array (
                'permission_id' => 242,
                'role_id' => 2,
            ),
            498 => 
            array (
                'permission_id' => 243,
                'role_id' => 2,
            ),
            499 => 
            array (
                'permission_id' => 244,
                'role_id' => 2,
            ),
        ));
        DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 245,
                'role_id' => 2,
            ),
            1 => 
            array (
                'permission_id' => 246,
                'role_id' => 2,
            ),
            2 => 
            array (
                'permission_id' => 247,
                'role_id' => 2,
            ),
            3 => 
            array (
                'permission_id' => 248,
                'role_id' => 2,
            ),
            4 => 
            array (
                'permission_id' => 249,
                'role_id' => 2,
            ),
            5 => 
            array (
                'permission_id' => 250,
                'role_id' => 2,
            ),
            6 => 
            array (
                'permission_id' => 251,
                'role_id' => 2,
            ),
            7 => 
            array (
                'permission_id' => 252,
                'role_id' => 2,
            ),
            8 => 
            array (
                'permission_id' => 253,
                'role_id' => 2,
            ),
            9 => 
            array (
                'permission_id' => 254,
                'role_id' => 2,
            ),
            10 => 
            array (
                'permission_id' => 255,
                'role_id' => 2,
            ),
            11 => 
            array (
                'permission_id' => 256,
                'role_id' => 2,
            ),
            12 => 
            array (
                'permission_id' => 257,
                'role_id' => 2,
            ),
            13 => 
            array (
                'permission_id' => 258,
                'role_id' => 2,
            ),
            14 => 
            array (
                'permission_id' => 259,
                'role_id' => 2,
            ),
            15 => 
            array (
                'permission_id' => 260,
                'role_id' => 2,
            ),
            16 => 
            array (
                'permission_id' => 261,
                'role_id' => 2,
            ),
            17 => 
            array (
                'permission_id' => 262,
                'role_id' => 2,
            ),
            18 => 
            array (
                'permission_id' => 1,
                'role_id' => 3,
            ),
            19 => 
            array (
                'permission_id' => 21,
                'role_id' => 3,
            ),
            20 => 
            array (
                'permission_id' => 22,
                'role_id' => 3,
            ),
            21 => 
            array (
                'permission_id' => 23,
                'role_id' => 3,
            ),
            22 => 
            array (
                'permission_id' => 24,
                'role_id' => 3,
            ),
            23 => 
            array (
                'permission_id' => 25,
                'role_id' => 3,
            ),
            24 => 
            array (
                'permission_id' => 26,
                'role_id' => 3,
            ),
            25 => 
            array (
                'permission_id' => 27,
                'role_id' => 3,
            ),
            26 => 
            array (
                'permission_id' => 28,
                'role_id' => 3,
            ),
            27 => 
            array (
                'permission_id' => 29,
                'role_id' => 3,
            ),
            28 => 
            array (
                'permission_id' => 30,
                'role_id' => 3,
            ),
            29 => 
            array (
                'permission_id' => 31,
                'role_id' => 3,
            ),
            30 => 
            array (
                'permission_id' => 32,
                'role_id' => 3,
            ),
            31 => 
            array (
                'permission_id' => 33,
                'role_id' => 3,
            ),
            32 => 
            array (
                'permission_id' => 34,
                'role_id' => 3,
            ),
            33 => 
            array (
                'permission_id' => 35,
                'role_id' => 3,
            ),
            34 => 
            array (
                'permission_id' => 36,
                'role_id' => 3,
            ),
            35 => 
            array (
                'permission_id' => 38,
                'role_id' => 3,
            ),
            36 => 
            array (
                'permission_id' => 39,
                'role_id' => 3,
            ),
            37 => 
            array (
                'permission_id' => 40,
                'role_id' => 3,
            ),
            38 => 
            array (
                'permission_id' => 41,
                'role_id' => 3,
            ),
            39 => 
            array (
                'permission_id' => 42,
                'role_id' => 3,
            ),
            40 => 
            array (
                'permission_id' => 43,
                'role_id' => 3,
            ),
            41 => 
            array (
                'permission_id' => 44,
                'role_id' => 3,
            ),
            42 => 
            array (
                'permission_id' => 45,
                'role_id' => 3,
            ),
            43 => 
            array (
                'permission_id' => 46,
                'role_id' => 3,
            ),
            44 => 
            array (
                'permission_id' => 47,
                'role_id' => 3,
            ),
            45 => 
            array (
                'permission_id' => 48,
                'role_id' => 3,
            ),
            46 => 
            array (
                'permission_id' => 49,
                'role_id' => 3,
            ),
            47 => 
            array (
                'permission_id' => 52,
                'role_id' => 3,
            ),
            48 => 
            array (
                'permission_id' => 53,
                'role_id' => 3,
            ),
            49 => 
            array (
                'permission_id' => 54,
                'role_id' => 3,
            ),
            50 => 
            array (
                'permission_id' => 55,
                'role_id' => 3,
            ),
            51 => 
            array (
                'permission_id' => 56,
                'role_id' => 3,
            ),
            52 => 
            array (
                'permission_id' => 57,
                'role_id' => 3,
            ),
            53 => 
            array (
                'permission_id' => 58,
                'role_id' => 3,
            ),
            54 => 
            array (
                'permission_id' => 59,
                'role_id' => 3,
            ),
            55 => 
            array (
                'permission_id' => 60,
                'role_id' => 3,
            ),
            56 => 
            array (
                'permission_id' => 61,
                'role_id' => 3,
            ),
            57 => 
            array (
                'permission_id' => 62,
                'role_id' => 3,
            ),
            58 => 
            array (
                'permission_id' => 63,
                'role_id' => 3,
            ),
            59 => 
            array (
                'permission_id' => 64,
                'role_id' => 3,
            ),
            60 => 
            array (
                'permission_id' => 65,
                'role_id' => 3,
            ),
            61 => 
            array (
                'permission_id' => 66,
                'role_id' => 3,
            ),
            62 => 
            array (
                'permission_id' => 67,
                'role_id' => 3,
            ),
            63 => 
            array (
                'permission_id' => 68,
                'role_id' => 3,
            ),
            64 => 
            array (
                'permission_id' => 73,
                'role_id' => 3,
            ),
            65 => 
            array (
                'permission_id' => 77,
                'role_id' => 3,
            ),
            66 => 
            array (
                'permission_id' => 81,
                'role_id' => 3,
            ),
            67 => 
            array (
                'permission_id' => 85,
                'role_id' => 3,
            ),
            68 => 
            array (
                'permission_id' => 89,
                'role_id' => 3,
            ),
            69 => 
            array (
                'permission_id' => 93,
                'role_id' => 3,
            ),
            70 => 
            array (
                'permission_id' => 94,
                'role_id' => 3,
            ),
            71 => 
            array (
                'permission_id' => 95,
                'role_id' => 3,
            ),
            72 => 
            array (
                'permission_id' => 96,
                'role_id' => 3,
            ),
            73 => 
            array (
                'permission_id' => 97,
                'role_id' => 3,
            ),
            74 => 
            array (
                'permission_id' => 101,
                'role_id' => 3,
            ),
            75 => 
            array (
                'permission_id' => 105,
                'role_id' => 3,
            ),
            76 => 
            array (
                'permission_id' => 109,
                'role_id' => 3,
            ),
            77 => 
            array (
                'permission_id' => 113,
                'role_id' => 3,
            ),
            78 => 
            array (
                'permission_id' => 117,
                'role_id' => 3,
            ),
            79 => 
            array (
                'permission_id' => 121,
                'role_id' => 3,
            ),
            80 => 
            array (
                'permission_id' => 125,
                'role_id' => 3,
            ),
            81 => 
            array (
                'permission_id' => 129,
                'role_id' => 3,
            ),
            82 => 
            array (
                'permission_id' => 133,
                'role_id' => 3,
            ),
            83 => 
            array (
                'permission_id' => 137,
                'role_id' => 3,
            ),
            84 => 
            array (
                'permission_id' => 141,
                'role_id' => 3,
            ),
            85 => 
            array (
                'permission_id' => 145,
                'role_id' => 3,
            ),
            86 => 
            array (
                'permission_id' => 149,
                'role_id' => 3,
            ),
            87 => 
            array (
                'permission_id' => 153,
                'role_id' => 3,
            ),
            88 => 
            array (
                'permission_id' => 157,
                'role_id' => 3,
            ),
            89 => 
            array (
                'permission_id' => 161,
                'role_id' => 3,
            ),
            90 => 
            array (
                'permission_id' => 165,
                'role_id' => 3,
            ),
            91 => 
            array (
                'permission_id' => 169,
                'role_id' => 3,
            ),
            92 => 
            array (
                'permission_id' => 173,
                'role_id' => 3,
            ),
            93 => 
            array (
                'permission_id' => 177,
                'role_id' => 3,
            ),
            94 => 
            array (
                'permission_id' => 181,
                'role_id' => 3,
            ),
            95 => 
            array (
                'permission_id' => 185,
                'role_id' => 3,
            ),
            96 => 
            array (
                'permission_id' => 189,
                'role_id' => 3,
            ),
            97 => 
            array (
                'permission_id' => 193,
                'role_id' => 3,
            ),
            98 => 
            array (
                'permission_id' => 197,
                'role_id' => 3,
            ),
            99 => 
            array (
                'permission_id' => 201,
                'role_id' => 3,
            ),
            100 => 
            array (
                'permission_id' => 205,
                'role_id' => 3,
            ),
            101 => 
            array (
                'permission_id' => 209,
                'role_id' => 3,
            ),
            102 => 
            array (
                'permission_id' => 213,
                'role_id' => 3,
            ),
            103 => 
            array (
                'permission_id' => 217,
                'role_id' => 3,
            ),
            104 => 
            array (
                'permission_id' => 221,
                'role_id' => 3,
            ),
            105 => 
            array (
                'permission_id' => 225,
                'role_id' => 3,
            ),
            106 => 
            array (
                'permission_id' => 229,
                'role_id' => 3,
            ),
            107 => 
            array (
                'permission_id' => 233,
                'role_id' => 3,
            ),
            108 => 
            array (
                'permission_id' => 237,
                'role_id' => 3,
            ),
            109 => 
            array (
                'permission_id' => 241,
                'role_id' => 3,
            ),
            110 => 
            array (
                'permission_id' => 245,
                'role_id' => 3,
            ),
            111 => 
            array (
                'permission_id' => 249,
                'role_id' => 3,
            ),
            112 => 
            array (
                'permission_id' => 253,
                'role_id' => 3,
            ),
            113 => 
            array (
                'permission_id' => 257,
                'role_id' => 3,
            ),
            114 => 
            array (
                'permission_id' => 261,
                'role_id' => 3,
            ),
            115 => 
            array (
                'permission_id' => 262,
                'role_id' => 3,
            ),
            116 => 
            array (
                'permission_id' => 1,
                'role_id' => 4,
            ),
            117 => 
            array (
                'permission_id' => 21,
                'role_id' => 4,
            ),
            118 => 
            array (
                'permission_id' => 25,
                'role_id' => 4,
            ),
            119 => 
            array (
                'permission_id' => 29,
                'role_id' => 4,
            ),
            120 => 
            array (
                'permission_id' => 33,
                'role_id' => 4,
            ),
            121 => 
            array (
                'permission_id' => 34,
                'role_id' => 4,
            ),
            122 => 
            array (
                'permission_id' => 35,
                'role_id' => 4,
            ),
            123 => 
            array (
                'permission_id' => 36,
                'role_id' => 4,
            ),
            124 => 
            array (
                'permission_id' => 38,
                'role_id' => 4,
            ),
            125 => 
            array (
                'permission_id' => 42,
                'role_id' => 4,
            ),
            126 => 
            array (
                'permission_id' => 46,
                'role_id' => 4,
            ),
            127 => 
            array (
                'permission_id' => 47,
                'role_id' => 4,
            ),
            128 => 
            array (
                'permission_id' => 48,
                'role_id' => 4,
            ),
            129 => 
            array (
                'permission_id' => 49,
                'role_id' => 4,
            ),
            130 => 
            array (
                'permission_id' => 52,
                'role_id' => 4,
            ),
            131 => 
            array (
                'permission_id' => 56,
                'role_id' => 4,
            ),
            132 => 
            array (
                'permission_id' => 60,
                'role_id' => 4,
            ),
            133 => 
            array (
                'permission_id' => 64,
                'role_id' => 4,
            ),
            134 => 
            array (
                'permission_id' => 68,
                'role_id' => 4,
            ),
            135 => 
            array (
                'permission_id' => 69,
                'role_id' => 4,
            ),
            136 => 
            array (
                'permission_id' => 70,
                'role_id' => 4,
            ),
            137 => 
            array (
                'permission_id' => 71,
                'role_id' => 4,
            ),
            138 => 
            array (
                'permission_id' => 73,
                'role_id' => 4,
            ),
            139 => 
            array (
                'permission_id' => 74,
                'role_id' => 4,
            ),
            140 => 
            array (
                'permission_id' => 75,
                'role_id' => 4,
            ),
            141 => 
            array (
                'permission_id' => 76,
                'role_id' => 4,
            ),
            142 => 
            array (
                'permission_id' => 77,
                'role_id' => 4,
            ),
            143 => 
            array (
                'permission_id' => 78,
                'role_id' => 4,
            ),
            144 => 
            array (
                'permission_id' => 79,
                'role_id' => 4,
            ),
            145 => 
            array (
                'permission_id' => 80,
                'role_id' => 4,
            ),
            146 => 
            array (
                'permission_id' => 81,
                'role_id' => 4,
            ),
            147 => 
            array (
                'permission_id' => 82,
                'role_id' => 4,
            ),
            148 => 
            array (
                'permission_id' => 83,
                'role_id' => 4,
            ),
            149 => 
            array (
                'permission_id' => 84,
                'role_id' => 4,
            ),
            150 => 
            array (
                'permission_id' => 85,
                'role_id' => 4,
            ),
            151 => 
            array (
                'permission_id' => 86,
                'role_id' => 4,
            ),
            152 => 
            array (
                'permission_id' => 87,
                'role_id' => 4,
            ),
            153 => 
            array (
                'permission_id' => 88,
                'role_id' => 4,
            ),
            154 => 
            array (
                'permission_id' => 89,
                'role_id' => 4,
            ),
            155 => 
            array (
                'permission_id' => 90,
                'role_id' => 4,
            ),
            156 => 
            array (
                'permission_id' => 91,
                'role_id' => 4,
            ),
            157 => 
            array (
                'permission_id' => 92,
                'role_id' => 4,
            ),
            158 => 
            array (
                'permission_id' => 93,
                'role_id' => 4,
            ),
            159 => 
            array (
                'permission_id' => 94,
                'role_id' => 4,
            ),
            160 => 
            array (
                'permission_id' => 95,
                'role_id' => 4,
            ),
            161 => 
            array (
                'permission_id' => 96,
                'role_id' => 4,
            ),
            162 => 
            array (
                'permission_id' => 97,
                'role_id' => 4,
            ),
            163 => 
            array (
                'permission_id' => 101,
                'role_id' => 4,
            ),
            164 => 
            array (
                'permission_id' => 105,
                'role_id' => 4,
            ),
            165 => 
            array (
                'permission_id' => 106,
                'role_id' => 4,
            ),
            166 => 
            array (
                'permission_id' => 107,
                'role_id' => 4,
            ),
            167 => 
            array (
                'permission_id' => 108,
                'role_id' => 4,
            ),
            168 => 
            array (
                'permission_id' => 109,
                'role_id' => 4,
            ),
            169 => 
            array (
                'permission_id' => 113,
                'role_id' => 4,
            ),
            170 => 
            array (
                'permission_id' => 117,
                'role_id' => 4,
            ),
            171 => 
            array (
                'permission_id' => 121,
                'role_id' => 4,
            ),
            172 => 
            array (
                'permission_id' => 125,
                'role_id' => 4,
            ),
            173 => 
            array (
                'permission_id' => 129,
                'role_id' => 4,
            ),
            174 => 
            array (
                'permission_id' => 133,
                'role_id' => 4,
            ),
            175 => 
            array (
                'permission_id' => 137,
                'role_id' => 4,
            ),
            176 => 
            array (
                'permission_id' => 141,
                'role_id' => 4,
            ),
            177 => 
            array (
                'permission_id' => 145,
                'role_id' => 4,
            ),
            178 => 
            array (
                'permission_id' => 149,
                'role_id' => 4,
            ),
            179 => 
            array (
                'permission_id' => 153,
                'role_id' => 4,
            ),
            180 => 
            array (
                'permission_id' => 157,
                'role_id' => 4,
            ),
            181 => 
            array (
                'permission_id' => 161,
                'role_id' => 4,
            ),
            182 => 
            array (
                'permission_id' => 165,
                'role_id' => 4,
            ),
            183 => 
            array (
                'permission_id' => 169,
                'role_id' => 4,
            ),
            184 => 
            array (
                'permission_id' => 173,
                'role_id' => 4,
            ),
            185 => 
            array (
                'permission_id' => 177,
                'role_id' => 4,
            ),
            186 => 
            array (
                'permission_id' => 181,
                'role_id' => 4,
            ),
            187 => 
            array (
                'permission_id' => 185,
                'role_id' => 4,
            ),
            188 => 
            array (
                'permission_id' => 189,
                'role_id' => 4,
            ),
            189 => 
            array (
                'permission_id' => 193,
                'role_id' => 4,
            ),
            190 => 
            array (
                'permission_id' => 197,
                'role_id' => 4,
            ),
            191 => 
            array (
                'permission_id' => 201,
                'role_id' => 4,
            ),
            192 => 
            array (
                'permission_id' => 205,
                'role_id' => 4,
            ),
            193 => 
            array (
                'permission_id' => 209,
                'role_id' => 4,
            ),
            194 => 
            array (
                'permission_id' => 213,
                'role_id' => 4,
            ),
            195 => 
            array (
                'permission_id' => 217,
                'role_id' => 4,
            ),
            196 => 
            array (
                'permission_id' => 221,
                'role_id' => 4,
            ),
            197 => 
            array (
                'permission_id' => 225,
                'role_id' => 4,
            ),
            198 => 
            array (
                'permission_id' => 229,
                'role_id' => 4,
            ),
            199 => 
            array (
                'permission_id' => 233,
                'role_id' => 4,
            ),
            200 => 
            array (
                'permission_id' => 237,
                'role_id' => 4,
            ),
            201 => 
            array (
                'permission_id' => 241,
                'role_id' => 4,
            ),
            202 => 
            array (
                'permission_id' => 245,
                'role_id' => 4,
            ),
            203 => 
            array (
                'permission_id' => 249,
                'role_id' => 4,
            ),
            204 => 
            array (
                'permission_id' => 253,
                'role_id' => 4,
            ),
            205 => 
            array (
                'permission_id' => 257,
                'role_id' => 4,
            ),
            206 => 
            array (
                'permission_id' => 261,
                'role_id' => 4,
            ),
            207 => 
            array (
                'permission_id' => 262,
                'role_id' => 4,
            ),
        ));
        
        
    }
}