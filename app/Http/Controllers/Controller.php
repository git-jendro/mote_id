<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function slug($param)
    {
        return Str::slug($param);
    }

    public function storage($param1, $param2)
    {
        return Storage::put($param1, $param2);
    }

    public function deleteFile($param)
    {
        return Storage::delete($param);
    }

    function generateUUID()
    {
        return Uuid::uuid4()->toString();
    }
}
