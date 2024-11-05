<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobEditFormRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostJobController extends Controller
{
    public function create(){
      return view('job.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'feature_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'description'=>'required|min:10',
            'roles'=>'required|min:10',
            'address' => 'required',
            'date' => 'required',
            'salary' => 'required'
        ]);

        $imagePath = $request->file('feature_image')->store('images','public');
        $post = new Listing;
        $post->feature_image = $imagePath;
        $post->title = $request->title;
        $post->user_id = auth()->user()->id;
        $post->description = $request->description;
        $post->roles = $request->roles;
        $post->job_type = $request->job_type;
        $post->address = $request->address;
        $post->salary = $request->salary;
        $post->application_close_date =\Carbon\Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
        $post->slug = Str::slug($request->title). '.'. Str::uuid();
        $post->save();
        return back();
    }

    public function edit(Listing $listing){
        return view('job.edit',compact('listing'));
    }


    public function update($id, JobEditFormRequest $request) {
        // Find the job listing or fail
        $listing = Listing::findOrFail($id);

        // Check if a new feature image is uploaded and update it
        if ($request->hasFile('feature_image')) {
            $featureImage = $request->file('feature_image')->store('images', 'public');
            $listing->feature_image = $featureImage;
        }

        // Update the rest of the fields (except feature_image)
        $listing->fill($request->except('feature_image'));

        // Save the updated listing
        $listing->save();

        // Return back with a success message
        return back()->with('success', 'Your job post has been successfully updated');
    }

}
