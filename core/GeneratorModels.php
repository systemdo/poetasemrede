<?php
Class GeneratorModels
{

private $tables;
//private $colums;
protected $db;

static public $generate;
	
	private function __construct(){
            $this->db = DB::connect();
            
		$this->catchTables();
		$this->generateFilesModel();
	}

	static public function loadGenerator()
	{
		if(!isset(self::$generate))
		{
			self::$generate= new GeneratorModels();
		}
		return self::$generate;
	} 
	
	private function catchTables()
	{
		$statement = $this->db->prepare('SHOW TABLES');
		$statement ->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($result as $key => $table)
		{
			foreach($table as $value)
			{
				$this->tables[]=$value;
			}	
		}
	}   
	
	private function catchColumns($table_name)
	{
		$return = '';
		$statement = $this->db->prepare("describe $table_name");
		$statement ->execute();
		$result= $statement->fetchAll(PDO::FETCH_OBJ);
		foreach($result as $key => $colums)
		{
			$return[]=$colums;		
		}
		return $return;

	}

	/*//insert object 
	private function buildObjectModelbyKey($tabla, $columns)
	{
		
		$build="function build".ucwords($tabla)."()\n";
		$build.="{\n";
		$build.="$sql(\"INSERT INTO $tabla \")"
		$build.="}\n\n"
	}*/

	//Set the get by class and by propriets 
	private function createFunctionsSetsAndGets($colums)
	{
		$build ="";
		foreach($colums as $key => $colum)
		{
			$build.="public function set".ucwords($colum->Field)."($".$colum->Field.")\n";
			$build.="{\n\n";
				$build.="\$this->".$colum->Field."=$".$colum->Field.";\n\n";
			$build.="}\n\n";
			$build.="public function get".ucwords($colum->Field)."()\n";
			$build.="{\n\n";
				$build.="return \$this->".$colum->Field.";\n\n";
			$build.="}\n\n";
		}
		return $build;	
	}

	private function generateFilesModel()
	{
		$file= "";
		foreach($this->tables as $models =>$model)
		{
			 $properties = $this->catchColumns($model);

			/*var_dump($model);
			echo'<pre>';
			print_r($properties);
			echo'</pre>';
			*/
			$namemodel = ucwords($model).'Model.php';

			$file =SD::getPathModels().'/'.$namemodel;

			if(!file_exists($file))
			{
				$classmodel = fopen($file,"w+");
				
				$write = "<?php \n";
				$write.= "\n";
				$write.= "Class ".ucwords($model)."Model extends Model{ \r\n";
				$write.= "\n";
				foreach ($properties as $property => $value) 
				{
					
					$write .= "private $".$value->Field.";\r\n";
					$write.= "\n";
				}
				
				$write .= "function __construct(){ \n";
				$write.= "}\n";	
				$write.= "\n";
				$write.= $this->createFunctionsSetsAndGets($properties);
				$write.= "\n";
				$write.= "}\n";
				$write.= "\n\n";
				$write.= "?>";
				fwrite($classmodel, $write);
			}
			//print_r($write);
		}
	}
	
	static function generateModelObjects($consult, $model)
	{

		$collection = '';
		$set = "<?php \n";
		$obj ="";
		$objects = ucwords($model).'Model';
		if(class_exists($objects))
		{
			
			foreach($consult as $key => $values)
			{
				$obj = 'obj'.$key;
				$$obj = new $objects;
				$collection[] = $$obj;
				foreach($values as $properties => $prop)
				{
					$file = fopen(SD::getPathModels().'/tmp.php', "w+");
					$set.= "\$obj".$key."->set".ucwords($properties).'("'.$prop.'")'.";\n";

				}
			}
			fwrite($file, $set);
			fclose($file);
			include_once SD::getPathModels().'/tmp.php';
			unlink(SD::getPathModels().'/tmp.php');
		}
		return $collection;
	}
} 

?>
