<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLevel;

class UserLevelController extends Controller
{
    public function index()
    {
        $userLevels = UserLevel::all();
        return response()->json($userLevels);
    }

    public function show($id)
    {
        $userLevel = UserLevel::findOrFail($id);
        return response()->json($userLevel);
    }
}
