<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RemoveModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:module {name}
                            {--model : Remove the model}
                            {--controller : Remove the controller}
                            {--seeder : Remove the seeder}
                            {--migration : Remove the migration}
                            {--factory : Remove the factory}
                            {--observer : Remove the observer}
                            {--notification : Remove the notification}
                            {--event : Remove the event}
                            {--listener : Remove the listener}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove a module with its components';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = ucfirst($this->argument('name'));

        // Paths
        $modelPath = app_path("Models/{$name}.php");
        $controllerPath = app_path("Http/Controllers/{$name}Controller.php");
        $seederPath = database_path("seeders/{$name}Seeder.php");
        $migrationPath = database_path("migrations/");
        $factoryPath = database_path("factories/{$name}Factory.php");
        $observerPath = app_path("Observers/{$name}Observer.php");
        $notificationPath = app_path("Notifications/{$name}Notification.php");
        $eventPath = app_path("Events/{$name}Event.php");
        $listenerPath = app_path("Listeners/{$name}Listener.php");

        // If no specific option is provided, remove all components
        $removeAll = !$this->option('model') && !$this->option('controller') && !$this->option('seeder') &&
            !$this->option('migration') && !$this->option('factory') && !$this->option('observer') &&
            !$this->option('notification') && !$this->option('event') && !$this->option('listener');

        // Remove model
        if ($removeAll || $this->option('model')) {
            if (File::exists($modelPath)) {
                File::delete($modelPath);
                $this->info("Model {$name} deleted successfully!");
            }
        }

        // Remove controller
        if ($removeAll || $this->option('controller')) {
            if (File::exists($controllerPath)) {
                File::delete($controllerPath);
                $this->info("Controller {$name}Controller deleted successfully!");
            }
        }

        // Remove seeder
        if ($removeAll || $this->option('seeder')) {
            if (File::exists($seederPath)) {
                File::delete($seederPath);
                $this->info("Seeder {$name}Seeder deleted successfully!");
            }
        }

        // Remove migrations
        if ($removeAll || $this->option('migration')) {
            $files = File::files($migrationPath);
            foreach ($files as $file) {
                if (strpos($file->getFilename(), strtolower($name)) !== false) {
                    File::delete($file->getPathname());
                    $this->info("Migration {$file->getFilename()} deleted successfully!");
                }
            }
        }

        // Remove factory
        if ($removeAll || $this->option('factory')) {
            if (File::exists($factoryPath)) {
                File::delete($factoryPath);
                $this->info("Factory {$name}Factory deleted successfully!");
            }
        }

        // Remove observer
        if ($removeAll || $this->option('observer')) {
            if (File::exists($observerPath)) {
                File::delete($observerPath);
                $this->info("Observer {$name}Observer deleted successfully!");
            }
        }

        // Remove notification
        if ($removeAll || $this->option('notification')) {
            if (File::exists($notificationPath)) {
                File::delete($notificationPath);
                $this->info("Notification {$name}Notification deleted successfully!");
            }
        }

        // Remove event
        if ($removeAll || $this->option('event')) {
            if (File::exists($eventPath)) {
                File::delete($eventPath);
                $this->info("Event {$name}Event deleted successfully!");
            }
        }

        // Remove listener
        if ($removeAll || $this->option('listener')) {
            if (File::exists($listenerPath)) {
                File::delete($listenerPath);
                $this->info("Listener {$name}Listener deleted successfully!");
            }
        }

        if ($removeAll) {
            $this->info("All components of module {$name} have been removed!");
        }

        return 0;
    }
}
