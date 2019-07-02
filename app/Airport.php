<?php

namespace App;

use App\Model;

class Airport extends Model
{
    public function set_airport()
    {
        // Inserting into DB

            try
            {
                Airport::create(['name' => request('airport_name'), 'city_id' => request('select_city')]);

                session()->flash('message', "Congrats! Airport has been added successfully.");

                session(['num_of_airports' => Airport::count()]);
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                session()->flash('exception', "Error: " . "Airport already Exists");
            }

            return back();
    }

    public function update_airport($id)
    {
        // Updating into DB
            try
            {
                // Updating new one
                    Airport::where('id', $id)->update(['name' => request('airport_name'), 'city_id' => request('select_city')]);
                    session()->flash('message', "Congrats! Airport has been Updated successfully.");
                    session(['num_of_airports' => Airport::count()]);
            }
            catch (\Illuminate\Database\QueryException $e)
            {
                session()->flash('exception', "Sorry! " . "Cannot update this Airport.");
            }

            return redirect('airports');
    }

    public function delete_airport()
    {
        $airport_id = request('airport_del_id');

        try
        {
            Airport::where('id', '=', $airport_id)->delete();
            session()->flash('message', "Congrats! Airport having ID '$airport_id' has been Deleted successfully.");
            session(['num_of_airports' => Airport::count()]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this Airport, it has some routes linked to it.");
        }

        return back();
    }
}
