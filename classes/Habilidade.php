<?php

class Habilidade{
    private $idHabilidade;             //Pk
    private $idHabilidadeProfissional; //Pk
    private $idProfissional;           //Fk
    private $descHabilidade;           //Varchar 60
    
    public function getIdHabilidade()
    {
        return $this->idHabilidade;
    }
    public function setIdHabilidade($idHabilidade)
    {
        $this->idHabilidade = $idHabilidade;
    }
    //----------------------------------
    public function getDescHabilidade()
    {
        return $this->descHabilidade;
    }
    public function setDescHabilidade($descHabilidade)
    {
        $this->descHabilidade = $descHabilidade;
    }
    //----------------------------------
    public function getIdHabilidadeProfissional()
    {
        return $this->idHabilidadeProfissional;
    }
    public function setIdHabilidadeProfissional($idHabilidadeProfissional)
    {
        $this->idHabilidadeProfissional = $idHabilidadeProfissional;
    }
    //----------------------------------
    public function getIdProfissional()
    {
        return $this->idProfissional;
    }
    public function setIdProfissional($idProfissional)
    {
        $this->idProfissional = $idProfissional;
    }
    //----------------------------------

    public function cadastrarHabilidade($habilidade){
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare("INSERT INTO tbhabilidades (descHabilidades)
                                                            VALUES (?)");

        $stmt->bindvalue(1, $habilidade->getDescHabilidade());
        $stmt->execute();
        return 'Habilidade cadastrada com sucesso!!';
    }

    public function listarHabilidade(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT idHabilidades,descHabilidades FROM tbhabilidades
                        ORDER BY idHabilidades";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function cadastrarHabDoProfissional($habilidade){
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare("INSERT INTO tbhabilidadesprofissional (idHabilidades,idProfissional)
                                                            VALUES (?,?)");

        $stmt->bindvalue(1, $habilidade->getIdHabilidade());
        $stmt->bindvalue(2, $habilidade->getIdProfissional());
        $stmt->execute();
        return 'Habilidade do profissional cadastrada com sucesso!!';
    }

    public function listarHabDoProfissional(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT idHabilidadesProfissional,idHabilidades,idProfissional FROM tbhabilidadesprofissional
                                ORDER BY idHabilidadesProfissional";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public function listarHabDoProfissional2($habilidade){
        $conexao = Conexao::pegarConexao();
        $querySelect = $conexao->prepare("SELECT hp.idHabilidadesProfissional,hp.idHabilidades,hp.idProfissional,h.descHabilidades FROM tbhabilidadesprofissional hp
                                        LEFT JOIN tbhabilidades AS h ON h.idHabilidades = hp.idHabilidades
                                        WHERE idProfissional = ?
                                        ORDER BY idHabilidadesProfissional");
        $querySelect->bindValue(1, $habilidade->getIdProfissional());
        $querySelect->execute();
        $lista = $querySelect->fetchAll();
        return $lista;
    }
}

    
