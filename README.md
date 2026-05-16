# Courier & Logistics Management API

A RESTful Courier and Logistics Management System built with Laravel, MySQL, and Laravel Sanctum.

This project demonstrates backend API development skills including:

* REST API development
* Laravel Eloquent ORM
* MySQL database design
* CRUD operations
* API validation
* Route management
* Authentication setup with Sanctum
* MVC architecture
* Git and GitHub workflow

---

# Tech Stack

## Backend

* PHP 8+
* Laravel 12
* MySQL
* Laravel Sanctum

## Tools

* Git
* GitHub
* Postman / Thunder Client
* Composer

---

# Features

## Authentication

* Laravel Sanctum API setup
* User authentication support

## Parcel Management

* Create parcel
* View all parcels
* View single parcel
* Update parcel
* Delete parcel

## Parcel Information

* Tracking number generation
* Sender details
* Receiver details
* Pickup and delivery addresses
* Parcel description
* Parcel weight
* Delivery status tracking

## Delivery Statuses

* Pending
* Collected
* In Transit
* Delivered
* Cancelled

---

# Database Structure

## Parcels Table

| Column             | Description                   |
| ------------------ | ----------------------------- |
| id                 | Primary key                   |
| tracking_number    | Unique parcel tracking number |
| sender_name        | Sender full name              |
| sender_phone       | Sender contact number         |
| receiver_name      | Receiver full name            |
| receiver_phone     | Receiver contact number       |
| pickup_address     | Pickup location               |
| delivery_address   | Delivery location             |
| parcel_description | Parcel contents               |
| weight             | Parcel weight                 |
| status             | Delivery status               |
| user_id            | Parcel owner                  |
| created_at         | Created timestamp             |
| updated_at         | Updated timestamp             |

---

# API Endpoints

| Method    | Endpoint          | Description       |
| --------- | ----------------- | ----------------- |
| GET       | /api/parcels      | Get all parcels   |
| POST      | /api/parcels      | Create parcel     |
| GET       | /api/parcels/{id} | Get single parcel |
| PUT/PATCH | /api/parcels/{id} | Update parcel     |
| DELETE    | /api/parcels/{id} | Delete parcel     |

---

# Installation

## Clone Repository

```bash
git clone https://github.com/YOUR_USERNAME/courier-logistics-api.git
```

## Enter Project Folder

```bash
cd courier-logistics-api
```

## Install Dependencies

```bash
composer install
```

## Copy Environment File

```bash
copy .env.example .env
```

## Generate Application Key

```bash
php artisan key:generate
```

## Configure Database

Update `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=courier_logistics
DB_USERNAME=root
DB_PASSWORD=
```

## Run Migrations

```bash
php artisan migrate
```

## Start Development Server

```bash
php artisan serve
```

---

# Example API Request

## Create Parcel

### POST

```text
/api/parcels
```

### Request Body

```json
{
  "sender_name": "Pilato",
  "sender_phone": "0794166452",
  "receiver_name": "John Doe",
  "receiver_phone": "0812345678",
  "pickup_address": "Tembisa, Gauteng",
  "delivery_address": "Sandton, Johannesburg",
  "parcel_description": "Documents",
  "weight": 2.5,
  "status": "pending"
}
```

---

# Architecture

This project follows Laravel's MVC architecture:

* Models manage database interaction
* Controllers handle business logic
* Routes define API endpoints
* Migrations manage database schema
* Eloquent ORM handles database operations

---

# Future Improvements

* JWT/Sanctum authentication
* Driver management
* Real-time parcel tracking
* Notifications
* Admin dashboard
* Vue.js frontend
* Role-based permissions
* Reporting and analytics

---

# Author

Pilato Mmatshipyane

* Full Stack Developer
* Backend Developer
* Laravel & API Development
