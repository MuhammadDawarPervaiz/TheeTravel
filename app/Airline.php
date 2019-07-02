<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use App\Model;

class Airline extends Model
{
    public function set_airline()
    {
        // Inserting into DB
            try
            {
                Airline::create(['name' => request('airline_name'), 'image' => $this->getImagePath()]);

                session()->flash('message', "Congrats! Airline has been added successfully.");

                session(['num_of_airlines' => Airline::count()]);
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                session()->flash('exception', "Error: " . "Airline already Exists");
            }

            return back();
    }

    public function update_airline($id)
    {
        // Updating into DB
            try
            {
                // Deleting old Image
                    $airline = Airline::find($id);
                    $image = str_replace('storage', 'public', $airline->image);
                    try
                    {
                        if($airline->image != 'storage/airline_image/noimage.jpg')
                        {
                            Storage::delete($image);    // Delete Image
                        }
                    }
                    catch (\Illuminate\Database\QueryException $e)
                    {
                        session()->flash('exception', "Sorry! " . "Cannot delete old Airline image.");
                    }

                // Updating new one
                    Airline::where('id', $id)->update(['name' => request('airline_name'), 'image' => $this->getImagePath()]);
                    session()->flash('message', "Congrats! Airline has been Updated successfully.");
                    session(['num_of_airlines' => Airline::count()]);
            }
            catch (\Illuminate\Database\QueryException $e)
            {
                session()->flash('exception', "Sorry! " . "Cannot update this Airline.");
            }

            return redirect('airlines');
    }

    public function delete_airline()
    {
        $airline_id = request('airline_del_id');
        $airline = Airline::find($airline_id);
        $image = str_replace('storage', 'public', $airline->image);

        try
        {
            Airline::where('id', '=', $airline_id)->delete();

            if($airline->image != 'storage/airline_image/noimage.jpg')
            {
                Storage::delete($image);    // Delete Image
            }

            session()->flash('message', "Congrats! Airline having ID '$airline_id' has been Deleted successfully.");
            session(['num_of_airlines' => Airline::count()]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this Airline, it has some routes linked to it.");
        }

        return back();
    }

    public function getImagePath()
    {
        // Handle File Upload
            if(request()->hasFile('airline_image'))
            {
                // Getting File
                    $file = request()->file('airline_image');
                // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                    $extension = $file->getClientOriginalExtension();
                // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                    $path = $file->storeAs('public/airline_image', $fileNameToStore);
                // Modifying path
                    return $path = str_replace('public', 'storage', $path);
            }
            else
            {
                return $fileNameToStore = 'noimage.jpg';
            }
    }
}
