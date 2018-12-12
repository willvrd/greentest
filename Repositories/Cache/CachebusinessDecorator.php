<?php

namespace Modules\Greentest\Repositories\Cache;

use Modules\Greentest\Repositories\businessRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachebusinessDecorator extends BaseCacheDecorator implements businessRepository
{
    public function __construct(businessRepository $business)
    {
        parent::__construct();
        $this->entityName = 'greentest.businesses';
        $this->repository = $business;
    }
}
