<?php

class Usuario{
    private $idUsuario;          //Pk
    private $email;              //Varchar(60)
    private $senha;              //Varchar(20)
    private $nome;               //Varchar(60)
    private $dataNascimento;     //Date
    private $cpf;                //Char(11)
    private $cep;                //Char(9)
    private $logradouro;         //Varchar(100)
    private $bairro;             //Varchar(100)
    private $cidade;             //Varchar(30)
    private $uf;                 //Char(2)
    private $complementoEndereco;//Varchar(100)
    public $caminhoimagem;       //Varchar (1000)
    public $nomeimagem;          //Não armazenado no banco
    private $biografia;          //Varchar(255)
    private $telefone;           //Varchar(12)
    private $statusPerfil;       //Bit (1)
    private $idChat;             //Pk
    private $conversaChat;       //Text
    private $dataChat;           //Timestamp
    private $idPublicacao;       //Pk
    private $textoPublicacao;    //Text
    private $pesquisa;           //Text
    private $pesquisaHab;        //Text
    private $pesquisaUf;         //Text

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    //----------------------------------
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    //----------------------------------
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    //----------------------------------
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    //----------------------------------
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }
    //----------------------------------
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    //----------------------------------
    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    //----------------------------------
    public function getLogradouro()
    {
        return $this->logradouro;
    }
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }
    //----------------------------------
    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    //----------------------------------
    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    //----------------------------------
    public function getUf()
    {
        return $this->uf;
    }
    public function setUf($uf)
    {
        $this->uf = $uf;
    }
    //----------------------------------
    public function getComplementoEndereco()
    {
        return $this->complementoEndereco;
    }
    public function setComplementoEndereco($complementoEndereco)
    {
        $this->complementoEndereco = $complementoEndereco;
    }
    //----------------------------------
    public function getBiografia()
    {
        return $this->biografia;
    }
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;
    }
    //----------------------------------
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    //----------------------------------
    public function getStatusPerfil()
    {
        return $this->statusPerfil;
    }
    public function setStatusPerfil($statusPerfil)
    {
        $this->statusPerfil = $statusPerfil;
    }
    //----------------------------------
    public function getIdChat()
    {
        return $this->idChat;
    }
    public function setIdChat($idChat)
    {
        $this->idChat = $idChat;
    }
    //----------------------------------
    public function getConversaChat()
    {
        return $this->conversaChat;
    }
    public function setConversaChat($conversaChat)
    {
        $this->conversaChat = $conversaChat;
    }
    //----------------------------------
    public function getDataChat()
    {
        return $this->dataChat;
    }
    public function setDataChat($dataChat)
    {
        $this->dataChat = $dataChat;
    }
    //----------------------------------
    public function getIdPublicacao()
    {
        return $this->idPublicacao;
    }
    public function setIdPublicacao($idPublicacao)
    {
        $this->idPublicacao = $idPublicacao;
    }
    //----------------------------------
    public function getTextoPublicacao()
    {
        return $this->textoPublicacao;
    }
    public function setTextoPublicacao($textoPublicacao)
    {
        $this->textoPublicacao = $textoPublicacao;
    }
    //----------------------------------
    public function getPesquisa()
    {
        return $this->pesquisa;
    }
    public function setPesquisa($pesquisa)
    {
        $this->pesquisa = $pesquisa;
    }
    //----------------------------------
    public function getPesquisaHab()
    {
        return $this->pesquisaHab;
    }
    public function setPesquisaHab($pesquisaHab)
    {
        $this->pesquisaHab = $pesquisaHab;
    }
    //----------------------------------
    public function getPesquisaUf()
    {
        return $this->pesquisaUf;
    }
    public function setPesquisaUf($pesquisaUf)
    {
        $this->pesquisaUf = $pesquisaUf;
    }
    //----------------------------------

    //--------------------------------MÉTODOS PARA O USUARIO--------------------------------//
    public function listarUsuario(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT tbusuario.idUsuario,email,senha,dataCriacao FROM tbusuario
                        ORDER BY idUsuario";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function logar($email, $senha){
        //------------------Verificar se senha e email existem ------------------//
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->prepare("SELECT tbusuario.idUsuario,email,senha FROM tbusuario
                                  WHERE email = ? AND senha = ?");
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['idUsuario'] = $dado['idUsuario'];

            //------------------Comparar IdContratante e IdProfissional com IdUsuario------------------//
            $queryUser = $conexao->prepare("SELECT u.idUsuario,c.idUsuario AS Contratante,p.idUsuario AS Profissional FROM tbusuario AS u
                                            LEFT JOIN tbcontratante AS c ON u.idUsuario = c.idUsuario
                                            LEFT JOIN tbprofissional AS p ON u.idUsuario = p.idUsuario
                                            WHERE c.idUsuario = ? OR p.idUsuario = ?");
            
            $queryUser->bindValue(1, $dado['idUsuario']);
            $queryUser->bindValue(2, $dado['idUsuario']);
            $queryUser->execute();
            $lista = $queryUser->fetch();

            //------------------Mudar o Status para o Online------------------//

            if ($dado['idUsuario'] = $lista['Contratante']) {
                $stmt = $conexao->prepare("UPDATE tbcontratante
                                            SET statusPerfil = 1
                                            WHERE idUsuario = ?");
                $stmt->bindValue(1, $dado['idUsuario']);
                $stmt->execute();
            }else{
                $stmt = $conexao->prepare("UPDATE tbprofissional
                                            SET statusPerfil = 1
                                            WHERE idUsuario = ?");
                $stmt->bindValue(1, $_SESSION['idUsuario']);
                $stmt->execute();
            }
            return true;
        }else{
            return false;
        }
    }
    public function logout(){
        //------------------Comparar IdContratante e IdProfissional com IdUsuario------------------//
        $conexao = Conexao::pegarConexao();
        session_start();
        $queryUser = $conexao->prepare("SELECT u.idUsuario,c.idUsuario AS Contratante,p.idUsuario AS Profissional FROM tbusuario AS u
                                            LEFT JOIN tbcontratante AS c ON u.idUsuario = c.idUsuario
                                            LEFT JOIN tbprofissional AS p ON u.idUsuario = p.idUsuario
                                            WHERE c.idUsuario = ? OR p.idUsuario = ?");
            
        $queryUser->bindValue(1, $_SESSION['idUsuario']);
        $queryUser->bindValue(2, $_SESSION['idUsuario']);
        $queryUser->execute();
        $lista = $queryUser->fetch();
        //------------------Mudar o Status para o Offline------------------//
        if ($_SESSION['idUsuario'] = $lista['Contratante']) {
            $stmt = $conexao->prepare("UPDATE tbcontratante
                                            SET statusPerfil = 0
                                            WHERE idUsuario = ?");
            $stmt->bindValue(1, $_SESSION['idUsuario']);
            $stmt->execute();
        }
        if ($_SESSION['idUsuario'] = $lista['Profissional']) {
            $stmt = $conexao->prepare("UPDATE tbprofissional
                                            SET statusPerfil = 0
                                            WHERE idUsuario = ?");
            $stmt->bindValue(1, $_SESSION['idUsuario']);
            $stmt->execute();
        }

        $_SESSION = array();
        session_destroy();
        header("Location: login.php");
        return true;
    }
    
    public function cadastrarPublicacao($publicacao){
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare("INSERT INTO tbpublicacao (textoPublicacao,imagemPublicacao,idUsuario)
                                                VALUES (?,?,?)");
        $stmt->bindvalue(1, $publicacao->getTextoPublicacao());
        $stmt->bindvalue(2, $publicacao->caminhoimagem);
        $stmt->bindvalue(3, $publicacao->getIdUsuario());
        $stmt->execute();
        return 'Publicacao cadastrada com sucesso!!';
    }
    public function listarPublicacao($publicacao){
        $conexao = Conexao::pegarConexao();
        $querySelect = $conexao->prepare("SELECT pb.idPublicacao,pb.textoPublicacao,pb.imagemPublicacao,DATE_FORMAT(pb.dataPublicacao, '%d/%m/%Y às %k:%i') dataPublicacao,pb.idUsuario
                                            ,p.idProfissional,p.nomeProfissional,p.fotoPerfil fotoP
                                            ,c.idContratante,c.nomeContratante,c.fotoPerfil fotoC
                                            FROM tbpublicacao AS pb
                                            LEFT JOIN tbusuario AS u ON u.idUsuario = pb.idUsuario
                                            LEFT JOIN tbcontratante AS c ON u.idUsuario = c.idUsuario
                                            LEFT JOIN tbprofissional AS p ON u.idUsuario = p.idUsuario
                                            WHERE pb.idUsuario = ?
                                            ORDER BY idPublicacao DESC");
        $querySelect->bindValue(1, $publicacao->getIdUsuario());
        $querySelect->execute();
        $lista = $querySelect->fetchAll();
        return $lista;
    }
    public function pesquisar($pesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = $conexao->prepare("SELECT DISTINCT p.idProfissional,p.nomeProfissional,p.fotoPerfil fotoP,p.statusPerfil statusProfissional,p.idUsuario idUserP
                                        ,c.idContratante,c.nomeContratante,c.fotoPerfil fotoC,c.statusPerfil statusContratante,c.idUsuario idUserC
                                        FROM tbusuario u
                                        LEFT JOIN tbprofissional AS p ON u.idUsuario = p.idUsuario
                                        LEFT JOIN tbcontratante AS c ON u.idUsuario = c.idUsuario
                                        LEFT JOIN tbhabilidadesprofissional AS hp ON  hp.idProfissional = p.idProfissional
                                        LEFT JOIN tbhabilidades AS h ON h.idHabilidades = hp.idHabilidades
                                        WHERE p.nomeProfissional LIKE ? OR c.nomeContratante LIKE ? OR descHabilidades LIKE ?
                                        OR ufProfissional LIKE ? OR ufContratante LIKE ?");
        $querySelect->bindValue(1, $pesquisa->getPesquisa());
        $querySelect->bindValue(2, $pesquisa->getPesquisa());
        $querySelect->bindValue(3, $pesquisa->getPesquisaHab());
        $querySelect->bindValue(4, $pesquisa->getPesquisaUf());
        $querySelect->bindValue(5, $pesquisa->getPesquisaUf());
        $querySelect->execute();
        $lista = $querySelect->fetchAll();
        return $lista;
    }

    //--------------------------------MÉTODOS PARA O CHAT--------------------------------//
    public function listarContato($idUsuario){
        $conexao = Conexao::pegarConexao();
        $querySelect = $conexao->prepare("SELECT ct.idContato,ct.idUsuario,ct.contatoStatus,ct.contato
                                                ,p.idProfissional,p.nomeProfissional,p.statusPerfil statusP,p.fotoPerfil fotoP
                                                ,c.idContratante,c.nomeContratante,c.statusPerfil statusC,c.fotoPerfil fotoC
                                                ,ch.idChat,ch.conversaChat,ch.visualizacao,ch.dataChat FROM tbcontato AS ct
                                                LEFT JOIN tbusuario AS u ON ct.contato = u.idUsuario
                                                LEFT JOIN tbchat AS ch ON (u.idUsuario = ch.idUsuario OR u.idUsuario = ch.idChat)
                                                LEFT JOIN tbcontratante AS c ON u.idUsuario = c.idUsuario
                                                LEFT JOIN tbprofissional AS p ON u.idUsuario = p.idUsuario
                                                WHERE ct.idUsuario=?
                                                ORDER BY ct.contatoStatus");
        $querySelect->bindValue(1, $idUsuario);
        $querySelect->execute();
        $lista = $querySelect->fetchAll();
        return $lista;
    }
    public function listarUsuarioChat($UsuarioChat, $idUsuario){
        $conexao = Conexao::pegarConexao();
        $querySelect = $conexao->prepare("SELECT ct.idContato,ct.contato,ct.idUsuario,ct.contatoStatus,u.idUsuario
                                                ,p.idProfissional,p.nomeProfissional,p.statusPerfil statusP,p.fotoPerfil fotoP
                                                ,c.idContratante,c.nomeContratante,c.statusPerfil statusC,c.fotoPerfil fotoC
                                                FROM tbusuario AS u
                                                LEFT JOIN tbcontato AS ct ON (? AND u.idUsuario = ?)
                                                LEFT JOIN tbcontratante AS c ON u.idUsuario = c.idUsuario
                                                LEFT JOIN tbprofissional AS p ON u.idUsuario = p.idUsuario");
        $querySelect->bindValue(1, $UsuarioChat);
        $querySelect->bindValue(2, $idUsuario);
        $querySelect->execute();
        $lista = $querySelect->fetchAll();
        if ($querySelect->rowCount() == 0) {
            $_SESSION['countLinha'] = 0;
        }else{
            $_SESSION['countLinha'] = 1;
        }
        return $lista;
    }

}
?>