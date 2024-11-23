<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomeController extends Controller
{
    public function someMethod()
    {
        if (auth()->user()->hasRole('admin')) {
            // Lakukan sesuatu untuk admin
        }
        
        if (auth()->user()->hasPermission('edit-users')) {
            // Lakukan sesuatu untuk user dengan permission edit-users
        }
    }
} 