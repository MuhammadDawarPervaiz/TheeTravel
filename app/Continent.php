<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use App\Model;

class Continent extends Model
{
    public function set_continent()
    {
        // Inserting into DB
            try
            {
                Continent::create(['name' => request('continent_name'), 'image' => $this->getImagePath(), 'page_title' => request('page_title'), 'header_keywords' => request('header_keywords'), 'body_keywords' => request('body_keywords'), 'body_content' => request('body_content'), 'meta_title' => request('meta_title'), 'meta_description' => request('meta_description'), 'meta_keywords' => request('meta_keywords')]);
                session()->flash('message', "Congrats! Continent has been added successfully.");
                session(['num_of_continents' => Continent::count()]);
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                session()->flash('exception', "Error: " . "Continent already Exists");
            }

            return back();
    }

    public function update_continent($id)
    {
        // Updating into DB
            try
            {
                if ($this->getImagePath() != "noimage.jpg")
                {
                  // Deleting old Image
                      $continent = Continent::find($id);
                      $image = str_replace('storage', 'public', $continent->image);
                      try
                      {
                          if($continent->image != 'storage/continent_image/noimage.jpg')
                          {
                              Storage::delete($image);    // Delete Image
                          }
                      }
                      catch (\Illuminate\Database\QueryException $e)
                      {
                          session()->flash('exception', "Sorry! " . "Cannot delete this old continent image.");
                      }

                    // Updating new one
                        Continent::where('id', $id)->update(['name' => request('continent_name'), 'image' => $this->getImagePath(), 'page_title' => request('page_title'), 'header_keywords' => request('header_keywords'), 'body_keywords' => request('body_keywords'), 'body_content' => request('body_content'), 'meta_title' => request('meta_title'), 'meta_description' => request('meta_description'), 'meta_keywords' => request('meta_keywords')]);
                }
                else
                {
                  // Updating new one
                    Continent::where('id', $id)->update(['name' => request('continent_name'), 'page_title' => request('page_title'), 'header_keywords' => request('header_keywords'), 'body_keywords' => request('body_keywords'), 'body_content' => request('body_content'), 'meta_title' => request('meta_title'), 'meta_description' => request('meta_description'), 'meta_keywords' => request('meta_keywords')]);
                }
                session()->flash('message', "Congrats! Continent has been Updated successfully.");
                session(['num_of_continents' => Continent::count()]);
            }
            catch (\Illuminate\Database\QueryException $e)
            {
                session()->flash('exception', "Sorry! " . "Cannot update this Continent.");
            }

            return redirect('continents');
    }

    public function delete_continent()
    {
        $continent_id = request('continent_del_id');
        $continent = Continent::find($continent_id);
        $image = str_replace('storage', 'public', $continent->image);

        try
        {
            Continent::where('id', '=', $continent_id)->delete();

            if($continent->image != 'storage/continent_image/noimage.jpg')
            {
                Storage::delete($image);    // Delete Image
            }

            session()->flash('message', "Congrats! Continent having ID '$continent_id' has been Deleted successfully.");
            session(['num_of_continents' => Continent::count()]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this continent, it has some cities linked to it.");
        }

        return back();
    }

    public function getImagePath()
    {
        // Handle File Upload
            if(request()->hasFile('continent_image'))
            {
                // Getting File
                    $file = request()->file('continent_image');
                // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                    $extension = $file->getClientOriginalExtension();
                // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                    $path = $file->storeAs('public/continent_image', $fileNameToStore);
                // Modifying path
                    return $path = str_replace('public', 'storage', $path);
            }
            else
            {
                return $fileNameToStore = 'noimage.jpg';
            }
    }
}
