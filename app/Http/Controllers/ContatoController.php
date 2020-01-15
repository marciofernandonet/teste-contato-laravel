<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use Mail;

class ContatoController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required|min:11|regex:/[0-9]{11}/', //regex:/(01)[0-9]{9}/ ([0-9]{2})([ ]?)[0-9]{9}
            'mensagem' => 'required',
            'arquivo' => 'required|mimes:pdf,doc,docx,odt,txt|max:500',
        ]);
        
        $file = $request->file('arquivo');
        $nameFile = rand().".".$file->getClientOriginalExtension();
        
        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'mensagem' => $request->mensagem,
            'local_arquivo' => base_path().'\public\uploads\\'.$nameFile,
            'ip' => $request->ip()
        ];

        $resp_email = $this->send_email($data, $file);

        if($resp_email)
        {
            $pathFile = public_path('/uploads');
            $file->move($pathFile, $nameFile);
            $type = 'success'; $msg = 'Cadastro enviado com sucesso!';
            Contato::create($data);
        }
        else $type = 'danger'; $msg = 'Erro ao processar solicitação!';
        
        return back()->with(['type' => $type, 'msg' => $msg]);
    }

    public function send_email($data, $file)
    {
        try{
            Mail::send('emails.mail', ["body" => $data], function($message) use ($file){
                $message->from(env('MAIL_USERNAME'),' Contato');
                $message->attach($file->getRealPath(), array(
                    'as' => $file->getClientOriginalName(),
                    'mime' => $file->getMimeType()
                ));
                $message->to(env('MAIL_USERNAME'))->subject('Informações de contato');
            });

            if(Mail::failures())
                return false;
            
            return true;
        }
        catch(\Exception $e){
            return false;
        }
    }
}
