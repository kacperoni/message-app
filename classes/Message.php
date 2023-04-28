<?php

final class Message
{
    private ?int $id = null;
    private ?int $conversationId = null;
    private ?int $authorId = null;
    private ?int $recipientId = null;
    private ?string $content = null;

    public function instantiation(array $params): void
    {
        foreach ($this as $key => $value) {
            $this->{$key} = $params[$key];
        }
    }

    public function displayMessageAsAuthor(): string
    {
        return sprintf("
        <div class='bg-cyan-400 w-fit max-w-xs rounded-md p-1 px-2 mb-2 text-white text-justify self-end'>
            %s
        </div>
        ", $this->content);
    }

    public function displayMessageAsRecipient(string $profilePicturePath): string
    {
        return sprintf(
            "
        <div class='flex mb-1'>
            <img src='%s' alt='friend_profile' class='w-8 h-8 md:w-12 md:h-12 mr-2 rounded-full'>
            <div class='bg-gray-300 w-fit overflow-hidden max-w-xs rounded-md p-1 px-2 mb-2 text-black  '>
                %s
            </div>
        </div>",
            $profilePicturePath,
            $this->content
        );
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
