<?php

final class Conversation
{
    private Database $database;
    private ?Session $session;
    private ?int $id = null;

    public function __construct(Database $database, Session $session = null)
    {
        $this->database = $database;
        $this->session = $session;
    }
    public function fetchAllByUserId(int $userId): array
    {
        $sql = "SELECT * FROM conversations WHERE user1_id = ? OR user2_id = ?";
        return $this->database->fetchAll($sql, [$userId, $userId]);
    }

    public function findConversationByUsersId(int $firstUserId, int $secondUserId): array
    {
        $sql = "SELECT * FROM conversations WHERE user1_id = ? AND user2_id = ?";
        $result = $this->database->fetchAssoc($sql, [$firstUserId, $secondUserId]);
        if ($result == null) {
            if ($this->database->findUserById($secondUserId)) {
                $this->createConversation($firstUserId, $secondUserId);
                header("Location: conversations.php?userId=" . $secondUserId);
            } else {
                echo "404 error user doesnt exist";
                $this->session->setFlashMessage('error', 'Page does not exist!');
                header("Location: home.php");
            };
            die();
        }
        return $this->database->fetchAssoc($sql, [$firstUserId, $secondUserId]);
    }

    public function createConversation(int $firstUserId, int $secondUserId): void
    {
        $sql = "INSERT INTO conversations (user1_id, user2_id) VALUES (?, ?)";
        $this->database->query($sql, [$firstUserId, $secondUserId]);
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
