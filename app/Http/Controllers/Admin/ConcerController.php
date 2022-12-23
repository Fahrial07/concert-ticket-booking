<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Models\Concer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ConcerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' =>  'Konser',
            'concers'   =>  Concer::orderBy('id', 'desc')->get()
        );

        return view('pages.admin.concer.index', $data);
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
            'concer_name'   =>  'required',
            'poster'    =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' =>  'required',
            'concer_place' =>  'required',
            'quota' =>  'required',
            'open_date' =>  'required',
            'close_date' => 'required',
            'concer_time'   =>  'required',
        ]);

        if ($request->hasFile('poster')) {

            $path = $request->file('poster')->store('public/poster');

            $data = array(
                'concer_name' => $request->concer_name,
                'slug' => Str::slug($request->concer_name),
                'poster' => $path,
                'price' => $request->price,
                'concer_place' => $request->concer_place,
                'concer_time'   =>  $request->concer_time,
                'quota' => $request->quota,
                'open_date' => $request->open_date,
                'close_date' => $request->close_date,
            );

            $result = Concer::create($data);

            if ($result) {
                Alert::success('Success', 'Data berhasil ditambahkan');
                return redirect()->route('admin.concer.index');
            } else {
                Alert::error('Error', 'Data gagal ditambahkan');
                return redirect()->route('admin.concer.index');
            }

        } else {
            $data = array(
            'concer_name' => $request->concer_name,
            'slug' => Str::slug($request->concer_name),
            'price' => $request->price,
            'concer_place' => $request->concer_place,
            'concer_time' => $request->concer_time,
            'quota' => $request->quota,
            'open_date' => $request->open_date,
            'close_date' => $request->close_date,
            );

            $result = Concer::create($data);

            if ($result) {
            Alert::success('Success', 'Data berhasil ditambahkan');
            return redirect()->route('admin.concer.index');
            } else {
            Alert::error('Error', 'Data gagal ditambahkan');
            return redirect()->route('admin.concer.index');
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
        $request->validate([
        'concer_name' => 'required',
        'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => 'required',
        'place' => 'required',
        'quota' => 'required',
        'open_date' => 'required',
        'closed_date' => 'required',
        'concer_time' => 'required',
        ]);

        if ($request->hasFile('poster')) {

        $path = $request->file('poster')->store('public/poster');

        $data = array(
        'concer_name' => $request->concer_name,
        'slug' => Str::slug($request->concer_name),
        'poster' => $path,
        'price' => $request->price,
        'place' => $request->place,
        'quota' => $request->quota,
        'open_date' => $request->open_date,
        'closed_date' => $request->closed_date,
        'concer_time' => $request->concer_time,
        );

        $result = Concer::where('id', $id)->update($data);

        if ($result) {
        Alert::success('Success', 'Data berhasil diupdate');
        return redirect()->route('admin.concer.index');
        } else {
        Alert::error('Error', 'Data gagal diupdate');
        return redirect()->route('admin.concer.index');
        }

        } else {
        $data = array(
        'concer_name' => $request->concer_name,
        'slug' => Str::slug($request->concer_name),
        'price' => $request->price,
        'place' => $request->place,
        'quota' => $request->quota,
        'open_date' => $request->open_date,
        'closed_date' => $request->closed_date,
        'concer_time' => $request->concer_time,
        );

        $result = Concer::where('id', $id)->update($data);

        if ($result) {
        Alert::success('Success', 'Data berhasil diupdate');
        return redirect()->route('admin.concer.index');
        } else {
        Alert::error('Error', 'Data gagal diupdate');
        return redirect()->route('admin.concer.index');
        }
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
        $cek  = Concer::where('id', $id)->first();

        if (!empty($cek->poster) || $cek->poster != null) {
            Storage::delete($cek->poster);
        }

        $result = Concer::destroy($id);

        if ($result) {
        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->route('admin.concer.index');
        } else {
        Alert::error('Error', 'Data gagal dihapus');
        return redirect()->route('admin.concer.index');
        }
    }
}
