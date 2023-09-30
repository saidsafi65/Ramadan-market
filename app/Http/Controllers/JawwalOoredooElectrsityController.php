<?php

namespace App\Http\Controllers;

use App\Models\ElectristyBalance;
use App\Models\ElectrsitySellingBalances;
use App\Models\JawalBalance;
use App\Models\JawalSellingBalances;
use App\Models\loans;
use App\Models\OoredoOBalance;
use App\Models\OoredooSellingBalances;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JawwalOoredooElectrsityController extends Controller
{
    //
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
        // return response()->json([$request->all()]);  

    }
    public function jawwal(Request $request)
    {
        $validator = validator($request->all(), [
            'jawal_selling_total' => 'required|numeric',
            'jawal_blance' => 'required|numeric',
        ], [
            'numeric' => 'الحقل :attribute يجب أن يكون رقمًا.',
            'required' => 'الحقل :attribute مطلوب.',
        ]);
        $validator->after(function ($validator) use ($request) {
            $jawal_selling_total = $request->input('jawal_selling_total');
            $jawal_blance = $request->input('jawal_blance');

            if ($jawal_blance < $jawal_selling_total) {
                $validator->errors()->add('jawal_blance', 'الرصيد يجب أن يكون أكبر من المبلغ المباع.');
            }
        });
        if (!$validator->fails()) {
            $jawal_selling_total = $request->input('jawal_selling_total');
            $jawal_blance = $request->input('jawal_blance');
            $jawal_Newblance = $request->input('jawal_blance') - $request->input('jawal_selling_total');


            // في حال دين
            if ($request->input('is_loan_jawwal') == true) {

                $is_loan_jawwal = true;

                $Add_balance_jawal = new JawalBalance([
                    'jawal_blance' => $jawal_Newblance,
                    'recent_add' => $request->input('recent_add_jawwal'),
                    'recent_withdrawn' => $request->input('jawal_selling_total'),
                    'old_jawal_blance' => $jawal_blance,
                    'is_debt' => $is_loan_jawwal,
                ]);
                $Add_balance_jawal->save();
                $loan_name_jawwal = $request->input('loan_name_jawwal');

                $add_loans = new loans([
                    'loan_type' => 'رصيد جوال',
                    'loan_name' => $loan_name_jawwal,
                    'loan_money' => $request->input('jawal_selling_total'),
                    'remm' => $request->input('remm_jawwal')
                ]);
                $add_loans->save();
                $jawal_selling_balances = new JawalSellingBalances([
                    'jawal_blance' => $jawal_Newblance,
                    'selling_blance' => $jawal_selling_total,
                    'remaining_blance' => $jawal_Newblance,
                    'is_loan' => $is_loan_jawwal,
                    'loan_name' => $loan_name_jawwal,
                    'remm' => $request->input('remm_jawwal'),
                ]);
                $isSave = $jawal_selling_balances->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'بيع رصيد جوال بالدين بقيمة ' . $request->input('jawal_selling_total'),
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'حدث مشكلة أثناء حفظ العنصر',
                    ], Response::HTTP_BAD_REQUEST);
                }
            } else {
                $is_loan_jawwal = false;
                $Add_balance_jawal = new JawalBalance([
                    'jawal_blance' => $jawal_Newblance,
                    'recent_add' => $request->input('recent_add_jawwal'),
                    'recent_withdrawn' => $request->input('jawal_selling_total'),
                    'old_jawal_blance' => $jawal_blance,
                    'is_debt' => $is_loan_jawwal,
                ]);
                $Add_balance_jawal->save();
                $loan_name_jawwal = $request->input('loan_name_jawwal');

                $jawal_selling_balances = new JawalSellingBalances([
                    'jawal_blance' => $jawal_Newblance,
                    'selling_blance' => $jawal_selling_total,
                    'remaining_blance' => $jawal_Newblance,
                    'is_loan' => $is_loan_jawwal,
                    'loan_name' => $loan_name_jawwal,
                    'remm' => $request->input('remm_jawwal'),
                ]);
                $isSave = $jawal_selling_balances->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'بيع رصيد جوال بقيمة ' . $request->input('jawal_selling_total'),
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'حدث مشكلة أثناء حفظ العنصر',
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function ooredoo(Request $request)
    {
        $validator = validator($request->all(), [
            'ooredoo_selling_total' => 'required|numeric',
            'ooredoo_blance' => 'required|numeric',
        ], [
            'numeric' => 'الحقل :attribute يجب أن يكون رقمًا.',
            'required' => 'الحقل :attribute مطلوب.',
        ]);
        $validator->after(function ($validator) use ($request) {
            $ooredoo_selling_total = $request->input('ooredoo_selling_total');
            $ooredoo_blance = $request->input('ooredoo_blance');

            if ($ooredoo_blance < $ooredoo_selling_total) {
                $validator->errors()->add('ooredoo_blance', 'الرصيد يجب أن يكون أكبر من المبلغ المباع.');
            }
        });
        if (!$validator->fails()) {
            $ooredoo_selling_total = $request->input('ooredoo_selling_total');
            $ooredoo_blance = $request->input('ooredoo_blance');
            $ooredoo_Newblance = $request->input('ooredoo_blance') - $request->input('ooredoo_selling_total');


            // في حال دين
            if ($request->input('is_loan_ooredoo') == true) {

                $is_loan_ooredoo = true;

                $Add_balance_ooredoo = new OoredoOBalance([
                    'ooredo_blance' => $ooredoo_Newblance,
                    'recent_add' => $request->input('recent_add_ooredoo'),
                    'recent_withdrawn' => $request->input('ooredoo_selling_total'),
                    'old_ooredo_blance' => $ooredoo_blance,
                    'is_debt' => $is_loan_ooredoo,
                ]);
                $Add_balance_ooredoo->save();
                $loan_name_ooredoo = $request->input('loan_name_ooredoo');

                $add_loans = new loans([
                    'loan_type' => 'رصيد وطنية',
                    'loan_name' => $loan_name_ooredoo,
                    'loan_money' => $request->input('ooredoo_selling_total'),
                    'remm' => $request->input('remm_ooredoo')
                ]);
                $add_loans->save();
                $ooredoo_selling_balances = new OoredooSellingBalances([
                    'ooredoo_blance' => $ooredoo_Newblance,
                    'selling_blance' => $ooredoo_selling_total,
                    'remaining_blance' => $ooredoo_Newblance,
                    'is_loan' => $is_loan_ooredoo,
                    'loan_name' => $loan_name_ooredoo,
                    'remm' => $request->input('remm_ooredoo'),
                ]);
                $isSave = $ooredoo_selling_balances->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'بيع رصيد وطنية بالدين بقيمة ' . $request->input('ooredoo_selling_total'),
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'حدث مشكلة أثناء حفظ العنصر',
                    ], Response::HTTP_BAD_REQUEST);
                }
            } else {
                $is_loan_ooredoo = false;
                $Add_balance_ooredoo = new OoredoOBalance([
                    'ooredo_blance' => $ooredoo_Newblance,
                    'recent_add' => $request->input('recent_add_ooredoo'),
                    'recent_withdrawn' => $request->input('ooredoo_selling_total'),
                    'old_ooredo_blance' => $ooredoo_blance,
                    'is_debt' => $is_loan_ooredoo,
                ]);
                $Add_balance_ooredoo->save();
                $loan_name_ooredoo = $request->input('loan_name_ooredoo');

                $ooredoo_selling_balances = new OoredooSellingBalances([
                    'ooredoo_blance' => $ooredoo_Newblance,
                    'selling_blance' => $ooredoo_selling_total,
                    'remaining_blance' => $ooredoo_Newblance,
                    'is_loan' => $is_loan_ooredoo,
                    'loan_name' => $loan_name_ooredoo,
                    'remm' => $request->input('remm_ooredoo'),
                ]);
                $isSave = $ooredoo_selling_balances->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'بيع رصيد وطنية بقيمة' . $request->input('ooredoo_selling_total'),
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'حدث مشكلة أثناء حفظ العنصر',
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function electrsity(Request $request)
    {
        $validator = validator($request->all(), [
            'electristy_selling_total' => 'required|numeric',
            'electristy_blance' => 'required|numeric',
        ], [
            'numeric' => 'الحقل :attribute يجب أن يكون رقمًا.',
            'required' => 'الحقل :attribute مطلوب.',
        ]);
        $validator->after(function ($validator) use ($request) {
            $electristy_selling_total = $request->input('electristy_selling_total');
            $electristy_blance = $request->input('electristy_blance');

            if ($electristy_blance < $electristy_selling_total) {
                $validator->errors()->add('electristy_blance', 'الرصيد يجب أن يكون أكبر من المبلغ المباع.');
            }
        });
        if (!$validator->fails()) {
            $electristy_selling_total = $request->input('electristy_selling_total');
            $electristy_blance = $request->input('electristy_blance');
            $electristy_Newblance = $request->input('electristy_blance') - $request->input('electristy_selling_total');


            // في حال دين
            if ($request->input('is_loan_electristy') == true) {

                $is_loan_electristy = true;

                $Add_balance_electristy = new ElectristyBalance([
                    'electristy_blance' => $electristy_Newblance,
                    'recent_add' => $request->input('recent_add_electristy'),
                    'recent_withdrawn' => $request->input('electristy_selling_total'),
                    'old_electristy_blance' => $electristy_blance,
                    'is_debt' => $is_loan_electristy,
                ]);
                $Add_balance_electristy->save();
                $loan_name_electristy = $request->input('loan_name_electristy');

                $add_loans = new loans([
                    'loan_type' => 'رصيد وطنية',
                    'loan_name' => $loan_name_electristy,
                    'loan_money' => $request->input('electristy_selling_total'),
                    'remm' => $request->input('remm_electristy')
                ]);
                $add_loans->save();
                $electristy_selling_balances = new ElectrsitySellingBalances([
                    'electrsity_blance' => $electristy_Newblance,
                    'selling_blance' => $electristy_selling_total,
                    'remaining_blance' => $electristy_Newblance,
                    'is_loan' => $is_loan_electristy,
                    'loan_name' => $loan_name_electristy,
                    'remm' => $request->input('remm_electristy'),
                ]);
                $isSave = $electristy_selling_balances->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'بيع رصيد كهرباء بالدين يقيمة ' . $request->input('electristy_selling_total'),
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'حدث مشكلة أثناء حفظ العنصر',
                    ], Response::HTTP_BAD_REQUEST);
                }
            } else {
                $is_loan_electristy = false;
                $Add_balance_electristy = new ElectristyBalance([
                    'electristy_blance' => $electristy_Newblance,
                    'recent_add' => $request->input('recent_add_electristy'),
                    'recent_withdrawn' => $request->input('electristy_selling_total'),
                    'old_electristy_blance' => $electristy_blance,
                    'is_debt' => $is_loan_electristy,
                ]);
                $Add_balance_electristy->save();
                $loan_name_electristy = $request->input('loan_name_electristy');

                $electristy_selling_balances = new ElectrsitySellingBalances([
                    'electrsity_blance' => $electristy_Newblance,
                    'selling_blance' => $electristy_selling_total,
                    'remaining_blance' => $electristy_Newblance,
                    'is_loan' => $is_loan_electristy,
                    'loan_name' => $loan_name_electristy,
                    'remm' => $request->input('remm_electristy'),
                ]);
                $isSave = $electristy_selling_balances->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'بيع رصيد كهرباء يقيمة ' . $request->input('electristy_selling_total'),
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'حدث مشكلة أثناء حفظ العنصر',
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
        }
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
