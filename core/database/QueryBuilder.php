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

    public function deleteEntry($table, $data)
    {
        $query = "UPDATE {$table} SET {$data['row']} = 1 WHERE id = :id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id" , $data['id'], PDO::PARAM_INT);
        $stmt->execute();


        return $this->selectAll($table);
    }

    public function addTask($table, $data){
        $innerData = [
            'name' => $data['taskName'],
            'description' => $data['taskDescription'],
            'due_date' => $data['taskDueDate'],
            'image' => $data['taskImage']
        ];

        $query = "INSERT INTO {$table} (name, description, due_date, image ) VALUES (:name, :description, :due_date, :image)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($innerData);
    }

}