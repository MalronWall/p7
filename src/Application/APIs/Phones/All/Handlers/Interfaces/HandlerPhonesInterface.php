<?php

namespace App\Application\APIs\Phones\All\Handlers\Interfaces;

use App\Application\APIs\Interfaces\HandlerInterface;
use App\Application\APIs\Interfaces\InputFiltersInterface;
use Symfony\Component\HttpFoundation\Request;

interface HandlerPhonesInterface extends HandlerInterface
{
    /**
     * @param Request $request
     * @param array|null $params
     *
     * @return InputFiltersInterface
     */
    public function handle(Request $request, ?array $params = []): InputFiltersInterface;
}
