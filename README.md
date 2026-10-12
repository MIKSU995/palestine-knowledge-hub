# 🇵🇸 Palestine Knowledge Hub

A modern, full-stack educational web platform built with **Laravel 11, Tailwind CSS, Leaflet.js, and SQLite** dedicated to preserving, organizing, and exploring Palestinian history, geography, visual archives, cultural arts, and educational resources.

---

## 🌟 Key Features & 6 Pillars

### 1. 📖 CONTENT
- **Articles & Publications**: In-depth research papers, historical essays, and cultural studies with reading time indicators, category filters, and bookmarking.
- **Interactive Timeline**: Era-filtered historical milestones from Canaanite antiquity to modern international law.
- **Geography & Interactive Maps**: Powered by **Leaflet.js**, featuring historic cities (Jerusalem, Gaza, Hebron, Nablus, Jaffa, Haifa, Bethlehem) with interactive fly-to coordinates and detailed location cards.
- **Visual Heritage Gallery**: Masonry grid with category filters and interactive Lightbox modal preview for high-resolution historical photos.
- **Educational Resources**: Filterable repository for academic PDFs, infographics, documents, and primary sources with direct downloads.

### 2. ⚡ USER EXPERIENCE (UX)
- **Global Command Palette (`Ctrl + K`)**: Instant search across articles, timeline events, maps, gallery photos, and educational resources.
- **Saved Bookmarks**: Synchronized user bookmarking with guest `localStorage` fallback.
- **Dark Mode**: Smooth dark mode toggle with system preference detection and local storage persistence.
- **Reading Progress Bar**: Fixed top progress bar tracking article reading progress.

### 3. 🎯 LEARNING ENGINE
- **Interactive Quizzes**: Multi-question quizzes with real-time score calculation and detailed answer explanations.
- **Learning Dashboard**: User achievement metrics, earned learning badges, and complete quiz history.

### 4. 👥 COMMUNITY & ENGAGEMENT
- **Comment Threads**: Nested article discussions with admin moderation.
- **Reactions & Likes**: Real-time AJAX like counters for articles.
- **Content Reporting**: Flagging system for community moderation.

### 5. 🛡️ ADMIN / CMS
- **CMS Dashboard**: Stat cards, recent reports badge, and publication velocity tracking.
- **Content Management**: Full CRUD for Articles and Categories with image uploads and status controls.
- **Moderation Panel**: One-click comment approval/rejection and report resolution.
- **User Management**: Role administration (`Admin` / `User`) and account management.

### 6. ⚙️ ENGINEERING
- **Database & Seeder**: Configured with SQLite database and `ComprehensivePalestineSeeder` pre-populating authentic data.
- **Dynamic Sitemap (`/sitemap.xml`)**: Automated XML sitemap generator for SEO.

---

## 🚀 Quick Start Guide

### Prerequisites
- **PHP** >= 8.2
- **Composer**
- **Node.js** & **npm**

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/MIKSU995/palestine-knowledge-hub.git
   cd palestine-knowledge-hub
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install & build frontend assets**:
   ```bash
   npm install
   npm run build
   ```

4. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Run Migrations & Seeders**:
   ```bash
   php artisan migrate:fresh --seed
   php artisan storage:link
   ```

6. **Start Local Development Server**:
   ```bash
   php artisan serve
   ```

7. Open your browser at `http://127.0.0.1:8000`

---

## 🔑 Demo Admin Credentials

- **URL**: `http://127.0.0.1:8000/login`
- **Email**: `admin@palestinehub.com`
- **Password**: `admin123`

---

## 📜 License

This project is open-source under the [MIT License](LICENSE).
