<?php

namespace App\Http\Controllers;

use App\Models\personal_expense;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonalExpenseController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'personal_expense_total' => 'required|numeric',
        ], [
            'numeric' => 'الحقل :attribute يجب أن يكون رقمًا.',
            'required' => 'الحقل :attribute مطلوب.',
        ]);

        $validator->after(function ($validator) use ($request) {
            $personal_expense_total = $request->input('personal_expense_total');
            $personal_remm = $request->input('personal_remm');
        });
        if (!$validator->fails()) {
            $personal_expense_total = $request->input('personal_expense_total');
            $personal_remm = $request->input('personal_remm');
            $Add_personal_expense = new personal_expense([
                'personal_expense_total' => $personal_expense_total,
                'personal_remm' => $personal_remm,
            ]);
            $isSave = $Add_personal_expense->save();
            if ($isSave) {
                return response()->json([
                    'message' => 'تم اضافة مصروف شخصي بقيمة ' . $request->input('personal_expense_total'),
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'message' => 'حدث مشكلة أثناء حفظ المصروف',
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
