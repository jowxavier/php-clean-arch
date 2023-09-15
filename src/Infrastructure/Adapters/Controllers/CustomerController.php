<?php

namespace App\CleanArch\Infrastructure\Adapters\Controllers;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use App\CleanArch\UseCases\CustomerUseCase;
use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\Infrastructure\Adapters\Controllers\PresenterInterface;

final class CustomerController
{
    public function __construct(
        private Request $request,
        private Response $response,
        private CustomerUseCase $useCase
    ) {}

    public function handle(CustomerInputDto $inputDto, PresenterInterface $presenter): Response
    {
        $output = $this->useCase->handle($inputDto);

        $this->response
            ->getBody()
            ->write($presenter->output([
                'fileName' => $output->getFileName()
            ]));

        return $this->response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}