<?php namespace Supriyanih\DashboardYankes\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use File;

/**
 * The DashboardYankesCommand class.
 *
 * @package Supriyanih\DashboardYankes
 * @author  supriyanih <supriyanih@gmail.com>
 */
class DashboardYankesCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supriyanih:dashboard-yankes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Controllers, Models, seeds, and Routes command for DashboardEpormas package';


protected $stubsController = [
       'controllers' => [
           'KamarController.stub',
           'FaskesController.stub'
       ]
    ];

    protected $stubsModel = [
       'models' => [
           'Kamar.stub',
           'Faskes.stub'
       ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

      protected function controllerViewCreate()
    {
        foreach($this->stubsController['controllers'] as $stub)
        {
            File::put(base_path('app/Http/Controllers/').str_replace('stub','php',$stub),File::get(__DIR__.'/../../stubs/Controllers/'.$stub));
        }
    }

    protected function modelViewCreate()
    {
        foreach($this->stubsModel['models'] as $stub)
        {
            File::put(base_path('app/').str_replace('stub','php',$stub),File::get(__DIR__.'/../../stubs/Models/'.$stub));
        }
    }

    protected function routeViewCreate()
    {
        File::append(base_path('routes/web.php'),File::get(__DIR__.'/../../stubs/routes.stub'));
        File::append(base_path('routes/api.php'),File::get(__DIR__.'/../../stubs/routes.stub'));
    }

   

    public function handle()
    {

        $this->controllerViewCreate();
        $this->modelViewCreate();
        $this->routeViewCreate();
        $this->info('Create Controllers, Models, seeds, and Routes for DashboardEpormas package success');
    }
}
