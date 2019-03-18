<?php

namespace Weather\Logger;

class DB implements LoggerInterface
{
    const FILE_NAME = 'weather.log';

    private $pdo;
    private $tableName;
    private $columnName;

    public function __construct(PDO $pdo, $tableName, $columnName) {
        $this->pdo = $pdo;
        $this->tableName = $tableName;
        $this->columnName = $columnName;
    }

    public function log($message)
    {
        $sql = "INSERT INTO" . $this->tableName . "(" . $this->columnName . ") values(:message)";

        $sth = $this->pdo->prepare($sql);
        $sth->execute([':message' => $message]);
    }
}