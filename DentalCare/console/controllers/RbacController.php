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
        $addEstadoClinico = $auth->createPermission('addEstadoClinico');
        $addEstadoClinico->description = "Adicionar estado Clinico";
        $auth->add($addEstadoClinico);

        // Cria a permissão readEstadoClinico - Ver dados Clinicos
        $readEstadoClinico = $auth->createPermission('readEstadoClinico');
        $readEstadoClinico->description = "Ver estados Clinicos";
        $auth->add($readEstadoClinico);



        // Cria a permissão updateEstadoClinico - Atualizar Estado Clinico
        $updateEstadoClinico = $auth->createPermission('updateEstadoClinico');
        $updateEstadoClinico->description = "Atualizar dados Clinicos";
        $auth->add($updateEstadoClinico);



        //TODO: PERMISSSOES PRODUTOS CRUD

        // Criar a permissão createProdutos - Criar Produtos
        $createProdutos = $auth->createPermission('createProdutos');
        $createProdutos->description = "Create Produtos";
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

        // Cria a permissão disable - Disable Ivas
        $disableIva = $auth->createPermission('disableIva');
        $disableIva->description = "Disable dados Iva";
        $auth->add($disableIva);


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

        // Cria a permissão readUtilizadorByUser - Ver Dados do próprio utente
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

        // Cria a permissão addEmpresa - Adicionar dados empresa
        $addEmpresa = $auth->createPermission('addEmpresa');
        $addEmpresa->description = "Adicionar dados empresa";
        $auth->add($addEmpresa);

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
        $addCarrinho = $auth->createPermission('addCarrinho');
        $addCarrinho->description = "Adicionar ao carrinho de compras";
        $auth->add($addCarrinho);

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

        // Cria o utilizador "Utente"
        $utente = $auth->createRole("utente");
        $auth->add($utente);
        $auth->addChild($utente, $viewLogin);
        $auth->addChild($utente, $doLogout);
        $auth->addChild($utente, $createConsulta);
        $auth->addChild($utente, $updateConsulta);
        $auth->addChild($utente, $readConsulta);
        $auth->addChild($utente, $desmarcarConsulta);
        $auth->addChild($utente, $readEstadoClinico);
        $auth->addChild($utente, $readUtilizadorByUser);
        $auth->addChild($utente, $readCarrinho);
        $auth->addChild($utente, $addCarrinho);
        $auth->addChild($utente, $deleteCarrinho);
        $auth->addChild($utente, $updateCarrinho);
        $auth->addChild($utente, $readProdutosFO);
        $auth->addChild($utente, $addEstadoClinico);

        // Cria o utilizador "Médico"
        $medico = $auth->createRole("medico");
        $auth->add($medico);
        $auth->addChild($medico, $viewLogin);
        $auth->addChild($medico, $doLogout);
        $auth->addChild($medico, $createConsulta);
        $auth->addChild($medico, $createConsultaByMedic);
        $auth->addChild($medico, $updateConsulta);
        $auth->addChild($medico, $readConsulta);
        $auth->addChild($medico, $desmarcarConsulta);
        $auth->addChild($medico, $readEstadoClinico);
        $auth->addChild($medico, $createProdutos);
        $auth->addChild($medico, $readProdutosBO);
        $auth->addChild($medico, $updateProdutos);
        $auth->addChild($medico, $deleteProdutos);
        $auth->addChild($medico, $readUtilizadorByFunc);
        $auth->addChild($medico, $updateEstadoClinico);
        $auth->addChild($medico, $readEstadoClinico);


        // Cria o utilizador "Funcionario"
        $funcionario = $auth->createRole("funcionario");
        $auth->add($funcionario);
        $auth->addChild($funcionario, $viewLogin);
        $auth->addChild($funcionario, $doLogout);
        $auth->addChild($funcionario, $createConsulta);
        $auth->addChild($funcionario, $createConsultaByMedic);
        $auth->addChild($funcionario, $updateConsulta);
        $auth->addChild($funcionario, $readConsulta);
        $auth->addChild($funcionario, $desmarcarConsulta);
        $auth->addChild($funcionario, $createProdutos);
        $auth->addChild($funcionario, $readProdutosBO);
        $auth->addChild($funcionario, $updateProdutos);
        $auth->addChild($funcionario, $deleteProdutos);
        $auth->addChild($funcionario, $updateIva);
        $auth->addChild($funcionario, $createUtilizadorByFunc);
        $auth->addChild($funcionario, $readUtilizadorByFunc);
        $auth->addChild($funcionario, $updateUtilizadorByFunc);
        $auth->addChild($funcionario, $disableUtilizadorByFunc);
        $auth->addChild($funcionario, $createIva);
        $auth->addChild($funcionario, $readIva);
        $auth->addChild($funcionario, $updateIva);
        $auth->addChild($funcionario, $disableIva);


        // Cria o utilizador "Administrador"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $viewLogin);
        $auth->addChild($admin, $doLogout);
        $auth->addChild($admin, $createConsulta);
        $auth->addChild($admin, $createConsultaByMedic);
        $auth->addChild($admin, $updateConsulta);
        $auth->addChild($admin, $readConsulta);
        $auth->addChild($admin, $desmarcarConsulta);
        $auth->addChild($admin, $createProdutos);
        $auth->addChild($admin, $readProdutosBO);
        $auth->addChild($admin, $updateProdutos);
        $auth->addChild($admin, $deleteProdutos);
        $auth->addChild($admin, $updateIva);
        $auth->addChild($admin, $createUtilizadorByAdm);
        $auth->addChild($admin, $createUtilizadorByFunc);
        $auth->addChild($admin, $readUtilizadorByFunc);
        $auth->addChild($admin, $updateUtilizadorByUser);
        $auth->addChild($admin, $updateUtilizadorByFunc);
        $auth->addChild($admin, $updateUtilizadorByAdm);
        $auth->addChild($admin, $disableUtilizadorByAdm);
        $auth->addChild($admin, $disableUtilizadorByFunc);
        $auth->addChild($admin, $addEmpresa);
        $auth->addChild($admin, $readEmpresa);
        $auth->addChild($admin, $updateEmpresa);
        $auth->addChild($admin, $createIva);
        $auth->addChild($admin, $readIva);
        $auth->addChild($admin, $updateIva);
        $auth->addChild($admin, $disableIva);
        $auth->addChild($admin, $readProdutosFO);
        $auth->addChild($admin, $addEstadoClinico);
        $auth->addChild($admin, $updateEstadoClinico);
        $auth->addChild($admin, $readEstadoClinico);

    }

}