<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\EmailManager;
use App\Mail\EmailWithAttachments;
use Mail;

class SendInfoNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the progammed info emails';

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

        $users = EmailManager::getUserEmailAddressesRAW(3);

        foreach ($users as $user) {
            Mail::to($user->email)->send(
                new EmailWithAttachments(
                    ['username' => $user->name,
                     'customMessage' => $user->customMessage],
                    $user->name, 
                    'emails.info', 
                    false));    
        }

    }
}
