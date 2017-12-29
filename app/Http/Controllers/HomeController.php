<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->search = $request->input('search', '%');


        $contacts =contacts::orderby('name','asc')
        ->where('owner_id',\Auth::user()->id)
        ->where('name','like', '%' .$this->search .'%')
        ->orwhere('number','like', '%' .$this->search .'%')
        ->where('owner_id',\Auth::user()->id)

        ->paginate(10);

        $contacts->setPath('home');

        $search = ($this->search=='%')?'': $this->search;
        
        return view('home',compact('contacts','search'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'       => 'required|min:1',
                'number'       => 'required|min:1|numeric',
            ],
                $messages = array('name.required' => 'Contact Name is required!',
                    'number.required' => 'Contact Number is required!',
                    'number.numeric' => 'Contact Number must be a number!')
            );

            $request['owner_id'] = \Auth::user()->id;
            $contacts = contacts::create($request->all());

             return back()->with([
            'flash_message' => "New Contact Successfully Added!"
        ]);
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
       // $contacts = contacts::findorfail($id);

       $contacts = contacts::where('id',$id)
        ->where('owner_id',\Auth::user()->id)
        ->first();
        
        return view('edit',compact('contacts'));
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

       $this->validate($request,
            [
                'name'       => 'required|min:1',
                'number'       => 'required|min:1|numeric',
            ],
                $messages = array('name.required' => 'Contact Name is required!',
                    'number.required' => 'Contact Number is required!',
                    'number.numeric' => 'Contact Number must be a number!')
            );

        $contacts = contacts::findorfail($id);
        $contacts->update( $request->all() );

            return back()->with([
            'flash_message' => "Updated Successfully!"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacts = contacts::findorfail($id);
        $contacts->delete();

         return back()->with([
            'flash_message' => "Deleted Successfully!"
        ]);
    }
}
