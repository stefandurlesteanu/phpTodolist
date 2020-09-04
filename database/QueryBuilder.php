<?php


class QueryBuilder
{
    protected $pdo;

    /**
     * QueryBuilder constructor.
     * @param $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table){
        $stmt = $this->pdo->query("SELECT * FROM {$table}");

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

}