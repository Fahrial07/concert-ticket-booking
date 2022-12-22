<?php

namespace App\Http\Controllers\Landing\Book;

use App\Models\Concer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TicketBooking;
use App\Http\Controllers\Controller;
use Alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Booking Ticket',
            'concers' => Concer::orderBy('id', 'DESC')->where('is_active', '1')->get()
        );

        return view('pages.landing.booking.index', $data);
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
            'name'  =>  'required|min:3|max:50',
            'email' =>  'required|email|unique:ticket_booking,email',
            'phone' =>  'required|digits_between:10,15',
            'gender'    => 'required',
            'pob'   =>  'required|min:3|max:20',
            'dob'   =>  'required',
            'address'   =>  'required'
        ]);

        $quota = Concer::where('id', $request->concer)->first()->quota;

        $sold = Concer::where('id', $request->concer)->first()->sold;

        if ($sold == $quota) {
            Alert::error('Maaf, Quota sudah penuh');
            return redirect()->route('booking.index');
        } else {

            $data = array(
                'concer_id' => $request->concer,
                'ticketId' => date('Y') . '-' . Str::random(5) . '-' . date('is') . Str::random(2),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'pob' => $request->pob,
                'dob' => $request->dob,
                'address' => $request->address,
            );

            $result = TicketBooking::create($data);
            if ($result) {
                Concer::where('id', $request->concer)->increment('sold');
                Alert::success('Berhasil', 'Pembelian Tiket Berhasil');
                return redirect()->route('my.ticket', $result->ticketId);
            } else {
                Alert::error('Gagal', 'Pembelian Tiket Gagal');
                return redirect()->route('booking.index');
            }

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

         $quota = Concer::where('slug', $id)->first()->quota;

         $sold = Concer::where('slug', $id)->first()->sold;

        if ($sold == $quota) {
                Alert::error('Maaf, Quota sudah penuh');
                return redirect()->route('booking.index');
        } else {

            $data = array(
                'title' => 'Booking Ticket',
                'concer' => Concer::where('slug', $id)->where('is_active', '1')->first()
            );

            return view('pages.landing.booking.show', $data);

        }
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

    public function ticket($ticketId)
    {
        $data = array(
            'title' => 'Ticket',
            'ticket' => TicketBooking::where('ticketId', $ticketId)->first()
        );

        return view('pages.landing.booking.ticket', $data);
    }
    public function cetak_ticket($ticketId)
    {
        $data = array(
            'title' => 'Cetak Ticket',
            'ticket' => TicketBooking::where('ticketId', $ticketId)->first()
        );

        return view('pages.landing.print.ticket', $data);
    }
}
