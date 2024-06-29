<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function index(AuthRequest $request)
    {
    $contacts = Contact::paginate(10);
    $categories = Category::all();

    return view('admin.admin', compact('contacts', 'categories'));
    }

    public function logout() {
        Auth::logout();
        return view('auth.login');
    }
}
