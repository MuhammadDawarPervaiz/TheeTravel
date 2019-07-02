<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use App\Model;

class Blog extends Model
{
    public function set_blog()
    {

        // Inserting into DB
            try
            {
                Blog::create(['blog_image' => $this->getMultipleImagePath(), 'blog_post' => request('blog_post'), 'blog_link' => request('blog_link'), 'page_title' => request('page_title'), 'header_keywords' => request('header_keywords'), 'body_keywords' => request('body_keywords'), 'body_content' => request('body_content'), 'meta_title' => request('meta_title'), 'meta_description' => request('meta_description'), 'meta_keywords' => request('meta_keywords')]);
                session()->flash('message', "Congrats! Blog has been added successfully.");
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                session()->flash('exception', "Error: " . "Sorry for the issue, please contact your administrator!");
            }

            return back();
    }

    public function update_blog($id)
    {
        // Updating into DB
            try
            {
                if ($this->getMultipleImagePath() != "noimage.jpg")
                {
                  // Deleting old Image
                      $blog = Blog::find($id);

                      try
                      {
                          foreach (json_decode($blog->blog_image) as $path)
                          {
                            $image = str_replace('storage', 'public', $path);

                            if($path != 'storage/blog/noimage.jpg')
                            {
                                Storage::delete($image);    // Delete Image
                            }
                          }
                      }
                      catch (\Illuminate\Database\QueryException $e)
                      {
                          session()->flash('exception', "Sorry! " . "Cannot delete this Blog!");
                      }

                    // Updating new one
                        Blog::where('id', $id)->update(['blog_image' => $this->getMultipleImagePath(), 'blog_post' => request('blog_post'), 'blog_link' => request('blog_link'), 'page_title' => request('page_title'), 'header_keywords' => request('header_keywords'), 'body_keywords' => request('body_keywords'), 'body_content' => request('body_content'), 'meta_title' => request('meta_title'), 'meta_description' => request('meta_description'), 'meta_keywords' => request('meta_keywords')]);
                }
                else
                {
                  // Updating new one
                    Blog::where('id', $id)->update(['blog_post' => request('blog_post'), 'blog_link' => request('blog_link'), 'page_title' => request('page_title'), 'header_keywords' => request('header_keywords'), 'body_keywords' => request('body_keywords'), 'body_content' => request('body_content'), 'meta_title' => request('meta_title'), 'meta_description' => request('meta_description'), 'meta_keywords' => request('meta_keywords')]);
                }
                session()->flash('message', "Congrats! Blog has been Updated successfully.");
            }
            catch (\Illuminate\Database\QueryException $e)
            {
                session()->flash('exception', "Sorry! " . "Cannot update this Blog.");
            }

            return redirect('manageBlogPost');
    }

    public function delete_blog()
    {
        $blog_id = request('blog_del_id');
        $blog = Blog::find($blog_id);

        try
        {
            foreach (json_decode($blog->blog_image) as $path)
            {
              $image = str_replace('storage', 'public', $path);

              if($path != 'storage/blog/noimage.jpg')
              {
                  Storage::delete($image);    // Delete Image
              }
            }

            Blog::where('id', '=', $blog_id)->delete();

            session()->flash('message', "Congrats! Blog having ID '$blog_id' has been Deleted successfully.");
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this Blog!");
        }

        return back();
    }

    public function getMultipleImagePath()
    {
        // Handle File Upload
            if(request()->hasFile('blog_image'))
            {
                foreach(request()->file('blog_image') as $file)
                {
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    $path = $file->storeAs('public/blog/', $fileNameToStore);
                    $data[] = str_replace('public', 'storage', $path);
                }

               return $path = json_encode($data);
            }
            else
            {
                return $fileNameToStore = 'noimage.jpg';
            }
    }
}
