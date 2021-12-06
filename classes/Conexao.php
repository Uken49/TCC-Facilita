<?php
if (!isset($_SESSION)) {
    session_start();
} 
    class Conexao{
        
        public static function pegarConexao(){
            $host = "localhost"; //fdb34.awardspace.net
            $dbname = "bdfacilita"; //3930727_loremipsum
            $usuario = "root"; //3930727_loremipsum
            $senha = ""; //LoremIspum123.
        
            try{
                //Conexão local com bdfacilita
                $conexao = new PDO("mysql:host=$host;
                                    dbname=$dbname",
                                    "$usuario",
                                    "$senha");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexao->exec("SET CHARACTER SET utf8");

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit();
            }
            return $conexao;
        }
    }
?>
