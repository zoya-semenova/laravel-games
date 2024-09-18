<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class QueryFilter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value) {
            $method = Str::camel($field);
            if (method_exists($this, $method)) {
                call_user_func([$this, $method], $value);
            }
        }
    }

    /**
     * @return array
     */
    protected function fields(): array
    {
        return array_filter(
            array_map(function ($field) {
                if (is_array($field)) {
                    foreach ($field as &$val) {
                        $val = trim($val);
                    }
                    return $field;
                }
            }, $this->request->all()));
    }
}
