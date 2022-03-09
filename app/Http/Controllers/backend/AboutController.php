<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
    
    $about = About::all();
    return view('backend.about.index', compact('about'));
       }   

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('backend.about.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       // dd($request);
       $request->validate([
           
           'title' => 'required|unique:abouts,title|max:255',
           'caption'=>'required|unique:abouts,caption|max:255',
           'featured'=>'required|unique:abouts,featured|max:10000',
           'description'=>'required|unique:abouts,description|max:10000',
     
       ]);
       
       $about = new About([
           'title' => $request->get('title'),
           'caption' => $request->get('caption'),
           'featured' => $request->get('featured'),
           'description' =>$request->get('description')
           
       ]);

       
   
       $about->save();
       return redirect('/about/index')->with('success', '  Sucessfully Saved.');   
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $about = About::find($id);
       return view('backend.about.edit', compact('about'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       
       $request->validate([
        'title' => 'required|max:255|unique:abouts,title,'.$request->id,
        'caption'=>'required|max:255.',
        'featured'=>'required|max:10000',
        'description'=>'required|max:10000',
       ]); 

       
    
       $about = About::find($id);
       
       // Getting values from the blade template form
       $about->title =  $request->get('title');
       $about->caption = $request->get('caption');
       $about->featured = $request->get('featured');
       $about->description = $request->get('description');
  
       $about->save();

       return redirect('/about/index')->with('success', 'Updated.');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   { 
       $about = About::find($id);
       $about->delete(); 

       return redirect('/about/index')->with('success', 'Removed.');
   }
}
 

