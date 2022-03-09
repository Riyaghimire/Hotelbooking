<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Example;
use Illuminate\Support\Facades\Auth;

class ExampleController extends Controller
{
    
    public function index()
    {
        
            $examples = Example::all();
     
            return view('backend.examples.index', compact('examples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.examples.create');
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
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|unique:accomodations,name|max:255',
            'price'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
            
        ]);
        $input = $request->all();
  
        if ($request->has('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $request['image']->getClientOriginalExtension();
            $request['image']->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $examples = new Example([
            'image' => $input['image'],
            'name' => $request->get('name'),
            'price' => $request->get('price')
            
        
        ]);

        
    
        $examples->save();
        return redirect('/examples/index')->with('success', '  Sucessfully Saved.');   
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
        $examples = Example::find($id);
        return view('backend.examples.edit', compact('examples'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|max:255|unique:examples,name,'.$request->id,
            'price'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
        ]); 

        $input = $request->all();
  
        if ($request->has('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $request['image']->getClientOriginalExtension();
            $request['image']->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        // dd('sdkjfbdf');
        $examples = Example::find($id);
        // Getting values from the blade template form
        $examples->name =  $request->get('name');
        $examples->price = $request->get('price');
        $examples->image = $input['image'];
   
        $examples->save();
 
        return redirect('/examples/index')->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $examples = Example::find($id);
        $examples->delete(); 
 
        return redirect('/examples/index')->with('success', 'Removed.');
    }
}
