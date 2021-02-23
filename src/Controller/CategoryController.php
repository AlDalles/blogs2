<?php
namespace Hillel\Controller;

use Hillel\Model\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CategoryController
{
    public function index(){
        $pages = Category::paginate(3);
        $link_main="/category/list";
        return view('pages/category/list',compact('pages','link_main'));

    }

    public function create(){
        $category = new Category();
        return view('pages/category/edit',compact('category'));

    }

    public function store(){

        $data = request()->all();
      $validator = validator()->make($data, [
          'title'=> ['required','min:5','unique:categories,title'],
          'slug'=> ['required','min:5','unique:categories,slug']
      ]);
        $error = $validator->errors();
    if(count($error)>0){
     $_SESSION['errors'] = $error->toArray();
    $_SESSION['data'] = $data;
    return new RedirectResponse($_SERVER['HTTP_REFERER']);
    }

       $category = new Category();
        $category->title=$data['title'];
        $category->slug=$data['slug'];
        $category->save();
        $_SESSION['message'] = [
         'status' => 'success',
         'message' => "Category \"{$data['title']}\" successfully saved",

        ];
        return new RedirectResponse('/category/list');
    }


    public function destroy($id){

        $category =  Category::find($id);
        $title=$category->titile;
        $category->delete();
        $_SESSION['message'] = [
            'status' => 'success',
            'message' => "Category \"{$title}\" successfully deleted",

        ];

        return new RedirectResponse('/category/list');

    }
    public function delete_many(){
    $categories = Category::all();
    return view('pages/category/delete',compact('categories'));

    }


    public function destroy_many(){
        $data = request()->all();
      $categories=Category::find($data['categories_id']);
        $_SESSION['message'] = [
            'status' => 'success',
            'message' => "Categories \"{$categories->pluck('title')->implode(' ,')}\" successfully deleted",

        ];
          Category::destroy($data['categories_id']);
        return new RedirectResponse('/category/list');
    }

    public function edit($id){
        $category =  Category::find($id);
        return view('pages/category/edit',compact('category'));

    }

    public function edit_select(){
        $categories =  Category::all();
        return view('pages/category/select-category',compact('categories'));

    }

    public function update($id){
        $data = request()->all();
        $validator = validator()->make($data, [
            'title'=> ['required','min:5','unique:categories,title,'. $id],
            'slug'=> ['required','min:5','unique:categories,slug,'. $id]
        ]);
        $error = $validator->errors();
        if(count($error)>0){
            $_SESSION['errors'] = $error->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category =  Category::find($id);
        $category->title=$data['title'];
        $category->slug=$data['slug'];
        $category->save();
        $_SESSION['message'] = [
            'status' => 'success',
            'message' => "Category \"{$data['title']}\" successfully saved",

        ];
        return new RedirectResponse('/category/list');
    }

    public function edit1()
    {
      $data = request()->all();
      $category = Category::find($data['id']);
      $_SESSION['mark'] = $data['mark'];

      return view("pages/category/edit", compact('category'));
    }



}