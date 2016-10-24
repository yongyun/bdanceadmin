<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Project;
use App\Models\Photo;
use App\Models\Award;
use App\Models\Review;
use App\Models\Tour;
use App\Models\Stuff;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

    public function add() {
        return view('pages/project_add');
    }

    public function detail($id) {
        $project = Project::find($id);
        $images = Photo::where('work_id', $id)->get();
        $awards = Award::where('work_id', $id)->get();
        $reviews = Review::where('work_id', $id)->get();
        $tours = Tour::where('work_id', $id)->orderBy('order','asc')->get();
        $m_stuffs = Stuff::where('work_id', $id)->where('type', 'primary')->get();
        $r_stuffs = Stuff::where('work_id', $id)->where('type', 'secondary')->get();
        return view('pages/detail', [
                'project'=> $project, 
                'images'=> $images,
                'awards' => $awards,
                'reviews' => $reviews,
                'tours' => $tours,
                'mStuffs' => $m_stuffs,
                'rStuffs' => $r_stuffs
            ]);
    }

    public function create(Request $request){

        $project = new Project;

        $project->name = $request->input('name');
        $project->intro = $request->input('sub_title');
        $project->description = $request->input('description');

        $project->save();

        return redirect('/project/lists');
    }

    public function delete($id) {
        Photo::where('work_id', $id)->delete();
        Review::where('work_id', $id)->delete();
        Stuff::where('work_id', $id)->delete();
        Tour::where('work_id', $id)->delete();
        Award::where('work_id', $id)->delete();

        $project = Project::find($id);

        if (!is_null($project)) {
            $project->delete();
        }

        return \Response::json([
                'status'=> true
            ]);
    }
}