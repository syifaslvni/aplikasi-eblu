<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\SubJasa;
use App\Models\JenisJasa;
use App\Models\SubSubJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $products = Product::where('title', 'LIKE', '%' .$request->keyword. '%')->paginate(15);
        } else {
            $products = Product::paginate(15)->withQueryString();
        }

        return view ('products.index', compact('products'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
                'slug' => 'required|string|unique:products,slug',
                'thumbnail' => 'required',
                'description' => 'required|string|max:100',
                'content' => 'required',
                'jenisjasa_id' => 'required',
                'subjasa_id' => 'required',
                'subsubjasa_id' => 'required',
            ],
            $this->attributes()
        );
        
        if ($validator->fails()) { 
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }


        //insert data
        try {
            $product = Product::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'jenisjasa_id' => $request->jenisjasa_id,
                'subjasa_id' => $request->subjasa_id,
                'subsubjasa_id' => $request->subsubjasa_id,
            ]);

            Alert::success(
                trans('products.alert.create.title'),
                trans('products.alert.create.message.success'),
            );
            return redirect()->route('products.index');
             
        } catch (\Throwable $th) {

            if ($request->has('parent_category')) {
                $request['parent_category'] = JenisJasaCategory::select('id', 'title')->find($request->parent_category);
            }
            
            if ($request->has('parent_categorys')) {
                $request['parent_categorys'] = SubJasaCategory::select('id', 'title')->find($request->parent_categorys);
            }
            
            if ($request->has('parent_categoryss')) {
                $request['parent_categoryss'] = SubSubJasaCategory::select('id', 'title')->find($request->parent_categoryss);
            }
            Alert::error(
                trans('products.alert.create.title'),
                trans('products.alert.create.message.error', ['error' . $th->getMessage()])
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
    public function show(Product $product)
    {
        return view('products.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //proses validasi data post
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:70',
                'slug' => 'required|string|unique:products,slug',
                'thumbnail' => 'required',
                'description' => 'required|string|max:100',
                'content' => 'required',
                'jenisjasa_id' => 'required',
                'subjasa_id' => 'required',
                'subsubjasa_id' => 'required',
            ],
            $this->attributes()
        );
        
        if ($validator->fails()) { 
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // proses update data
        try {
            $product->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'jenisjasa_id' => $request->jenisjasa_id,
                'subjasa_id' => $request->subjasa_id,
                'subsubjasa_id' => $request->subsubjasa_id,
            ]);

            Alert::success(
                trans('products.alert.update.title'),
                trans('products.alert.update.message.success'),
            );
            return redirect()->route('products.index');
             
        } catch (\Throwable $th) {

            if ($request->has('parent_category')) {
                $request['parent_category'] = JenisJasaCategory::select('id', 'title')->find($request->parent_category);
            }
            
            if ($request->has('parent_categorys')) {
                $request['parent_categorys'] = SubJasaCategory::select('id', 'title')->find($request->parent_categorys);
            }
            
            if ($request->has('parent_categoryss')) {
                $request['parent_categoryss'] = SubSubJasaCategory::select('id', 'title')->find($request->parent_categoryss);
            }
            Alert::error(
                trans('products.alert.update.title'),
                trans('products.alert.update.message.error', ['error' . $th->getMessage()])
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
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            Alert::success(
                trans('products.alert.delete.title'),
                trans('products.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('products.alert.Ddelete.title'),
                trans('products.alert.update.message.error', ['Error' . $th->getMessege()])
            );
        }

        return redirect()->back();
    }

    private function attributes()
    {
        return [
            'title' => trans('products.form_control.input.title.attributes'),
            'slug' => trans('products.form_control.input.slug.attribute'),
            'thumbnail' => trans('products.form_control.input.thumbnail.attribute'),
            'description' => trans('products.form_control.textarea.description.attribute'),
            'content' => trans('products.form_control.textarea.content.attribute'),
            'jenisjasa_id' => trans('products.form_control.input.category.attribute'),
            'subjasa_id' => trans('products.form_control.input.category.attribute'),
            'subsubjasa_id' => trans('products.form_control.input.category.attribute')
        ];
    }
}
