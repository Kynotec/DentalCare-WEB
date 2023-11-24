<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

    public function actionInit()
    {
        try
        {

        $auth = Yii::$app->authManager;
        $auth->removeAll();

        //TODO: PERMISSSÂO LOGIN / Logout

        // Criar a permissão viewLogin - Fazer Login
        $viewLoginBo = $auth->createPermission('viewLoginBo');
        $viewLoginBo->description = "Fazer Login BO";
        $auth->add($viewLoginBo);


        // Criar a permissão doLogout - Fazer Logout
        $doLogout = $auth->createPermission('doLogout');
        $doLogout->description = "Fazer Logout";
        $auth->add($doLogout);


        //TODO: PERMISSSOES CONSULTAS CRU  com desmarcar

        // Criar a permissão createConsulta - Criar Consulta por Todos Utilizadores
        $createConsulta = $auth->createPermission('createConsulta');
        $createConsulta->description = "Create Consulta";
        $auth->add($createConsulta);

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

        // Criar a permissão readProdutos - Ver Produtos
        $readProdutos = $auth->createPermission('readProdutos');
        $readProdutos->description = "Ver Produtos ";
        $auth->add($readProdutos);

        // criar a permissão updateProdutos - Update Produtos
        $updateProdutos = $auth->createPermission('updateProdutos');
        $updateProdutos->description = "Update dados Produtos";
        $auth->add($updateProdutos);

        // Cria a permissão deleteProdutos - Delete Produtos
        $deleteProdutos = $auth->createPermission('deleteProdutos');
        $deleteProdutos->description = "Delete dados Produtos";
        $auth->add($deleteProdutos);


            //TODO: PERMISSSOES SERVICOS CRUD

            // Criar a permissão createServicos - Criar Servicos
            $createServicos = $auth->createPermission('createServicos');
            $createServicos->description = "Create Servicos";
            $auth->add($createServicos);

            // Criar a permissão readServicos - Ver Servicos
            $readServicos = $auth->createPermission('readServicos');
            $readServicos->description = "Ver Servicos ";
            $auth->add($readServicos);

            // criar a permissão updateServicos - Update Servicos
            $updateServicos = $auth->createPermission('updateServicos');
            $updateServicos->description = "Update dados Servicos";
            $auth->add($updateServicos);

            // Cria a permissão deleteServicos - Delete Servicos
            $deleteServicos = $auth->createPermission('deleteServicos');
            $deleteServicos->description = "Delete dados Servicos";
            $auth->add($deleteServicos);

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


        // Cria a permissão createUtilizador - Criar Utilizador
        $createUtilizador = $auth->createPermission('createUtilizador');
        $createUtilizador->description = 'Create Utilizador';
        $auth->add($createUtilizador);

        //Cria a permisao createFuncionario - Criar createFuncionario Por Admin
            $createFuncionario = $auth->createPermission('createFuncionario');
            $createFuncionario->description = 'Create Funcionario';
            $auth->add($createFuncionario);

            //Cria a permisao createMedico - Criar createMedico Por Admin
            $createMedico = $auth->createPermission('createMedico');
            $createMedico->description = 'Create Medico';
            $auth->add($createMedico);




        // Cria a permissão readUtilizador - Ver Utilizadores
        $readUtilizador = $auth->createPermission('readUtilizador');
        $readUtilizador->description = "Ler dados";
        $auth->add($readUtilizador);

        // Cria a permissão updateUtilizador - Update utilizador
        $updateUtilizador = $auth->createPermission('updateUtilizador');
        $updateUtilizador->description = "Update Utilizador";
        $auth->add($updateUtilizador);


        // Cria a permissão disableUtilizador - Desativar utilizador
        $disableUtilizador = $auth->createPermission('disableUtilizador');
        $disableUtilizador->description = "Disable Utilizador";
        $auth->add($disableUtilizador);


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
        $auth->addChild($utente, $doLogout);
        $auth->addChild($utente, $createConsulta);
        $auth->addChild($utente, $updateConsulta);
        $auth->addChild($utente, $readConsulta);
        $auth->addChild($utente, $desmarcarConsulta);
        $auth->addChild($utente, $readEstadoClinico);
        $auth->addChild($utente, $readCarrinho);
        $auth->addChild($utente, $addCarrinho);
        $auth->addChild($utente, $deleteCarrinho);
        $auth->addChild($utente, $updateCarrinho);
        $auth->addChild($utente, $readProdutos);

        // Cria o utilizador "Médico"
        $medico = $auth->createRole("medico");
        $auth->add($medico);
        $auth->addChild($medico, $utente);
        $auth->addChild($medico, $viewLoginBo);
        $auth->addChild($medico, $addEstadoClinico);
        $auth->addChild($medico, $readEstadoClinico);
        $auth->addChild($medico, $updateEstadoClinico);

        // Cria o utilizador "Funcionario"
        $funcionario = $auth->createRole("funcionario");
        $auth->add($funcionario);
        $auth->addChild($funcionario, $viewLoginBo);
        $auth->addChild($funcionario, $doLogout);
        $auth->addChild($funcionario, $createConsulta);
        $auth->addChild($funcionario, $updateConsulta);
        $auth->addChild($funcionario, $readConsulta);
        $auth->addChild($funcionario, $desmarcarConsulta);
        $auth->addChild($funcionario, $createProdutos);
        $auth->addChild($funcionario, $readProdutos);
        $auth->addChild($funcionario, $updateProdutos);
        $auth->addChild($funcionario, $deleteProdutos);
        $auth->addChild($funcionario, $updateIva);
        $auth->addChild($funcionario, $createUtilizador);
        $auth->addChild($funcionario, $readUtilizador);
        $auth->addChild($funcionario, $updateUtilizador);
        $auth->addChild($funcionario, $disableUtilizador);
        $auth->addChild($funcionario, $createIva);
        $auth->addChild($funcionario, $readIva);
        $auth->addChild($funcionario, $disableIva);
        $auth->addChild($funcionario, $createServicos);
        $auth->addChild($funcionario, $readServicos);
        $auth->addChild($funcionario, $updateServicos);
        $auth->addChild($funcionario, $deleteServicos);
        $auth->addChild($funcionario, $createFaturas);
        $auth->addChild($funcionario, $readFaturas);
        $auth->addChild($funcionario, $updateFaturas);
        $auth->addChild($funcionario, $disableFaturas);

        // Cria o utilizador "Administrador"
        $admin = $auth->createRole('administrador');
        $auth->add($admin);
        $auth->addChild($admin, $funcionario);
        $auth->addChild($admin, $addEmpresa);
        $auth->addChild($admin, $readEmpresa);
        $auth->addChild($admin, $updateEmpresa);
        $auth->addChild($admin, $createFuncionario);
        $auth->addChild($admin, $createMedico);


            $auth->assign($admin, 1);



        }
        catch (\Exception $exception)
        {
            print_r($exception->getMessage());
            print_r($exception->getLine());
        }

    }

    public function actionClear()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }

}