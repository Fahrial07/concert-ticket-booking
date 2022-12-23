<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TicketBooking;
use App\Http\Controllers\Controller;
use Alert;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' =>  'Check In',
        );

        return view('pages.admin.checkin.index', $data);
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
        $request->validate([
            'ticketId'  =>  'required'
        ]);

        $check = TicketBooking::where('ticketId', $request->ticketId)->first();

        if($check->status == '0' ){
            $result = TicketBooking::where('ticketId', $request->ticketId)->update([
                'status'    =>  '1'
            ]);

            if($result){
                Alert::success('Success', 'Check In Success');
                return redirect()->route('admin.check_in.index');
            }else{
                Alert::error('Error', 'Check In Failed');
                return redirect()->route('admin.check_in.index');
            }

        } else {
            Alert::error('Error', 'Ticket Already Check In');
            return redirect()->route('admin.check_in.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
