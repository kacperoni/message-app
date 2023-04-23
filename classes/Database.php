<?php

class Database
{
    protected $mysqli;

    public function __construct(string $dbHost = 'localhost', string $dbUser = 'root', string $dbPass = 'root', string $dbName = 'message-app-db')
    {
        $this->mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($this->mysqli->connect_error) {
            die("Cannot connect to database :: " . $this->mysqli->connect_error);
        }
    }

    public function query(string $sql = '', array $params = [])
    {
        $stmt = $this->mysqli->prepare($sql);

        if (!empty($params)) {
            $types = '';
            foreach ($params as $param) {
                $types .= $this->getType($param);
            }
            $stmt->bind_param($types, $params);
        }

        return $stmt->execute();
    }

    private function getType($variable): string
    {
        if (is_string($variable)) return 's';
        if (is_int($variable)) return 'i';
        if (is_float($variable)) return 'd';
        return 'b';
    }

    public function escapeString(string $string): string
    {
        return $this->mysqli->escape_string($string);
    }
}
