<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        $posts = Post::select('*')->with('user', 'categories')->orderBy('id', 'desc');

        if(!empty($request->filter)){
            $searchFields = ['title'];
            //$searchFields = ['title','content','author_name','category_name'];
            $posts->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->filter . '%';
                foreach($searchFields as $field){
                $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
        }

        $posts = $posts->paginate(10)->withQueryString();

        return view('admin.posts.index', compact('posts', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::all();

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $postData = $request->all();
        if($request->has('cover_image')){
            $this->uploadImage($request);
        }else{
            $postData['cover_image'] = "";
        }
        //dd($postData);
        $request->user()->posts()->create($postData);

        return redirect()->route('posts.index')->with('message', 'Post created successfully');
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
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // the update method, only fire its events when the update happens directly on the model,
        // so we will use save directly on modal instead of mass assignment
        if($request->has('image')){
            $oldImage = $post->cover_image;
            $this->uploadImage($request);
            if(file_exists(public_path('images/'.$oldImage))){
                //TO Do will be update later
            //    unlink(public_path('images/'.$oldImage));
            }
            $post->cover_image = $request->post()['image'];
        }
        $post->title    = $request->title;
        $post->short_description  = $request->short_description;
        $post->content     = $request->body;
        $post->post_type     = $request->post_type;
        $post->save();

        return redirect()->route('posts.index')->with('message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Post deleted successfully');
    }

    public function uploadImage($request){
        $image = $request->file('cover_image');
        //$imageName = time().$image->getClientOriginalName();
        $imageName = time();
        // add the new file 
        $image->move(public_path('images'),$imageName);
        $request->merge(['cover_image' => $imageName]);
        // dd($request);
    }
}