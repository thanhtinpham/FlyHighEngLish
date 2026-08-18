<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptimizeSystem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speed:optimize {--clear : Clear all optimization caches instead of building them}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize Laravel application performance for web hosting environment';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->option('clear')) {
            $this->info('Clearing optimization caches...');
            $this->call('config:clear');
            $this->call('route:clear');
            $this->call('view:clear');
            $this->call('event:clear');
            $this->info('✓ All caches cleared successfully!');
            return 0;
        }

        $this->info('🚀 Optimizing FlyHigh English for Hosting Environment...');

        $this->info('1/4 Caching Configuration...');
        $this->call('config:cache');

        $this->info('2/4 Caching Routes...');
        $this->call('route:cache');

        $this->info('3/4 Caching Blade Views...');
        $this->call('view:cache');

        $this->info('4/4 Caching Events...');
        $this->call('event:cache');

        $this->newLine();
        $this->info('✨ System optimized successfully! System load speed significantly improved.');
        return 0;
    }
}
