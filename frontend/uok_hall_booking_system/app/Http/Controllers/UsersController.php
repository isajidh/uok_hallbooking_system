<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::all(); // Retrieve all users from the database
        return view('users.index', ['users' => $users]); // Pass the users data to the view
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the form input
            $validatedData = $request->validate([
                'user_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:8',
                'authorised_by' => 'required|string|max:255',
                'university_email' => 'required|email|max:255',
                'contact_number' => 'required|string|max:10',
                'academic_year' => 'required|integer|min:1',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        // Create a new user instance
        $user = new Users();
        $user->user_name = $validatedData['user_name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->authorised_by = $validatedData['authorised_by'];
        $user->university_email = $validatedData['university_email'];
        $user->contact_number = $validatedData['contact_number'];
        $user->academic_year = $validatedData['academic_year'];
        // Save the user to the database
        $user->save();

        // Redirect or do something else upon successful user creation
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function destroy(Users $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back to the user index page with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
