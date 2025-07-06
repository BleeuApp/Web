# Modes

## Development Mode
- Debugging enabled
- Hot reloading for frontend
- Verbose logging
- Use `.env` with `APP_DEBUG=true`

## Production Mode
- Optimized builds
- Caching enabled
- Error reporting disabled
- Use `.env` with `APP_DEBUG=false`

## Maintenance Mode
- Application temporarily unavailable for users
- Use Laravel's `php artisan down` and `php artisan up`