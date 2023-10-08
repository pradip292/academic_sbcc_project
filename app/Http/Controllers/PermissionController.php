<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPUnit\Util\ThrowableToStringMapper;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
class PermissionController extends Controller
{
   

    public function addRole()
    {
        try {
            $permissions = Permission::all();
            $formattedPermissions = $this->formatPermissionNames($permissions);
            return view('role.add_role', compact('permissions', 'formattedPermissions'));
        } catch (\Exception $exception) {
            Log::info(json_encode([
                "params" => null,
                "action" => "Add Role",
                "Exception" => $exception->getMessage()
            ]));
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        } 
    }

    public function processAddRole(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'permissions' => 'required|array',
            ]);

            $role = Role::create([
                'name' => $validatedData['name'],
            ]);

            $role->syncPermissions($validatedData['permissions']);

            return redirect()->route('roles-permissions')->with('success', 'Role added successfully');
        } catch (\Exception $exception) {
            Log::info(json_encode([
                "params" => $request->all(),
                "action" => "Process Add Role",
                "Exception" => $exception->getMessage()
            ]));
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        }
    }

    public function editRole($id)
    {
        try {
            $role = Role::find($id);

            $permissions = Permission::all();
            $formattedPermissions = $this->formatPermissionNames($permissions);
            $rolePermissions = $role->permissions()->pluck('id')->toArray();

            return view('role.edit_role', compact('role', 'permissions', 'formattedPermissions', 'rolePermissions'));
        } catch (\Exception $exception) {
            Log::info(json_encode([
                "params" => null,
                "action" => "Edit Role",
                "Exception" => $exception->getMessage()
            ]));
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        }
    }

    public function processEditRole(Request $request, $id)
    {
        try {
            $role = Role::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'permissions' => 'nullable|array',
                'permissions.*' => 'exists:permissions,id',
            ]);

            $role->name = $validatedData['name'];
            $role->save();

            if (isset($validatedData['permissions'])) {
                $role->syncPermissions($validatedData['permissions']);
            } else {
                $role->syncPermissions([]); 
            }

            return redirect()->route('roles-permissions')->with('success', 'Role updated successfully');
        } catch (\Exception $exception) {
            Log::info(json_encode([
                "params" => $request->all(),
                "action" => "Process Edit Role",
                "Exception" => $exception->getMessage()
            ]));
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        }
    }

    public function rolePermissions()
    {
        try {
            $roles = Role::all();

            return view('role.view_role', compact('roles'));
        } catch (\Exception $exception) {
            Log::info(json_encode([
                "params" => null,
                "action" => "Role Permissions",
                "Exception" => $exception->getMessage()
            ]));
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        }
    }

    private function formatPermissionNames($permissions)
    {
        $formattedPermissions = [];

        foreach ($permissions as $permission) {
            $formattedPermissions[$permission->id] = ucwords(str_replace('_', ' ', $permission->name));
        }

        return $formattedPermissions;
    }
}

