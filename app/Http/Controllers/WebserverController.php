<?php

namespace App\Http\Controllers;

use App\Webserver;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\WebserverService;

class WebserverController extends Controller
{
    use ApiResponser;
    /**
     * The service to consume the Webservers microservice
     * @var WebserverService
     */
    public $webserverService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WebserverService $webserverService)
    {
        $this->webserverService = $webserverService;
    }
    /**
     * Return the list of webservers
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->webserverService->obtainWebservers());
    }
    /**
     * Create one new webserver
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->webserverService->createWebserver($request->all(), Response::HTTP_CREATED));
    }
    /**
     * Obtains and show one webserver
     * @return Illuminate\Http\Response
     */
    public function show($webserver)
    {
        return $this->successResponse($this->webserverService->obtainWebserver($webserver));
    }
    /**
     * Update an existing webserver
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $webserver)
    {
        return $this->successResponse($this->webserverService->editWebserver($request->all(), $webserver));
    }
    /**
     * Remove an existing webserver
     * @return Illuminate\Http\Response
     */
    public function destroy($webserver)
    {
        return $this->successResponse($this->webserverService->deleteWebserver($webserver));
    }
}