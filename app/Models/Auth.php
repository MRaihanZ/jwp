<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Auth extends Model
{
    public static function authenticate($username, $password)
    {
        $user = DB::table('user')->where('username', $username)->first();

        if ($username === $user->username && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }

    public static function setSessionUserId($userId, $sessionId)
    {
        $affected = DB::table('sessions')
            ->where('id', $sessionId)
            ->update(['user_id' => $userId]);
        return $affected;
    }
}
