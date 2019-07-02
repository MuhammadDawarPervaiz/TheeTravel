<?php

namespace App;

use App\Model;

class Class_category extends Model
{
    public function set_class()
    {
        // Inserting into DB

            try
            {
                Class_category::create(['name' => request('class_name')]);

                session()->flash('message', "Congrats! Class has been added successfully.");
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                session()->flash('exception', "Error: " . "Class already Exists");
            }

            return back();
    }

    public function update_class($id)
    {
        // Updating into DB
            try
            {
                Class_category::where('id', $id)->update(['name' => request('class_name')]);
                session()->flash('message', "Congrats! Class has been Updated successfully.");
            }
            catch (\Illuminate\Database\QueryException $e)
            {
                session()->flash('exception', "Sorry! " . "Cannot update this Class.");
            }

            return redirect('class');
    }

    public function delete_class()
    {
        $class_id = request('class_del_id');

        try
        {
            Class_category::where('id', '=', $class_id)->delete();
            session()->flash('message', "Congrats! Class Category having ID '$class_id' has been Deleted successfully.");
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this Class, it has some routes linked to it.");
        }

        return back();
    }
}
