<?php

namespace App\Http\Controllers\admin;

use App\Transporter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transporter=Transporter::all();
        return view('admin.transporter.transporter',compact('transporter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transporter.add_transporter');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|max:1000',
            'password' => 'required|min:8',
            'confirmpassword' => 'required_with:password|same:password|min:8',
            'address' => 'required|max:1000',
            'phone' => 'required',
            'avatar' => 'required',
        ]);

        try {
//            $transporter = $request->all();
//            if($request->has('parent_id')){
//                if($transporter['parent_id'] != 0) {
//                    $this->validate($request, [
//                        'parent_id' => 'required|exists:$transporter,id',
//                    ]);
//                } else {
//                    $transporter['parent_id'] = 0;
//                }
//            }
            $transporter=new Transporter();
            $transporter->name=$request->name;
            $transporter->email=$request->email;
            $transporter->phone=$request->phone;
            $transporter->password=$request->password;
            $transporter->avatar=$request->avatar;
            $transporter->address=$request->address;

            if($request->File('avatar'))
            {
                $file=$request->file('avatar');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('uploads/transporter',$filename);
                $transporter->avatar=$filename;
            }

//            $transporter = Transporter::create($transporter);

                $transporter->save();

            return redirect()->route('transporter.index')->with('flash_success', 'Transporter added!');

        }catch (Exception $e) {
            return redirect()->route('transporter.index')->with('flash_error', trans('form.whoops'));
        }
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
        $transporter = Transporter::find($id);
        return view('admin.transporter.edit_transporter',compact('transporter','id'));
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
        $transporter=Transporter::find($id);
        $transporter->name=$request->get('name');
        $transporter->email=$request->get('email');
        $transporter->address=$request->get('address');
        $transporter->area=$request->get('area');
        $transporter->subarea=$request->get('subarea');

        $transporter->phone=$request->get('phone');
        $transporter->avatar=$request->get('image');
        $transporter->save();

        return redirect()->route('transporter.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transporter = Transporter::findOrFail($id);
        $transporter->delete();



        return redirect()->route('transporter.index')

            ->with('success','Shop deleted successfully');
    }
    function pdf()
    {
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->covert_transporter_to_html());
    }
    function covert_transporter_to_html()
    {
        $transporter_data=$this->get_data();
        $output='  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Image</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    </table>';
    }
    function get_data()
    {
        $transporter=Transporter::all();
        return $transporter;
    }
public function shift()
{
    return view('admin.transporter.transporter_shift');
}
}
