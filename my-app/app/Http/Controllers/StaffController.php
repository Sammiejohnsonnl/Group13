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
            'role'       => 'required|integer',
            'branch'     => 'required|integer',
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
    

}
