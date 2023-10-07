<?php

namespace App\Http\Controllers;

use App\Models\worker_expense;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkerExpenseController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name_workers_salarie' => 'required|string|min:3|max:30',
            'workers_salarie_total' => 'required|numeric',
        ], [
            'numeric' => 'الحقل راتب العامل يجب أن يكون رقمًا.',
            'string' => 'الحقل اسم العامل يجب أن يكون نصاً.',
            'min' => 'الحقل اسم العامل يجب أن يحتوي على 3 أحرف على الأقل.',
            'max' => 'الحقل اسم العامل يجب أن يحتوي على 30 حرف على الأكثر.',
            'required' => 'يمنع ترك البيانات فارغة.',
        ]);

        $validator->after(function ($validator) use ($request) {
            $name_workers_salarie = $request->input('name_workers_salarie');
            $workers_salarie_total = $request->input('workers_salarie_total');
            $worker_remm = $request->input('worker_remm');
        });
        if (!$validator->fails()) {
            $name_workers_salarie = $request->input('name_workers_salarie');
            $workers_salarie_total = $request->input('workers_salarie_total');
            $worker_remm = $request->input('worker_remm');
            $Add_workers_salarie = new worker_expense([
                'name_workers_salarie' => $name_workers_salarie,
                'workers_salarie_total' => $workers_salarie_total,
                'worker_remm' => $worker_remm,
            ]);
            $isSave = $Add_workers_salarie->save();
            if ($isSave) {
                return response()->json([
                    'message' => 'تم اضافة مصروف راتب عمال بقيمة ' . $request->input('workers_salarie_total'),
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
