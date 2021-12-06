<?php

class Chat{
    private $idChat;        //Pk
    private $conversaChat;  //Text
    private $dataChat;      //Timestamp
    private $idContratante; //Fk
    private $idProfissional;//Fk

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
    public function getIdContratante()
    {
        return $this->idContratante;
    }
    public function setIdContratante($idContratante)
    {
        $this->idContratante = $idContratante;
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

    public function cadastrar($chat)
    {
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare("INSERT INTO tbchat (conversaChat,idContratante,idProfissional)
                                                    VALUES (?,?,?)");
        $stmt->bindvalue(1, $chat->getConversaChat());
        $stmt->bindvalue(2, $chat->getIdContratante());
        $stmt->bindvalue(3, $chat->getIdProfissional());
        $stmt->execute();
        return 'Mensagem enviada com sucesso!!';
    }
}
?>
