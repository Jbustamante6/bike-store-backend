<?php

namespace App\Services;

use App\Interfaces\UsersInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;

class UsersService implements UsersInterface
{
    private User $usersRepository;

    public function __construct(User $user){
        $this->usersRepository = $user;
    }

    public function register(int $document_type_id, int $doc_number, string $first_name, string $last_name, string $email, string $username, string $password)
    {
        DB::beginTransaction();
        try
        {
            $user = new User();
            $user->document_type_id = $document_type_id;
            $user->doc_number = $doc_number;
            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->email = $email;
            $user->username = $username;
            $user->password = $password;
            $user->save();
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            DB::rollback();
            throw new \Exception($e->errorInfo[2]);
        }
        DB::commit();
        return $user;
    }
}
