<?php

namespace App\Dto\CarModels;

use App\Dto\AbstractDto;

readonly class CarBrandModelNamesDto extends AbstractDto
{
    public function __construct(
        protected int $brandId,
        protected int $modelId,
        protected string $brand,
        protected string $model,
    )
    {
    }
}
