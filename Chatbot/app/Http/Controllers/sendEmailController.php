<?php

namespace App\Http\Controllers;
use Mail;
use App\cliente;
use Illuminate\Http\Request;



class sendEmailController extends Controller
{

    public function sendEmailReminder(Request $request)
    {
        $cliente = cliente::findOrFail($request->id_cliente);

        Mail::send('emails.reminder', ['cliente' => $user], function ($m) use ($cliente) {
            $m->from('oportunidade.marcio@gmail.com', 'Teste de email');

            $m->to($user->email, $user->nome)->subject('Your Reminder!');
        });
    }

}
