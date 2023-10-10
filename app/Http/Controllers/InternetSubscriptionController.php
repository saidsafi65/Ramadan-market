<?php

namespace App\Http\Controllers;

use App\Models\internet_subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InternetSubscriptionController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'internet_sub_salarie' => 'required|string',
            'internet_sub_total' => 'required|numeric',
        ], [
            'numeric' => 'يجب أن يكون المبلغ رقمًا.',
            'string' => 'يجب أن تختار نصاً.',
            'required' => 'يمنع ترك البيانات فارغة.',
        ]);

        $validator->after(function ($validator) use ($request) {
            $internet_sub_salarie = $request->input('internet_sub_salarie');
            $internet_sub_total = $request->input('internet_sub_total');
            $internet_sub_remm = $request->input('internet_sub_remm');
        });
        if (!$validator->fails()) {
            $internet_sub_salarie = $request->input('internet_sub_salarie');
            $internet_sub_total = $request->input('internet_sub_total');
            $internet_sub_remm = $request->input('internet_sub_remm');
            $Add_internet_subscription = new internet_subscription([
                'internet_sub_salarie' => $internet_sub_salarie,
                'internet_sub_total' => $internet_sub_total,
                'internet_sub_remm' => $internet_sub_remm,
            ]);
            $isSave = $Add_internet_subscription->save();
            if ($isSave) {
                return response()->json([
                    'message' => 'تم اضافة اشتراك انترنت بقيمة ' . $request->input('internet_sub_total'),
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
