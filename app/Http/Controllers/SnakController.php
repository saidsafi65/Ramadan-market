<?php

namespace App\Http\Controllers;

use App\Models\loans;
use App\Models\snak;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SnakController extends Controller
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
            'snaks_prise' => 'required',
            'snaks_type' => 'required|array|min:1'
        ]);

        if (!$validator->fails()) {
            $snaks_type = implode(" و ", $request->input('snaks_type'));

            if ($request->input('is_loan_snaks') == 'on') {
                $loan = true;
                $loan_name = $request->input('loan_name_snaks');

                $add_loans = new loans([
                    'loan_type' => $snaks_type,
                    'loan_name' => $request->input('loan_name_snaks'),
                    'loan_money' => $request->input('snaks_prise'),
                    'remm' => $request->input('remm_snaks')
                ]);
                $add_loans->save();
            } else {
                $loan = false;
                $loan_name = '';
            }
            $snak = new snak([

                'snaks_type' => $snaks_type,
                'snaks_weight' => $request->input('snaks_weight'),
                'snaks_prise' => $request->input('snaks_prise'),
                'is_loan' => $loan,
                'loan_name' => $loan_name,
                'remm' => $request->input('remm_snaks')
            ]);

            $isSave = $snak->save();

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
    public function show(snak $snak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(snak $snak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, snak $snak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(snak $snak)
    {
        //
    }
}
