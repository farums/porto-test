<?php

declare(strict_types=1);

namespace Ship\Domain\Exception;

use Exception;
use Mezzio\ProblemDetails\Exception\ProblemDetailsExceptionInterface;

class DomainException extends Exception implements ProblemDetailsExceptionInterface {
    use TraitDomainException;

    private const STATUS = 500;
    private const CODE = 'general/server_error';
    private const TITLE = 'Execution failed.';
    private const TYPE = 'Domain';
}