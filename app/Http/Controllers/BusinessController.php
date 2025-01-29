<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::paginate(5);
        return view('businesses', compact('businesses'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['logo'] = $request->file('logo')->store('logos', 'public');

        // $input['logo']->store('logos', 'public');

        Business::create($input);

        return redirect()->route('businesses.index');
    }
}
