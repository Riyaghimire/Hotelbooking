<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
    
    $contact = Contact::all();
    return view('backend.contact.index', compact('contact'));
       }   

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('backend.contact.create');
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
           
           'fullname' => 'required|unique:contacts,fullname|max:255',
           'email' => 'required|email',
           'body'=>'required'
     
       ]);
       
       $contact = new Contact([
           'fullname' => $request->get('fullname'),
           'email' => $request->get('email'),
           'body' =>$request->get('body')
           
       ]);

       
   
       $contact->save();
       return redirect('/contact/index')->with('success', '  Sucessfully Saved.');   
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
       $contact = Contact::find($id);
       return view('backend.contact.edit', compact('contact'));
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
        'fullname' => 'required|max:255|unique:contacts,fullname,'.$request->id,
        'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        'body'=>'required',
        
       ]); 

       
    
       $contact = Contact::find($id);
       
       // Getting values from the blade template form
       $contact->fullname =  $request->get('fullname');
       $contact->email = $request->get('email');
       $contact->body = $request->get('body');
  
       $contact->save();

       return redirect('/contact/index')->with('success', 'Updated.');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   { 
       $contact = Contact::find($id);
       $contact->delete(); 

       return redirect('/contact/index')->with('danger', 'Removed.');
   }
}
 

