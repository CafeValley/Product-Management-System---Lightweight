# Product Management System - Lightweight

A comprehensive, lightweight Product Management System built with PHP and MySQL. This system provides a complete solution for managing products, sales, inventory, payments, and generating detailed reports for your business.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat&logo=tailwind-css&logoColor=white)

## 📋 Table of Contents

- [Features](#-features)
- [Technology Stack](#-technology-stack)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Usage](#-usage)
- [Project Structure](#-project-structure)
- [Database Setup](#-database-setup)
- [User Roles](#-user-roles)
- [Screenshots](#-screenshots)
- [Contributing](#-contributing)
- [License](#-license)

## ✨ Features

### 🛍️ Sales Management
- **Product Sales** - Record and track product sales
- **Price Lookup** - Quick price checking for products
- **Order Management** - Handle customer orders efficiently
- **Order Returns** - Process returned orders and track refunds
- **Discount System** - Apply percentage-based discounts on orders

### 💰 Payment Management
- **Payment Tracking** - Record and monitor all payments
- **Account Management** - Manage multiple payment accounts (customers, suppliers, expenses, salaries, etc.)
- **Supplier Accounts** - Track manufacturer/supplier accounts
- **Payment Reports** - Generate daily, monthly, and yearly payment reports
- **Payment Delays** - Monitor delayed payments from suppliers

### 📦 Product Management
- **Product Catalog** - Add, edit, and delete products
- **Category Management** - Organize products by categories
- **Manufacturer/Supplier Management** - Manage supplier information
- **Product Pricing** - Set and update product prices
- **Bulk Price Updates** - Update prices for all products or by category with percentage adjustments

### 📊 Inventory Management
- **Stock Tracking** - Real-time inventory tracking
- **Quantity Management** - Add and update product quantities
- **Minimum Stock Alerts** - Set minimum stock levels and receive alerts
- **Stock Reports** - Monitor inventory levels

### 📈 Reporting System
- **Sales Reports**
  - Daily sales reports
  - Monthly sales reports
  - Yearly sales reports
  - Sales profit analysis
- **Payment Reports**
  - Daily payment reports
  - Monthly payment reports
  - Yearly payment reports
- **Product Reports**
  - Product price reports
  - Product category reports
  - Product quantity status
- **Print Functionality** - Print all reports in professional format

### 👥 User Management
- **Role-Based Access Control** - Different access levels (Admin, User)
- **User Authentication** - Secure login system
- **Session Management** - Secure session handling

### 🌐 Localization
- **Arabic Language Support** - Full RTL (Right-to-Left) support
- **Bilingual Interface** - Arabic and English support
- **Arabic Fonts** - Beautiful Arabic typography with Droid Arabic Naskh

### 🔧 Additional Features
- **Responsive Design** - Modern, mobile-friendly interface
- **Dashboard Analytics** - Overview of key business metrics
- **Export Capabilities** - Export data for external analysis
- **Search and Filter** - Quick search and filtering across modules
- **Configurable Company Name** - Easy branding customization via global variable

## 🛠️ Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Frontend**: 
  - HTML5
  - Tailwind CSS
  - Alpine.js (for interactive components)
  - Bootstrap Icons
- **Additional Libraries**:
  - Font Awesome
  - Custom Arabic fonts (Droid Arabic Naskh)

## 📦 Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- PHP extensions: mysqli, mbstring

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/Product-Management-System---Lightweight.git
   cd Product-Management-System---Lightweight
   ```

2. **Navigate to the project directory**
   ```bash
   cd neutral-dashboard/hellfa-light
   ```

3. **Database Setup**
   - Create a new MySQL database
   - Import the database schema from `hellfadblight.sql`
   ```bash
   mysql -u your_username -p your_database < hellfadblight.sql
   ```

4. **Configure Database Connection**
   - Open `solotheconnection.php`
   - Update database credentials:
   ```php
   $hostname = '127.0.0.1';
   $dbusername = 'your_username';
   $dbpassword = 'your_password';
   $dbname = 'your_database_name';
   ```

5. **Configure Company Name** (Optional)
   - Open `solotheconnection.php`
   - Update the global company name variable:
   ```php
   $company_name = "Your Company Name";
   ```

6. **Set Permissions**
   ```bash
   chmod 755 -R .
   ```

7. **Access the Application**
   - Open your browser and navigate to:
   ```
   http://localhost/neutral-dashboard/hellfa-light/
   ```

## ⚙️ Configuration

### Database Configuration
Edit `neutral-dashboard/hellfa-light/solotheconnection.php`:

```php
$hostname = '127.0.0.1';        // Database host
$dbusername = 'root';            // Database username
$dbpassword = 'your_password';   // Database password
$dbname = 'hellfadblight';       // Database name
```

### Timezone Configuration
The system uses `Africa/Khartoum` timezone by default. You can change it in `solotheconnection.php`:

```php
date_default_timezone_set("Your/Timezone");
```

### Company Branding
Update the company name in `solotheconnection.php`:

```php
$company_name = "Product Management System";
```

## 🚀 Usage

### Initial Setup
1. Login with your credentials (default credentials should be set up in the database)
2. Navigate through the sidebar menu to access different modules
3. Start by adding products, categories, and manufacturers
4. Set up inventory quantities
5. Configure product prices

### Common Workflows

**Adding a New Product:**
1. Go to `أساسيات النظام` → `المنتجات` → `إضافه`
2. Enter product name
3. Set prices and categories
4. Set initial inventory quantity

**Making a Sale:**
1. Go to `مدخلات` → `المبيعات` → `بيع`
2. Select product and category
3. Enter quantity
4. Apply discount if needed
5. Complete the sale

**Generating Reports:**
1. Go to `الاستعلامات` or use report links in the menu
2. Select report type (Sales, Payments, Products)
3. Filter by date range if needed
4. Click print to generate PDF-ready report

## 📁 Project Structure

```
Product-Management-System---Lightweight/
├── neutral-dashboard/
│   └── hellfa-light/
│       ├── config.php                 # Configuration and helper functions
│       ├── solotheconnection.php      # Database connection and global variables
│       ├── header.php                  # Header template
│       ├── menu.php                    # Navigation menu
│       ├── index.php                   # Login page
│       ├── dashboard.php              # Main dashboard
│       ├── adminstarterpage.php        # Admin queries page
│       │
│       ├── Sales Management/
│       │   ├── addprouductsells.php
│       │   ├── priceprouductsells.php
│       │   ├── productorder.php
│       │   └── productorderreturn.php
│       │
│       ├── Payment Management/
│       │   ├── productpayment.php
│       │   └── editproductpayment.php
│       │
│       ├── Product Management/
│       │   ├── productname.php
│       │   ├── productcategories.php
│       │   ├── productmanufactuer.php
│       │   └── productprice.php
│       │
│       ├── Inventory/
│       │   ├── prouductquantity.php
│       │   └── editproductquantity.php
│       │
│       ├── Reports/
│       │   ├── reportorderssold.php
│       │   ├── reportpayment.php
│       │   ├── reportsoldprofits.php
│       │   └── ... (other report files)
│       │
│       ├── css/                        # Stylesheets
│       ├── js/                         # JavaScript files
│       ├── fonts/                      # Font files
│       └── hellfadblight.sql          # Database schema
```

## 💾 Database Setup

### Import Database
1. Create a new MySQL database
2. Import the SQL file:
   ```bash
   mysql -u root -p hellfadblight < hellfadblight.sql
   ```

### Main Tables
- `productname` - Product information
- `productcategory` - Product categories
- `productmanufactuer` - Manufacturers/Suppliers
- `productprice` - Product pricing
- `productquantit` - Inventory quantities
- `productsells` - Sales records
- `orderdisanddate` - Order details
- `accountp` - Payment accounts
- `productpayment` - Payment transactions

## 👤 User Roles

### Super Admin (SprAdmin)
- Full system access
- Price management
- User management
- All administrative functions

### Regular User
- Sales operations
- Payment entry
- View reports
- Limited administrative access

## 📸 Screenshots

*Add screenshots of your application here*

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 🙏 Acknowledgments

- Tailwind CSS for the beautiful UI framework
- Alpine.js for interactive components
- Bootstrap Icons for the icon set
- Droid Arabic Naskh for Arabic typography support

## 📧 Support

For support, email your-email@example.com or open an issue in the GitHub repository.

---

**Note**: This is a lightweight version of the Product Management System. Make sure to backup your database regularly and follow security best practices in production environments.

