<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\EmailManager;
use App\Mail\EmailWithAttachments;
use Mail;

class SendErrorNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:error';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the progammed error emails';

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
        
        $users = EmailManager::getUserEmailAddressesRAW(2);

        foreach ($users as $user) {
            Mail::to($user->email)->send(
                new EmailWithAttachments(
                    ['username' => $user->name,
                     'customMessage' => $user->customMessage],
                    $user->name, 
                    'emails.error', 
                    false));    
        }

    }
}
