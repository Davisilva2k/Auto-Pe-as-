<?php
class Venda
{
    private $conn;
    private $table_name = "Vendas";

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
?>