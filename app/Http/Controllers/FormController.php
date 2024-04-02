<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Branch;
use App\Mail\FreezingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreFormRequest;

class FormController extends Controller
{
    public function store(StoreFormRequest $request)
    {
        $data = $request->validated();

        $data['branch_id'] = $request->input('branchid');

        // return $data;
        $form = Form::create([
            'branch_id' => $data['branch_id'],
            'name'      => $data['name'],
            'phone'     => $data['phone'],
            'email'     => $data['email'],
            'date_from' => $data['date_from'],
            'date_to'   => $data['date_to'],
        ]);

        /*
            2 => hessah-almubarak@tryoncall.com
            3 => sabah-alsalem@tryoncall.com
            4 => mangaf-missplatinum@tryoncall.com
        */

        // if ($form) {
        //     $branch_email = Branch::where('id', $data['branch_id'])->pluck('email');
        //     // freeze.miss@missplatinum.com
        //     Mail::to($branch_email)->send(new FreezingMail($form));

        return back()->with("success", "Data was submited successfully.");
        // }
    }

}
