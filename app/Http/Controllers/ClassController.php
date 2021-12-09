<?php

namespace App\Http\Controllers;

use App\Models\TrClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ClassController extends Controller
{
    public function index(Request $request) 
    {
        $user = $request->user();

        // Classes as member
        $classes = $user->classes()
            ->join('users', function ($join) {
                $join->on('tr_classes.created_by', '=', 'users.id');
            })
            ->select(
                'tr_classes.class_id', 
                'tr_classes.class_name', 
                'tr_classes.class_description', 
                'tr_classes.class_code',
                'users.name as user_name'
            )
            ->get();
        
        // Classes as owner
        $classes = $classes->merge($user->classesAsOwner()
            ->join('users', function ($join) {
                $join->on('tr_classes.created_by', '=', 'users.id');
            })
            ->select(
                'tr_classes.class_id', 
                'tr_classes.class_name', 
                'tr_classes.class_description', 
                'tr_classes.class_code',
                'users.name as user_name'
            )
            ->get());

        return Inertia::render('Classes/ClassList', [
            'classes' => $classes,
        ]);
    }

    public function theClass(int $id)
    {
        $theClass = TrClass::find($id);
        $posts = $theClass->posts()
            ->join('users', 'tr_class_posts.created_by', '=', 'users.id')
            ->select('tr_class_posts.*', 'users.name as user_name')
            ->with(['comments' => fn ($query) => 
                $query
                    ->join('users', 'tr_post_comments.user_id', '=', 'users.id')
                    ->select('tr_post_comments.*', 'users.name as user_name')
                    ->get()
            ])
            ->get();
             
            
        return Inertia::render('Classes/ClassPage', [
            'theClass' => $theClass,
            'classPosts' => $posts
        ]);
    }

    public function createForm()
    {
        return Inertia::render('Classes/CreateClass');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|min:3',
            'class_code' => 'unique:App\Models\TrClass,class_code|max:12',
            'class_description' => 'max:255',
            'created_by' => 'required'
        ]);

        TrClass::create($validated);

        return Redirect::route('classes');
    }
}
