<?php
use Carbon\Carbon;

function carbon($date_time=null)
{
	return new Carbon($date_time);
}

function vite($script=null)
{
	$resource = $script ?? "resources/js/app.js";

	$url = config('app.url');

	if(config('app.env') != 'production')
	{
		echo <<<EOD
		<script type="module" src="${url}:5173/@vite/client"></script>
        <script type="module" src="${url}:5173/${resource}"></script>
EOD;
	}
	else
	{
		$reflection = new \ReflectionClass(\Composer\Autoload\ClassLoader::class);
        $rootDir = dirname($reflection->getFileName(), 3);

		$src = $rootDir."/public/build/manifest.json";
		
		if(file_exists($src))
		{
			$content = file_get_contents($src);
			
			if($content)
			{
				$manifest = json_decode($content, true);
			    $js = $manifest[$resource]['file'];
			    $css = $manifest["resources/js/app.css"]['file'];
	        }

			if(empty($script))
			{
				echo <<<EOD
				<link rel="stylesheet" href="${url}/build/${css}" />
				<script type="module" src="${url}/build/${js}"></script>
EOD;
			}
			else
			{
				echo <<<EOD
				<script type="module" src="${url}/build/${js}"></script>
EOD;
			}
		
		    
        }
    }
}

?>