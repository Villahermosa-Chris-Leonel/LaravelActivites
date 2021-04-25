<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function addData(Request $req) {
        $req->validate([
            'Title' => 'required|max:100',
            'Description' => 'required'
        ]);
        if($req->hasFile('img')){
    
            $filenameWithExt = $req->file('img')->getClientOriginalName();
    
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            $extension = $req->file('img')->getClientOriginalExtension();
    
            $filenameToStore = $filename.'_'.time().'.'.$extension;
    
            $path = $req->file('img')->storeAs('public/img', $filenameToStore);
        } else{
            $filenameToStore = '';
        }
        $post = new Post();
        $post->fill($req->all());
        $post->img = $filenameToStore;
        $post->save();
        return redirect('list');
    }

    function show(){
        $data= Post::all();
        return view('list', ['posts'=>$data]);
    
    }

   public function delete($id){
       $ob=Post::find($id);
       $ob->delete();
       return redirect('list');
   }

   function edit($id){
       $data=Post::find($id);
       return view('edit', ['data'=>$data]);

   }

   function update(Request $req){
       $data=Post::find($req->id);
       $data->Title=$req->Title;
       $data->Description=$req->Description;
       $data->save();
       return redirect('list');
       

   }
   
    
}