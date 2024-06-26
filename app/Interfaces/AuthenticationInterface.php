<?php
namespace  App\Interfaces;

interface AuthenticationInterface
{
    public function login(String $email, String $password);
    public function logout();
    public function refresh();
    public function me();
    public function updateMe(int $document_type_id, int $doc_number, string $first_name, string $last_name, string $username, string $password = NULL);
}
