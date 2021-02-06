<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testApi()
    {
        $dados = [
            'nome' => 'Lilian',
            'email' => 'lilica@outlook.com',
            'endereco' => 'Av Góis',
            'curriculo' => 'Rua molin',
            'telefone' => '984049215',
            'last_login_at' => '1988-11-19',
            'last_login_ip' => '2572725'

        ];

        
    }
}
