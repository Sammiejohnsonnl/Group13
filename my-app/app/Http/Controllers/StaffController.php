<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class StaffController extends Controller
{


    public function saveStaff(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:staff,email',
            'password'   => 'required|string|min:6|confirmed',
            'role'       => 'required|string',
            'branch'     => 'required|string',
        ]);
    
        DB::beginTransaction();
    
        try {
            $newStaff = Staff::create([
                'first_name' => $validated['first_name'],
                'last_name'  => $validated['last_name'],
                'email'      => $validated['email'],
                'password'   => Hash::make($validated['password']),
                'role'       => $validated['role'],
                'branch'     => $validated['branch'],
            ]);

            DB::commit();
    
            return redirect()->route('admin.dashboard')->with('success', 'Staff member created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            
            return redirect()->back()->withErrors(['error' => 'Failed to create staff member. Please try again later.']);
        }
    }

    public function viewStaff()
    {
        $staffs = Staff::all();

        return view('admin-search-staff', compact('staffs'));
    }

    public function searchStaff()
    {
        $staffs = Staff::query();
        if ($search = request()->get('search', '')) {
            $staffs = $staffs->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                      ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        }

        if ($role = request()->get('role')) {
            $staffs = $staffs->where('role', $role);
        }

        
        if ($branch = request()->get('branch')) {
            $staffs = $staffs->where('branch', $branch);
        }
        return view('admin-search-staff', ['staffs' => $staffs->get()]);
    }

    public function destroy($staffId)
    {
        try {
            Staff::findOrFail($staffId)->delete();
            return redirect()->route('admin.dashboard')->with('', '');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting staff member. Please try again later.'], 500);
        }
    }

    public function update(Request $request, $staffId)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:staff,email,' . $staffId,
            'role' => 'required|string|max:255',
        ]);
    
        $staff = Staff::findOrFail($staffId);
    
        $staff->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);
    
        return redirect()->back()->with('success', 'Staff member updated successfully.');
    }
    



}
