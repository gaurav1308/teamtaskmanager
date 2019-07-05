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
        $user=Auth::user();
        $flag=1;
//        $permission=2;
        if ($project==null) {
            return "This project does not exist";;
        }

        foreach($user->projects as $proj)
        {
            if($proj->id==$id)
            {
                $flag=0;
//                $permission=$proj->pivot->role_id;
            }
        }
        if($flag==0) {

            foreach (Auth::user()->projects as $proj) {
                if($proj->id==$project->id)
                {
                    $role_id=$proj->pivot->role_id;
                }

                }
                return view('projects.index', compact('project','role_id'));

        }
        return "You are not authorized for this project";
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

        $project=Project::find($id);
        $user=Auth::user();
        $flag=1;
        $permission=2;
        if ($project==null) {
            return "This project does not exist";;
        }
        foreach($user->projects as $proj)
        {
            if($proj->id==$id)
            {
                $flag=0;
                $permission=$proj->pivot->role_id;
                break;
            }
        }
        if($flag==0&&$permission==1) {
                return view('projects.edit', compact('project'));

        }
        return "You can't edit this project";
//        return view ('projects.edit',compact('project'));
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
        $project  = Project::find($id);
        $input  = $request->all();
        $project->name = $input['name'];
        $project->shared =$input['shared'];
        $project->status = $input['status'];
        $project->save();
        return redirect('/projects');

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

//        return $data;
        $project=Project::create($data);

        $link['user_id']=$user->id;
        $link['project_id']=$project->id;
        $link['role_id']=1;
//
        ProjectUser::create($link);

        return redirect('/projects');
//        return redirect('/'.$project_id .'/project');

        //return "here";
    }


    public function add_user($id)
    {
//        return $id;
        $project=Project::find($id);
        $user=Auth::user();
        $flag=1;
        $permission=2;
        if ($project==null) {
            return "This project does not exist";;
        }
        foreach($user->projects as $proj)
        {
            if($proj->id==$id)
            {
                $flag=0;
                $permission=$proj->pivot->role_id;
                break;
            }
        }
        if($flag==0&&$permission==1) {
            return view('projects.addUser',compact('id'));

        }
        return "You aren't authorized to add user to this project";

    }

    public function store2(Request $request)
    {
        $data = $request->all();
        $output  = ProjectUser::where('user_id',$data['user_id'])->where('project_id',$data['project_id'])->get();
        if(count($output)>0){
            return redirect('/projects');
        }
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
