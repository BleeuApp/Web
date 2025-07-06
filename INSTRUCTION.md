# Development Instructions

## Setup
1. Clone the repository.
2. Install backend dependencies:  
   `composer install`
3. Install frontend dependencies (if modifying Ionic apps):  
   `npm install` (in each app directory)
4. Copy `.env.example` to `.env` and configure environment variables.
5. Run database migrations:  
   `php artisan migrate`
6. Start the Laravel server:  
   `php artisan serve`
7. For frontend apps, run:  
   `ionic serve`

## Coding Standards
- Follow PSR-12 for PHP.
- Use Angular/Ionic best practices for frontend.
- Write clear, maintainable, and well-documented code.
- Use language files for all user-facing text.

## Contribution
- Use feature branches for new features.
- Submit pull requests with clear descriptions.
- Write and update unit/integration tests.
- Document new features and changes in PROMPT.md.

## Testing
- Backend: `php artisan test`
- Frontend: `npm run test` (in each app directory)