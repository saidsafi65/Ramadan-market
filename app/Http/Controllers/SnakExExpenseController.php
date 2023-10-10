<?php

namespace App\Http\Controllers;

use App\Models\snakEx_expense;
use App\Models\TraderDebt;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SnakExExpenseController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'snakEx_type' => 'required|array|min:1',
            'snakEx_total' => 'required|numeric',
        ], [
            'numeric' => 'يجب أن يكون المبلغ رقمًا.',
            'min' => 'يجب أن تختار نوع واحد على الأقل.',
            'required' => 'يمنع ترك البيانات فارغة.',
        ]);

        $validator->after(function ($validator) use ($request) {
            $snakEx_type = implode(" و ", $request->input('snakEx_type'));
            $snakEx_total = $request->input('snakEx_total');
            $is_loan_snakEx = $request->input('is_loan_snakEx');
            $loan_name_snakEx = $request->input('loan_name_snakEx');
            $snakEx_remm = $request->input('snakEx_remm');
        });
        if (!$validator->fails()) {
            $snakEx_type = implode(" و ", $request->input('snakEx_type'));
            $snakEx_total = $request->input('snakEx_total');
            $is_loan_snakEx = $request->input('is_loan_snakEx');
            $loan_name_snakEx = $request->input('loan_name_snakEx');
            $snakEx_remm = $request->input('snakEx_remm');

            //TraderDebt Saves
            if ($request->input('is_loan_snakEx') == true) {
                $add_debt = new TraderDebt([
                    'debt_type' => $snakEx_type,
                    'debt_name' => $request->input('loan_name_snakEx'),
                    'debt_money' => $request->input('snakEx_total'),
                    'remm' => $request->input('snakEx_remm')
                ]);
                $add_debt->save();
                $Add_snakEx_expense = new snakEx_expense([
                    'snakEx_type' => $snakEx_type,
                    'snakEx_total' => $snakEx_total,
                    'is_loan_snakEx' => $is_loan_snakEx,
                    'loan_name_snakEx' => $loan_name_snakEx,
                    'snakEx_remm' => $snakEx_remm,
                ]);
                $isSave = $Add_snakEx_expense->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'تم صرف مكسرات للمحل بالدين بقيمة ' . $request->input('snakEx_total'),
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'حدث مشكلة أثناء حفظ المصروف',
                    ], Response::HTTP_BAD_REQUEST);
                }
            } else {
                $snakEx_type = implode(" و ", $request->input('snakEx_type'));
                $snakEx_total = $request->input('snakEx_total');
                $is_loan_snakEx = $request->input('is_loan_snakEx');
                $loan_name_snakEx = $request->input('loan_name_snakEx');
                $snakEx_remm = $request->input('snakEx_remm');
                $Add_snakEx_expense = new snakEx_expense([
                    'snakEx_type' => $snakEx_type,
                    'snakEx_total' => $snakEx_total,
                    'is_loan_snakEx' => $is_loan_snakEx,
                    'loan_name_snakEx' => $loan_name_snakEx,
                    'snakEx_remm' => $snakEx_remm,
                ]);
                $isSave = $Add_snakEx_expense->save();
                if ($isSave) {
                    return response()->json([
                        'message' => 'تم صرف مكسرات للمحل بقيمة ' . $request->input('snakEx_total'),
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
