# Submissions API

## Setup

1. Clone the repository.
2. Run `composer install`.
3. Create a `.env` file and configure your database settings.
4. Run `php artisan migrate`.

## Testing the API

To test the `/submit` endpoint, send a `POST` request with the following JSON payload:
```json
{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}
