<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\CronMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Myuser;


class MailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily Remainder notification ';

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
     * @return int
     */
    public function handle()
    {
        // info('sdhfgsgf');
        $Myuser=Myuser::all();
        foreach($Myuser as $Myusers){
        Mail::to($Myusers->email)->send(new CronMail());
    }
    }
}
