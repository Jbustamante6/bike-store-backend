<?php
namespace  App\Interfaces;

interface UsersInterface
{
    public function register(int $document_type_id, int $doc_number, string $first_name, string $last_name, string $email, string $username, string $password);
}
