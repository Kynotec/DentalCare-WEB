<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();


        //TODO: PERMISSSÂO LOGIN / Logout

        // Criar a permissão viewLogin - Fazer Login
        $viewLogin = $auth->createPermission('viewLogin');
        $viewLogin->description = "Fazer Login";
        $auth->add($viewLogin);

        // Criar a permissão doLogout - Fazer Logout
        $doLogout = $auth->createPermission('doLogout');
        $doLogout->description = "Fazer Logout";
        $auth->add($doLogout);




        //TODO: PERMISSSOES CONSULTAS CRU  com desmarcar

        // Criar a permissão createConsulta - Criar Consulta por Todos Utilizadores
        $createConsulta = $auth->createPermission('createConsulta');
        $createConsulta->description = "Create Consulta";
        $auth->add($createConsulta);

        // Criar a permissão createConsultaByMedic - Criar Consultas por Medico
        $createConsultaByMedic = $auth->createPermission('createConsultaByMedic');
        $createConsultaByMedic->description = "Create Consulta by Medic";
        $auth->add($createConsultaByMedic);


        // Criar a permissão readConsulta - Ver Consulta
        $readConsulta = $auth->createPermission('readConsulta');
        $readConsulta->description = "Ver dados Consulta";
        $auth->add($readConsulta);

        // criar a permissão updateConsulta - Update Consulta
        $updateConsulta = $auth->createPermission('updateConsulta');
        $updateConsulta->description = "Update dados Consulta";
        $auth->add($updateConsulta);

        // Cria a permissão desmarcarConsulta - Desmarcar Consulta
        $desmarcarConsulta = $auth->createPermission('desmarcarConsulta');
        $desmarcarConsulta->description = "Desmarcar Consultas";
        $auth->add($desmarcarConsulta);


        //TODO: PERMISSOES Estado Clinico CRU


        // Cria a permissão createEstadoClinico - Criar Estado Clinico
        $createEstadoClinico = $auth->createPermission('createEstadoClinico');
        $createEstadoClinico->description = "Criar estado Clinico";
        $auth->add($createEstadoClinico);

        // Cria a permissão readEstadoClinico - Ver dados Clinicos
        $readEstadoClinico = $auth->createPermission('readEstadoClinico');
        $readEstadoClinico->description = "Ver estados Clinicos";
        $auth->add($readEstadoClinico);

        // Cria a permissão updateEstadoClinico - Atualizar dados Clinicos
        $updateEstadoClinico = $auth->createPermission('updateEstadoClinico');
        $updateEstadoClinico->description = "Atualizar dados Clinicos";
        $auth->add($updateEstadoClinico);



        //TODO: PERMISSSOES PRODUTOS CRUD

        // Criar a permissão createProdutos - Criar Produtos
        $createProdutos = $auth->createPermission('createProdutos');
        $createProdutos->description = "Create utilizador";
        $auth->add($createProdutos);

        //Produtos FO
        // Criar a permissão readProdutosFO - Ver Produtos FO
        $readProdutosFO = $auth->createPermission('readProdutosFO');
        $readProdutosFO->description = "Ver Produtos FO";
        $auth->add($readProdutosFO);

        // Produtos BO
        // Criar a permissão readProdutosBO - Ver Produtos BO
        $readProdutosBO = $auth->createPermission('readProdutosBO');
        $readProdutosBO->description = "Ver Produtos BO";
        $auth->add($readProdutosBO);

        // criar a permissão updateProdutos - Update Produtos
        $updateProdutos = $auth->createPermission('updateProdutos');
        $updateProdutos->description = "Update dados Produtos";
        $auth->add($updateProdutos);

        // Cria a permissão deleteProdutos - Delete Produtos
        $deleteProdutos = $auth->createPermission('deleteProdutos');
        $deleteProdutos->description = "Delete dados Produtos";
        $auth->add($deleteProdutos);

        //TODO: PERMISSOES IVA CRUD

        // Criar a permissão createIva - Criar Iva
        $createIva = $auth->createPermission('createIva');
        $createIva->description = "Create Iva";
        $auth->add($createIva);

        // Criar a permissão readIva - Ver Iva
        $readIva = $auth->createPermission('readIva');
        $readIva->description = "Ver dados Iva";
        $auth->add($readIva);

        // criar a permissão updateIva - Update Ivas
        $updateIva = $auth->createPermission('updateIva');
        $updateIva->description = "Update dados Iva";
        $auth->add($updateIva);

        // Cria a permissão deleteIva - Delete Ivas
        $deleteIva = $auth->createPermission('deleteIva');
        $deleteIva->description = "Delete dados Iva";
        $auth->add($deleteIva);


        //TODO: PERMISSOES UTILIZADORES CRUD

        //Coloca permissao apenas em Admin para criar contas
        // Cria a permissão createUtilizadorAdm - Criar Utilizador ADM
        $createUtilizadorByAdm = $auth->createPermission('createUtilizadorByAdm');
        $createUtilizadorByAdm->description = 'Create Utilizador by ADM';
        $auth->add($createUtilizadorByAdm);

        // Cria a permissão createUtilizadorByFunc - Criar Utilizador por Funcionario
        $createUtilizadorByFunc = $auth->createPermission('createUtilizadorByFunc');
        $createUtilizadorByFunc->description = 'Create Utilizador by Func';
        $auth->add($createUtilizadorByFunc);

        // Cria a permissão readUtilizadorByUser - Ver Utilizadores por Funcionario
        $readUtilizadorByUser = $auth->createPermission('readUtilizadorByUser');
        $readUtilizadorByUser->description = "Ler dados User";
        $auth->add($readUtilizadorByUser);

        // Cria a permissão readUtilizadorByFunc - Ver Utilizadores por Funcionario
        $readUtilizadorByFunc = $auth->createPermission('readUtilizadorByFunc');
        $readUtilizadorByFunc->description = "Ver Utilizadores por Funcionario";
        $auth->add($readUtilizadorByFunc);

        // Cria a permissão updateUtilizadorByUser - Update utilizador por User
        $updateUtilizadorByUser = $auth->createPermission('updateUtilizadorByUser');
        $updateUtilizadorByUser->description = "Update Utilizador by User";
        $auth->add($updateUtilizadorByUser);

        // Cria a permissão updateUtilizadorByFunc - Update utilizador por Funcionario
        $updateUtilizadorByFunc = $auth->createPermission('updateUtilizadorByFunc');
        $updateUtilizadorByFunc->description = "Update Utilizador by Func";
        $auth->add($updateUtilizadorByFunc);

        //Coloca permissao apenas em Admin para atualizar contas
        // Cria a permissão updateUtilizadorAdm - Update utilizador por Adm
        $updateUtilizadorByAdm = $auth->createPermission('updateUtilizadorByAdm');
        $updateUtilizadorByAdm->description = "Update Utilizador by ADM";
        $auth->add($updateUtilizadorByAdm);

        //Coloca permissao apenas em Admin para desativar contas
        // Cria a permissão disableUtilizadorAdm - Desativar utilizador por Admin
        $disableUtilizadorByAdm = $auth->createPermission('disableUtilizadorByAdm');
        $disableUtilizadorByAdm->description = "Disable Utilizador by ADM";
        $auth->add($disableUtilizadorByAdm);

        // Fazer o Funcionario Desativar Contas
        // Cria a permissão disableUtilizadorFunc - Desativar utilizador por Funcionario
        $disableUtilizadorByFunc = $auth->createPermission('disableUtilizadorByFunc');
        $disableUtilizadorByFunc->description = "Disable Utilizador by FUNC";
        $auth->add($disableUtilizadorByFunc);



        //TODO: PERMISSOES Faturas


        // Cria a permissão createFaturas - Criar  Faturas
        $createFaturas = $auth->createPermission('createFaturas');
        $createFaturas->description = "Criar Faturas";
        $auth->add($createFaturas);

        // Cria a permissão readFaturas - Ver dados Faturas
        $readFaturas = $auth->createPermission('readFaturas');
        $readFaturas->description = "Ver dados Faturas";
        $auth->add($readFaturas);

        // Cria a permissão updateFaturas - Update  Faturas
        $updateFaturas = $auth->createPermission('updateFaturas');
        $updateFaturas->description = "Update Faturas";
        $auth->add($updateFaturas);

        // Cria a permissão disableFaturas - Desativar  Faturas
        $disableFaturas = $auth->createPermission('disableFaturas');
        $disableFaturas->description = "Desativar Faturas";
        $auth->add($disableFaturas);


        //TODO: PERMISSOES EMPRESA


        // Cria a permissão createEmpresa - Criar dados empresa
        $createEmpresa = $auth->createPermission('createEmpresa');
        $createEmpresa->description = "Criar dados empresa";
        $auth->add($createEmpresa);

        // Cria a permissão readEmpresa - Ver dados empresa
        $readEmpresa = $auth->createPermission('readEmpresa');
        $readEmpresa->description = "Ver dados empresa";
        $auth->add($readEmpresa);

        // Cria a permissão updateEmpresa - Atualizar dados empresa
        $updateEmpresa = $auth->createPermission('updateEmpresa');
        $updateEmpresa->description = "Atualizar dados empresa";
        $auth->add($updateEmpresa);



        //TODO: PERMISSOES CARRINHO

        // Cria a permissão createCarrinho - Criar Carrinho
        $createCarrinho = $auth->createPermission('createCarrinho');
        $createCarrinho->description = "Criar carrinho compras";
        $auth->add($createCarrinho);

        // Cria a permissão readCarrinho - Ver Carrinho
        $readCarrinho = $auth->createPermission('readCarrinho');
        $readCarrinho->description = "Ver carrinho compras";
        $auth->add($readCarrinho);

        // Cria a permissão updateCarrinho - Update Artigos Carrinho
        $updateCarrinho = $auth->createPermission('updateCarrinho');
        $updateCarrinho->description = "Atualizar artigos carrinho";
        $auth->add($updateCarrinho);


        // Cria a permissão deleteCarrinho - Eliminar artigos Carrinho
        $deleteCarrinho = $auth->createPermission('deleteCarrinho');
        $deleteCarrinho->description = "Elimiar  artigos do carrinho ";
        $auth->add($deleteCarrinho);




        //TODO: Criar Utilizadores com Permissoes

        // Cria o utilizador "Cliente"
        $cliente = $auth->createRole("cliente");
        $auth->add($cliente);
        $auth->addChild();

        // Cria o utilizador "Médico"
        $medico = $auth->createRole("medico");
        $auth->add($medico);
        $auth->addChild();

        // Cria o utilizador "Funcionario"
        $funcionario = $auth->createRole("funcionario");
        $auth->add($funcionario);
        $auth->addChild();


        // Cria o utilizador "Administrador"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild();

    }

}