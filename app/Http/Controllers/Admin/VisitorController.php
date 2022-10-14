<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $visitors = Visitor::where('name', 'LIKE', '%' .$request->keyword. '%')->paginate(20);
        } else {
            $visitors = Visitor::paginate(20)->withQueryString();
        }
        
        return view('visitors.index', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses validasi data visitor
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:30',
                'source' => 'required',
                'company' => 'required|string|max:30',
                'contact' => 'required|string|max:30',
            ],
            $this->custom()
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        // proses insert data visitor
        try {
            Visitor::create([
                'name' => $request->name,
                'source' => $request->source,
                'company' => $request->company,
                'contact' => $request->contact
            ]);
            Alert::success(
                trans('visitors.alert.create.title'),
                trans('visitors.alert.create.message.success'));
            return redirect()->route('visitors.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('visitors.alert.create.title'),
                trans('visitors.alert.create.message.error', ['error' . $th->getMessege()])
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
        DB::beginTransaction();
        try {
            $visitor->update([
                'name' => $request->name,
                'source' => $request->source,
                'company' => $request->company,
                'contact' => $request->contact
            ]);

            Alert::success(
                trans('visitors.alert.update.title'),
                trans('visitors.alert.update.message.success'),
            );
            return redirect()->route('visitors.index');
             
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('visitors.alert.update.title'),
                trans('visitors.alert.update.message.error', ['error' . $th->getMessage()])
            );

            return redirect()->back()->withInput($request->all());
        } 

        finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        DB::beginTransaction();
        try {
            $visitor->delete();

            Alert::success(
                trans('visitors.alert.delete.title'),
                trans('visitors.alert.delete.message.success'),
            );
            return redirect()->route('visitors.index');
             
        } catch (\Throwable $th) {
            DB::rollBack();
          
            Alert::error(
                trans('visitors.alert.delete.title'),
                trans('visitors.alert.delete.message.error', ['error' . $th->getMessage()])
            );
        } 

        finally {
            DB::commit();
            return redirect()->back();
        }
    }

    private function custom()
    {
        return [
            'name' => trans('validation.custom.attribute-name'),
            'resource' => trans('validation.custom.attribute-name'),
            'company' => trans('validation.custom.attribute-name'),
            'contact' => trans('validation.custom.attribute-name'),
        ];
    }
}
