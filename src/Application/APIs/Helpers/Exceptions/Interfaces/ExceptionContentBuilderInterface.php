<?php

namespace App\Application\APIs\Helpers\Exceptions\Interfaces;

use App\Application\APIs\Helpers\Exceptions\ExceptionContent;

interface ExceptionContentBuilderInterface
{
    /**
     * @param string $message
     * @param int $code
     *
     * @return array
     */
    public function build(string $message, int $code): ExceptionContent;
}