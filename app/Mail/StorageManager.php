<?php

namespace App\Mail;

use Storage;

final class StorageManager{

	public const $storageRoot = storage_path();
	private const $maximumFilesize = 14e4;
	private $totalFilesize = 0;


    public static function saveFile($file) {

	    $name = $file->getClientOriginalName();
	    $extension = $file->getClientOriginalExtension();
	    $file->move($this->storageRoot.'/arc/', $name . '.' . $extension);
	    $savedFilePath = $this->storageRoot.'/arc/' . $name . '.' . $extension;
	    return $savedFilePath;
    
    }

    public static function findFile($fileName){

    	return Storage::get($fileName);

    }

    public static function deleteFile($filename){

    	return Storage::delete($fileName);

    }

    public static function fileExists($fileName) {

	    //$oContenidos = Storage::get($fileName);
	    return $exists = Storage::disk('local')->exists($fileName);

    }



	public static function deleteFiles($filePaths) {

        foreach ($filePaths as $path) {
            $cutPath = str_replace($storageRoot, '', $path);
            $this->deleteFile($cutPath);
        }
        return true;
        
    }

   
    public static function compressFiles($filePaths) {

	    $zipfilePath = $this->storageRoot . '/zips/' . Str::random(6) . '.zip';
	    Zipper::make($zipfilePath)->add($filePaths)->close();
	    return $zipfilePath;

    }


}