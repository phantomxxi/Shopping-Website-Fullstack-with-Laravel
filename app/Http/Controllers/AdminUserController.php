<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    private $user;
    // dependency model User
    public function __construct(User $user)
    {
        $this->user=$user;
    }

    public function index(){
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }
}
