# DIGITAL-GREEN-GUARDIAN

*Empowering Sustainable Choices for a Greener Future*

![last-commit](https://img.shields.io/github/last-commit/akshatkashyap01/digital-green-guardian?style=flat&logo=git&logoColor=white&color=0080ff)
![repo-top-language](https://img.shields.io/github/languages/top/akshatkashyap01/digital-green-guardian?style=flat&color=0080ff)
![repo-language-count](https://img.shields.io/github/languages/count/akshatkashyap01/digital-green-guardian?style=flat&color=0080ff)

### Built with the tools and technologies:
![Laravel](https://img.shields.io/badge/Laravel-F55247?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4.svg?style=flat&logo=PHP&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630.svg?style=flat&logo=Composer&logoColor=white)
![npm](https://img.shields.io/badge/npm-CB3837.svg?style=flat&logo=npm&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF.svg?style=flat&logo=Vite&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E.svg?style=flat&logo=JavaScript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3.svg?style=flat&logo=Bootstrap&logoColor=white)
![Sass](https://img.shields.io/badge/Sass-CC6699.svg?style=flat&logo=Sass&logoColor=white)
![Axios](https://img.shields.io/badge/Axios-5A29E4.svg?style=flat&logo=Axios&logoColor=white)
![PostCSS](https://img.shields.io/badge/PostCSS-DD3A0A.svg?style=flat&logo=PostCSS&logoColor=white)
![Autoprefixer](https://img.shields.io/badge/Autoprefixer-DD3735.svg?style=flat&logo=Autoprefixer&logoColor=white)

---

## Table of Contents

- [Overview](#overview)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Testing](#testing)

---

## Overview

**Digital Green Guardian** is a Laravel-based developer tool designed to streamline the creation of eco-friendly web applications with modern tooling and robust architecture.

### Key Features

- 🌱 **Structured Testing Environment** using PHPUnit
- ⚙️ **Vite-Powered Asset Compilation**
- 🌍 **Multilingual Localization Support**
- 🎨 **AdminLTE UI Framework**
- 🔒 **Role-Based Access Control**
- 🚀 **AJAX-Driven Interactions with Axios**

---

## Getting Started

### Prerequisites

Make sure you have the following installed:

- PHP >= 8.1
- Composer
- Node.js and npm
- MySQL or any other supported DB
- Laravel CLI (optional but recommended)

---

### Installation

Follow the steps to set up the Laravel project:

1. **Clone the repository**

   ```bash
   git clone https://github.com/akshatkashyap01/digital-green-guardian
   cd digital-green-guardian
   ```

2. **Install PHP dependencies using Composer**

   ```bash
   composer install
   ```

3. **Install frontend dependencies**

   ```bash
   npm install
   ```

4. **Copy `.env.example` to `.env` and configure your environment variables**

   ```bash
   cp .env.example .env
   ```

   Edit the `.env` file to set your database credentials and other settings:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Generate application key**

   ```bash
   php artisan key:generate
   ```

6. **Run database migrations and seed (if available)**

   ```bash
   php artisan migrate --seed
   ```

7. **Build frontend assets using Vite**

   ```bash
   npm run dev
   ```

---

### Usage

Start the Laravel development server:

```bash
php artisan serve
```

Open your browser and navigate to: `http://localhost:8000`

---

### Testing

Run backend test suite using PHPUnit:

```bash
php artisan test
```

Or directly:

```bash
vendor/bin/phpunit
```

You can also run frontend tests (if available):

```bash
npm test
```

---

## License

This project is licensed under the MIT License.
