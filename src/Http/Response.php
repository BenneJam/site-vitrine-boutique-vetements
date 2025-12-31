<?php

class Response
{
    private int $statusCode;
    private array $headers;
    private string $body;
    private string $contentType;
    private string $charset;

    // Constructeur de la classe
    public function __construct()
    {
        $this->statusCode = 200;
        $this->headers = [];
        $this->body = "";
        $this->contentType = "text/html";
        $this->charset = "UTF-8";
    }

    // Méthodes de configuration de base
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
        return $this;
    }

    public function setHeader(string $name, string $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    // Méthodes de récupération

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getHeader(string $name): string
    {
        return $this->headers[$name] ?? null;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    // Méthodes spécialisées

    public function redirect(string $url, int $statusCode = 302)
    {
        $this->statusCode = $statusCode;

        // Try to send a Location header if possible
        if (!headers_sent()) {
            header("Location: $url", true, $statusCode);
        }

        // Always set a fallback body (meta refresh + JS) so the client is redirected
        $escaped = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
        $this->body = "<!doctype html><html><head><meta http-equiv=\"refresh\" content=\"0;url={$escaped}\" />"
            . "<script>window.location.replace('{$escaped}');</script></head><body></body></html>";

        return $this;
    }

    public function view($templatePath, $data = [], $statusCode = 200)
    {
        $this->statusCode = $statusCode;
        extract($data);
        ob_start();
        require $templatePath;
        $this->body = ob_get_clean();
        return $this;
    }

    public function error(string $message, $statusCode = 500)
    {
        $this->statusCode = $statusCode;
        $this->body = $message;
        return $this;
    }

    public function success(string $message, $statusCode = 200)
    {
        $this->statusCode = $statusCode;
        $this->body = $message;
        return $this;
    }

    // Méthode d'envoi

    public function send()
    {
        // Envoi du code de statut HTTP
        http_response_code($this->statusCode);

        // Envoi du Content-Type
        header("Content-Type: {$this->contentType}; charset={$this->charset}");

        // Envoi des autres headers
        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }

        // Affichage du corps
        echo $this->body;
        return $this;
    }

    // Méthodes statiques (optionnelles)

    public static function redirectTo(string $url, int $statusCode = 302) {}

    public static function errorResponse(string $message, int $statusCode = 500) {}
}
