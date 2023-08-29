# Project: Banner Management with Laravel Blade and Jetstream

Welcome to the README for your Banner Management project using Laravel Blade and Jetstream! Below, you'll find a general guide on how the project works, its key features, and how to run it in your local environment.

## Project Description

This project focuses on the management of banners categorized using the Laravel framework with Blade templating engine and Jetstream library. Banners can be created, deleted, and edited, and they come with attributes like order, status, category, and display time in seconds. Additionally, public URLs are provided for viewing banners in full screen or by category, enabling advertising implementation in stores or supermarkets.

## Key Features

1. **Authentication and Authorization:** The project employs Jetstream to manage user authentication. Only authenticated users can access functionalities such as banner creation, editing, and deletion.

2. **Banner Creation:** Users can create banners by providing details such as order, status, category, and display time in seconds.

3. **Editing and Deleting Banners:** Existing banners can be edited to update their attributes or deleted as needed.

4. **Banner Viewing:** Two types of public URLs are provided for viewing banners:
   - Full-Screen URL: Displays all banners in full screen, perfect for showcasing advertisements in prominent locations.
   - Category URL: Displays banners from a specific category, allowing for targeted advertising.

## System Requirements

Before running the project in your local environment, make sure you have the following components installed:

- PHP (preferably 7.4 or higher)
- Composer
- Node.js and NPM
- Database (e.g., MySQL)

## Steps to Run the Project

1. **Clone the Repository:** Clone this repository to your local machine using the following command: git clone https://github.com/Guilleveron/banners-sucursales.git

2. **Install Dependencies:** Navigate to the project directory and execute the following commands:

```sh
composer install
npm install
```

3. **Environment Configuration:** Rename the `.env.example` file to `.env` and configure the database connection and other necessary settings.

4. **Generate Application Key:** Run the following command to generate the application key:

```sh
php artisan key:generate
```

5. **Migrations and Seeders:** Execute database migrations and seeders to prepare test data:

```sh
php artisan migrate --seed
```

6. **Compile Assets:** Compile assets using NPM:

```sh
npm run dev
```

7. **Start the Server:** Launch the Laravel development server:

```sh
php artisan serve
```

8. **Access the Application:** Open your web browser and visit the URL provided by the development server.

## Additional Questions

If you need more details about specific aspects of the project, feel free to ask. I'm here to help you achieve your software development goals with clarity and precision.

Best of luck with your Banner Management project! If you have more questions or need assistance in the future, don't hesitate to get in touch.
