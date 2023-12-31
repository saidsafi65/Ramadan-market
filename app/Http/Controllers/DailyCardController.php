<?php

namespace App\Http\Controllers;

use App\Models\DailyCard;
use App\Models\loans;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DailyCardController extends Controller
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
        $validator = validator($request->all(), [
            'number_dailycard' => 'required',
            'total_dailycard' => 'required',
            'cardtype' => 'required|array|min:1'
        ]);

        if (!$validator->fails()) {
            $cardtype = implode(" و ", $request->input('cardtype'));

            if ($request->input('is_loan') == 'on') {
                $loan = true;
                $loan_name = $request->input('loan_name');

                $add_loans = new loans([
                    'loan_type' => $cardtype,
                    'loan_name' => $request->input('loan_name'),
                    'loan_money' => $request->input('total_dailycard'),
                    'remm' => $request->input('remm')
                ]);
                $add_loans->save();
            } else {
                $loan = false;
                $loan_name = '';
            }
            $DailyCard = new DailyCard([

                'number_dailycard' => $request->input('number_dailycard'),
                'total_dailycard' => $request->input('total_dailycard'),
                'cardtype' => $cardtype,
                'is_loan' => $loan,
                'loan_name' => $loan_name,
                'remm' => $request->input('remm')
            ]);

            $isSave = $DailyCard->save();

            if ($isSave) {
                return response()->json([
                    'message' => 'تم حفظ العنصر بنجاح',
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'message' => 'حدث مشكلة أثناء حفظ العنصر',
                ], Response::HTTP_BAD_REQUEST);
            }
            // $request->session()->put('key', 'value');
            // session(['key' => 'value']);
            // // قم بتخزين الرسالة واللون في الجلسة
            // session()->flash('dailycard_message', 'تمت الاضافة بنجاح');
            // session()->flash('dailycard_message_color', 'success'); // يمكنك استبدال 'success' بأي لون ترغب فيه

            // return redirect()->route('dailys');
            // dd($request);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyCard $dailyCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyCard $dailyCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyCard $dailyCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyCard $dailyCard)
    {
        //
    }
}
