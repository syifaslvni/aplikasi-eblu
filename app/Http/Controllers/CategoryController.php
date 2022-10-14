<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::with('descendants');

        if($request->has('keyword') && trim($request->keyword)) {
            $categories->search($request->keyword);
        } else {
            $categories->onlyParent();
        } 
        return view('categories.index', [
            'categories' => $categories->paginate(3)->appends(['keyword' => $request->get('keyword')]),
        ]); 
    }

    public function select(Request $request)
    {
        $categories = [];
        if ($request->has('q')) {
            $search = $request->q;
            $categories = Category::select('id', 'title')->where('title', 'LIKE', "%$search%")->limit(5)->get();
        } else {
            $categories = Category::select('id', 'title')->onlyParent()->limit(5)->get();
        }

        return response()->json($categories);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
                'slug' => 'required|string|unique:categories,slug',
            ],
            $this->custom()
        );

        if ($validator->fails()) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Category::select('id', 'title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        // proses insert data kategory
        try {
            Category::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'parent_id' => $request->parent_category
            ]);
            Alert::success(
                trans('categories.alert.create.title'),
                trans('categories.alert.create.message.success'));
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Category::select('id', 'title')->find($request->parent_category);
            }
            Alert::error(
                trans('categories.alert.create.title'),
                trans('categories.alert.create.message.error', ['error' . $th->getMessege()])
            );
            return redirect()->back()->withInput($request->all());
        
        }
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // proses validasi data kategory
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:70',
                'slug' => 'required|string|unique:categories,slug',
            ],
            $this->custom()
        );

        if ($validator->fails()) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Category::select('id', 'title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        // proses update data kategory
        try {
            $category->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'parent_id' => $request->parent_category
            ]);
            Alert::success(
                trans('categories.alert.update.title'),
                trans('categories.alert.update.message.success')
            );
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Category::select('id', 'title')->find($request->parent_category);
            }
            Alert::error(
                trans('categories.alert.update.title'),
                trans('categories.alert.update.message.error', ['Error' . $th->getMessege()])
            );
            return redirect()->back()->withInput($request->all());
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            Alert::success(
                trans('categories.alert.delete.title'),
                trans('categories.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('categories.alert.Ddelete.title'),
                trans('categories.alert.update.message.error', ['Error' . $th->getMessege()])
            );
        }

        return redirect()->back();
    }

    private function custom()
    {
        return [
            'title' => trans('validation.custom.attribute-name'),
            'slug' => trans('validation.custom.attribute-name'),
        ];
    }
}
