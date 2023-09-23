<?php

namespace App\Http\Controllers;

use App\Models\DailyCard;
use App\Models\loans;
use Illuminate\Http\Request;

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
        $validator = $request->validate([
            'number_dailycard' => 'required|integer',
            'total_dailycard' => 'required|integer|min:2|max:3',
            'cardtype' => 'required|array|min:1'
        ]);

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

        $DailyCard->save();
        $add_loans->save();

        $request->session()->put('key', 'value');
        session(['key' => 'value']);
        // قم بتخزين الرسالة واللون في الجلسة
        session()->flash('dailycard_message', 'تمت الاضافة بنجاح');
        session()->flash('dailycard_message_color', 'success'); // يمكنك استبدال 'success' بأي لون ترغب فيه

        return redirect()->route('dailys');
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