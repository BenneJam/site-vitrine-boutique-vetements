<?php
class Request
{
    private array $get;
    private array $post;
    private array $server;
    private string $method;
    private string $action;

    // Constructeur de la classe
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->action = $_GET["action"] ?? "index";
    }

    // Méthodes de récupération de paramètres
    public function get($key, $default = null): mixed
    {
        return $this->get[$key] ?? $default;
    }

    public function post($key, $default = null): mixed
    {
        return $this->post[$key] ?? $default;
    }

    public function allPost(): array
    {
        return $this->post;
    }

    public function allGet(): array
    {
        return $this->get;
    }

    // Méthodes de vérification du type de requête

    public function isPost(): bool
    {
        return $this->method === "POST";
    }

    public function isGet(): bool
    {
        return $this->method === "GET";
    }

    // Méthodes d'information sur la requête

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function has($key): bool
    {
        return isset($this->get[$key]) or isset($this->post[$key]);
    }

    // Méthodes utilitaires

    public function getURL(): string
    {
        return substr(strtolower($this->server["SERVER_PROTOCOL"]), 0, -4)
            . "://"
            . $this->server["SERVER_NAME"]
            . $this->server["REQUEST_URI"];
    }

    public function getClientIp(): mixed
    {
        return $this->server["REMOTE_ADDR"] ?? "unknow";
    }
}
