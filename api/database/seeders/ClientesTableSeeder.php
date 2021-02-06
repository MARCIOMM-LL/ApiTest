<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'nome' => 'Lilian',
            'email' => 'lilica@outlook.com',
            'endereco' => 'Av Góis',
            'curriculo' => 'Rua molin',
            'telefone' => '984049215',
            'last_login_at' => '1988-11-19',
            'last_login_ip' => ''

        ];

        DB::table('api')->insert($dados);
    }
}
