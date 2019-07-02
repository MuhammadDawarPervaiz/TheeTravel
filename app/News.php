<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['heading', 'news', 'image'];

    public function set_news()
    {
        // Delete Previous News image
            $news = News::find(1);
            $image = str_replace('storage', 'public', $news->image);
            Storage::delete($image);

        // Handle File Upload
            if(request()->hasFile('image'))
            {
                // Getting File
                    $file = request()->file('image');
                // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                    $extension = $file->getClientOriginalExtension();
                // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                    $path = $file->storeAs('public/news_image', $fileNameToStore);
                // Modifying path
                    $path = str_replace('public', 'storage', $path);
            }
            else
            {
                $fileNameToStore = 'noimage.jpg';
            }

        // Inserting into DB
            try
            {
                News::where('id', '=', 1)->update(array('heading' => request('heading'), 'news' => request('news'), 'image' => $path));

                session()->flash('message', "Congrats! News has been added successfully.");
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                session()->flash('exception', "Error: " . "News already Exists");
            }

            return back();
    }
}
