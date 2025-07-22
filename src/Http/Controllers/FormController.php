<?php

namespace Niharb\MyForm\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Niharb\MyForm\Models\MyFormEntry;

class FormController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('my-form::form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'field1' => 'required|string|max:255',
            'field2' => 'required|email|max:255',
            'field3' => 'nullable|string',
            'field4' => 'required|integer',
        ]);

        MyFormEntry::create($request->all());

        return redirect()->back()->with('success', 'Form data saved successfully!');
    }
}