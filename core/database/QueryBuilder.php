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
        $stmt = $this->pdo->query("SELECT * FROM {$table} WHERE deleted=0");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteEntry($table, $id)
    {
        $query = "UPDATE {$table} SET {$id['row']} = 1 WHERE id = :id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id" , $id['id'], PDO::PARAM_INT);
        $stmt->execute();


        return $this->selectAll($table);
    }

}