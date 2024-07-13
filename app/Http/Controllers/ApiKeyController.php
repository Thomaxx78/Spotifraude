<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApiKeyController extends Controller
{
    public function index()
    {
        $apiKeys = auth()->user()->apiKeys;
        return Inertia::render('ApiKeys/Index', ['apiKeys' => $apiKeys]);
    }

    public function create()
    {
        return Inertia::render('ApiKeys/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        auth()->user()->apiKeys()->create($request->only('name'));

        return redirect()->route('api-keys.index')->with('success', 'API Key created successfully.');
    }

    public function destroy(ApiKey $apiKey)
    {

        $apiKey->delete();

        return redirect()->route('api-keys.index')->with('success', 'API Key deleted successfully.');
    }
}
