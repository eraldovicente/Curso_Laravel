<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class NovoAcesso extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.novoacesso')->with([
            'nome' => $this->user->name,
            'email' => $this->user->email,
            'datahora' => now()->setTimezone('America/Recife')->format('d-m-Y H:i:s')
        ])->attach(base_path() . '/arquivos/arquivo.pdf');
    }
}
