<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class RoleUpdateController extends Controller
{
    public function __invoke(Request $request, $id , $slug)
    {
        $user = Sentinel::findById($id);

        if (!$user) {
            // Handle the case where the user is not found
            return response()->json(['error' => 'User not found'], 404);
        }

        // Remove existing roles for the user
        $user->roles()->sync([]);

        // Find or create the role with the provided slug
        $role = Sentinel::findRoleBySlug($slug);

        if (!$role) {
            // Handle the case where the role with the provided slug is not found
            return response()->json(['error' => 'Role not found'], 404);
        }

        // Assign the new role to the user
        $role->users()->attach($user);

        // Optionally, you can add a response or redirect after completing the operation
        return redirect()->back()->with(['success' => 'Role updated successfully'], 200);

    }
}
