<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display users
    }

    public function show($id)
    {
        // Logic to retrieve and display a specific user
    }

    public function getAllUsersApi()
    {
        $users = DB::table("users");

        return response()->json($users);
    }
}
