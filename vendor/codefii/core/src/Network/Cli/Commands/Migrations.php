<?php
namespace Codefii\Cli\Commands;

/**
  * 
  */

 class Model
 {
 	//Private write file fn
 	private static function wfile($migration)
 	{
 		return "<?php \nnamespace App\Models\Migrations;
 				\nuse App\Codefii\Migrations\Migrations\n
                 \nclass {$migration} extends Migrations {\n\n\n
                public function up(){\n\n
                    //
                }\n\n
                public function down(){\n\n
                   
                }\n\n
                \n\n
                
                }";
 	}

 	public static function model_maker($migration)
 	{
 		//Check for Existing model(true) kill execution
 		if (file_exists("app/models/migrations/{$migration}.php")) {
 			echo "Existing [{$migration}] Model found, try again \n";
 			exit;
 		}

 		//Create and write File to model Dir
 		$model = fopen("app/models/migrations/{$migration}.php","w");
 		fwrite($model, self::wfile($migration));

 		//Throw response
 		echo " [{$migration}] created successfully \n";
 	}

 } 