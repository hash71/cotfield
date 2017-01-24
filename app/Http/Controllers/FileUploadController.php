<?php

namespace App\Http\Controllers;

use App\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {

        /**
         * PHP Server-Side Example for Fine Uploader (traditional endpoint handler).
         * Maintained by Widen Enterprises.
         *
         * This example:
         *  - handles chunked and non-chunked requests
         *  - supports the concurrent chunking feature
         *  - assumes all upload requests are multipart encoded
         *  - supports the delete file feature
         *
         * Follow these steps to get up and running with Fine Uploader in a PHP environment:
         *
         * 1. Setup your client-side code, as documented on http://docs.fineuploader.com.
         *
         * 2. Copy this file and UploadHandler.php to your server.
         *
         * 3. Ensure your php.ini file contains appropriate values for
         *    max_input_time, upload_max_filesize and post_max_size.
         *
         * 4. Ensure your "chunks" and "files" folders exist and are writable.
         *    "chunks" is only needed if you have enabled the chunking feature client-side.
         *
         * 5. If you have chunking enabled in Fine Uploader, you MUST set a value for the `chunking.success.endpoint` option.
         *    This will be called by Fine Uploader when all chunks for a file have been successfully uploaded, triggering the
         *    PHP server to combine all parts into one file. This is particularly useful for the concurrent chunking feature,
         *    but is now required in all cases if you are making use of this PHP example.
         */

// Include the upload handler class
        $uploader = new UploadHandler();
// Specify the list of valid extensions, ex. array("jpeg", "xml", "bmp")
        $uploader->allowedExtensions = ['pdf', 'docx', 'doc', 'xlsx', 'xls', 'ppt', 'pptx', 'csv']; // all files types allowed by default
// Specify max file size in bytes.
        $uploader->sizeLimit = 15728640;
// Specify the input name set in the javascript.
        $uploader->inputName = "qqfile"; // matches Fine Uploader's default inputName value by default
// If you want to use the chunking/resume feature, specify the folder to temporarily save parts.
        $uploader->chunksFolder = "chunks";

        $method = $_SERVER["REQUEST_METHOD"];

        if ($method == "POST") {
            header("Content-Type: text/plain");
            // Assumes you have a chunking.success.endpoint set to point here with a query parameter of "done".
            // For example: /myserver/handlers/endpoint.php?done
            if (isset($_GET["done"])) {
                $result = $uploader->combineChunks("../storage/app/my_files");
            } // Handles upload requests
            else {
                // Call handleUpload() with the name of the folder, relative to PHP's getcwd()
                $result = $uploader->handleUpload('../storage/app/my_files');
                // To return a name used for uploaded file you can use the following line.
                $result["uploadName"] = $uploader->getUploadName();
            }
            $this->store();
            echo json_encode($result);
        } // for delete file requests
        else if ($method == "DELETE") {
            $result = $uploader->handleDelete("../storage/app/my_files");
            $this->remove($result);
            echo json_encode($result);
        } else {
            header("HTTP/1.0 405 Method Not Allowed");
        }
    }

    public function store()
    {
        $input = Input::get();
        ProjectFile::create([
            'project_id' => $input['project_id'],
            'element_id' => $input['element_id'],
            'file_id' => $input['qquuid'],
            'file_name' => $input['qqfilename']
        ]);
    }

    public function remove($result)
    {
        if ($result['success']) {
            ProjectFile::where('file_id', $result['uuid'])->delete();
        }
    }
}
