<?php

namespace Libraries\Response;

require_once "Errors.php";


use Libraries\Errors\Errors;

class Response
{
    private bool $success;
    private $errors;
    private $data;

    /**
     * Response constructor.
     * @param bool $success
     * @param Errors|null $errors
     * @param null $data
     */
    function __construct(bool $success = false, Errors $errors = null, $data = null)
    {
        $this->success = $success;
        $this->errors = $errors;
        $this->data = $data;
    }

    function toJson()
    {
        header('Content-Type: application/json; charset=utf-8');
        exit(json_encode([
            "success" => $this->success,
            "errors" => $this->errors,
            "data" => $this->data,
        ]));
    }

    public function toArray()
    {
        return array(
            "success" => $this->success,
            "errors" => $this->errors,
            "data" => $this->data,
        );
    }

    public function getData()
    {
        return $this->data;
    }

    public function getStatus(): bool
    {
        return $this->success;
    }

    public function getErrors(): Errors
    {
        return $this->errors;
    }

    public function setData($data): Response
    {
        $this->data = $data;
        return $this;
    }

    public function setErrors(array $errors): Response
    {
        $this->errors = $errors;
        return $this;
    }

    public function setStatus(bool $status): Response
    {
        $this->success = $status;
        return $this;
    }
}