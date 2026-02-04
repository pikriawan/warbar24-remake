# Warteg Bahari 24
Online menu ordering website made with Laravel 12
## Features
- Admin dashboard
- Menu management
- Order management
- Menu searching and filtering
- Cart system
- Checkout system
- Order history
- No login required for customers
## Screenshots
### Landing Page
![Landing Page](https://raw.githubusercontent.com/pikriawan/warbar24-remake/refs/heads/main/public/images/landing-page-screenshot.png)
### Menus Page
![Menus Page](https://raw.githubusercontent.com/pikriawan/warbar24-remake/refs/heads/main/public/images/menus-page-screenshot.png)
### Cart Page
![Cart Page](https://raw.githubusercontent.com/pikriawan/warbar24-remake/refs/heads/main/public/images/cart-page-screenshot.png)
## Installation
Clone this repository
```bash
git clone https://github.com/pikriawan/warteg-bahari-24.git
```
Run composer setup
```bash
cd warteg-bahari-24
composer run setup
```
Link the storage
```bash
php artisan storage:link
```
Migrate and seed database
```bash
php artisan migrate:fresh --seed
```
Run the website
```bash
composer run dev
```
Open http://localhost:8000 on your web browser
> [!Note]
> To access admin page, open http://localhost:8000/admin/login. The default username is `admin`. The default password is `admin123`.
