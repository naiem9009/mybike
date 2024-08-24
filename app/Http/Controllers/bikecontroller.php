<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike; // Import the Bike model

class bikecontroller extends Controller
{
    public function bikeform()
    {
        
        return view('bike');
    }

    public function store(Request $req)
    {
        

        $imageFileName = '';
        if (!is_dir(public_path('uploads'))){
            mkdir(public_path('uploads'), 0777, true);
        }

        // Handle the image upload
        if ($req->hasFile('img')) {
            $image = $req->img;
            $originalName = $image->getClientOriginalName();
            $imageName = time()."-".$originalName;
            $image->move(public_path('uploads'), $imageName);
            $imageFileName = 'uploads/' .$imageName;
        }

        $data = [
            'img' => $imageFileName,
            'name' => $req->name,
            'brand' => $req->brand,
            'model' => $req->model,
            'year' => $req->year,
            'price' => $req->price,
            'description' => $req->description,
            'status' => $req->status,
        ];

      

        
        bike::create($data);     
        
        return redirect('/all-bike')->with('success', 'Data saved successfully!');


    }

    public function updateBike ($id) {
        $getBike = bike::find($id);
        if (!$getBike) {
            return redirect().with('error', 'Not Found');
        }

        return view('updateBike', ['bike' => $getBike]);

    }

    public function entryUpdateBike ($id, Request $req) {
        $getBike = bike::find($id);
        if (!$getBike) {
            return redirect().with('error', 'Not Found');
        }

        $imageFileName = '';
        if (!is_dir(public_path('uploads'))){
            mkdir(public_path('uploads'), 0777, true);
        }

        // Handle the image upload
        if ($req->hasFile('img')) {
            $image = $req->img;
            $originalName = $image->getClientOriginalName();
            $imageName = time()."-".$originalName;
            $image->move(public_path('uploads'), $imageName);
            $imageFileName = 'uploads/' .$imageName;
        }

        $data = [
            'img' => $imageFileName,
            'name' => $req->name,
            'brand' => $req->brand,
            'model' => $req->model,
            'year' => $req->year,
            'price' => $req->price,
            'description' => $req->description,
            'status' => $req->status,
        ];

      

        
        $getBike->update($data);
        return redirect('/all-bike')->with('success', 'Updated successfully!');

    }

    public function deleteBike($id) {
        $getBike = bike::find($id);
    
        if (!$getBike) {
            return redirect()->back()->with('error', 'Bike not found');
        }
    
        $getBike->delete();
    
        return redirect()->back()->with('success', 'Bike is deleted');
    }

    // get all bikes data
    public function getAllBike() {
        try {
            $data = Bike::all();
    
            return view('all-bike', ['bike' => $data]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Bikes not found.');
        }
    }
}
