# Project Prompt

This project is a modular, multi-tenant food delivery and wellness platform. It supports users, stores (vendors), and riders, each with their own app, all connected via a centralized Laravel backend. The system is designed for scalability, multi-language support, and easy feature expansion.

## Domain
- Food subscription and delivery
- Wellness and fitness coaching (region-specific)
- Multi-region (e.g., India, UAE), multi-language

## Features
- User subscriptions and order management
- Store/vendor management (menu, staff, earnings, orders)
- Rider/delivery management (assigned deliveries, earnings)
- Admin dashboard for platform management
- Multi-language and localization
- Responsive web and mobile interfaces
- Analytics and reporting

## Architecture
- **Backend:** Laravel (PHP), RESTful APIs, Eloquent ORM, Blade templates
- **Frontend:** Ionic/Angular for mobile/web apps (User, Store, Rider)
- **Database:** MySQL/MariaDB
- **Assets:** Bootstrap, custom CSS/JS, AOS, icons
- **Localization:** PHP language files for multiple languages and domains

## Codebase Structure
- `/local`: Laravel app (models, controllers, routes, views, language files)
- `/assets`: CSS, JS, images, vendor libraries
- `/upload`: Uploaded files (e.g., language icons)
- `/admin.png`, `/favicon.ico`, etc.: Static assets

## Libraries & Dependencies
- Laravel, Composer (backend)
- Bootstrap, AOS, Bootstrap Icons, Boxicons (frontend)
- TinyMCE, Google Charts, Chart.js (analytics, rich text)
- Ionic/Angular, Capacitor (mobile/web apps)
- PHPUnit, Jasmine/Karma (testing)