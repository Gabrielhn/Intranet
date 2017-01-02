<?php

class serviceUsuario
{
    private $db;
    private $usuario;

    public function __construct(Iconn $db)
    {
        $this->db = $db->connect();
    }

    public function list()
    {
        $query = "SELECT * FROM USUARIOS";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save()
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}