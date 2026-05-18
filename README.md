# 🌿 UrbanRoots — Community Gardening & Plant Encyclopedia Platform

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11">
  <img src="https://img.shields.io/badge/MongoDB-4EA94B?style=for-the-badge&logo=mongodb&logoColor=white" alt="MongoDB">
  <img src="https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white" alt="SQLite">
  <img src="https://img.shields.io/badge/WebSockets-Reverb-8B5CF6?style=for-the-badge&logo=pusher&logoColor=white" alt="Laravel Reverb">
  <img src="https://img.shields.io/badge/UI-Bento%20Grid-10B981?style=for-the-badge" alt="Bento Grid UI">
</p>

---

## 📖 Overview

**UrbanRoots** is a premium, modern web platform designed to transform urban spaces into thriving green ecosystems. Built with a sleek **"Bento-Grid" aesthetic**, UrbanRoots bridges the gap between passionate urban farmers, local neighbourhood communities, and green-thumb enthusiasts.

Whether you want to discover a rooftop garden in your city, explore an extensive botanical encyclopedia, or chat in real-time with local garden organizers, UrbanRoots provides all the tools and community connections in one seamless, high-performance application.

---

## ✨ Key Features

### 🌱 Community Garden Directory & Feed
* **Explore & Discover:** Browse an Instagram-style community feed of beautiful gardens submitted by neighbours.
* **Propose a Garden:** Share your own rooftop, backyard, or vacant lot project complete with photo uploads, size metrics, and location tags.
* **Interactive Engagement:** Support fellow gardeners through real-time likes and comments.

### 🌿 MongoDB-Powered Plant Encyclopedia
* **Rich Botanical Database:** Search and explore hundreds of plant species with detailed growing tips, sunlight requirements, and care guides.
* **Polyglot Persistence:** Leveraging MongoDB's flexible document structure for high-speed botanical cataloging while maintaining relational integrity for user transactions.

### 💬 Real-Time Live Chat & Push Notifications
* **Instant Messaging:** Connect directly with garden owners to ask questions, coordinate seed swaps, or organize community workdays.
* **Laravel Reverb WebSockets:** Lightning-fast, self-hosted WebSocket broadcasting powered by Laravel Echo and Reverb.
* **Multi-Layer Notifications:** 
  * **🔴 Live Unread Badges:** Dynamic pulsing badges update instantly on your screen when new messages arrive.
  * **🔔 Browser Push Notifications:** Get OS-level desktop pop-ups for incoming messages even when your chat panel is closed or you are on another tab.

### 🎨 Premium Bento-Box UI/UX
* **Modern Aesthetic:** High-contrast, beautifully structured bento grids with smooth glassmorphic cards and curated typography.
* **Micro-Animations:** Fluid hover transitions, interactive reveal animations, and a polished dark-mode hero header on every page.
* **Fully Responsive:** Optimized layouts using modern CSS `clamp()` and CSS Grid to look stunning on mobile, tablet, and desktop screens.

### 🛡️ Admin Moderation & Security
* **Role-Based Access Control:** Secure administration dashboard for monitoring platform activity and approving pending garden proposals.
* **Content Moderation:** Instant admin deletion capabilities across community posts and garden submissions.

---

## 🏗️ Architecture & Tech Stack

UrbanRoots demonstrates an advanced **Polyglot Persistence (Dual-Database)** architecture combined with state-of-the-art real-time broadcasting:

* **Backend Framework:** Laravel 11 (PHP 8.2+)
* **Primary Relational DB (SQLite):** Manages relational entities including `Gardens`, `Messages`, `Comments`, and `Likes`.
* **Document NoSQL DB (MongoDB):** Powers the high-performance `Plant` Encyclopedia and `User` authentication profiles.
* **Hybrid Eloquent Relations:** Seamless cross-database Eloquent queries utilizing `MongoDB\Laravel\Eloquent\HybridRelations`.
* **Real-Time Engine:** Laravel Reverb (WebSockets) + Pusher JS client.
* **Frontend:** Custom Vanilla CSS Design System + Blade Templating + Vanilla JS for reactive UI components.

---

## 🚀 Getting Started

### Prerequisites
* PHP 8.2 or higher
* Composer
* Node.js & npm
* MongoDB Server (Local or Atlas)
* SQLite extension enabled

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/SIDxSingh/Community-Gradening-Platform.git
   cd Community_Garden
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Frontend dependencies:**
   ```bash
   npm install
   ```

4. **Environment Configuration:**
   Copy the example environment file and configure your database connections:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Make sure your `MONGODB_URI` is correctly set in the `.env` file.*

5. **Run Migrations & Seeders:**
   ```bash
   php artisan migrate --seed
   ```

6. **Start the Application Servers:**
   You will need two terminal windows to run the web server and the WebSocket server simultaneously:

   * **Terminal 1 (Web Server):**
     ```bash
     php artisan serve
     ```
   * **Terminal 2 (WebSocket Server):**
     ```bash
     php artisan reverb:start
     ```
   * *(Optional) For frontend asset compilation:* `npm run dev`

7. **Visit the App:** Open `http://localhost:8000` in your browser.

---

## 👥 Meet the Creators

UrbanRoots was crafted by a dedicated team of developers, urban farmers, and community organizers:

* **Mohammad Tabish** — Co-Founder & CTO
* **Siddharth Shukla** — Co-Founder & Head of Community
* **Chintamani** — Co-Founder & Lead Developer

---

## 📜 License

This project is open-source software licensed under the [MIT License](https://opensource.org/licenses/MIT).
