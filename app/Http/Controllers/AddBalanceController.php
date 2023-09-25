<?php

namespace App\Http\Controllers;

use App\Models\ElectristyBalance;
use App\Models\JawalBalance;
use App\Models\OoredoOBalance;
use App\Models\TraderDebt;
use Illuminate\Support\Facades\Auth;
use App\Models\Add_Balance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddBalanceController extends Controller
{
    //

    public function index()
    {
        //
        if (Auth::check()) {
            $id = Auth::user()->getId();
            $user = User::findOrFail($id);
            $jawal_balance = JawalBalance::latest('updated_at')->first();
            $OoredoO_balance = OoredoOBalance::latest('updated_at')->first();
            $Electristy_balance = ElectristyBalance::latest('updated_at')->first();
            return response()->view('dashboard.pages.Balance.add_balance', [
                'user' => $user,
                'jawal_balance' => $jawal_balance,
                'OoredoO_balance' => $OoredoO_balance,
                'Electristy_balance' => $Electristy_balance,
            ]);
        } else {
            return redirect()->route('login')->with([
                'message' => 'These credentials do not match our records.',
                'alert-type' => 'danger'
            ]);
        }
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
            'add_blance' => 'required',
        ]);

        if (!$validator->fails()) {

            if ($request->input('is_debt') == 'on') {
                $debt = true;
                $trader_name = $request->input('trader_name');

                if ($request->input('jawal_blance') == true) {
                    $debt_type = 'رصيد جوال';
                } elseif ($request->input('ooredo_blance') == true) {
                    $debt_type = 'رصيد وطنية';
                } elseif ($request->input('electristy_blance') == true) {
                    $debt_type = 'رصيد كهرباء';
                } else {
                    $debt_type = ' ';
                }

                $add_debt = new TraderDebt([
                    'debt_type' => $debt_type,
                    'debt_name' => $request->input('trader_name'),
                    'debt_money' => $request->input('add_blance'),
                    'remm' => $request->input('remm')
                ]);
                $add_debt->save();
            } else {
                $debt = false;
                $trader_name = '';
            }

            $New_jawal_blance = $request->input('add_blance') + $request->input('real_jawal_balance');
            $New_ooredo_blance = $request->input('add_blance') + $request->input('real_OoredoO_balance');
            $New_electristy_blance = $request->input('add_blance') + $request->input('real_Electristy_balance');

            if ($request->input('jawal_blance') == true) {
                $Add_balance_jawal = new JawalBalance([
                    'jawal_blance' => $New_jawal_blance,
                    'recent_add' => $request->input('add_blance'),
                    'old_jawal_blance' => $request->input('real_jawal_balance'),
                    'is_debt' => $debt,
                    'trader_name' => $trader_name,
                    'remm' => $request->input('remm')
                ]);
                $isSave = $Add_balance_jawal->save();
            } elseif ($request->input('ooredo_blance') == true) {
                $Add_balance_ooredo = new OoredoOBalance([
                    'ooredo_blance' => $New_ooredo_blance,
                    'recent_add' => $request->input('add_blance'),
                    'old_ooredo_blance' => $request->input('real_OoredoO_balance'),
                    'is_debt' => $debt,
                    'trader_name' => $trader_name,
                    'remm' => $request->input('remm')
                ]);
                $isSave = $Add_balance_ooredo->save();
            } elseif ($request->input('electristy_blance') == true) {
                $Add_balance_ooredo = new ElectristyBalance([
                    'electristy_blance' => $New_electristy_blance,
                    'recent_add' => $request->input('add_blance'),
                    'old_electristy_blance' => $request->input('real_Electristy_balance'),
                    'is_debt' => $debt,
                    'trader_name' => $trader_name,
                    'remm' => $request->input('remm')
                ]);
                $isSave = $Add_balance_ooredo->save();
            }

            if ($isSave) {
                return response()->json([
                    'message' => 'تم حفظ العنصر بنجاح',
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'message' => 'حدث مشكلة أثناء حفظ العنصر',
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Add_Balance $Add_Balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Add_Balance $Add_Balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Add_Balance $Add_Balance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Add_Balance $Add_Balance)
    {
        //
    }
}
