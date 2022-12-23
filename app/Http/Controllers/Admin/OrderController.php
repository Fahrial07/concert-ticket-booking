<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Models\Concer;
use Illuminate\Http\Request;
use App\Models\TicketBooking;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' =>  'Order',
            'concers'    =>  TicketBooking::orderBy('id', 'DESC')->get()
        );

        return view('pages.admin.book.index', $data);
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
        //
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
            'name'  =>  'required',
            'email' =>  'required',
            'phone' =>  'required',
            'status'    =>  'required',
            'pob'   =>  'required',
            'dob'   =>  'required',
            'address'   =>  'required',
        ]);

        $data = array(
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'phone' =>  $request->phone,
            'status'    =>  $request->status,
            'pob'   =>  $request->pob,
            'dob'   =>  $request->dob,
            'address'   =>  $request->address,
        );

        $result = TicketBooking::where('id', $id)->update($data);

        if($result){
            Alert::success('Success', 'Data berhasil diubah');
            return redirect()->route('admin.ticket_order.index');
        } else{
            Alert::error('Error', 'Data gagal diubah');
            return redirect()->route('admin.ticket_order.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = TicketBooking::where('id', $id)->first();

        $result = TicketBooking::destroy($id);

        Concer::where('id', $get->concer_id)->decrement('sold');

        if($result){
            Alert::success('Success', 'Data berhasil dihapus');
            return redirect()->route('admin.ticket_order.index');
        } else{
            Alert::error('Error', 'Data gagal dihapus');
            return redirect()->route('admin.ticket_order.index');
        }
    }
}
