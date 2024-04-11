<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // API-based CRUD operations
    public function getAllStudents()
    {
        $students = StudentModel::all();
        return response()->json([$students]);
    }

    public function getStudentById($id)
{
    $student = StudentModel::find($id);

    if (!$student ){
        return response()->json(["error" => "User Not Found"], 404);
    }

    return response()->json($student);
}

    public function saveStudent(Request $request)
    {
        $student = new StudentModel();
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->save();

        return response()->json($student, 201);
    }

    public function updateStudentById(Request $request, $id)
    {
         $student = StudentModel::find($id);

        if (!$student) {
        return response()->json(["error" => "User not found"], 404);
        }

        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->save();

        return response()->json($student);
    }

public function deleteStudentById($id)
{
    $student = StudentModel::find($id);

    if (!$student) {
        return response()->json(["error" => "User not found"], 404);
    }

    $student->delete();

    return response()->json(null, 204);
}
public function search(Request $request)
{
    $query = $request->input('searchTerm');

    $searchResults = StudentModel::where('first_name', 'like', "%$query%")
                         ->orWhere('last_name', 'like', "%$query%")
                         ->orWhere('email', 'like', "%$query%")
                         ->get();
                         
    return response()->json($searchResults);
}
}
