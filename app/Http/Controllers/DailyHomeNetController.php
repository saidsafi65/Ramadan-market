<?php

namespace App\Http\Controllers;

use App\Models\DailyHomeNet;
use App\Models\loans;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DailyHomeNetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = validator($request->all(),[
            'homenet_name' => 'required|string|min:5|max:40',
            'homenet_no' => 'required|digits_between:3,10',
            'homenet_month' => 'required',
            'homenet_total' => 'required|digits_between:2,3',
        ]);

        if(!$validator->fails()){
            if ($request->input('is_loan_home') == 'on') {
                $loan = true;
                $loan_name = $request->input('loan_name_home');
    
                $add_loans = new loans([
                    'loan_type' => 'اشتراك انترنت منزلي',
                    'loan_name' => $request->input('loan_name_home'),
                    'loan_money' => $request->input('homenet_total'),
                    'remm' => $request->input('remm_home')
                ]);
                $add_loans->save();
            } else {
                $loan = false;
                $loan_name = ' ';
            }
            $homenet = new DailyHomeNet([
    
                'homenet_name' => $request->input('homenet_name'),
                'homenet_no' => $request->input('homenet_no'),
                'homenet_month' => $request->input('homenet_month'),
                'homenet_total' => $request->input('homenet_total'),
                'is_loan' => $loan,
                'loan_name' => $loan_name,
                'remm' => $request->input('remm_home')
            ]);
    
            $isSave = $homenet->save();
            // قم بتخزين الرسالة واللون في الجلسة
            // session()->flash('dailycard_message', 'تمت الاضافة بنجاح');
            // session()->flash('dailycard_message_color', 'success'); // يمكنك استبدال 'success' بأي لون ترغب فيه
            if ($isSave) {
                return response()->json([
                    'message' => 'تم حفظ العنصر بنجاح',
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'message' => 'حدث مشكلة أثناء حفظ العنصر',
                ], Response::HTTP_BAD_REQUEST);
            }
            // return redirect()->route('dailys');
            // dd($request);
        }else{
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyHomeNet $dailyHomeNet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyHomeNet $dailyHomeNet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyHomeNet $dailyHomeNet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyHomeNet $dailyHomeNet)
    {
        //
    }
}