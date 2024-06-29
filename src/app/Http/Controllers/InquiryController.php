<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InquiryRequest;
use App\Models\Contact;
use App\Models\Category;

class InquiryController extends Controller
{
    public function show() {
        $categories = Category::all();
        return view('user.inquiry.create', compact('categories'));
    }

    public function confirm(InquiryRequest $request) {
        $inquiry = $request->validated();

        $category_id = $request->category_id;
        $category = Category::find($category_id);
        return view('user.inquiry.confirm', compact('inquiry', 'category'));
    }

    public function thanks(Request $request) {

        if($request->input('back') == 'back'){
            return redirect('/')->withInput();
        }

        $contacts = new Contact();

        // 電話番号を１つにまとめる
        $first_number = $request->first_number;
        $middle_number = $request->middle_number;
        $last_number = $request->last_number;
        $tell = $first_number.$middle_number.$last_number;

        $contacts->category_id = $request->category_id;
        $contacts->first_name = $request->first_name;
        $contacts->last_name = $request->last_name;
        $contacts->gender = $request->gender;
        $contacts->email = $request->email;
        $contacts->tell = $tell;
        $contacts->address = $request->address;
        $contacts->building = $request->building ?? '';
        $contacts->detail = $request->detail;

        $contacts->save();
        return view('user.inquiry.thanks');
    }
}
