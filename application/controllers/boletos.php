<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 22/06/2016
 * Time: 19:41
 */

use OpenBoleto\Banco\Banrisul;
use OpenBoleto\Agente;
include 'vendor/autoload.php';

class boletos extends CI_Controller
{

    public function index()
    {
        $sacado = new Agente('Fernando Maia', '023.434.234-34', 'ABC 302 Bloco N', '72000-000', 'Brasília', 'DF');
        $cedente = new Agente('Caio Henrique', '02.123.123/0001-11', 'José Carlos dos Santos', '98700-000', 'Ijui', 'RS');

        $boleto = new Banrisul(array(
            // Parâmetros obrigatórios
            'dataVencimento' => new DateTime('2013-01-24'),
            'valor' => 23.00,
            'sequencial' => 9274, // Para gerar o nosso número
            'sacado' => $sacado,
            'cedente' => $cedente,
            'agencia' => 1724, // Até 4 dígitos
            'carteira' => 18,
            'conta' => 10403005, // Até 8 dígitos
            'convenio' => 1234, // 4, 6 ou 7 dígitos
        ));
        //echo $boleto->gerarNossoNumero();
        echo $boleto->getOutput();
        //echo static::modulo10Banrisul("00009274");
    }

    public function index1()
    {
        echo $codigo_banco = Cnab\Banco::BANRISUL;
        $arquivo = new Cnab\Remessa\Cnab400\Arquivo($codigo_banco);
        $arquivo->configure(array(
            'codigo_banco'  => '0100',
            'data_gravacao' => new DateTime(),
            'nome_empresa'  => 'Nome Fantasia da sua empresa', // seu nome de empresa
        ));



// você pode adicionar vários boletos em uma remessa
        $arquivo->insertDetalhe(array(
            'cedente'      => '0100',
            'ident_titulo' => '123',
            'nosso_numero' => '10000000',
            'seu_numero' => '1234',
            'vencimento' => new DateTime(),
            'valor' => '1024',
            'codigo_inscricao' => '1',
            'inscricao' => '84543809068',
            'nome' => 'Caio Henrique Ribeiro Martins',
            'endereco' => 'Alcindo Pereira Gomes',
            'cep' => '98700000',
            'cidade' => 'Ijui',
            'uf' => 'RS',
        ));
        // para salvar
        $arquivo->save('meunomedearquivo.txt');
    }
}