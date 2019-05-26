<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class WebserverService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the webservers service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the webservers service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.webservers.base_uri');
        $this->secret = config('services.webservers.secret');
    }

    /**
     * Obtain the full list of webserver from the webserver service
     * @return string
     */
    public function obtainWebservers()
    {
        return $this->performRequest('GET', '/webservers');
    }

    /**
     * Create one webserver using the webserver service
     * @return string
     */
    public function createWebserver($data)
    {
        return $this->performRequest('POST', '/webservers', $data);
    }

    /**
     * Obtain one single webserver from the webserver service
     * @return string
     */
    public function obtainWebserver($webserver)
    {
        return $this->performRequest('GET', "/webservers/{$webserver}");
    }

    /**
     * Update an instance of webserver using the webserver service
     * @return string
     */
    public function editWebserver($data, $webserver)
    {
        return $this->performRequest('PUT', "/webservers/{$webserver}", $data);
    }
    
    /**
     * Remove a single webserver using the webserver service
     * @return string
     */
    public function deleteWebserver($webserver)
    {
        return $this->performRequest('DELETE', "/webservers/{$webserver}");
    }
}