# Laracms - Modular Laravel Content Management System

A powerful, flexible, and modular Content Management System built on Laravel 8, designed for developers who need a scalable solution for managing diverse content types, custom fields, and business modules.

---

## 🚀 Features

### Core CMS Capabilities
- **Post Management** - Create, edit, and manage posts with rich content editing
- **Category System** - Hierarchical categorization for content organization
- **Media Management** - Built-in media manager with upload, library, and organization features
- **Custom Post Fields** - Dynamically add custom fields to any post type for flexible content structure
- **Post Meta Data** - Store and retrieve additional metadata for posts
- **Terms & Taxonomy** - Advanced categorization system with taxonomy support
- **Content Templates** - Multiple template support for different content types

### Backend Features
- **Role-Based Access Control (RBAC)** - Granular permission management with custom roles
- **User Management** - Complete user administration with profile customization
  - User profiles with avatar support
  - Demographic information (address, district, thana, postcode)
  - Contact details (phone, email)
  - User roles and permissions
- **Route Management** - Dynamic route group management with permission mapping
- **Backend Dashboard** - Comprehensive admin interface for content and system management

### Frontend Capabilities
- **Responsive Theme System** - Multiple theme support (default theme included)
- **Frontend Controllers** - Dedicated controllers for public-facing content
- **Asset Management** - CSS, JavaScript, and image assets organization
- **Dynamic Template Loading** - Template engine for dynamic content rendering

### Modular Architecture
- **Accounting Module** - Financial and accounting functionality
- **Inventory Module** - Stock and inventory management
- **Extensible Module System** - Easy to add new modules for custom business logic

### Advanced Features
- **Database Migrations** - Version-controlled database schema management
- **Database Seeders** - Easy data population for development and testing
- **Authentication & Authorization** - Built-in Laravel authentication with custom role system
- **API Support** - RESTful API endpoints for third-party integrations
- **CORS Support** - Cross-Origin Resource Sharing enabled
- **Helper Classes** - Rich utility functions:
  - Media Manager helper
  - Custom post field handling
  - Core utility functions
  - Query builder helpers
  - Navigation menu generation
  - Component system
  - Button set configuration
  - Datatable helpers
  - NavMenu generation

---

## 📋 Requirements

- **PHP**: 7.3+ or 8.0+
- **Laravel**: 8.x
- **Web Server**: Apache/Nginx with URL rewriting support
- **Database**: MySQL/MariaDB (or any Laravel-supported database)
- **Composer**: PHP dependency manager

---

## ⚙️ Installation

### 1. Clone or Download the Project
```bash
git clone <repository-url> laracms
cd laracms/application
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

Update your `.env` file with:
```env
APP_NAME="Laracms"
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laracms
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Database Setup
```bash
php artisan migrate
php artisan db:seed
```

### 5. Build Assets (if using Mix)
```bash
npm run dev      # Development
npm run production # Production
```

### 6. Start Development Server
```bash
php artisan serve
```

Access the application at `http://localhost:8000`

---

## 🏗️ Project Structure

```
laracms/
├── application/                    # Laravel application root
│   ├── app/
│   │   ├── Console/               # Artisan commands
│   │   ├── CustomClass/           # Custom utility classes (MediaManager)
│   │   ├── Exceptions/            # Exception handlers
│   │   ├── Helpers/               # Helper functions & classes
│   │   ├── Http/
│   │   │   ├── Controllers/       # Application controllers
│   │   │   ├── Kernel.php         # HTTP middleware
│   │   │   ├── Middleware/        # Custom middleware
│   │   │   └── Traits/            # Reusable traits
│   │   ├── Models/                # Eloquent models
│   │   │   ├── Post.php
│   │   │   ├── Category.php
│   │   │   ├── Media.php
│   │   │   ├── User.php
│   │   │   ├── Role.php
│   │   │   ├── CustomPostField.php
│   │   │   └── ...
│   │   └── Providers/             # Service providers
│   │
│   ├── config/                    # Configuration files
│   │   ├── app.php
│   │   ├── auth.php
│   │   ├── database.php
│   │   ├── filesystems.php
│   │   └── ...
│   │
│   ├── database/
│   │   ├── migrations/            # Database migrations
│   │   ├── seeders/               # Database seeders
│   │   └── factories/             # Model factories
│   │
│   ├── routes/
│   │   ├── web.php                # Web routes
│   │   ├── api.php                # API routes
│   │   ├── backend/               # Backend routes
│   │   ├── frontend/              # Frontend routes
│   │   └── module.php             # Module routes
│   │
│   ├── resources/
│   │   ├── views/                 # Blade templates
│   │   ├── css/                   # Stylesheets
│   │   ├── js/                    # JavaScript files
│   │   ├── lang/                  # Language files
│   │   └── sass/                  # SASS files
│   │
│   ├── storage/                   # File storage (logs, cache)
│   ├── tests/                     # Unit & feature tests
│   ├── public/                    # Public assets
│   ├── bootstrap/                 # Bootstrap configuration
│   ├── vendor/                    # Composer dependencies
│   └── ...
│
├── public/                        # Public directory (frontend)
│   ├── backend/                   # Backend assets
│   ├── uploads/                   # User uploaded files
│   ├── css/                       # Frontend styles
│   ├── js/                        # Frontend scripts
│   ├── images/                    # Static images
│   ├── themes/                    # Frontend themes
│   └── vendor/                    # Frontend dependencies
│
└── html/                          # Static HTML templates
    ├── header.php
    ├── footer.php
    ├── index.php
    └── page.php
```

---

## 🔌 Main Models

| Model | Purpose |
|-------|---------|
| **Post** | Core content model with categories, metadata, and custom fields |
| **Category** | Content categorization and organization |
| **Media** | Media file management and metadata |
| **User** | User authentication and profile management |
| **Role** | Role definition and permission mapping |
| **Roleuser** | User-role association |
| **PostCustomField** | Custom field definitions for posts |
| **PostField** | Field values for custom post fields |
| **PostMeta** | Additional metadata for posts |
| **Term** | Taxonomy term management |
| **TermTaxonomy** | Taxonomy classification |
| **Routegroup** | Route grouping for menu organization |
| **Routelist** | Individual route definitions |
| **Routelistrole** | Route permission mapping |

---

## 🎯 Key Functionalities

### Media Management
- Upload media directly from the backend
- Maintain a media library
- Select media for posts with single or multiple selection
- Organize media with metadata

### Custom Post Fields
- Define custom field types dynamically
- Attach fields to specific post types or globally
- Support for various field types (text, textarea, select, etc.)
- Store and retrieve custom field values

### User Roles & Permissions
- Create custom roles with granular permissions
- Assign multiple roles to users
- Control backend access based on roles
- Route-level permission management

### Dynamic Content Templates
- Support multiple templates per content type
- Load custom fields based on template selection
- Organize templates by theme

### Modular Expansion
- Dedicated module directories (Accounting, Inventory)
- Isolated module namespacing via PSR-4 autoloading
- Easy to create new business-specific modules

---

## 🔧 Configuration Files

Key configuration files to customize:

- `config/app.php` - Application name, timezone, locale
- `config/auth.php` - Authentication guards and providers
- `config/database.php` - Database connections
- `config/filesystems.php` - File storage configuration
- `config/mail.php` - Email services
- `config/session.php` - Session configuration

---

## 📡 API Routes

Base API endpoint: `/api/`

Current API routes support authentication:
- `/api/user` - Get authenticated user details (requires auth:api middleware)

Extend API routes in `routes/api.php` for custom endpoints.

---

## 🧪 Testing

Run tests with PHPUnit:

```bash
php artisan test
php artisan test --testsuite=Unit
php artisan test --testsuite=Feature
```

Tests are located in `tests/` directory with Unit and Feature test suites.

---

## 📦 Dependencies

Key dependencies included:

- **Laravel Framework 8.x** - Core application framework
- **Laravel UI 3.4+** - Authentication scaffolding
- **Guzzle HTTP** - HTTP client
- **Laravel CORS** - Cross-Origin Resource Sharing
- **Laravel Tinker** - Interactive shell
- **PHPUnit** - Testing framework
- **Faker** - Database seeding data generation

Full dependencies available in `composer.json`

---

## 🔐 Security Features

- **CSRF Protection** - Built-in CSRF token protection on forms
- **Role-Based Access Control** - Granular permission management
- **Password Encryption** - Secure password hashing (bcrypt)
- **Email Verification** - Optional email verification support
- **CORS Configuration** - Configurable cross-origin requests
- **Environment Configuration** - Sensitive data stored in `.env`

---

## 📝 Common Tasks

### Create a New Post
1. Navigate to Backend → Posts
2. Fill in post details (title, description, category)
3. Add custom fields as needed
4. Attach featured image via Media Manager
5. Set SEO metadata (title, description, keywords)
6. Publish

### Add a Custom Field
1. Navigate to Backend → Post Fields
2. Define field name, type, and default value
3. Select post types to attach
4. Configure field validation rules
5. Save

### Create a New Role
1. Navigate to Backend → Roles
2. Enter role name and description
3. Assign specific routes/permissions
4. Save

### Add a New Module
1. Create module directory in `application/module/YourModule/`
2. Register module routes in `routes/module.php`
3. Create module controllers, models, and views
4. Define module service provider

---

## 🚀 Deployment

### Production Checklist
```bash
# Set environment to production
APP_DEBUG=false
APP_ENV=production

# Generate key (if not done)
php artisan key:generate

# Cache configuration and routes
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Install production dependencies
composer install --optimize-autoloader --no-dev

# Run migrations
php artisan migrate --force
```

---

## 📚 Development Tips

1. **Use Artisan Commands**
   ```bash
   php artisan make:model YourModel -m  # Create model with migration
   php artisan make:controller YourController
   php artisan make:migration create_your_table
   ```

2. **Leverage Helpers** - Use built-in helpers in `app/Helpers/`
   - `Core::templateDir()` - Get template directory
   - `Core::customFieldFile()` - Load custom field files
   - `MediaManager::media()` - Render media selection UI

3. **Use Route Caching** - For better performance in production
   ```bash
   php artisan route:cache
   ```

4. **Database Seeding** - Populate test data
   ```bash
   php artisan db:seed
   ```

---

## 🤝 Contributing

Contributions are welcome! Please follow Laravel conventions and include tests for new features.

---

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

---

## 📧 Support & Documentation

For issues, questions, or contributions, please refer to the Laravel documentation at [laravel.com/docs](https://laravel.com/docs)

---

## 🎓 Learning Resources

- [Laravel Documentation](https://laravel.com/docs/8.x)
- [Eloquent ORM](https://laravel.com/docs/8.x/eloquent)
- [Laravel Blade Templates](https://laravel.com/docs/8.x/blade)
- [Laravel Database Migrations](https://laravel.com/docs/8.x/migrations)

---

## 👨‍💻 About the Developer

**Laracms** is developed, designed, and maintained by **Noushad Nipun**.

This project represents a comprehensive content management solution built with modern web technologies and best practices in mind. Noushad Nipun has dedicated significant effort to create a flexible, scalable, and developer-friendly CMS that can adapt to various business requirements.

---

## 📞 Contact & Support

For inquiries, support, or collaboration opportunities, please reach out to:

- **Developer**: Noushad Nipun
- **Email**: hello@noushadnipun.com
- **Website**: https://noushadnipun.com
- **GitHub**: https://github.com/noushadnipun

---

**Last Updated**: January 2026

*Laracms - Making content management flexible, powerful, and developer-friendly*
