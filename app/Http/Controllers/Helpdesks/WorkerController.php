<?php

namespace App\Http\Controllers\Helpdesks;

use App\Http\Controllers\Controller;
use App\Models\Helpdesks\RequestAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Helpdesks\RequestInfo;
use App\User;

use Carbon\Carbon;

class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function workList()
    {
        $requestInfo = RequestInfo::where('user_id','=', auth()->user()->id)
                        ->whereNotIn('request_status',['บันทึกผลการปฏิบัติงานแล้ว','ประเมินความพึงพอใจแล้ว',
                            'รอมอบหมายผู้ปฏิบัติงาน'])->get();

        return view('helpdesks.workList', [
            'requestInfos' => $requestInfo
        ]);
    }

    public function workOwner()
    {
        $requestInfo = RequestInfo::where('user_id','=', auth()->user()->id)
                        ->whereNotIn('request_status',['รอมอบหมายผู้ปฏิบัติงาน',])->get();

        return view('helpdesks.workOwner', [
            'requestInfos' => $requestInfo
        ]);
    }

    public function satisfactionList()
    {
        $requestInfos = RequestInfo::where('user_id','=',auth()->user()->id)
                        ->where('request_status','=','บันทึกผลการปฏิบัติงานแล้ว')->get();

        return view('helpdesks.satisfactionList', [
            'requestInfos' => $requestInfos
        ]);
    }
    public function assignedList()
    {
        $requestAssign = RequestAssign::where('created_by','=',auth()->user()->name)->get();

        return view('helpdesks.assignedList', [
            'requestAssigns' => $requestAssign
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
        dd($request, "store");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Helpdesks\RequestAssign  $requestAssign
     * @return \Illuminate\Http\Response
     */
    public function show(RequestAssign $requestAssign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Helpdesks\RequestAssign  $requestStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestAssign $requestAssign)
    {
        //
    }

    public function workRecord(Request $request)
    {
        $requestInfo = RequestInfo::where('id','=',$request->id)->get();
        $user = User::where('position','like','%หัวหน้างาน%')->get();

        return view('helpdesks.workRecord', [
            'requestInfos' => $requestInfo,
            'users' => $user,
        ]);
    }

    public function saveSurvey(Request $request)
    {
        
        $requestSaveSurvey = RequestInfo::find($request->request_info_id);
        $requestSaveSurvey->request_status = "สำรวจหน้างานแล้ว";
        $surveyDate = $request->input('survey_date');
        $requestSaveSurvey->survey_date = date('Y-m-d', strtotime($surveyDate));
        $requestSaveSurvey->updated_by = auth()->user()->name;
        $requestSaveSurvey->save();

        Session::flash('success_msg', 'บันทึกวันที่สำรวจหน้างานเรียบร้อย');
        
        return redirect('/helpdesk/workList');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Helpdesks\RequestAssign  $requestAssign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    public function prelimAssess(Request $request)
    {
        
        $savePrelimAssess = RequestInfo::find($request->request_info_id);
        $savePrelimAssess->prelim_assess = $request->input('prelim_assess');
        $estimateDate = $request->input('estimate_date');
        if ($estimateDate == '')
        {
            $savePrelimAssess->estimate_date = null;
        } else
        {
            $savePrelimAssess->estimate_date = date('Y-m-d', strtotime($estimateDate));
        }
        $savePrelimAssess->pcm_number = $request->input('pcm_number');

        if($request->input('prelim_assess') == "ดำเนินการเองได้ (ระบุวันที่คาดว่าจะแล้วเสร็จ)")
        {
            $prelimAssessStatus = "ดำเนินการเอง";
        }
        if($request->input('prelim_assess') == "ไม่สามารถดำเนินการได้ ต้องจ้างบุคคลภายนอกดำเนินการ (ระบุหมายเลข PCM)")
        {
            $prelimAssessStatus = "จ้างดำเนินการ";
        }
        if($request->input('prelim_assess') == "ไม่สามารถดำเนินการได้ ให้ผู้แจ้งจ้างบุคคลภายนอกดำเนินการ")
        {
            $prelimAssessStatus = "ให้ผู้แจ้งดำเนินการเอง";
        }
        if($request->input('prelim_assess') == "ไม่สามารถดำเนินการได้ ต้องตั้งคำของบประมาณ")
        {
            $prelimAssessStatus = "ไม่สามารถดำเนินการได้";
        }

        $savePrelimAssess->request_status = $prelimAssessStatus;
        $savePrelimAssess->updated_by = auth()->user()->name;
        $savePrelimAssess->save();

        Session::flash('success_msg', 'บันทึกผลการประเมินเบื้องต้นเรียบร้อยแล้ว');

        return redirect('/helpdesk/workList');

    }
    public function saveWorkDetail(Request $request)
    {

        $saveWork = RequestInfo::find($request->request_info_id);
        $saveWork->work_detail = $request->input('work_detail');
        $saveWork->request_status = "บันทึกผลการปฏิบัติงานแล้ว";
        $saveWork->updated_by = auth()->user()->name;
        // dd($request, $saveWork, "saveWorkDetail");
        $saveWork->save();

        Session::flash('success_msg', 'บันทึกผลการปฏิบัติงานเรียบร้อย');

        return redirect('/helpdesk/workList');

    } 
    public function satisfactionRecord(Request $request)
    {
        $requestInfo = RequestInfo::where('id','=',$request->id)->get();
        $user = User::where('position','like','%หัวหน้างาน%')->get();
        
        return view('helpdesks.satisfactionRecord', [
            'requestInfos' => $requestInfo,
            'users' => $user,
            ]);
        }
        
    public function saveSatisfaction(Request $request)
    {
        
        $saveSatisfaction = RequestInfo::find($request->request_info_id);
        $deliveryDate = $request->input('delivery_date');
        $saveSatisfaction->delivery_date = date('Y-m-d', strtotime($deliveryDate));
        $saveSatisfaction->request_consignee = $request->input('request_consignee');
        $saveSatisfaction->satisfy_score = $request->input('satisfy_score');
        $saveSatisfaction->suggestion = $request->input('suggestion');
        $saveSatisfaction->request_status = "ประเมินความพึงพอใจแล้ว";
        $doneFile = date('Ymdhis').'.'.$request->file('done_file')->getClientOriginalExtension();
        $saveSatisfaction->done_file = $request->file('done_file')->move('storage/pdf/work-done', $doneFile);
        $saveSatisfaction->updated_by = auth()->user()->name;
        $saveSatisfaction->save();

        Session::flash('success_msg', 'บันทึกผลความพึงพอใจเรียบร้อย');
        
        return redirect('/helpdesk/satisfactionList');
    
    }
    // $fileName = date('Ymdhis').'.'.request()->file('request_file')->getClientOriginalExtension();
    // $addNewRequest->request_file = request()->file('request_file')->move('storage/images', $fileName);
    

    public function listWorkByCriteria(Request $request) 
    {
        $month = $request->workByMonth;
        $dateS = Carbon::now()->month(10)->year(now()->format('Y')-1)->startOfMonth();
        $dateE = Carbon::now()->month($month)->endOfMonth();

        $listFinishWorkByMonth = RequestInfo::whereMonth('delivery_date',$month)->get();
        $listUnfinishWork = RequestInfo::whereBetween('request_recieved', [$dateS,$dateE])
                                ->whereNull('delivery_date')
                                ->get();
        $listWorkByMonth = RequestInfo::whereMonth('request_recieved',$month)->get();

        $avgScore = RequestInfo::whereMonth('delivery_date',$month)->avg('satisfy_score');
        
        if ($avgScore == '') {
            $score = 0;
        } else {
            $score = $avgScore;
        }

        if ($month == "01" ) {
            $monthName = "มกราคม";
        } 
        else if ($month == "02") {
            $monthName = "กุมภาพันธ์";   
        }
        else if ($month == "03") {
            $monthName = "มีนาคม"; 
        }    
        else if ($month == "04") {
            $monthName = "เมษายน";
        }         
        else if ($month == "05") {
            $monthName = "พฤษภาคม";
        }        
        else if ($month == "06") {
            $monthName = "มิถุนายน";
        }        
        else if ($month == "07") {
            $monthName = "กรกฎาคม"; 
        }         
        else if ($month == "08") {
            $monthName = "สิงหาคม";  
        }        
        else if ($month == "09") {
            $monthName = "กันยายน";  
        }        
        else if ($month == "10") {
            $monthName = "ตุลาคม";   
        }        
        else if ($month == "11") {
            $monthName = "พฤศจิกายน"; 
        }       
        else if ($month == "12") {
            $monthName = "ธันวาคม"; 
        }       

        return view('helpdesks.listByMonth', [
            'listFinishWorkByMonths' => $listFinishWorkByMonth,
            'listWorkByMonths' => $listWorkByMonth,
            'listUnfinishWorks' => $listUnfinishWork,
            'monthName' => $monthName,
            'score' => $score,
        ]);
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Helpdesks\RequestAssign  $requestAssign
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestAssign $requestAssign)
    {
        //
    }
}
