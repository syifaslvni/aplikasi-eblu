<?php

namespace App\Http\Controllers\Admin;

use App\Models\JenisJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class JenisJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $jenisjasas = JenisJasa::where('title', 'LIKE', '%' .$request->keyword. '%')->paginate(10);
        } else {
            $jenisjasas = JenisJasa::paginate(10)->withQueryString();
        }

        return view('jasa.jenisjasa.index', compact('jenisjasas'));
    }

    public function select(Request $request)
    {
        $jenisjasas = [];
        if ($request->has('q')) {
            $search = $request->q;
            $jenisjasas = JenisJasa::select('id', 'title')->where('title', 'LIKE', "%$search%")->limit(4)->get();
        } else {
            $jenisjasas = JenisJasa::select('id', 'title')->limit(4)->get();
        }

        return response()->json($jenisjasas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa.jenisjasa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses validasi data post
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:70',
                'slug' => 'required|string|unique:jenisjasas,slug',
            ],
            $this->attributes()
        );
        
        if ($validator->fails()) { 
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            JenisJasa::create([
                'title' => $request->title,
                'slug' => $request->slug
            ]);

            Alert::success(
                trans('jenisjasa.alert.create.title'),
                trans('jenisjasa.alert.create.message.success'),
            );
            return redirect()->route('jenisjasa.index');
             
        } catch (\Throwable $th) {
           
            Alert::error(
                trans('jenisjasa.alert.create.title'),
                trans('jenisjasa.alert.create.message.error', ['error' . $th->getMessage()])
            );

            return redirect()->back()->withInput($request->all());
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
    public function destroy(JenisJasa $jenisjasa)
    {
        try {
            $jenisjasa->delete();
            Alert::success(
                trans('jenisjasa.alert.delete.title'),
                trans('jenisjasa.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('jenisjasa.alert.delete.title'),
                trans('jenisjasa.alert.update.message.error', ['Error' . $th->getMessege()])
            );
        }

        return redirect()->back();
    }

    private function attributes()
    {
        return [
            'title' => trans('jenisjasa.form_control.input.title.attributes'),
            'slug' => trans('jenisjasa.form_control.input.slug.attribute')
        ];
    }
}
