<?php

namespace App\Http\Controllers\Blog;

use App\Repositories\IBlog\IDuoShuoRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DuoShuoController extends Controller
{
    protected $duoshuoRepository;

    /**
     * DuoShuoController constructor.
     * @param $duoshuoRepository
     */
    public function __construct(IDuoShuoRepository $duoshuoRepository)
    {
        $this->duoshuoRepository = $duoshuoRepository;
    }

    public function sync()
    {
        return $this->duoshuoRepository->sync();
    }
}
