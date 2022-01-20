<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Card_detail;
use Illuminate\Queue\SerializesModels;

class contactUs extends Mailable
{
    use Queueable, SerializesModels;
    public $subject ="Alguien Te Envio Algo";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$form = '')
    {
        $this->id = $id;
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $data['detail'] = Card_detail::find($this->id);
        $data['form']   = $this->form;
        return $this->view('email.contactUs',['data'=>$data]);
    }
}
