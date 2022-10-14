<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $posts = Post::where('title', 'LIKE', '%' .$request->keyword. '%')->paginate(15);
        } else {
            $posts = Post::paginate(15)->withQueryString();
        }
        
        // $posts = Post::paginate(1);
        // if ($request->get('keyword')) {
        //     $posts->search($request->get('keyword'));
        // }

        return view ('posts.index', compact('posts'));
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
        return view('posts.create', [
            'categories' => Category::with('descendants')->onlyParent()->get()
        ]);
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
                'slug' => 'required|string|unique:posts,slug',
                'thumbnail' => 'required',
                'description' => 'required|string|max:100',
                'content' => 'required',
                'category' => 'required',
            ],
            $this->attributes()
        );
        
        if ($validator->fails()) { 
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }


        DB::beginTransaction();
        try {
            $post = Post::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'content' => $request->content,
            ]);

            $post->categories()->attach($request->category);

            Alert::success(
                trans('posts.alert.create.title'),
                trans('posts.alert.create.message.success'),
            );
            return redirect()->route('posts.index');
             
        } catch (\Throwable $th) {
            DB::rollBack();
            
            if ($request->has('category_id')) {
                $request['category_id'] = Category::select('id', 'title')->find($request->category_id);
            }
            Alert::error(
                trans('posts.alert.create.title'),
                trans('posts.alert.create.message.error', ['error' . $th->getMessage()])
            );

            return redirect()->back()->withInput($request->all());
        } 

        finally {
            DB::commit();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = $post->categories;
        return view('posts.detail', compact('post', 'categories'));
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::with('descendants')->onlyParent()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //proses validasi data post
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:70',
                'slug' => 'required|string|unique:posts,slug,' . $post->id,
                'thumbnail' => 'required',
                'description' => 'required|string|max:100',
                'content' => 'required',
                'category' => 'required'
            ],
            $this->attributes()
        );

        if ($validator->fails()) { 
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $post->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'content' => $request->content,
            ]);

            $post->categories()->sync($request->category);

            Alert::success(
                trans('posts.alert.update.title'),
                trans('posts.alert.update.message.success'),
            );
            return redirect()->route('posts.index');
             
        } catch (\Throwable $th) {
            DB::rollBack();
            
            if ($request->has('category_id')) {
                $request['category_id'] = Category::select('id', 'title')->find($request->category_id);
            }
            Alert::error(
                trans('posts.alert.update.title'),
                trans('posts.alert.update.message.error', ['error' . $th->getMessage()])
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        DB::beginTransaction();
        try {
            $post->categories()->detach();
            $post->delete();

            Alert::success(
                trans('posts.alert.delete.title'),
                trans('posts.alert.delete.message.success'),
            );
            return redirect()->route('posts.index');
             
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('posts.alert.delete.title'),
                trans('posts.alert.delete.message.error', ['error' . $th->getMessage()])
            );
        } 

        finally {
            DB::commit();
            return redirect()->back();
        }
    }

    private function attributes()
    {
        return [
            'title' => trans('posts.form_control.input.title.attributes'),
            'category' => trans('posts.form_control.input.category.attribute'),
            'slug' => trans('posts.form_control.input.slug.attribute'),
            'thumbnail' => trans('posts.form_control.input.thumbnail.attribute'),
            'description' => trans('posts.form_control.textarea.description.attribute'),
            'content' => trans('posts.form_control.textarea.content.attribute')
        ];
    }
}
