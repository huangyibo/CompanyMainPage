<?php

namespace CompanyMainPage\Jobs;

use CompanyMainPage\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use CompanyMainPage\Models\User;

class SendActivateMail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        return app('CompanyMainPage\Handlers\EmailHandler')->sendActivateMail($this->user);
    }
}
