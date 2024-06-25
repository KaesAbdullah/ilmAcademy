<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getAllSubjects()
    {
        return response()->json(Subject::all());
    }

    public function getSubjectById($id)
    {
        $subject = Subject::find($id);
        if ($subject) {
            return response()->json($subject);
        } else {
            return response()->json(['message' => 'Assig no encontrado'], 404);
        }
    }

    public function deleteSubject($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        if ($subject) {

            return response()->json(['message' => 'Assig eliminado correctamente'], 200);
        } else {
            return response()->json(['message' => 'Assig no encontrado'], 404);
        }
    }

    public function updateSubject(request $request, $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['message' => 'Assig no encontrado'], 404);
        }

        $subject->id = $request->input('id');
        $subject->id_teacher = $request->input('id_teacher');
        $subject->grade = $request->input('grade');
        $subject->subject = $request->input('subject');

        $subject->save();

        return response()->json(['message' => 'Assig actualizado correctamente', 'subject' => $subject], 200);
    }
}
