<?php

namespace App;

use App\Model;

class Route extends Model
{
    public function set_route()
    {
        // Inserting into DB

            try
            {
                Route::create(['city' => request('select_city'), 'from_airport' => request('from'), 'airline_image' => request('select_airline'), 'price' => request('price'), 'class_id' => request('select_class')]);

                session()->flash('message', "Congrats! Route has been added successfully.");

                session(['num_of_continents' => Continent::count()]);
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                session()->flash('exception', "Error: " . "Route already Exists");
            }

            return back();
    }

    public function update_route($id)
    {
        // Updating into DB
            try
            {
                Route::where('id', $id)->update(['city' => request('select_city'), 'from_airport' => request('from'), 'airline_image' => request('select_airline'), 'price' => request('price'), 'class_id' => request('select_class')]);
                session()->flash('message', "Congrats! Route has been Updated successfully.");
            }
            catch (\Illuminate\Database\QueryException $e)
            {
                session()->flash('exception', "Sorry! " . "Cannot update this Route.");
            }

            return redirect('routes');
    }

    public function delete_route()
    {
        $route_id = request('route_del_id');

        try
        {
            Route::where('id', '=', $route_id)->delete();
            session()->flash('message', "Congrats! Route having ID '$route_id' has been Deleted successfully.");
            session(['num_of_cities' => Route::count()]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this Route!");
        }

        return back();
    }

}
