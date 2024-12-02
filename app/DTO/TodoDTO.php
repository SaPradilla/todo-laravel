<?php

namespace App\DTO;

class TodoDTO
{
    public string $title;
    public string $description;
    public bool $completed;
    public int $user_id;

    public function __construct(string $title, string $description, bool $completed, int $user_id)
    {
        $this->title = $title;
        $this->description = $description;
        $this->completed = $completed;
        $this->user_id = $user_id;
    }
}
