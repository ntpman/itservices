<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

use App\Helpers\LogActivity;

use App\Model\BasicInformations\SurveyStatus;

use App\Model\Employee\Lab;

use App\Model\Logs\LogCommentLab;
use App\Model\Logs\LogCommentLabFile;

class QuestionnaireController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('region_id', auth()->user()->region->id)
            ->where('status', 'A')
            ->where('role_id', 3)    
            ->get();

        $surveyStatus = SurveyStatus::all();

        // return $users;

        return view('officer.questionnaire.index', [
            'users' => $users,
            'surveyStatus' => $surveyStatus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->all());
        
        // validate the data with function
        $request->validate([
            'log_comment_lab_id' => '',
            'file' => '',
        ]);

        // Handle File Upload
        if($request->hasFile('file')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file')->storeAs('public/file_comment_lab', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        // store in the database
        $LogCommentLabFile = new LogCommentLabFile;

        $LogCommentLabFile->log_comment_lab_id = $request->input('log_comment_lab_id');
        $LogCommentLabFile->file = $fileNameToStore;
        $LogCommentLabFile->save();

        // create log activity
        LogActivity::addToLog("Officer Upload file : log_comment_lab : $LogCommentLabFile->log_comment_lab_id successfully.");

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $logCommentLabs = LogCommentLab::where('user_id', $id)->get();
        $surveyStatus = SurveyStatus::all();

        $labs = Lab::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->where('completed', 0)
            ->get();

        $labJuly = Lab::where('user_id', $id)
            ->whereMonth('send_date', '07')
            ->where('completed', 0)
            ->get();
        $labAugust = Lab::where('user_id', $id)
            ->whereMonth('send_date', '08')
            ->where('completed', 0)
            ->get();
        $labSeptember = Lab::where('user_id', $id)
            ->whereMonth('send_date', '09')
            ->where('completed', 0)
            ->get();

        // return $logCommentLabs;

        return view('officer.questionnaire.show', [
            'user' => $user,
            'logCommentLabs' => $logCommentLabs,
            'surveyStatus' => $surveyStatus,
            'labs' => $labs,
            'labJuly' => $labJuly,
            'labAugust' => $labAugust,
            'labSeptember' => $labSeptember,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function send($id)
    {
        $user = User::find($id);

        $labJuly = Lab::where('user_id', $id)
            ->whereMonth('send_date', '07')
            ->where('completed', 0)
            ->get();
        $labAugust = Lab::where('user_id', $id)
            ->whereMonth('send_date', '08')
            ->where('completed', 0)
            ->get();
        $labSeptember = Lab::where('user_id', $id)
            ->whereMonth('send_date', '09')
            ->where('completed', 0)
            ->get();

        // return $logCommentLabs;

        return view('officer.questionnaire.send', [
            'user' => $user,
            'labJuly' => $labJuly,
            'labAugust' => $labAugust,
            'labSeptember' => $labSeptember,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $lab = Lab::find($id);

        $equipments = array();
        foreach($lab->equipments as $item){
            if($item->completed != 1){
                $equipments[] = $item->id;
            }
        }
        $equipment_count = count($equipments);

        $productLabs = array();
        foreach($lab->productLabs as $item){
            if($item->completed != 1){
                $productLabs[] = $item->id;
            }
        }
        $productLab_count = count($productLabs);

        $surveyStatus = SurveyStatus::all();

        return view('officer.questionnaire.detail', compact([
            'lab', 'equipment_count', 'productLab_count', 'surveyStatus'
        ]));
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
        $survey_status_id = $request->input('survey_status_id');

        $lab = Lab::find($id);

        // if approve
        if($survey_status_id == 2) {
            // clean
            $lab->survey_status_id = 4;
            $lab->approve_date = date('Y-m-d H:i:s');
            $lab->save();

            // create log activity
            LogActivity::addToLog("Officer Approve Lab : $lab->id : $lab->lab_code successfully.");

            return redirect()->route('officer-questionnaire.show', $lab->user_id);
        }

        // if reject
        if($survey_status_id == 5) {
            // clean
            $lab->survey_status_id = 5;
            $lab->save();

            $logCommentLab = new LogCommentLab;
            $logCommentLab->user_id = $request->input('user_id');
            $logCommentLab->lab_id = $request->input('lab_id');
            $logCommentLab->survey_status_id = $survey_status_id;
            $logCommentLab->comment_lab_detail = $request->input('comment_lab_detail');
            $logCommentLab->reject_date = date('Y-m-d H:i:s');
            $logCommentLab->save();

            // create log activity
            LogActivity::addToLog("Officer Reject Lab : $lab->id : $lab->lab_code successfully.");

            return redirect()->route('officer-questionnaire.show', $lab->user_id);
        }
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
}
