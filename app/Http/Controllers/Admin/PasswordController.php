<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPasswordChangeRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.password.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminPasswordChangeRequest $request)
    {
        // get admin
        $admin = Admin::find(auth()->guard('admin')->user()->id);
    	if(!isset($admin) || empty($admin)) {
    		abort(404);
    	}

        $data = [
            'password' => $request->password
        ];

        $admin->update($data);
        
        return redirect()->route('admin.password.create')
                         ->with('success', 'Your Password reset successfully.');

    }
}
