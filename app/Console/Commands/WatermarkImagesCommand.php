<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\Images\WatermarkInterface;
use Illuminate\Console\Command;

class WatermarkImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watermark:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Wartermark Images Users';

    public function __construct(
        protected WatermarkInterface $watermark,
        protected User $user,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $users = $this->users->getUsersCreatedToday();
        $users = $this->user->get();

        foreach ($users as $user ) {
            $this->watermark->make($user->image);
        }

        return Command::SUCCESS;
    }
}
