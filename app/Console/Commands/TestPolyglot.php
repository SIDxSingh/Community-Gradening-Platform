<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Garden;
use App\Models\Plant;

class TestPolyglot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:polyglot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demonstrate polyglot persistence by fetching from SQL and MongoDB';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing Polyglot Persistence...');
        
        try {
            $userCount = User::count();
            $gardenCount = Garden::count();
            $this->info("Relational (SQLite/MySQL) -> Users: $userCount, Gardens: $gardenCount");
            
            $firstGarden = Garden::first();
            if ($firstGarden) {
                $this->line(" - Sample Garden: " . $firstGarden->title);
            }
            
            $plantCount = Plant::count();
            $this->info("NoSQL (MongoDB) -> Plants: $plantCount");
            
            $firstPlant = Plant::first();
            if ($firstPlant) {
                $this->line(" - Sample Plant: " . $firstPlant->name . " (" . $firstPlant->species . ")");
            }

            $this->info('Polyglot Persistence is working successfully!');
        } catch (\Exception $e) {
            $this->error('Error connecting to database: ' . $e->getMessage());
        }
    }
}
