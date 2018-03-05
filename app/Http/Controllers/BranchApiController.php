<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchApiController extends Controller
{
    public function index()
    {
        return response(Branch::with('company')->get(),200);
    }
}
