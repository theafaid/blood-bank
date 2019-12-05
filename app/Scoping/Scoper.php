<?php

namespace App\Scoping;

use Illuminate\Http\Request;
use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class Scoper
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Scoper constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     * @param array $scopes
     * @return Builder
     */
    public function apply(Builder $builder, array $scopes)
    {
        foreach($scopes as $key => $scope) {
            if(!$this->scoped($key, $scope)) continue;

            $scope->apply($builder, $this->request->get($key));
        }

        return $builder;
    }

    /**
     * @param $key
     * @param $scope
     * @return bool
     */
    protected function scoped($key, $scope)
    {
        // & key !== page
        return $scope instanceof Scope && $this->request->has($key);
    }
}
