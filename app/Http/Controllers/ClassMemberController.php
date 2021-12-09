<?php

namespace App\Http\Controllers;

use App\Models\TrClass;
use App\Models\TrClassMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class ClassMemberController extends Controller
{
    public function join()
    {
        return Inertia::render('Classes/JoinClass');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $class = TrClass::where('class_code', $data['class_code'])->first();
        if ($class == null)
        {
            throw ValidationException::withMessages([
                'class_code' => 'Class don\'t exists']);
        }
        $classMember = TrClassMember::where('user_id', $request->user()->id)
            ->where('class_id', $class->class_id)->first();

        if ($classMember != null)
        {
            throw ValidationException::withMessages([
                'class_code' => 'You have already joined this class']);
        }
        TrClassMember::create([
            'class_id' => $class->class_id,
            'user_id' => $request->user()->id
        ]);

        return Redirect::route('class', $class->class_id);
    }
}
