<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use App\Model;

class City extends Model
{
    public function set_city()
    {
        // Inserting into DB
            try
            {
                City::create(['name' => request('city_name'), 'image' => $this->getImagePath(), 'continent_id' => request('select_continent'), 'page_title' => request('page_title'), 'header_keywords' => request('header_keywords'), 'body_keywords' => request('body_keywords'), 'body_content' => request('body_content'), 'meta_title' => request('meta_title'), 'meta_description' => request('meta_description'), 'meta_keywords' => request('meta_keywords')]);
                session()->flash('message', "Congrats! City has been added successfully.");
                session(['num_of_cities' => City::count()]);
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                session()->flash('exception', "Error: " . "City already Exists" . $ex->getMessage());
            }

            return back();
    }

    public function update_city($id)
    {
        // Updating into DB
            try
            {
              if ($this->getImagePath() != "noimage.jpg")
              {
                // Deleting old Image
                    $city = City::find($id);
                    $image = str_replace('storage', 'public', $city->image);
                    try
                    {
                        if($city->image != 'storage/city_image/noimage.jpg')
                        {
                            Storage::delete($image);    // Delete Image
                        }
                    }
                    catch (\Illuminate\Database\QueryException $e)
                    {
                        session()->flash('exception', "Sorry! " . "Cannot delete this old city image.");
                    }
                  // Updating new one
                      City::where('id', $id)->update(['name' => request('city_name'), 'image' => $this->getImagePath(), 'continent_id' => request('select_continent'), 'page_title' => request('page_title'), 'header_keywords' => request('header_keywords'), 'body_keywords' => request('body_keywords'), 'body_content' => request('body_content'), 'meta_title' => request('meta_title'), 'meta_description' => request('meta_description'), 'meta_keywords' => request('meta_keywords')]);
                }
                else
                {
                  // Updating new one
                    City::where('id', $id)->update(['name' => request('city_name'), 'continent_id' => request('select_continent'), 'page_title' => request('page_title'), 'header_keywords' => request('header_keywords'), 'body_keywords' => request('body_keywords'), 'body_content' => request('body_content'), 'meta_title' => request('meta_title'), 'meta_description' => request('meta_description'), 'meta_keywords' => request('meta_keywords')]);
                }
                session()->flash('message', "Congrats! City has been Updated successfully.");
                session(['num_of_cities' => City::count()]);
            }
            catch (\Illuminate\Database\QueryException $e)
            {
                session()->flash('exception', "Sorry! " . "Cannot update this City.");
            }

            return redirect('cities');
    }

    public function delete_city()
    {
        $city_id = request('city_del_id');
        $city = City::find($city_id);
        $image = str_replace('storage', 'public', $city->image);

        try
        {
            City::where('id', '=', $city_id)->delete();

            if($city->image != 'storage/city_image/noimage.jpg')
            {
                Storage::delete($image);    // Delete Image
            }

            session()->flash('message', "Congrats! City having ID '$city_id' has been Deleted successfully.");
            session(['num_of_cities' => City::count()]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this Cities, it has some routes linked to it.");
        }

        return back();
    }

    public function getImagePath()
    {
        // Handle File Upload
            if(request()->hasFile('city_image'))
            {
                // Getting File
                    $file = request()->file('city_image');
                // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                    $extension = $file->getClientOriginalExtension();
                // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                    $path = $file->storeAs('public/city_image', $fileNameToStore);
                // Modifying path
                    return $path = str_replace('public', 'storage', $path);
            }
            else
            {
                return $fileNameToStore = 'noimage.jpg';
            }
    }
}
