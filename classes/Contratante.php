<?php

class Contratante extends Usuario{
    private $idContratante; //Pk
    private $cnpj;          //Char(14)

    public function getIdContratante()
    {
        return $this->idContratante;
    }
    public function setIdContratante($idContratante)
    {
        $this->idContratante = $idContratante;
    }
    //----------------------------------
    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    //----------------------------------

    public function cadastrarContratante($contratante){
        $conexao = Conexao::pegarConexao();

        //--------------------------------Cadastrar na tbUsuario--------------------------------//
        $stmt = $conexao->prepare("INSERT INTO tbusuario (email,senha)
                                                        VALUES (?,?)");
        $stmt->bindvalue(1, $contratante->getEmail());
        $stmt->bindvalue(2, /*password_hash(*/ $contratante->getSenha()/*, PASSWORD_DEFAULT, ['cost' => 12])*/);
        $stmt->execute();

        $querySelect = "SELECT MAX(idUsuario) idUsuario FROM tbusuario";
        $resultado = $conexao->query($querySelect);
        $idUsuario = $resultado->fetch(PDO::FETCH_ASSOC);
        $contratante->setIdUsuario($idUsuario['idUsuario']);
        
        //--------------------------------Cadastrar na tbContratante--------------------------------//
        $stmt = $conexao->prepare("INSERT INTO tbcontratante (idUsuario,nomeContratante,cnpjContratante,cpfContratante
                                                            ,cepContratante,logradouroContratante,bairroContratante
                                                            ,cidadeContratante,ufContratante,complementoContratante
                                                            ,fotoPerfil,dataNascimento,statusPerfil)
                                                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindvalue(1, $contratante->getIdUsuario());
        $stmt->bindvalue(2, $contratante->getNome());
        $stmt->bindvalue(3, $contratante->getCnpj());
        $stmt->bindvalue(4, $contratante->getCpf());
        $stmt->bindvalue(5, $contratante->getCep());
        $stmt->bindvalue(6, $contratante->getLogradouro());
        $stmt->bindvalue(7, $contratante->getBairro());
        $stmt->bindvalue(8, $contratante->getCidade());
        $stmt->bindvalue(9, $contratante->getUf());
        $stmt->bindvalue(10, $contratante->getComplementoEndereco());
        $stmt->bindvalue(11, $contratante->caminhoimagem);
        $stmt->bindvalue(12, $contratante->getDataNascimento());
        $stmt->bindvalue(13, $contratante->getStatusPerfil());
        $stmt->execute();

        $querySelect = "SELECT MAX(idContratante) idContratante FROM tbcontratante";
        $resultado = $conexao->query($querySelect);
        $idContratante = $resultado->fetch(PDO::FETCH_ASSOC);
        $contratante->setIdContratante($idContratante['idContratante']);

        //--------------------------------Cadastrar na tbTelContratante--------------------------------//
        $stmt = $conexao->prepare("INSERT INTO tbtelcontratante (descTelContratante,idContratante)
                                                                VALUES (?,?)");
        $stmt->bindvalue(1, $contratante->getTelefone());
        $stmt->bindvalue(2, $contratante->getIdContratante());
        $stmt->execute();

        if ($_SESSION['idUsuario'] != $idUsuario['idUsuario']) {
            session_start();
            $_SESSION = array();
            session_destroy();
        }
        session_start();
        $_SESSION['idUsuario'] = $idUsuario['idUsuario'];
        $_SESSION['primeiroAcesso'] = 1;

        return 'Contratante cadastrado com sucesso!!';
    }
    
    public function excluirConta($contratante){
        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("DELETE FROM tbcontato
                                   WHERE idUsuario = ?");
        $stmt->bindvalue(1, $contratante->getIdUsuario());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbchat
                                   WHERE idUsuario = ?");
        $stmt->bindvalue(1, $contratante->getIdUsuario());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbpublicacao
                                   WHERE idUsuario = ?");
        $stmt->bindvalue(1, $contratante->getIdUsuario());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbtelcontratante
                                   WHERE idContratante = ?");
        $stmt->bindvalue(1, $contratante->getIdContratante());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbcontratante
                                   WHERE idContratante = ?");
        $stmt->bindvalue(1, $contratante->getIdContratante());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbusuario
                                   WHERE idUsuario = ?");
        $stmt->bindvalue(1, $contratante->getIdUsuario());
        $stmt->execute();
        
        session_start();
        $_SESSION = array();
        session_destroy();

        header("Location: ../login.php");
        return true;
    }


    public function atualizarDados($contratante){
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare("UPDATE tbcontratante
                                    SET nomeContratante = ?
                                        ,cnpjContratante = ?
                                        ,cpfContratante = ?
                                        ,cepContratante = ?
                                        ,logradouroContratante = ?
                                        ,bairroContratante = ?
                                        ,cidadeContratante = ?
                                        ,ufContratante = ?
                                        ,complementoContratante = ?
                                        ,dataNascimento = ?
                                        ,biografia = ?
                                        ,fotoPerfil = ?
                                    WHERE idContratante = ?");
        $stmt->bindValue(1, $contratante->getNome());
        $stmt->bindValue(2, $contratante->getCnpj());
        $stmt->bindValue(3, $contratante->getCpf());
        $stmt->bindValue(4, $contratante->getCep());
        $stmt->bindValue(5, $contratante->getLogradouro());
        $stmt->bindValue(6, $contratante->getBairro());
        $stmt->bindValue(7, $contratante->getCidade());
        $stmt->bindValue(8, $contratante->getUf());
        $stmt->bindValue(9, $contratante->getComplementoEndereco());
        $stmt->bindValue(10, $contratante->getDataNascimento());
        $stmt->bindValue(11, $contratante->getBiografia());
        $stmt->bindValue(12, $contratante->caminhoimagem);
        $stmt->bindValue(13, $contratante->getIdContratante());
        $stmt->execute();
        return "Atualização de dados realizado com sucesso!";
    }
    
    public function listarDadosContratante(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT tbcontratante.idContratante,tbcontratante.idUsuario,nomeContratante,cnpjContratante
                                ,cpfContratante,cepContratante,logradouroContratante,bairroContratante
                                ,complementoContratante,cidadeContratante,ufContratante,fotoPerfil,biografia,email
                                ,senha,DATE_FORMAT(dataNascimento, '%d %m %Y') AS dataNascimento,statusPerfil,dataCriacao,descTelContratante FROM tbcontratante
                                INNER JOIN tbusuario ON tbcontratante.idUsuario = tbusuario.idUsuario
                                INNER JOIN tbtelcontratante ON tbcontratante.idContratante = tbtelcontratante.idContratante
                                ORDER BY idContratante";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public function listarDadosContratante2($idUsuario){
        $conexao = Conexao::pegarConexao();
        $querySelect = $conexao->prepare("SELECT c.idContratante,c.idUsuario,nomeContratante,cnpjContratante
                                ,cpfContratante,cepContratante,logradouroContratante,bairroContratante
                                ,complementoContratante,cidadeContratante,ufContratante,fotoPerfil,biografia,email
                                ,DATE_FORMAT(dataNascimento, '%d %m %Y') AS dataNascimento,statusPerfil,dataCriacao,descTelContratante FROM tbcontratante AS c
                                INNER JOIN tbusuario AS u ON c.idUsuario = u.idUsuario
                                INNER JOIN tbtelcontratante AS tel ON c.idContratante = tel.idContratante
                                WHERE c.idUsuario = ?");
        $querySelect->bindValue(1, $idUsuario->getIdUsuario());
        $querySelect->execute();
        $lista = $querySelect->fetchAll();
        return $lista;
    }
}
?>