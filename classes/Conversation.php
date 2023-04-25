<?php

final class Conversation
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function fetchAllByUserId(int $userId): array
    {
        $sql = "SELECT * FROM conversations WHERE user1_id = ? OR user2_id = ?";
        return $this->database->fetchAll($sql, [$userId, $userId]);
    }
}
