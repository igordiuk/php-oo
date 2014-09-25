<?php
//chama a classe cliente
require_once 'classes/Cliente.php';
require_once 'classes/ClientePJ.php';

//instancia 10 clientes para fins de testes
$cli01 = new   Cliente('01',  'F', 'Zeca Baleiro',         '111.111.111-11', 'Rua Numero Um',      '01', '81.100-100', 'Bairro Novo',   'Curitiba',      'PR', 'email01@email.com.br', '41 2222-1111', '41 9999-1111', 3);
$cli02 = new   Cliente('02',  'F', 'Jorge Aragao',         '222.222.222-22', 'Rua Numero Dois',    '02', '22.200-200', 'Carmelitas',    'Florianopolis', 'SC', 'email02@email.com.br', '48 3222-2222', '48 9999-2222', 4);
$cli03 = new   Cliente('03',  'F', 'Zeca Pagodinho',       '333.333.333-33', 'Rua Numero Tres',    '03', '33.300-300', 'Centro',        'Paranagua',     'PR', 'email03@email.com.br', '48 3777-4444', '48 9999-3333', 1);
$cli04 = new   Cliente('04',  'F', 'Paulinho da Viola',    '444.222.444-22', 'Rua Numero Quatro',  '04', '44.400-400', 'Distrito 1',    'Joinville',     'SC', 'email04@email.com.br', '48 3221-5555', '48 9999-4444', 3);
$cli05 = new   Cliente('05',  'F', 'Ana Carolina',         '222.555.222-55', 'Rua Numero Cinco',   '05', '52.500-500', 'Hauer',         'Timbo',         'SC', 'email05@email.com.br', '48 3445-6666', '48 9999-5555', 2);
$cli06 = new   Cliente('06',  'F', 'Seu Jorge',            '666.222.666-22', 'Rua Numero Seis',    '06', '62.600-200', 'CIC',           'Lajes',         'SC', 'email06@email.com.br', '48 3222-7777', '48 9999-6666', 5);
$cli07 = new   Cliente('07',  'F', 'Arnaldo Antunes',      '222.777.777-22', 'Rua Numero Sete',    '07', '72.700-200', 'Reboucas',      'Mafra',         'SC', 'email07@email.com.br', '48 3545-8888', '48 9999-7777', 5);
$cli08 = new   Cliente('08',  'F', 'Branco Melo',          '888.222.222-88', 'Rua Numero Oito',    '08', '82.800-200', 'Jardins',       'Rio Negrinho',  'SC', 'email08@email.com.br', '48 3765-9999', '48 9999-8888', 4);
$cli09 = new   Cliente('09',  'F', 'Paula Fernandes',      '999.222.999-22', 'Rua Numero Nove',    '09', '92.900-200', 'Barreirinha',   'Sao Bento',     'RS', 'email09@email.com.br', '51 3444-1111', '48 9999-9999', 4);
$cli10 = new   Cliente('10',  'F', 'Renato Teixeira',      '123.222.432-98', 'Rua Numero Dez',     '10', '12.000-200', 'Centro',        'Rio Negro',     'PR', 'email10@email.com.br', '47 3555-2222', '48 9999-0000', 2);
$cli11 = new ClientePJ('11',  'J', 'Sony Records',     '00.000.000/0000-00', 'Rua Numero Onze',    '21', '11.111-111', 'Planalto',      'Rio de Janeiro','RJ', 'email11@email.com.br', '21 2111-1222', '21 9111-9999', 3);
$cli12 = new ClientePJ('12',  'J', 'Som Livre',        '00.123.345/0001-12', 'Rua Numero Doze',    '21', '22.333-333', 'Copacabana',    'Rio de Janeiro','RJ', 'email12@email.com.br', '21 2333-3332', '21 9888-9999', 5);

#instanciando endereco de cobranca para alguns clientes
$cli01->setCobrancaCompleto('Rua da Cobranca', '01', '01.001-001', 'Cobranca 1', 'Curitiba', 'PR');
$cli03->setCobrancaCompleto('Rua da Cobranca', '03', '03.003-003', 'Bairro Cobranca', 'Paranagua', 'PR');
$cli06->setCobrancaCompleto('Rua da Cobranca', '06', '06.006-006', 'Dividas', 'Curitiba', 'PR');
$cli08->setCobrancaCompleto('Rua da Cobranca', '08', '08.008-008', 'Jardins', 'Rio Negrinho', 'RJ');
$cli11->setCobrancaCompleto('Rua da Cobranca', '11', '11.011-011', 'Bairro dos Carnes', 'Planalto', 'RJ');

//atribui clientes instanciados num array
$clientes = array($cli01, $cli02, $cli03, $cli04, $cli05, $cli06, $cli07, $cli08, $cli09, $cli10, $cli11, $cli12);

//verifica variaveis de controle "ordem" e "id"
if (isset($_GET['ordem'])) {
    $ordem = ($_GET['ordem'] == '') ? 'A' : $_GET['ordem'];
} else {
    $ordem = 'A';
}
if (isset($_GET['tipo'])) {
    $tipo = ($_GET['tipo'] == '') ? 'T' : $_GET['tipo'];
} else {
    $tipo = 'F';
}
if (isset($_GET['id'])) {
    $id = ($_GET['id'] == '') ? '' : $_GET['id'];
} else {
    $id = '';
}

//verifica se foi passado algum "id" para consulta
if ($id!='') {

    //testar tipo de cliente
    $tipoCliente = ($clientes[$id-1]->tipo == 'F') ? 'Pessoa Física' : 'Pessoa Jurídica';

    //definicar nota do cliente (classificacao)
    $estrela = "";
    for ($i = 0; $i < $clientes[$id-1]->nota; $i++) {
        $estrela .= "<i class='icon-star'></i>";
    }

    //carregar o detalhamento do cadastro do cliente
    ?>

    <h3>Cliente # <?=$id?>: <b><?=$clientes[$id-1]->nome;?></b> </h3>

    <table class="table table-condensed">
        <tr>
            <td colspan="2" style="background-color: #cccccc"><b>Informações do Cliente</b></td>
        </tr>
        <tr>
            <td>ID</td>
            <td><?=$clientes[$id-1]->id;?></td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td><?=$tipoCliente;?></td>
        </tr>
        <tr>
            <td>Nome</td>
            <td><?=$clientes[$id-1]->cpf;?></td>
        </tr>
        <tr>
            <td>CNPJ/CPF</td>
            <td><?=$clientes[$id-1]->nome;?></td>
        </tr>
        <tr>
            <td>Classificação</td>
            <td><?=$estrela;?></td>
        </tr>

        <tr>
            <td colspan="2" style="background-color: #cccccc"><b>Endereço do Cliente</b></td>
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

        <!--ENDERECO COBRANCA -->
        <?php if(!is_null($clientes[$id-1]->enderecoCobranca)) {?>

            <tr>
                <td colspan="2" style="background-color: #cccccc"><b>Endereço Cobrança</b></td>
            </tr>

            <tr>
                <td>Endereço</td>
                <td><?=$clientes[$id-1]->enderecoCobranca;?></td>
            </tr>
            <tr>
                <td>Numero</td>
                <td><?=$clientes[$id-1]->numeroCobranca;?></td>
            </tr>
            <tr>
                <td>Cep</td>
                <td><?=$clientes[$id-1]->cepCobranca;?></td>
            </tr>
            <tr>
                <td>Bairro</td>
                <td><?=$clientes[$id-1]->bairroCobranca;?></td>
            </tr>
            <tr>
                <td>Cidade</td>
                <td><?=$clientes[$id-1]->cidadeCobranca;?></td>
            </tr>
            <tr>
                <td>UF</td>
                <td><?=$clientes[$id-1]->ufCobranca;?></td>
            </tr>
        <?php } ?>

        <!-- FIM ENDERECO COBRANCA -->

        <tr>
            <td colspan="2" style="background-color: #cccccc"><b>Dados de Contato</b></td>
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

    <div class="text-center"><a href='cliente?tipo=<?=$tipo?>&ordem=<?=$ordem?>'><i class='icon-home'></i> Voltar para a Listagem</a></div>

    <?php


} else {

    //listar todos os clientes atraves de uma tabela simples

    //definir criterio de ordenacao
    if($ordem=='A') {
        //ordenar crescente
        ksort($clientes, 0);
    } else {
        //ordenar decrescente
        krsort($clientes, 0);


    }

    ?>

    <h1>Clientes</h1>

    <table class="table">
    <tr>
        <td>
            <label for="ordem">Tipo Cliente:
                <select id="tipo" onchange="filtrar();">
                    <option value="T" <?php if($tipo=='T') {?> selected <?php }?>>Todos</option>
                    <option value="F" <?php if($tipo=='F') {?> selected <?php }?>>Pessoa Física</option>
                    <option value="J" <?php if($tipo=='J') {?> selected <?php }?>>Pessoa Jurídica</option>
                </select>
            </label>
        </td>
        <td>
            <label for="ordem">Ordenação:
                <select id="ordem" onchange="filtrar();">
                    <option value="A" <?php if($ordem=='A') {?> selected <?php }?>>Ascendente</option>
                    <option value="D" <?php if($ordem=='D') {?> selected <?php }?>>Descendente</option>
                </select>
            </label>
        </td>
    </tr>
    </table>

    <table class="table table-condensed">
        <caption><h3>Listagem de Clientes</h3></caption>
        <thead>
        <th>#</th>
        <th>Nome</th>
        <th></th>
        <th>Cidade</th>
        <th>UF</th>
        <th>Telefone</th>
        <th>Tipo Cliente</th>
        <th>Classificação</th>
        <th>Ação</th>
        </thead>

        <?php
        //carregar os clientes
        foreach ($clientes as $cliente) {

            //testar tipo de cliente
            $tipoCliente = ($cliente->tipo == 'F') ? 'Pessoa Física' : 'Pessoa Jurídica';

            //definicar nota do cliente (classificacao)
            $estrela = "";
            for ($i = 0; $i < $cliente->nota; $i++) {
                $estrela .= "<i class='icon-star'></i>";
            }

            //icone de alerta para endereco de cobranca (para diferenciar)
            $iconeCobranca = (!is_null($cliente->enderecoCobranca)) ? "<i class='icon-lock' title='Endereço Cobrança Diferenciado!'></i>": "";

            //verifica se cliente deve ser exibido ou nao
            if (($tipo==$cliente->tipo) || ($tipo == 'T')) {

                echo "<tr>
                        <td>$cliente->id</td>
                        <td>$cliente->nome</td>
                        <td>$iconeCobranca</td>
                        <td>$cliente->cidade</td>
                        <td>$cliente->uf</td>
                        <td>$cliente->telefone</td>
                        <td>$tipoCliente</td>
                        <td>$estrela</td>
                        <td><a href='?id=$cliente->id&tipo=$tipo&ordem=$ordem'><i class='icon-book'></i> Detalhar</a></td>
                      </tr>";

            }

        }
        ?>


    </table>

<?php
}
?>

<script language="JavaScript">

    function filtrar() {

        tipo = document.getElementById('tipo').value;
        ordem = document.getElementById('ordem').value;

        document.location = '/?tipo=' + tipo + '&ordem=' + ordem;

    }

</script>