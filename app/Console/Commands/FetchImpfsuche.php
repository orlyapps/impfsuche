<?php

namespace App\Console\Commands;

use App\Mail\NotificationMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class FetchImpfsuche extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $city = $this->argument('city');
        $html = \Http::get('https://www.impfsuche.de/protect/home')->body();
        $result = strpos($html, $city);
        if ($result) {
            Mail::to('strauss@orlyapps.de')->send(new NotificationMail($city));
        } else {
            echo "Kein Impftermin";
        }
        return 0;
    }
}
