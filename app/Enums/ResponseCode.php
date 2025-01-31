<?php

namespace App\Enums;

enum ResponseCode: int
{
    case Success = 200;
    case Created = 201;
    case Accepted = 202;
    case NoContent = 204;
    case BadRequest = 400;
    case Unauthorized = 401;
    case Forbidden = 403;
    case NotFound = 404;
    case MethodNotAllowed = 405;
    case ValidationError = 422; // Added for validation errors
    case InternalServerError = 500;
    case ServiceUnavailable = 503;

    /**
     * Get a textual description of the response code.
     */
    public function message(): string
    {
        return match ($this) {
            self::Success => 'Success Message',
            self::Created => 'Created',
            self::Accepted => 'Accepted',
            self::NoContent => 'No Content',
            self::BadRequest => 'Bad Request',
            self::Unauthorized => 'Unauthorized',
            self::Forbidden => 'Forbidden',
            self::NotFound => 'Not Found',
            self::MethodNotAllowed => 'Method Not Allowed',
            self::ValidationError => 'Validation Error', // Description for 422
            self::InternalServerError => 'Internal Server Error',
            self::ServiceUnavailable => 'Service Unavailable',
        };
    }
}
