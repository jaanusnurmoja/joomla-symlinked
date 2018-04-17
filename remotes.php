<html>
<head>
<title>First steps of symlinked Joomla installation</title>
</head>
<body>
<h2>First steps of symlinked Joomla installation - results</h2>

<?php
// Collect submission form data

$target = $_POST['target'];
$images = (int) $_POST['images'];
$sourceLink = $images == 0;
$folder = $images == 1;
$both = $images == 2;

echo '<h3>Removing (not yet deleting) unneeded code if exists</h3>';
echo '<p>Removed code will be located in directories removed and removed/administrator which you can delete or compress later.</p>';


if (!file_exists('removed')) {mkdir ('removed');}
if (!file_exists('removed/administrator')) {mkdir ('removed/administrator');}

// Lists of symlinks to be created

$links = array(
'components', 
'language', 
'layouts', 
'libraries', 
'media', 
'modules', 
'plugins', 
'templates'
);

$adminlinks = array(
'administrator/components', 
'administrator/help', 
'administrator/language', 
'administrator/modules', 
'administrator/templates'
);

foreach ($links as $dir)
{
	if (file_exists($dir) && !is_link($dir)) 
	{
		//$dest = $dir . '_remove';

		if (file_exists('removed/' . $dir))
		{
			$dest = $dir . '_remove';
		}
		else
		{
			$dest = 'removed/' . $dir;
		}
				
		$move = rename($dir, $dest);
		$result = $move ? $dir . ' moved to ' . $dest : $dir . ' - failed to move, try to do it manually';
		
		echo $result;
	}
	else
	{
		echo $dir . ' - nothing to move.';
	}
/*	
	if (rename($dir, $dest) === true)
	{
		echo $dir . ' moved to ' . $dest; 
	}
	else
	{
		echo 'Failed to move ' . $dir . ', try to do it manually';
	}
*/
		echo '<br />';

}

echo '<br />';

foreach ($adminlinks as $dir)
{
	if (file_exists($dir) && !is_link($dir)) 
	{
		//$dest = $dir . '_remove';
		if (file_exists('removed/' . $dir))
		{
			$dest = $dir . '_remove';
		}
		else
		{
			$dest = 'removed/' . $dir;
		}
		
		$move = rename($dir, $dest);		
		$result = $move ? $dir . ' moved to ' . $dest : $dir . ' - failed to move, try to do it manually';
		
		echo $result;
	}
	else
	{
		echo $dir . ' - nothing to move.';
	}
	
/*
	if (rename($dir, $dest) === true)
	{
		echo 'Moved ' . $dir . ' to removed' . $dir; 
	}
	else
	{
		echo 'Failed to move ' . $dir;
	}
*/
echo '<br />';

}

echo '<h3>Site symlinks</h3>';

// Create site symlinks and then display them with corresponding remote directories

foreach ($links as $link)
{
	if(!file_exists($link) && !is_link($link))
	{
		$s = symlink($target . $link , $link);
		
		if (!$s)
		{
			echo 'Symlink creation failed: ' . $link . ' -> ' . $target . $link;
		}
		else
		{
			echo $link . ' -> ' . $target . $link;
		}
		
		echo '<br />';		
	}
}

echo '<h3>Admin symlinks</h3>';

// Create admin symlinks and then display them with corresponding remote directories

foreach ($adminlinks as $adminlink)
{
	if(!file_exists($adminlink) && !is_link($adminlink))
	{
		$s = symlink($target . $adminlink , $adminlink);

		if (!$s)
		{
			echo 'Symlink creation failed: ' . $adminlink . ' -> ' . $target . $adminlink;
		}
		else
		{
			echo $adminlink . ' -> ' . $target . $adminlink;
		}
	}
	
	echo '<br />';
}


echo '<h3>Images folder</h3>';

if ($folder || $both)
{
	if (!file_exists('images'))
	{
		$rename = 'images';
		$result = 'Folder images created - images-dist renamed to images';
	}
	else
	{
		$rename = 'images-unused';
		$result = 'Folder images exists, therefore images-dist renamed to images-unused';
	}

	$move = rename('images-dist', $rename);
	
	if($move)
	{
		echo $result;
	}
	else
	{
		echo 'Failed to rename images-dist folder to ' . $rename;
	}
	
	if ($both) 
	{
		$no = '';
		$s = symlink($target . 'images' , 'images/remote');
		if (!$s)
		{
			$no = 'no ';
		}
		
		echo ' and ' . $no . 'symlink is created inside this image folder';
	}
	echo '<br />';
}
if ($sourceLink)
{
	if (!file_exists('images'))
	{
		$s = symlink($target . 'images' , 'images');
		
		if (!$s)
		{
			$creation =  'Images symlink not created, ';
		}
		else 
		{
			$creation = 'Images symlink created, ';
			rename('images-dist', 'images-unused');
			
			if (rename('images-dist', 'images-unused'))
			{
				$creation .= 'images-dist folder renamed to images-unused.';
			}
			else
			{
				$creation .= 'images-dist folder is not renamed to images-unused.';
			}
		}
	}
	else
	{
		rename('images', 'images-unused');
		if (rename('images', 'images-unused'))
		{
			$renamed = ', so renamed it as images-unused ';
		}
		else
		{
			$renamed = ' but renaming it as images-unused failed.';
		}
		
		$s = symlink($target . 'images' , 'images');
		
		if (!$s)
		{
			$creation = ', no symlink is created instead of folder';
		}
		else
		{
			$creation = ', created needed symlink instead';
		}
		echo 'Folder images already existsed' . $renamed . $creation;
		echo '<br />';
	}
}

$old = rename('index.php','index.php.old');

if (rename('index.php','index.php.old'))
{
	echo 'Initial index.php renamed to index.php.old';
}
else
{
	echo 'Failed to rename initial index.php - you should do it manually or even remove it';
}

if ($old && file_exists('index.php.old'))
{
	rename('index.php.dist', 'index.php');

	if (rename('index.php.dist','index.php'))
	{
		echo 'index.php.dist renamed to index.php - this is an original Joomla index file.';
	}
	else
	{
		echo 'Failed to rename index.php.dist - you should rename it manually to index.php as this is ann original Joomla index file';
	}
}

?>
<hr />
<h2>Further steps</h2>
<h3>Case 1 - configuration.php (existing site database)</h3>
<p>Variant 1 - if you are just converting your existing (traditional full code) Joomla site to the symlinked one then you have configuration.php in its place and there's no need to touch it. </p>
<p>Variant 2 - if this is intended to be a new directory location with existing and usable Joomla database then, as a first thing you should upload the configuration.php file with all needed database and admin credentials. Then the installer considers the site as installed and will not change anything in database.</p>
<p>When your configuration.php is ready <a href="index.php">go ahead</a>. You just have to remove the installation directory, via website (installation finished page) or file manager / ftp.</p> 
<h3>Case 2 - completely new site</h3>
<p>If your site would be completely new, open the site url and install your site like any other Joomla site.</p>
<a href="index.php">Open your site URL and proceed / finish installation</a> 
<p>After that remove or rename this remotes.php.</br>
You can also remove / rename image-unused folder if you don't use it.</p>
<p>It's strongly recommended to remove or compress the folder removed if it contains anything. Otherwise there will no space saved and inodes decreased, neither. </p>

</body>
</html>