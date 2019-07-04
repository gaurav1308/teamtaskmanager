<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function store2(Request $request){
        $user = Auth::user();
        $name = $user->name;

        $data = $request->all();
        $data['created_by']=$name;
//        return $request->all();
        if($data['task_status']=="0")
        {
            $data['task_status']="Yet to be started";
        }
        if($data['task_status']=="1")
        {
            $data['task_status']="Ongoing";
        }
        if($data['task_status']=="2")
        {
            $data['task_status']="Completed";
        }


//        return $request->all();
        Task::create($data);

        return redirect('/projects');

        //return "here";
    }
    public function create1($id)
    {
//        return $id;
        return view('tasks.create',compact('id'));
    }
     public function search()
     {
         $request=request()->search;
         $user =Auth::user();
         $proj=$user->projects;
         $tasks= Task::where ('name','LIKE',"%$request%")->get();
         foreach ($tasks as $task) {
//             echo "hi";
             $flag = 1;
             foreach ($proj as $project) {
                 if ($task->project_id == $project->id) {
                     $flag = 0;
                 }
             }
             if ($flag == 1) {
                 $task->delete();
             }

         }
//         $projects=Project::where('name','LIKE',"%$request%")->get();





//         return $tasks;
         return view('projects.search',compact('tasks'));
     }
     public function delete($id)
     {
         $task=Task::find($id);
         $task->delete();
         return redirect('/projects');
     }
}
