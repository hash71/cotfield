<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class FileController extends Controller
{
    public function download($id)
    {

        $filename = \App\ProjectFile::where('file_id', $id)->first()->file_name;

        $content = Storage::disk('s3')->get('cotfield/' . $id . '/' . $filename);

        $mime = Storage::disk('s3')->mimeType('cotfield/' . $id . '/' . $filename);

        return response($content, 200, [
            'Content-Type' => $mime,
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "inline; filename={$filename}",
            'Content-Transfer-Encoding' => 'binary',
        ]);
    }

    public function initial_file_list($project_id, $element_id)
    {

        $files = \App\ProjectFile::where('project_id', $project_id)->where('element_id', $element_id)->get();

        $initial_files = [];

        foreach ($files as $file) {
            $file_size = Storage::disk('s3')->size('cotfield/' . $file->file_id . '/' . $file->file_name);
            $file = [
                "success" => true,
                "uuid" => $file->file_id,
                "name" => $file->file_name,
                "size" => $file_size,
                "select_id" => $element_id
            ];
            $initial_files[] = $file;
        }
        return response()->json($initial_files);
    }
}
