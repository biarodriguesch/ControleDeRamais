<?php

abstract class RouteSwitch
{
    public function index()
    {
        require  __DIR__ . '/pages/index.html';
    }

    public function ramais()
    {
        require  __DIR__ . '/pages/ramais.html';
    }

    public function funcionarios()
    {
        require  __DIR__ . '/pages/funcionarios.html';
    }
    
    public function cadastro()
    {
        require  __DIR__ . '/pages/cadastro-ramal.html';
    }
    public function __call($name, $arguments)
    {
        http_response_code(404);
        require __DIR__ . '/pages/not-found.html';
    }
}