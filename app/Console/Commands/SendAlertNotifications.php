<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\EmailManager;
use App\Mail\EmailWithAttachments;

class SendAlertNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the progammed alert emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $emailAddresses = EmailManager::getUserEmailAddressesRAW(1);

        foreach ($emailAddresses as $emailAddress) {
            
            Mail::to(new EmailWithAttachments($aData, $sSubject, $sView, $aAttachedFiles));    

        }

    }
}
