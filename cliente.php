<?php

//chama a classe cliente
require_once 'classes/Cliente.php';

//instancia 10 clientes para fins de testes
$cli01 = new Cliente(1, 'Zeca Baleiro',         '111.111.111-11', 'Rua Numero Um',      '01', '81.100-100', 'Bairro Novo',   'Curitiba',      'PR', 'email01@email.com.br', '41 2222-1111', '41 9999-1111');
$cli02 = new Cliente(2, 'Jorge Aragao',         '222.222.222-22', 'Rua Numero Dois',    '02', '22.200-200', 'Carmelitas',    'Florianopolis', 'SC', 'email02@email.com.br', '48 3222-2222', '48 9999-2222');
$cli03 = new Cliente(3, 'Zeca Pagodinho',       '333.333.333-33', 'Rua Numero Tres',    '03', '33.300-300', 'Centro',        'Paranagua',     'PR', 'email02@email.com.br', '48 3777-4444', '48 9999-3333');
$cli04 = new Cliente(4, 'Paulinho da Viola',    '444.222.444-22', 'Rua Numero Quatro',  '04', '44.400-400', 'Distrito 1',    'Joinville',     'SC', 'email02@email.com.br', '48 3221-5555', '48 9999-4444');
$cli05 = new Cliente(5, 'Ana Carolina',         '222.555.222-55', 'Rua Numero Cinco',   '05', '52.500-500', 'Hauer',         'Timbo',         'SC', 'email02@email.com.br', '48 3445-6666', '48 9999-5555');
$cli06 = new Cliente(6, 'Seu Jorge',            '666.222.666-22', 'Rua Numero Seis',    '06', '62.600-200', 'CIC',           'Lajes',         'SC', 'email02@email.com.br', '48 3222-7777', '48 9999-6666');
$cli07 = new Cliente(7, 'Arnaldo Antunes',      '222.777.777-22', 'Rua Numero Sete',    '07', '72.700-200', 'Reboucas',      'Mafra',         'SC', 'email02@email.com.br', '48 3545-8888', '48 9999-7777');
$cli08 = new Cliente(8, 'Branco Melo',          '888.222.222-88', 'Rua Numero Oito',    '08', '82.800-200', 'Jardins',       'Rio Negrinho',  'SC', 'email02@email.com.br', '48 3765-9999', '48 9999-8888');
$cli09 = new Cliente(9, 'Paula Fernandes',      '999.222.999-22', 'Rua Numero Nove',    '09', '92.900-200', 'Barreirinha',   'Sao Bento',     'RS', 'email02@email.com.br', '51 3444-1111', '48 9999-9999');
$cli10 = new Cliente(10, 'Renato Teixeira',     '123.222.432-98', 'Rua Numero Dez',     '10', '12.000-200', 'Centro',        'Rio Negro',     'PR', 'email02@email.com.br', '47 3555-2222', '48 9999-0000');

//atribui clientes instanciados num array
$clientes = array($cli01, $cli02, $cli03, $cli04, $cli05, $cli06, $cli07, $cli08, $cli09, $cli10);

//verifica variaveis de controle "ordem" e "id"
if (isset($_GET['ordem'])) {
    $ordem = ($_GET['ordem'] == '') ? 'A' : $_GET['ordem'];
} else {
    $ordem = 'A';
}
if (isset($_GET['id'])) {
    $id = ($_GET['id'] == '') ? '' : $_GET['id'];
} else {
    $id = '';
}

//verifica se foi passado algum "id" para consulta
if ($id!='') {

    //carregar o detalhamento do cadastro do cliente
    ?>

    <h3>Cliente # <?=$id?>: <b><?=$clientes[$id-1]->nome;?></b> </h3>

    <table class="table table-condensed">

        <tr>
            <td>ID</td>
            <td><?=$clientes[$id-1]->id;?></td>
        </tr>
        <tr>
            <td>Nome</td>
            <td><?=$clientes[$id-1]->nome;?></td>
        </tr>
        <tr>
            <td>CNPJ/CPF</td>
            <td><?=$clientes[$id-1]->cnpjcpf;?></td>
        </tr>
        <tr>
            <td>Endereço</td>
            <td><?=$clientes[$id-1]->endereco;?></td>
        </tr>
        <tr>
            <td>Numero</td>
            <td><?=$clientes[$id-1]->numero;?></td>
        </tr>
        <tr>
            <td>Cep</td>
            <td><?=$clientes[$id-1]->cep;?></td>
        </tr>
        <tr>
            <td>Bairro</td>
            <td><?=$clientes[$id-1]->bairro;?></td>
        </tr>
        <tr>
            <td>Cidade</td>
            <td><?=$clientes[$id-1]->cidade;?></td>
        </tr>
        <tr>
            <td>UF</td>
            <td><?=$clientes[$id-1]->uf;?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?=$clientes[$id-1]->email;?></td>
        </tr>
        <tr>
            <td>Telefone</td>
            <td><?=$clientes[$id-1]->telefone;?></td>
        </tr>
        <tr>
            <td>Celular</td>
            <td><?=$clientes[$id-1]->celular;?></td>
        </tr>

    </table>

    <div class="text-center"><a href='cliente?ordem=<?=$ordem?>'><i class='icon-home'></i> Voltar para a Listagem</a></div>

    <?php


} else {

    //listar todos os clientes atraves de uma tabela simples

    //definir criterio de ordenacao
    if($ordem=='A') {
        //ordenar crescente
        asort($clientes);
    } else {
        //ordenar decrescente
        arsort($clientes);
    }

    ?>

    <h1>Listagem de Clientes</h1>
    <p>Listage de Clientes carregadas através de um array.</p>

    <label for="ordem">Ordenação:
        <select id="ordem" onchange="reordenar(this.value);">
            <option value="A" <?php if($ordem=='A') {?> selected <?php }?>>Ascendente</option>
            <option value="D" <?php if($ordem=='D') {?> selected <?php }?>>Descendente</option>
        </select>
    </label>

    <table class="table table-condensed">
        <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Cidade</th>
        <th>UF</th>
        <th>Telefone</th>
        <th>Ação</th>
        </thead>

        <?php
        //carregar os clientes
        foreach ($clientes as $cliente) {

            echo "<tr>
                    <td>$cliente->id</td>
                    <td>$cliente->nome</td>
                    <td>$cliente->cidade</td>
                    <td>$cliente->uf</td>
                    <td>$cliente->telefone</td>
                    <td><a href='?id=$cliente->id&ordem=$ordem'><i class='icon-book'></i> Detalhar</a></td>
                  </tr>";

        }
        ?>


    </table>

<?php
}
?>

<script language="JavaScript">

    //funcao responsavel por ordenar listagem
    function reordenar(ordem) {
        if (ordem == 'A') {
            document.location = '/?ordem=A';
        } else {
            document.location = '/?ordem=D';
        }

    }
</script>