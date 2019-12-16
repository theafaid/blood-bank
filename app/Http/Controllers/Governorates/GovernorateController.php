<?php

namespace App\Http\Controllers\Governorates;

use App\Models\Governorate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Governorates\GovernorateStoreRequest;
use App\Repositories\Contracts\GovernorateRepositoryInterface;

class GovernorateController extends Controller
{
    /**
     * GovernorateController constructor.
     * @param GovernorateRepositoryInterface $governorates
     */
    public function __construct(GovernorateRepositoryInterface $governorates)
    {
        $this->governorates = $governorates;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('governorates.index', [
            'governorates' => $this->governorates->all()
        ]);
    }

    /**
     * @param GovernorateStoreRequest $request
     * @return mixed
     */
    public function store(GovernorateStoreRequest $request)
    {
        return $this->governorates->store($request->validated());
    }

    /**
     * @param Governorate $governorate
     * @param GovernorateStoreRequest $request
     * @return Governorate|null
     */
    public function update(Governorate $governorate, GovernorateStoreRequest $request)
    {
        $this->governorates->update($governorate, $request->validated());

        return $governorate->fresh();
    }

    /**
     * @param Governorate $governorate
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Governorate $governorate)
    {
        $governorate->delete();
        return response([], 204);
    }
}
