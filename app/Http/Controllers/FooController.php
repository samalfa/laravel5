<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FooController extends Controller
{
    public function index()
    {
    	return 'Hell World';
    }

    public function create()
    {
    	return 'create';
    }
}
