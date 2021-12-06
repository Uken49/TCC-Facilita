<?php

class Profissional extends Usuario {
    private $idProfissional;    //Pk
    private $rg;                //Varchar(14)

    public function getIdProfissional()
    {
        return $this->idProfissional;
    }
    public function setIdProfissional($idProfissional)
    {
        $this->idProfissional = $idProfissional;
    }
    //----------------------------------
    public function getRg()
    {
        return $this->rg;
    }
    public function setRg($rg)
    {
        $this->rg = $rg;
    }
    //----------------------------------

    public function cadastrarProfissional($profissional){
        $conexao = Conexao::pegarConexao();
        //--------------------------------Cadastrar na tbUsuario--------------------------------//
        $stmt = $conexao->prepare("INSERT INTO tbusuario (email,senha)
                                                        VALUES (?,?)");
        $stmt->bindvalue(1, $profissional->getEmail());
        $stmt->bindvalue(2, /*password_hash(*/ $profissional->getSenha()/*, PASSWORD_DEFAULT, ['cost' => 12])*/);
        $stmt->execute();

        $querySelect = "SELECT MAX(idUsuario) idUsuario FROM tbusuario";
        $resultado = $conexao->query($querySelect);
        $idUsuario = $resultado->fetch(PDO::FETCH_ASSOC);
        $profissional->setIdUsuario($idUsuario['idUsuario']);

        //--------------------------------Cadastrar na tbProfissional--------------------------------//
        $stmt = $conexao->prepare("INSERT INTO tbprofissional (tbprofissional.idUsuario,nomeProfissional,rgProfissional,cpfProfissional
                                                            ,cepProfissional,logradouroProfissional,bairroProfissional
                                                            ,cidadeProfissional,ufProfissional,complementoProfissional
                                                            ,fotoPerfil,dataNascimento,statusPerfil)
                                                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bindvalue(1, $profissional->getIdUsuario());
        $stmt->bindvalue(2, $profissional->getNome());
        $stmt->bindvalue(3, $profissional->getRg());
        $stmt->bindvalue(4, $profissional->getCpf());
        $stmt->bindvalue(5, $profissional->getCep());
        $stmt->bindvalue(6, $profissional->getLogradouro());
        $stmt->bindvalue(7, $profissional->getBairro());
        $stmt->bindvalue(8, $profissional->getCidade());
        $stmt->bindvalue(9, $profissional->getUf());
        $stmt->bindvalue(10, $profissional->getComplementoEndereco());
        $stmt->bindvalue(11, $profissional->caminhoimagem);
        $stmt->bindvalue(12, $profissional->getDataNascimento());
        $stmt->bindvalue(13, $profissional->getStatusPerfil());
        $stmt->execute();

        $querySelect = "SELECT MAX(idProfissional) idProfissional FROM tbprofissional";
        $resultado = $conexao->query($querySelect);
        $idProfissional = $resultado->fetch(PDO::FETCH_ASSOC);
        $profissional->setIdProfissional($idProfissional['idProfissional']);

        //--------------------------------Cadastrar na tbTelProfissional--------------------------------//
        $stmt = $conexao->prepare("INSERT INTO tbtelprofissional (descTelProfissional,idProfissional)
                                                                VALUES (?,?)");
        $stmt->bindvalue(1, $profissional->getTelefone());
        $stmt->bindvalue(2, $profissional->getIdProfissional());
        $stmt->execute();

        if ($_SESSION['idUsuario'] != $idUsuario['idUsuario']) {
            session_start();
            $_SESSION = array();
            session_destroy();
        }
        session_start();
        $_SESSION['idUsuario'] = $idUsuario['idUsuario'];

        return 'Profissional cadastrado com sucesso!!';
    }

    public function excluirConta($profissional){
        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("DELETE FROM tbcontato
                                   WHERE idUsuario = ?");
        $stmt->bindvalue(1, $profissional->getIdUsuario());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbqualificacoes
                                   WHERE idProfissional = ?");
        $stmt->bindvalue(1, $profissional->getIdProfissional());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbchat
                                   WHERE idUsuario = ?");
        $stmt->bindvalue(1, $profissional->getIdUsuario());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbhabilidadesprofissional
                                   WHERE idProfissional = ?");
        $stmt->bindvalue(1, $profissional->getIdProfissional());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbpublicacao
                                   WHERE idUsuario = ?");
        $stmt->bindvalue(1, $profissional->getIdUsuario());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbtelprofissional
                                   WHERE idProfissional = ?");
        $stmt->bindvalue(1, $profissional->getIdProfissional());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbprofissional
                                   WHERE idProfissional = ?");
        $stmt->bindvalue(1, $profissional->getIdProfissional());
        $stmt->execute();

        $stmt = $conexao->prepare("DELETE FROM tbusuario
                                   WHERE idUsuario = ?");
        $stmt->bindvalue(1, $profissional->getIdUsuario());
        $stmt->execute();

        session_start();
        $_SESSION = array();
        session_destroy();

        header("Location: ../login.php");
        return true;
    }

    public function atualizarDados($profissional){
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare("UPDATE tbprofissional
                                    SET nomeProfissional = ?
                                        ,rgProfissional = ?
                                        ,cpfProfissional = ?
                                        ,cepProfissional = ?
                                        ,logradouroProfissional = ?
                                        ,bairroProfissional = ?
                                        ,cidadeProfissional = ?
                                        ,ufProfissional = ?
                                        ,complementoProfissional = ?
                                        ,dataNascimento = ?
                                        ,biografia = ?
                                        ,fotoPerfil = ?
                                    WHERE idProfissional = ?");
        $stmt->bindValue(1, $profissional->getNome());
        $stmt->bindValue(2, $profissional->getRg());
        $stmt->bindValue(3, $profissional->getCpf());
        $stmt->bindValue(4, $profissional->getCep());
        $stmt->bindValue(5, $profissional->getLogradouro());
        $stmt->bindValue(6, $profissional->getBairro());
        $stmt->bindValue(7, $profissional->getCidade());
        $stmt->bindValue(8, $profissional->getUf());
        $stmt->bindValue(9, $profissional->getComplementoEndereco());
        $stmt->bindValue(10, $profissional->getDataNascimento());
        $stmt->bindValue(11, $profissional->getBiografia());
        $stmt->bindValue(12, $profissional->caminhoimagem);
        $stmt->bindValue(13, $profissional->getIdProfissional());
        $stmt->execute();
        return "Atualização de dados realizado com sucesso!";
    }
    
    public function listarDadosProfissional(){
        $conexao = Conexao::pegarConexao();
        $querySelect = ("SELECT p.idProfissional,p.idUsuario,nomeProfissional,rgProfissional
                                ,cpfProfissional,cepProfissional,logradouroProfissional,bairroProfissional
                                ,cidadeProfissional,ufProfissional,complementoProfissional,fotoPerfil,biografia,email
                                ,senha,DATE_FORMAT(dataNascimento, '%d %m %Y') AS dataNascimento,statusPerfil,dataCriacao,descTelProfissional FROM tbprofissional AS p
                                INNER JOIN tbusuario AS u ON p.idUsuario = u.idUsuario
                                INNER JOIN tbtelprofissional AS tel ON p.idProfissional = tel.idProfissional
                                ORDER BY idProfissional");
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public function listarDadosProfissional2($profissional){
        $conexao = Conexao::pegarConexao();
        $querySelect = $conexao->prepare("SELECT p.idProfissional,p.idUsuario,nomeProfissional,fotoPerfil,biografia,email
                                        ,statusPerfil, h.descHabilidades,cidadeProfissional,descTelProfissional FROM tbprofissional AS p
                                        LEFT JOIN tbusuario AS u ON p.idUsuario = u.idUsuario
                                        LEFT JOIN tbhabilidadesprofissional AS hp ON p.idProfissional = hp.idProfissional
                                        LEFT JOIN tbhabilidades AS h ON h.idHabilidades = hp.idHabilidades
                                        LEFT JOIN tbtelprofissional AS tel ON p.idProfissional = tel.idProfissional
                                        WHERE p.idUsuario = ?");
        $querySelect->bindValue(1, $profissional->getIdUsuario());
        $querySelect->execute();
        $lista = $querySelect->fetchAll();
        return $lista;
    }
}
?>