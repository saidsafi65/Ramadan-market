<?php

namespace App\Http\Controllers;

use App\Models\mobileEx_expense;
use App\Models\TraderDebt;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MobileExExpenseController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'mobileEx_type' => 'required|array|min:1',
            'mobileEx_total' => 'required|numeric',
        ], [
            'numeric' => 'يجب أن يكون المبلغ رقمًا.',
            'min' => 'يجب أن تختار نوع واحد على الأقل.',
            'required' => 'يمنع ترك البيانات فارغة.',
        ]);

        $validator->after(function ($validator) use ($request) {
            $mobileEx_type = implode(" و ", $request->input('mobileEx_type'));
            $mobileEx_total = $request->input('mobileEx_total');
            $is_loan_mobileEx = $request->input('is_loan_mobileEx');
            $loan_name_mobileEx = $request->input('loan_name_mobileEx');
            $mobileEx_remm = $request->input('mobileEx_remm');
        });
        if (!$validator->fails()) {
            $mobileEx_type = implode(" و ", $request->input('mobileEx_type'));
            $mobileEx_total = $request->input('mobileEx_total');
            $is_loan_mobileEx = $request->input('is_loan_mobileEx');
            $loan_name_mobileEx = $request->input('loan_name_mobileEx');
            $mobileEx_remm = $request->input('mobileEx_remm');

            //TraderDebt Saves
            if ($request->input('is_loan_mobileEx') == true) {
                $add_debt = new TraderDebt([
                    'debt_type' => $mobileEx_type,
                    'debt_name' => $request->input('loan_name_mobileEx'),
                    'debt_money' => $request->input('mobileEx_total'),
                    'remm' => $request->input('mobileEx_remm')
                ]);
                $add_debt->save();
                $Add_mobileEx_expense = new mobileEx_expense([
                    'mobileEx_type' => $mobileEx_type,
                    'mobileEx_total' => $mobileEx_total,
                    'is_loan_mobileEx' => $is_loan_mobileEx,
                    'loan_name_mobileEx' => $loan_name_mobileEx,
                    'mobileEx_remm' => $mobileEx_remm,
                ]);
                $isSave = $Add_mobileEx_expense->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'تم صرف اكسسوارات جوال للمحل بالدين بقيمة ' . $request->input('mobileEx_total'),
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'حدث مشكلة أثناء حفظ المصروف',
                    ], Response::HTTP_BAD_REQUEST);
                }
            } else {
                $mobileEx_type = implode(" و ", $request->input('mobileEx_type'));
                $mobileEx_total = $request->input('mobileEx_total');
                $is_loan_mobileEx = $request->input('is_loan_mobileEx');
                $loan_name_mobileEx = $request->input('loan_name_mobileEx');
                $mobileEx_remm = $request->input('mobileEx_remm');
                $Add_mobileEx_expense = new mobileEx_expense([
                    'mobileEx_type' => $mobileEx_type,
                    'mobileEx_total' => $mobileEx_total,
                    'is_loan_mobileEx' => $is_loan_mobileEx,
                    'loan_name_mobileEx' => $loan_name_mobileEx,
                    'mobileEx_remm' => $mobileEx_remm,
                ]);
                $isSave = $Add_mobileEx_expense->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'تم صرف اكسسوارات جوال للمحل بقيمة ' . $request->input('mobileEx_total'),
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'حدث مشكلة أثناء حفظ المصروف',
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
