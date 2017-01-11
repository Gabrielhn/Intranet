<?php

class ConnectionFactory{
    private $ora_user = "INTRANET"; 
    private $ora_senha = "ifnefy6b9"; 
    private $ora_bd = "(DESCRIPTION=
                        (ADDRESS_LIST=
                        (ADDRESS=(PROTOCOL=TCP)(HOST=10.0.0.2)(PORT=1521))
                        )
                        (CONNECT_DATA=
                        (SERVICE_NAME=ORCL)
                        )
                        )"; 
    public  function  getConnection(){
            putenv("NLS_LANG=PORTUGUESE_BRAZIL.AL32UTF8") or die("Falha ao inserir a variavel de ambiente");
            $ora_conexao = oci_connect($this->ora_user, $this->ora_senha, $this->ora_bd);
        return $ora_conexao;

    }

    public function closeConnection($connection){
        $ora_conexao = oci_close($connection);

    }


}