<?php

namespace App;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailWithAttachments extends Mailable {

    use Queueable,
        SerializesModels;

    /**
     * Build an e-mail with attachements.
     *
     * @return void
     */
    public $aData;
    public $sSubject;
    public $sView;
    public $aAttachedFiles;
    public $sCC;
    public $bAttachedFiles;


    public function __construct(/*$aData, $sSubject, $sView, $aAttachedFiles*/) {
        $this->aData = $aData;
        $this->sSubject = $sSubject;
        $this->sView = $sView;
        $this->aAttachedFiles = $aAttachedFiles;
        $this->sCC = $sCC;
        $this->bAttachedFiles = $aAttachedFiles;
    }




/*
<body>
    Here is an image:

    <img src="{{ $message->embed($pathToImage) }}">
</body>

        Mail::to($sDestinatario)->
        send(new CorreoConAdjuntos(
        $aDatos, $sAsunto, $sVista, $aAdjuntos)
        );

Exception ex


QUEUE

foreach (['taylor@example.com', 'dries@example.com'] as $recipient) {
    Mail::to($recipient)->send(new OrderShipped($order));
}
Mail::to($request->user())
    ->cc($moreUsers)
    ->bcc($evenMoreUsers)
    ->queue(new OrderShipped($order));


Previewing Mailables In The Browser

When designing a mailable's template, it is convenient to quickly preview the rendered mailable in your browser like a typical Blade template. For this reason, Laravel allows you to return any mailable directly from a route Closure or controller. When a mailable is returned, it will be rendered and displayed in the browser, allowing you to quickly preview its design without needing to send it to an actual email address:

Route::get('mailable', function () {
    return new EmailWithAttachments()
    $invoice = App\Invoice::find(1);
    return new App\Mail\InvoicePaid($invoice);
});


*/
    /**
     * build the e-mail
     *
     * @return a view with the public properties
     */
    public function build() {

        $email = $this//->from('')
                ->subject($this->sSubject)
                //->cc($this->sCC)
                ->view($this->sView)
                //->with($this->aData)
                ->delay(5);

        if($this->bAttachedFiles){
        //attaching files
        foreach ($this->aAttachedFiles as $sFilePath) {
            $email->attach($sFilePath);
            }
        }   
        return $email;
    }

}
