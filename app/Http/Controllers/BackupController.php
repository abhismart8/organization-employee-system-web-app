<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BackupRepository;

class BackupController extends Controller
{
    protected $backupRepository;
    
    public function __construct(BackupRepository $backupRepository)
    {
        $this->backupRepository = $backupRepository;
    }

    public function backup(Request $request)
    {
        $file_name = $this->backupRepository->backup();
        readfile($file_name);
        unlink($file_name);
    }
}
