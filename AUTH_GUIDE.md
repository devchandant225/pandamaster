# 888Realty - Demo Credentials & Authentication Guide

## Default User Accounts

After running the database seeders, you can log in with the following accounts:

### Admin Account
| Field | Value |
|-------|-------|
| **Email** | `admin@888realty.com` |
| **Password** | `password` |
| **Role** | Admin |
| **Access** | Full system access, user management, lead assignment, listing approval |

### Agent Accounts

#### Jessica Chen (Top Producer)
| Field | Value |
|-------|-------|
| **Email** | `jessica@888realty.com` |
| **Password** | `password` |
| **Role** | Agent |
| **City** | Vancouver |
| **Performance Score** | 92 |
| **Access** | Lead management, submit listings, view personal dashboard |

#### David Park (Luxury Specialist)
| Field | Value |
|-------|-------|
| **Email** | `david@888realty.com` |
| **Password** | `password` |
| **Role** | Agent |
| **City** | Burnaby |
| **Performance Score** | 85 |
| **Access** | Lead management, submit listings, view personal dashboard |

#### Maria Rodriguez (First-Time Buyer Specialist)
| Field | Value |
|-------|-------|
| **Email** | `maria@888realty.com` |
| **Password** | `password` |
| **Role** | Agent |
| **City** | Richmond |
| **Performance Score** | 96 |
| **Access** | Lead management, submit listings, view personal dashboard |

### Regular User Accounts

#### John Smith
| Field | Value |
|-------|-------|
| **Email** | `user@example.com` |
| **Password** | `password` |
| **Role** | User |
| **City** | Vancouver |
| **Access** | Browse properties, save favorites, contact agents |

#### Sarah Johnson
| Field | Value |
|-------|-------|
| **Email** | `sarah@example.com` |
| **Password** | `password` |
| **Role** | User |
| **City** | Surrey |
| **Access** | Browse properties, save favorites, contact agents |

---

## Role-Based Access Control

### User Role (Client)
- Browse property listings
- View property details
- Use mortgage calculator
- Submit inquiries via contact forms
- Save favorite properties
- View personal dashboard

### Agent Role
- All User role permissions
- Access agent dashboard
- Manage assigned leads
- Submit new property listings
- Update lead status (new → contacted → viewing → offer → closed)
- Add notes to leads
- Contact leads via phone/WhatsApp
- View personal performance metrics

### Admin Role
- All Agent role permissions
- Access admin dashboard
- User management (create, edit, delete users)
- Assign leads to agents
- Approve/reject agent submissions
- View system-wide metrics
- Manage all agents and their performance

---

## Setting Up the Database

### Step 1: Run Migrations
```bash
php artisan migrate:fresh
```

### Step 2: Seed the Database
```bash
php artisan db:seed
```

Or run both commands together:
```bash
php artisan migrate:fresh --seed
```

### Step 3: Start the Development Server
```bash
php artisan serve
```

---

## Password Reset

If you need to reset a password:

1. Go to the login page
2. Click "Forgot your password?"
3. Enter the email address
4. Check the email for reset link (requires mail configuration)

**Note:** For local development, you can manually reset passwords using:
```bash
php artisan tinker
```

Then run:
```php
App\Models\User::where('email', 'admin@888realty.com')->update(['password' => Hash::make('newpassword')]);
```

---

## Creating New Users

### Via Admin Panel (Recommended)
1. Log in as admin
2. Navigate to Admin Dashboard → User Management
3. Click "Add User"
4. Fill in the details and select role

### Via Seeder
Add new users in `database/seeders/UserSeeder.php` and run:
```bash
php artisan db:seed --class=UserSeeder
```

### Via Tinker (Development Only)
```bash
php artisan tinker
```

```php
App\Models\User::create([
    'name' => 'New User',
    'email' => 'newuser@example.com',
    'password' => Hash::make('password'),
    'role' => 'user', // or 'agent' or 'admin'
    'phone' => '(604) 555-0000',
    'city' => 'Vancouver',
]);
```

---

## Security Notes

⚠️ **Important:** 
- Change default passwords in production
- Never commit `.env` file with real credentials
- Use strong passwords for production
- Enable email verification for user registration
- Implement rate limiting for login attempts
