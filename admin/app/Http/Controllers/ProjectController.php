<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Project;
use App\Models\Photo;
use Illuminate\Http\Request;

/**
 * Class ProjectController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lists(){
    	$projects = Project::all();

    	return view('pages/project', ['projects'=> $projects]);
    }

    public function detail($id) {
        $project = Project::find($id);
        $images = Photo::where('work_id', $id)->get();
        return view('pages/detail', ['project'=> $project, 'images'=> $images]);
    }
}