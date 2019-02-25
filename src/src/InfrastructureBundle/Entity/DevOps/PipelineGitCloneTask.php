<?php

namespace InfrastructureBundle\Entity\DevOps;

use DomainBundle\Entity\DevOps\PipelineTaskInterface;
use GuzzleHttp\Client;

class PipelineGitCloneTask implements PipelineTaskInterface
{
    /** @var Client $httpClient */
    private $httpClient;
    /** @var array $pipelineConfig */
    private $pipelineConfig;

    /**
     * PipelineGitCloneTask constructor.
     * @param Client $httpClient
     * @param array $pipelineConfig
     */
    public function __construct(
        Client $httpClient,
        array $pipelineConfig
    ) {
        $this->httpClient = $httpClient;
        $this->pipelineConfig = $pipelineConfig;
    }

    /**
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute(): int
    {
        $response = $this->httpClient->request(
            'POST',
            'https://dev.azure.com/'
            . $this->pipelineConfig['organisation']
            . '/'
            . $this->pipelineConfig['project']
            . '/_apis/build/builds?ignoreWarnings='
            . $this->pipelineConfig['ignoreWarnings']
            . '&checkInTicket='
            . $this->pipelineConfig['checkInTicket']
            . 'sourceBuildId='
            . $this->pipelineConfig['sourceBuildId']
            . '&api-version=5.0'
        );

        return $response->getStatusCode() === 200 ? 0 : $response->getStatusCode();
    }
}
