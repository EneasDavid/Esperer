<?php
class Conexao{
    private string $servername;
    private string $username;
    private string $password;
    private string $database;
    private mysqli $connection;


    function __construct($servername, $username, $password, $database){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

   public function conecta():mysqli{
        //Cria a conexão
        $this->connection = new mysqli($this->servername, $this->username,$this->password, $this->database);
        if($this->connection->connect_error){
            die("Conexão Falhou! =[ ".$this->connection->connect_error);
        }
       //echo "Conectado com sucesso!";
        return $this->connection;
    }

    public function desconecta():void{
        $this->connection->close();
    }
}
?>