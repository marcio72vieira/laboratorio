<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect,Response;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $data['posts'] = Post::orderBy('id','desc')->paginate(8);

        return view('pages.codingdriver.posts', $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
          ]);

          $post = Post::updateOrCreate(['id' => $request->id], [
                    'title' => $request->title,
                    'description' => $request->description
                  ]);

          return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);
    }


    public function show($id)
    {
        $post = Post::find($id);

        return response()->json($post);
    }


    public function edit($id)
    {
        $post = Post::find($id);

        return response()->json($post);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $post= Post::find($id)->delete();

        return response()->json($post);
    }
}
