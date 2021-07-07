<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\CreateLocationRequest;

use App\Models\Books;

class RegistrationBooksController extends Controller
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
    public function index()
    {
        //
    }

    public function listAllBooks()
    {
        $allBook = Books::orderBy('received_date','asc')
                    ->orderBy('books_no','asc')
                    ->get();

        return view('registrationBooks.listAllBooks', [
            'allBooks' => $allBook,
            // 'buildings' => $buildings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addNewBooks()
    {
        return view('registrationBooks.addNewBooks', [
            // 'location' => $location,
            // 'buildings' => $buildings,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveNewBooks(Request $request)
    {
        //validate received number
        $this->validate($request,[
            'received_no' => 'required|unique:books,received_no',
        ]);

        // add new books
        $books = new Books;
        $books->received_no = $request->input('received_no');
        $receivedDate = $request->input('received_date');
        $books->received_date = date('Y-m-d', strtotime($receivedDate));
        $books->books_no = $request->input('books_no');
        $books->books_subject = $request->input('books_subject');
        $books->books_owner = $request->input('books_owner');
        $books->commands = $request->input('commands');

        $dueDate = $request->input('due_date');
        if ($dueDate=='') {
            $books->due_date = '0000-00-00';
        } else {
            $books->due_date = date('Y-m-d', strtotime($dueDate));
        }
        
        $booksFile = date('Ymdhis').'.'.request()->file('books_file')->getClientOriginalExtension();
        $books->books_file = request()->file('books_file')->move('storage/pdf/books',$booksFile);
        $books->user_id = auth()->user()->id;
        
        if($books->save()) {
            Session::flash('success_msg', 'เพิ่มข้อมูลเรียบร้อย');

            return redirect()->back();
        }
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
    public function editBooks()
    {
        // $buildings = Building::where('building_status', 'A')->get();

        // $location = Location::FindOrFail($id);

        // return $location;

        return view('registrationBooks.editBooks', [
            // 'location' => $location,
            // 'buildings' => $buildings,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBooks(Request $request, $id)
    {
        dd($request);
        $request->validate([
            'building_id' => ['required', 'integer',],
            'location_floor' => ['required', 'string', 'max:25'],
            'location_room' => ['required', 'string', 'max:50'],
        ]);
        /**
         * Store in the database
         */
        $location = Location::find($id);
        $location->building_id = $request->input('building_id');
        $location->location_floor = $request->input('location_floor');
        $location->location_room = $request->input('location_room');
        $location->updated_by = auth()->user()->name;
        
        if($location->save()){
            
            Session::flash('success_msg', 'แก้ไขข้อมูลเรียบร้อย');

            return redirect()->back();
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
