<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\subjectsStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getFiltered($rol)
    {
        $users = User::where('rol', $rol)->get();
        return response()->json($users);
    }

    public function getUserCount($rol = null)
    {
        $users = $rol ? User::where('rol', $rol)->get() : User::whereNot('rol', 'Administrador')->get();
        $userCount = $users->count();
        return response()->json($userCount);
    }
    public function getUserById($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    public function getAll()
    {
        return response()->json(User::all());
    }
    public function getAllByRol($rol = null)
    {
        $users = $rol ? User::where('rol', $rol)->get() : User::all();
        return response()->json($users);
    }
    public function updateUser(request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->name = $request->input('name');
        $user->surname1 = $request->input('surname1');
        $user->surname2 = $request->input('surname2');
        $user->email = $request->input('email');
        $user->dni = $request->input('dni');
        $user->birthdate = $request->input('birthdate');
        $user->rol = $request->input('rol');
        $user->adress = $request->input('adress');
        $user->updated_at = now();

        $user->save();

        return response()->json(['message' => 'Usuario actualizado correctamente', 'user' => $user], 200);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        if ($user) {

            return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    public function createUser(Request $request)
    {
        $validatedUserData = $request->validate([
            'avatar' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'surname1' => 'required|string|max:255',
            'surname2' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'dni' => 'required|string|max:255|unique:users,dni',
            'birthdate' => 'required|date',
            'gender' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'remember_token' => 'nullable|string|max:100',
        ]);

        $validatedTeacherSubjectData = $request->validate([
            'id_teacher' => 'required|integer',
            'asignatura_1' => 'required|integer',
            'asignatura_2' => 'required|integer',
            'studying_1' => 'required|boolean',
            'studying_2' => 'required|boolean',
        ]);

        $validatedGradeData = $request->validate([
            'id_teacher' => 'required|integer',
            'grade' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        // $validatedPaymentData = $request->validate([
        //     'student_id' => 'required|integer',
        //     'name' => 'required|string|max:255',
        //     'account_number' => 'required|string|max:255',
        //     'payment_date' => 'required|date',
        //     'paid' => 'required|boolean',
        // ]);

        $user = new User();
        $user->avatar = $validatedUserData['avatar'];
        $user->name = $validatedUserData['name'];
        $user->surname1 = $validatedUserData['surname1'];
        $user->surname2 = $validatedUserData['surname2'];
        $user->email = $validatedUserData['email'];
        $user->dni = $validatedUserData['dni'];
        $user->birthdate = $validatedUserData['birthdate'];
        $user->gender = $validatedUserData['gender'];
        $user->rol = $validatedUserData['rol'];
        $user->adress = $validatedUserData['adress'];
        $user->phone = $validatedUserData['phone'];
        $user->password = $validatedUserData['password'];
        $user->remember_token = $validatedUserData['remember_token'] ?? null;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        
        return response()->json(['message' => 'Success'], 201);
    }
}
