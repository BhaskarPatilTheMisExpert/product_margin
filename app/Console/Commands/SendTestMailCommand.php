<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class SendTestMailCommand extends Command
{
    protected $signature = 'send:testmail {param?}';
    protected $description = 'Send test mail';

    public function handle()
    {
        $param = $this->argument('param');

        if (empty($param)) {
            $mail = new TestMail('Empty Param', 'Param is empty.');
        } else {
            $mail = new TestMail('Param Value', "Param value is: $param");
        }

        try {
            Mail::to(['wsita.support2@piramal.com', 'wsita.support@piramal.com'])->send($mail);
            \Log::info('Test mail sent successfully.');
            echo 'Test mail sent successfully.';
            $this->info('Test mail sent successfully.');
        } catch (\Exception $e) {
            \Log::error('Failed to send test mail: ' . $e->getMessage());
            $this->error('Failed to send test mail: ' . $e->getMessage());
        }
    }
}
