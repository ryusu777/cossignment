<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ClassController extends Controller
{
    public function index(Request $request) 
    {
        $user = $request->user();
        $classes = $user->classes()
            ->join('users', 'tr_classes.created_by', '=', 'users.id')
            ->select(
                'tr_classes.class_id', 
                'tr_classes.class_name', 
                'tr_classes.class_description', 
                'tr_classes.class_code',
                'users.name as user_name'
            )
            ->get();
        return Inertia::render('Classes/Index', [
            'classes' => $classes,
        ]);
    }
}
