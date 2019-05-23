<?php

namespace Signifly\Responder\Responses;

use Illuminate\Support\Collection;

class CollectionResponse extends Response
{
    /** @var \Illuminate\Support\Collection */
    protected $collection;

    /** @var string */
    protected $resourceClass;

    public function __construct(Collection $collection, ?string $resourceClass = null)
    {
        $this->collection = $collection;
        $this->resourceClass = $resourceClass;
    }

    public function toResponse($request)
    {
        if (empty($this->resourceClass)) {
            return $this->collection;
        }

        return $this->resourceClass::collection($this->collection)
            ->toResponse($request);
    }
}
