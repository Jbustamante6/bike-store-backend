<?php
namespace  App\Interfaces;

interface AuthenticationInterface
{
    public function login(String $email, String $password);
    public function logout();
    public function refresh();
    public function me();
    public function updateMe(string $name, string $username, string $password = NULL);
}
