<?php

namespace App\Http\Controllers\Governorates;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\GovernorateRepositoryInterface;

class GovernorateController extends Controller
{
    public function index()
    {
        return view('governorates.index', [
            'governorates' => resolve(GovernorateRepositoryInterface::class)->all()
        ]);
    }
}
