<?php

namespace App;

use App\Model;
use App\Customer;

class Customer_documents extends Model
{
    public function uploadDocs()
    {
        // Inserting into DB
            try
            {
                $customer = Customer::select('id')->where('email', session('currentUserEmail'))->get();
                foreach ($customer as $value) {
                    $customer_id = $value->id;
                }

                Customer_documents::create(['customer_id' => $customer_id, 'cnic' => $this->getMultipleImagePath('cnic') , 'passport' => $this->getMultipleImagePath('passport') , 'visa' => $this->getImagePath('visa') , 'picture' => $this->getImagePath('picture')]);
                session()->flash('message', "Congrats! Documents has been uploaded successfully.");
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                session()->flash('exception', "Error: " . "Continent already Exists" .$ex->getMessage());
            }

            return back();
    }

    public function getMultipleImagePath($name)
    {
        // Handle File Upload
            if(request()->hasFile($name))
            {
                foreach(request()->file($name) as $file)
                {
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    $path = $file->storeAs('public/customer_documents/' . session('currentUserEmail') . '/' . $name, $fileNameToStore);
                    $data[] = str_replace('public', 'storage', $path);
                }

               return $path = json_encode($data);
            }
            else
            {
                return $fileNameToStore = 'noimage.jpg';
            }
    }
    public function getImagePath($name)
    {
        // Handle File Upload
            if(request()->hasFile($name))
            {
                $file = request()->file($name);
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                $path = $file->storeAs('public/customer_documents/' . session('currentUserEmail') . '/' . $name, $fileNameToStore);

                return $path = str_replace('public', 'storage', $path);
            }
            else
            {
                return $fileNameToStore = 'noimage.jpg';
            }
    }
}
