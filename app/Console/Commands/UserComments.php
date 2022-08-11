<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UserComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:comment {user} {comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Append comment to user comments';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::find($this->argument('user'));

        if (empty($user)) 
        {
            $this->error('No such user (' . $this->argument('user') . ')');
        } else {
            $user->appendComments($this->argument('comment'));

            $this->info('OK');
        }

    }
}
