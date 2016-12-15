<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function download($id)
    {
        $filename = \App\ProjectFile::where('file_id', $id)->first()->file_name;
        $path = storage_path('app/my_files/' . $id . '/' . $filename);
        return response()->file($path);
    }

    public function initial_file_list($project_id, $element_id)
    {

        $files = \App\ProjectFile::where('project_id', $project_id)->where('element_id', $element_id)->get();

        $initial_files = [];

        foreach ($files as $file) {
            $file_size = filesize(storage_path('app/my_files/' . $file->file_id . '/' . $file->file_name));
            $file = [
                "success" => true,
                "uuid" => $file->file_id,
                "name" => $file->file_name,
                "size" => $file_size
            ];
            $initial_files[] = $file;
        }
        return response()->json($initial_files);
    }
}
