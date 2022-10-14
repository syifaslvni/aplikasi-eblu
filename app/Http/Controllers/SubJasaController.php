<?php

namespace App\Http\Controllers;

use App\Models\SubJasa;
use App\Models\JenisJasa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SubJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $subjasas = SubJasa::where('title', 'LIKE', '%' .$request->keyword. '%')->paginate(10);
        } else {
            $subjasas = SubJasa::paginate(10)->withQueryString();
        }

        return view('jasa.subjasa.index', compact('subjasas'));
    }

    public function select(Request $request)
    {
        $subjasas = [];
        if ($request->has('q')) {
            $search = $request->q;
            $subjasas = SubJasa::select('id', 'title')->where('title', 'LIKE', "%$search%")->limit(4)->get();
        } else {
            $subjasas = SubJasa::select('id', 'title')->limit(4)->get();
        }

        return response()->json($subjasas);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa.subjasa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses validasi data kategory
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:70',
                'slug' => 'required|string|unique:subjasas,slug',
            ],
            $this->attributes()
        );

        if ($validator->fails()) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = JenisJasaCategory::select('id', 'title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        // proses insert data
        try {
            SubJasa::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'jenisjasa_id' => $request->parent_category
            ]);
            Alert::success(
                trans('subjasa.alert.create.title'),
                trans('subjasa.alert.create.message.success'));
            return redirect()->route('subjasa.index');
            
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = JenisJasaCategory::select('id', 'title')->find($request->parent_category);
            }
            Alert::error(
                trans('subjasa.alert.create.title'),
                trans('subjasa.alert.create.message.error', ['error' . $th->getMessege()])
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
    public function edit(SubJasa $subjasa)
    {
        return view('jasa.subjasa.edit', compact('subjasa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubJasa $subjasa)
    {
        // proses validasi data kategory
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:70',
                'slug' => 'required|string|unique:subjasas,slug',
            ],
            $this->attributes()
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        // proses update data kategory
        try {
            $subjasa->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'jenisjasa_id' => $request->parent_category
            ]);
            Alert::success(
                trans('subjasa.alert.update.title'),
                trans('subjasa.alert.update.message.success')
            );
            return redirect()->route('subjasa.index');
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = JenisJasa::select('id', 'title')->find($request->parent_category);
            }
            Alert::error(
                trans('subjasa.alert.update.title'),
                trans('subjasa.alert.update.message.error', ['Error' . $th->getMessege()])
            );
            return redirect()->back()->withInput($request->all());
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubJasa $subjasa)
    {
        try {
            $subjasa->delete();
            Alert::success(
                trans('subjasa.alert.delete.title'),
                trans('subjasa.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('subjasa.alert.Ddelete.title'),
                trans('subjasa.alert.update.message.error', ['Error' . $th->getMessege()])
            );
        }

        return redirect()->back();
    }

    private function attributes()
    {
        return [
            'title' => trans('subjasa.form_control.input.title.attributes'),
            'category' => trans('subjasa.form_control.input.category.attribute'),
            'slug' => trans('subjasa.form_control.input.slug.attribute')
        ];
    }
}
