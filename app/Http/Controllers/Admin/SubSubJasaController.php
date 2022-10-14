<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubSubJasa;
use App\Models\SubJasa;
use App\Models\JenisJasa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class SubSubJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $subsubjasas = SubSubJasa::where('title', 'LIKE', '%' .$request->keyword. '%')->paginate(10);
        } else {
            $subsubjasas = SubSubJasa::paginate(10)->withQueryString();
        }

        return view('jasa.subsubjasa.index', compact('subsubjasas'));
    }

    public function select(Request $request)
    {
        $subsubjasas = [];
        if ($request->has('q')) {
            $search = $request->q;
            $subsubjasas = SubSubJasa::select('id', 'title')->where('title', 'LIKE', "%$search%")->limit(4)->get();
        } else {
            $subsubjasas = SubSubJasa::select('id', 'title')->limit(4)->get();
        }

        return response()->json($subsubjasas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa.subsubjasa.create');
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
                'slug' => 'required|string|unique:subsubjasas,slug',
            ],
            $this->attributes()
        );

        if ($validator->fails()) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = SubJasaCategory::select('id', 'title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        // proses insert data
        try {
            SubSubJasa::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'subjasa_id' => $request->parent_category
            ]);
            Alert::success(
                trans('subsubjasa.alert.create.title'),
                trans('subsubjasa.alert.create.message.success'));
            return redirect()->route('subsubjasa.index');
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = SubJasaCategory::select('id', 'title')->find($request->parent_category);
            }
            Alert::error(
                trans('subsubjasa.alert.create.title'),
                trans('subsubjasa.alert.create.message.error', ['error' . $th->getMessege()])
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
    public function edit(SubSubJasa $subsubjasa)
    {
        return view('jasa.subsubjasa.edit', compact('subsubjasa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSubJasa $subsubjasa)
    {
        // proses validasi data kategory
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:70',
                'slug' => 'required|string|unique:subsubjasas,slug',
            ],
            $this->attributes()
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        // proses update data kategory
        try {
            $subsubjasa->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'subjasa_id' => $request->parent_category
            ]);
            Alert::success(
                trans('subsubjasa.alert.update.title'),
                trans('subsubjasa.alert.update.message.success')
            );
            return redirect()->route('subsubjasa.index');
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = SubJasa::select('id', 'title')->find($request->parent_category);
            }
            Alert::error(
                trans('subsubjasa.alert.update.title'),
                trans('subsubjasa.alert.update.message.error', ['Error' . $th->getMessege()])
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
    public function destroy(SubSubJasa $subsubjasa)
    {
        try {
            $subsubjasa->delete();
            Alert::success(
                trans('subsubjasa.alert.delete.title'),
                trans('subsubjasa.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('subsubjasa.alert.Ddelete.title'),
                trans('subsubjasa.alert.update.message.error', ['Error' . $th->getMessege()])
            );
        }

        return redirect()->back();
    }
    
    private function attributes()
    {
        return [
            'title' => trans('subsubjasa.form_control.input.title.attributes'),
            'category' => trans('subsubjasa.form_control.input.category.attribute'),
            'slug' => trans('subsubjasa.form_control.input.slug.attribute')
        ];
    }
}
