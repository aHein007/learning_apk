<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $category_data = Category::paginate(3);


            // task 2 - make paginate
            //task 3 -validation ('all')


        return Inertia::render('Admin/CategoryPage',[
            'categoryData' =>$category_data
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("Admin/CategoryAddPage");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $createCategory =$this->getCategory($request);

      Category::create($createCategory);

        return redirect()->route("admin#categoryPage")->with('createSuccess','Your category create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {


     $searchData =Category::Search($request)
                                ->orderBy('id','desc')
                                ->paginate(3);

        $status =count($searchData) == 0 ? 0 : 1;


        return Inertia::render('Admin/CategoryPage',
        [
            'categoryData' =>$searchData,
            'status'=>$status
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updateData =Category::where('id',$id)->first();

        return Inertia::render('Admin/CategoryUpdate',[
            'categoryData' =>$updateData
        ]);
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
      $data =  $request->all();

      $updateData =$this->updateCategory($request);

     Category::where('id',$id)->update($updateData);

     return redirect()->route('admin#categoryPage')->with('updateCategory','Your Category updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $id)
    {
        $id->delete();

        return back()->with('deleteCategory','Category items have been delete!');

    }


    public function getCategory($request){
       $categoryData = [
        'category_name' =>$request->courseName,
        'course_count' =>$request->courseCount,
        'course_feeds' =>$request->courseFeeds,
        'date' =>$request->date,
       ];

       return $categoryData;

    }


    public function updateCategory($request){
        return [
            'category_name'=>$request->updateName,
            'course_count' =>$request->updateCount,
            'course_feeds' =>$request->updateFeeds,
            'date' =>$request->updateDate
        ];
    }
}
