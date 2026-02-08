# OneCare - Beauty and Wellness Booking Platform

Welcome to **OneCare**, the ultimate platform for beauty and wellness bookings. OneCare connects clients with top-tier salons and service providers, offering a seamless booking experience and comprehensive management tools for business owners.

## 🚀 Key Features

### 👤 For Clients
- **Direct Bookings**: Browse salon profiles and book services instantly.
- **Multilingual Support**: Fully localized in English and Arabic.
- **Service Menu**: Explore diverse services ranging from Hair Artistry to Skin Renaissance.

### 🏢 For Service Providers (Vendors)
- **Salon Management**: Customize your business profile, location, and gallery.
- **Service & Pricing**: Manage your service offerings with flexible pricing and durations.
- **Booking Hub**: Track and manage appointments efficiently.

### 🛡️ For Administrators
- **Platform Oversight**: Manage all users, vendors, and global system settings.
- **Analytics & Reporting**: Monitor platform-wide activity and growth.

---

## 🛠️ Tech Stack

- **Framework**: [Laravel 12](https://laravel.com)
- **Admin Panel**: [Filament v3](https://filamentphp.com)
- **Styling**: [Tailwind CSS 4](https://tailwindcss.com)
- **Frontend**: [Vite](https://vitejs.dev)
- **Containerization**: [Docker](https://www.docker.com)

---

## ⚙️ Installation & Setup

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- Docker (for containerized environment)

### Quick Start
1. **Clone the repository**:
   ```bash
   git clone https://github.com/janahamad/OneCare.git
   cd OneCare
   ```

2. **Run the setup script**:
   ```bash
   composer run setup
   ```
   *This script handles dependency installation (`composer install`, `npm install`), environment setup, key generation, and migrations.*

3. **Launch the development server**:
   ```bash
   npm run dev
   ```

### Using Docker
If you prefer Docker, you can use the provided `docker-compose.yaml`:
```bash
docker-compose up -d
```

---

## 📖 Useful Links
- **Platform URL**: [https://onecare.jxtechstudio.com/](https://onecare.jxtechstudio.com/)
- **Admin Dashboard**: [/admin](https://onecare.jxtechstudio.com/admin)
- **Vendor Panel**: [/vendor](https://onecare.jxtechstudio.com/vendor)

---

## 📄 License
This project is open-source software licensed under the [MIT license](LICENSE).
