<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{

    public function search(Request $request)
    {
        $contacts = Contact::KeywordSearch($request->keyword)
                        ->GenderSearch($request->gender)
                        ->CategorySearch($request->category_id)
                        ->Paginate(7);
        $categories = Category::all();
        return view('admin.admin', compact('contacts', 'categories'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        dd($contact);
        return response()->json($contact);
    }
}
