<?php

/* start of functions */

function console_has_option($opcion) {
  global $argv;
  array_shift($argv);
  
  return array_search($opcion, $argv) !== false;
}

function config_get_option($option) {
  global $config;

  if (array_key_exists($option, $config))
    return $config[$option];
  else
    return null;
}

function read_from_keyboard($msg) {
  echo $msg;
  $var = fgets(STDIN);

  return trim($var);
}

function echoln($msg) {
  echo $msg . "\n";
}

function system_call($command) {
  system($command, $res);
  if ($res)
    die("\nCannot perform command '$command' for some reason. Aborting.\n\n");
}

function copy_or_die($from, $to) {
  copy($from, $to) or die(sprintf("Can't copy '%s' to '%s' for some reason. Aborting.\n\n", $from, $to));
}

function mkdir_or_die($dir) {
  mkdir($dir, 0775, true) or die(sprintf("Can't create directory '%s' for some reason. Aborting.\n\n", $dir));
}

function replace_in_file($search, $replace, $file) {
  $content = file_get_contents($file);

  if (!$content)
    die("Cannot read file '" . $file . "' for processing. Aborting.\n\n");

  $content = str_replace($search, $replace, $content);

  $bytes = file_put_contents($file, $content);

  if (false === $bytes)
    die("Cannot write to file '" . $file . "'. Aborting.\n\n");
}

/**
* Copy a file, or recursively copy a folder and its contents
*
* @author Aidan Lister <aidan@php.net>
* @version 1.0.1
* @link http://aidanlister.com/2004/04/recursively-copying-directories-in-php/
* @param string $source Source path
* @param string $dest Destination path
* @return bool Returns TRUE on success, FALSE on failure
*/
function copyr($source, $dest) {
  
  // Check for symlinks
  if (is_link($source)) {
    return symlink(readlink($source), $dest);
  }
  
  // Simple copy for a file
  if (is_file($source)) {
    return copy_or_die($source, $dest);
  }

  // Make destination directory
  if (!is_dir($dest)) {
    mkdir_or_die($dest);
  }

  // Loop through the folder
  $dir = dir($source);
  while (false !== $entry = $dir->read()) {
    // Skip pointers
    if ($entry == '.' || $entry == '..') {
      continue;
    }

    // Deep copy directories
    copyr("$source/$entry", "$dest/$entry");
  }

  // Clean up
  $dir->close();
  return true;
}

function deleter($directory, $empty=FALSE)
{
    // if the path has a slash at the end we remove it here
    if(substr($directory,-1) == '/')
    {
        $directory = substr($directory,0,-1);
    }

    // if the path is not valid or is not a directory ...
    if(!file_exists($directory) || !is_dir($directory))
    {
        // ... we return false and exit the function
        return FALSE;

    // ... if the path is not readable
    }elseif(!is_readable($directory))
    {
        // ... we return false and exit the function
        return FALSE;

    // ... else if the path is readable
    }else{

        // we open the directory
        $handle = opendir($directory);

        // and scan through the items inside
        while (FALSE !== ($item = readdir($handle)))
        {
            // if the filepointer is not the current directory
            // or the parent directory
            if($item != '.' && $item != '..')
            {
                // we build the new path to delete
                $path = $directory.'/'.$item;

                // if the new path is a directory
                if(is_dir($path)) 
                {
                    // we call this function with the new path
                    recursive_remove_directory($path);

                // if the new path is a file
                }else{
                    // we remove the file
                    unlink($path);
                }
            }
        }
        // close the directory
        closedir($handle);

        // if the option to empty is not set to true
        if($empty == FALSE)
        {
            // try to delete the now empty directory
            if(!rmdir($directory))
            {
                // return false if not possible
                return FALSE;
            }
        }
        // return success
        return TRUE;
    }
}