<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // View all customers
    public function index() {
        // Get all users whose user_type is 'user' (or whatever type represents regular users)
        $customers = User::where('usertype', 'user')->get(); // Assuming 'user' indicates a regular user
        return view('admin.customers.index', compact('customers'));
    }

    // Show form to create new customer
    public function create() {
        return view('admin.customers.create');
    }

    // Store new customer
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);
    
        // Set usertype to 'user' when creating a new user
        $data = $request->all();
        $data['usertype'] = 'user'; // Ensure new users are set as 'user'
    
        User::create($data);
        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully');
    }
    

    // Show form to edit customer
    public function edit($id) {
        $customer = User::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    // Update customer details
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $customer = User::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully');
    }

    // Delete customer
    public function destroy($id) {
        User::destroy($id);
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully');
    }
}
