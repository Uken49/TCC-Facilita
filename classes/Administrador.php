<?php
    class Administrador{
        //--------------------------------MÉTODOS PARA OS GRÁFICOS--------------------------------//
        public function listarMes(){
            $conexao = Conexao::pegarConexao();
            $querySelect = "SELECT DATE_FORMAT(dataCriacao,'%m') AS 'Mês' FROM tbusuario
                            WHERE MONTH(dataCriacao) >= 1 && MONTH(dataCriacao) <= 12";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function listarUsuarioOnline(){
            $conexao = Conexao::pegarConexao();
            $querySelect = "SELECT COUNT(p.statusPerfil) statusProfissional,COUNT(c.statusPerfil) statusContratante FROM tbusuario AS u
                            LEFT JOIN tbcontratante AS c ON u.idUsuario = c.idUsuario
                            LEFT JOIN tbprofissional AS p ON u.idUsuario = p.idUsuario
                            WHERE p.statusPerfil = 1 OR c.statusPerfil = 1";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
        
        public function listarUsuarioOffline(){
            $conexao = Conexao::pegarConexao();
            $querySelect = "SELECT COUNT(p.statusPerfil) statusProfissional,COUNT(c.statusPerfil) statusContratante FROM tbusuario AS u
                            LEFT JOIN tbcontratante AS c ON u.idUsuario = c.idUsuario
                            LEFT JOIN tbprofissional AS p ON u.idUsuario = p.idUsuario
                            WHERE p.statusPerfil = 0 OR c.statusPerfil = 0";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
        
        public function listarQtdUsuario(){
            $conexao = Conexao::pegarConexao();
            $querySelect = "SELECT COUNT(idUsuario) qtdUsuario FROM tbusuario";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function listarRegiaoUsuario(){
            $conexao = Conexao::pegarConexao();
            $querySelect = "SELECT idContratante,idProfissional FROM tbusuario
                            LEFT JOIN tbcontratante ON tbusuario.idUsuario = tbcontratante.idUsuario
                            LEFT JOIN tbprofissional ON tbusuario.idUsuario = tbprofissional.idUsuario
                            WHERE ufContratante LIKE 'AC' OR ufProfissional LIKE 'AC'
                            OR ufContratante LIKE 'AL' OR ufProfissional LIKE 'AL'
                            OR ufContratante LIKE 'AP' OR ufProfissional LIKE 'AP'
                            OR ufContratante LIKE 'AM' OR ufProfissional LIKE 'AM'
                            OR ufContratante LIKE 'BA' OR ufProfissional LIKE 'BA'
                            OR ufContratante LIKE 'CE' OR ufProfissional LIKE 'CE'
                            OR ufContratante LIKE 'ES' OR ufProfissional LIKE 'ES'
                            OR ufContratante LIKE 'GO' OR ufProfissional LIKE 'GO'
                            OR ufContratante LIKE 'MA' OR ufProfissional LIKE 'MA'
                            OR ufContratante LIKE 'MT' OR ufProfissional LIKE 'MT'
                            OR ufContratante LIKE 'MS' OR ufProfissional LIKE 'MS'
                            OR ufContratante LIKE 'MG' OR ufProfissional LIKE 'MG'
                            OR ufContratante LIKE 'PA' OR ufProfissional LIKE 'PA'
                            OR ufContratante LIKE 'PB' OR ufProfissional LIKE 'PB'
                            OR ufContratante LIKE 'PR' OR ufProfissional LIKE 'PR'
                            OR ufContratante LIKE 'PE' OR ufProfissional LIKE 'PE'
                            OR ufContratante LIKE 'PI' OR ufProfissional LIKE 'PI'
                            OR ufContratante LIKE 'RJ' OR ufProfissional LIKE 'RJ'
                            OR ufContratante LIKE 'RN' OR ufProfissional LIKE 'RN'
                            OR ufContratante LIKE 'RS' OR ufProfissional LIKE 'RS'
                            OR ufContratante LIKE 'RO' OR ufProfissional LIKE 'RO'
                            OR ufContratante LIKE 'RR' OR ufProfissional LIKE 'RR'
                            OR ufContratante LIKE 'SC' OR ufProfissional LIKE 'SC'
                            OR ufContratante LIKE 'SP' OR ufProfissional LIKE 'SP'
                            OR ufContratante LIKE 'SE' OR ufProfissional LIKE 'SE'
                            OR ufContratante LIKE 'TO' OR ufProfissional LIKE 'TO'
                            OR ufContratante LIKE 'DF' OR ufProfissional LIKE 'DF'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

    }
?>