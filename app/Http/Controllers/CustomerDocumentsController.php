<?php

namespace App\Http\Controllers;

use App\Customer_documents;
use Illuminate\Http\Request;

class CustomerDocumentsController extends Controller
{
    public function uploadDocs(Request $request, Customer_documents $obj_customer_documents)
    {
        $this->validate($request, [
            'cnic' => 'required',
            'cnic.*' => 'image',
            'passport' => 'required',
            'passport.*' => 'image',
            'visa' => 'required|image',
            'picture' => 'required|image',
        ]);

        return $obj_customer_documents->uploadDocs();
    }
}
