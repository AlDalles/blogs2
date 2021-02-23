<?php
namespace Hillel\Controller;

use Hillel\Model\Tag;
use Hillel\Model\Category;
use Hillel\Model\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PostController{

    public function index(){
        $pages = \Hillel\Model\Post::paginate(3);
        $link_main="/post/list";
        return view('pages/post/list',compact('pages','link_main'));
    }

    public function posts_tag($id){
           $posts=Tag::find($id)->posts;


     return view('pages/post/list',compact('posts'));
    }
    public function posts_category($id){
        $posts=Category::find($id)->posts;

        return view('pages/post/list',compact('posts'));
    }

    public function create(){
        $post = new Post();
        $categories =  Category::all();
        $tags = Tag::all();
        return view('pages/post/edit',compact('post','categories','tags'));
    }

        public function store(){
        $data = request()->all();
            $validator = validator()->make($data, [
                'title'=> ['required','min:5','unique:categories,title'],
                'slug'=> ['required','min:5','unique:categories,slug'],
                'body'=>['required','min:45'],
                'category_id'=>['required','exists:categories,id'],
                'tags_id'=>['required','exists:tags,id']


            ]);
            $error = $validator->errors();
            if(count($error)>0){
                $_SESSION['errors'] = $error->toArray();
                $_SESSION['data'] = $data;
                return new RedirectResponse($_SERVER['HTTP_REFERER']);
            }

        $post = new Post();
       $post->title=$data['title'];
        $post->body=$data['body'];
        $post->slug=$data['slug'];
        $post->category_id=$data['category_id'];
        $post->save();
        $post->tags()->attach($data['tags_id']);
            $_SESSION['message'] = [
                'status' => 'success',
                'message' => "Post \"{$data['title']}\" successfully saved",

            ];
            return new RedirectResponse('/post/list');
        }
   public function update($id){

        $data = request()->all();
       $data = request()->all();
       $validator = validator()->make($data, [
           'title'=> ['required','min:5','unique:categories,title'],
           'slug'=> ['required','min:5','unique:categories,slug'],
           'body'=>['required','min:45'],
           'category_id'=>['required','exists:categories,id'],
           'tags_id'=>['required','exists:tags,id']

       ]);
       $error = $validator->errors();
       if(count($error)>0){
           $_SESSION['errors'] = $error->toArray();
           $_SESSION['data'] = $data;
           return new RedirectResponse($_SERVER['HTTP_REFERER']);
       }

        $post =  Post::find($id);
        $post->title=$data['title'];
        $post->slug=$data['slug'];
        $post->body=$data['body'];
        $post->category_id=$data['category_id'];
        $post->save();
       $post->tags()->sync($data['tags_id']);
       $_SESSION['message'] = [
           'status' => 'success',
           'message' => "Post \"{$data['title']}\" successfully saved",

       ];
        return new RedirectResponse('/post/list');
    }

    public function edit($id){
        $post =  Post::find($id);
        $tags = Tag::all();
        $categories = Category::all();
      return view('pages/post/edit',compact('post','categories','tags'));

    }

    public function destroy($id){

        $post =  Post::find($id);
        $title=$post->title;
        $post->delete();
                $_SESSION['message'] = [
            'status' => 'success',
            'message' => "Post \"{$title}\" successfully deleted",

        ];

        return new RedirectResponse('/post/list');

    }


}