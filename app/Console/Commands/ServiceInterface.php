<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ServiceInterface extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service-interface {serviceName} {interfaceName}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Service Interface created successfully!';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Interface code start 

        $interfaceName = $this->argument('interfaceName');
        $parentDirectoryInterface = 'App/Services/Interfaces/';
        $newDirectoryInterfaceName = $interfaceName;

        if (Storage::exists($parentDirectoryInterface)) {
            Storage::makeDirectory($parentDirectoryInterface . '/' . $newDirectoryInterfaceName);

            $this->info('Folder "' . $newDirectoryInterfaceName . '" created inside "' . $parentDirectoryInterface . '" successfully.');
        } else {

            $this->error('Parent directory "' . $parentDirectoryInterface . '" does not exist.');
        }

        // Base Code In Interface Folder in interface file

        $interfaceName = $this->argument('interfaceName');

        if (is_dir($parentDirectoryInterface)) {
            $newFilePath = $parentDirectoryInterface . '/' . $interfaceName . '.php';

            if (!file_exists($newFilePath)) {
                file_put_contents($newFilePath, "<?php

namespace App\Services\Interfaces;

use App\Services\Interfaces\BaseInterFace;

interface $interfaceName extends BaseInterFace
{
    
}");

                // Output a success message to the console
                $this->info('File "' . $interfaceName . '.php" created inside "' . $parentDirectoryInterface . '" successfully.');
            } else {
                // Output a message if the file already exists
                $this->info('File "' . $interfaceName . '.php" already exists inside "' . $parentDirectoryInterface . '".');
            }
        } else {
            // Output an error message if the parent directory doesn't exist
            $this->error('Parent directory "' . $parentDirectoryInterface . '" does not exist.');
        }

        // Interface code end 

        // Service code start 

        $serviceName = $this->argument('serviceName');
        $parentDirectory = 'App/Services/';
        $newDirectoryName = $serviceName;

        if (Storage::exists($parentDirectory)) {
            Storage::makeDirectory($parentDirectory . '/' . $newDirectoryName);

            $this->info('Folder "' . $newDirectoryName . '" created inside "' . $parentDirectory . '" successfully.');
        } else {

            $this->error('Parent directory "' . $parentDirectory . '" does not exist.');
        }

        // Base Code In services Folder in service file

        $serviceName = $this->argument('serviceName');

        // Check if the parent directory exists
        if (is_dir($parentDirectory)) {
            // Construct the path to the new file
            $newFilePath = $parentDirectory . '/' . $serviceName . '.php';

            // Check if the file already exists
            if (!file_exists($newFilePath)) {
                file_put_contents($newFilePath, "<?php 

namespace App\Services; 

use App\Models\ModelName;
use App\Enums\StatusEnum; 
use App\Services\Interfaces\ $interfaceName;

Class $serviceName implements $interfaceName{
    public function all()
        {
            item = ModelName::orderBy('id', 'desc')->get();
            return item;
        }

        public function store(array attributes)
    {
        item =  ModelName::create(attributes);
        return item;
    }

    public function find(int id)
    {
        item = ModelName::find(id);
        return item;
    }

    public function update(array attributes, int id)
    {
        item = ModelName::find(id);
        updatedItem = item->update(attributes);
        return updatedItem;
    }

    public function delete(int id)
    {
        item = ModelName::find(id);
        item->delete(item);
        return item;
    }

    public function statusActive(int id)
    {
        item = ModelName::find(id);
        if (item->status == StatusEnum::Inactive->value) {
            item->status = StatusEnum::Active->value;
        }
        item->save();
        return item;
    }

    public function statusInactive(int id)
    {
        item = ModelName::find(id);
        if (item->status == StatusEnum::Active->value) {
            item->status = StatusEnum::Inactive->value;
        }
        item->save();
        return item;
    }
}
");

                // Output a success message to the console
                $this->info('File "' . $serviceName . '.php" created inside "' . $parentDirectory . '" successfully.');
            } else {
                // Output a message if the file already exists
                $this->info('File "' . $serviceName . '.php" already exists inside "' . $parentDirectory . '".');
            }
        } else {
            // Output an error message if the parent directory doesn't exist
            $this->error('Parent directory "' . $parentDirectory . '" does not exist.');
        }

    }
    // Service code end 

}
