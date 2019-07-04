<?php

namespace App\Http\Controllers;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;

use App\Project;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $project=Project::find($id);
//        foreach ($project->tasks as $task)
//        {
//            echo $task->name."</br>";
//        }

//        return $project->tasks;
        return view('projects.index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return "hi";

        return view('projects.create');
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

        User::create($request->all());
        return redirect('/home');
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
        $project= Project::findorfail($id);
        return view('projects.edit',compact('project'));
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

    public function store1(Request $request){
        $user = Auth::user();
        $name = $user->name;

        $data = $request->all();
        $data['created_by']=$name;
//        return $request->all();
        if($data['status']=="0")
        {
            $data['status']="Yet to be started";
        }
        if($data['status']=="1")
        {
            $data['status']="Ongoing";
        }
        if($data['status']=="2")
        {
            $data['status']="Completed";
        }
        if($data['shared']=="1")
        {
            $data['shared']="Private";
        }if($data['shared']=="0")
        {
            $data['shared']="Public";
        }
//        return $data;
        $project=Project::create($data);

        $link['user_id']=$user->id;
        $link['project_id']=$project->id;
        $link['role_id']=1;
//
        ProjectUser::create($link);

        return redirect('/projects');

        //return "here";
    }


    public function add_user($id)
    {
//        return $id;
        return view('projects.addUser',compact('id'));
    }

    public function store2(Request $request)
    {
        $data = $request->all();
//        $data ['project_id']=1;
        ProjectUser::create($data);
        return redirect('/projects');
    }
    public function delete($id)
    {
        $project=Project::find($id);
//        $project->tasks->delete();
//        $project->projectusers->delete();
        foreach($project->tasks as $task)
        {
            $task->delete();
        }
        foreach($project->projectusers as $projectuser)
        {
            $projectuser->delete();
        }

        $project->delete();
        return redirect('/projects');
    }

}
