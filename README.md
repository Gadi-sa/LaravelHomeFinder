# LaravelHomeFinder

LaravelHomeFinder is a web application designed to help users find and list properties. This project is built using Laravel for the backend and Vue.js for the frontend.

## Table of Contents

- [LaravelHomeFinder](#laravelhomefinder)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Configuration](#configuration)
  - [Database Setup](#database-setup)
  - [Running the Application](#running-the-application)
  - [Testing](#testing)

## Installation

Follow these steps to set up the project on your local machine:

1. **Clone the Repository**:
    ```sh
    git clone https://github.com/Gadi-sa/LaravelHomeFinder.git
    cd LaravelHomeFinder
    ```

2. **Install Dependencies**:
    ```sh
    composer install
    npm install
    ```

## Configuration

1. **Copy the `.env` File**:
    ```sh
    cp .env.example .env
    ```

2. **Generate Application Key**:
    ```sh
    php artisan key:generate
    ```

3. **Set Up Environment Variables**:
    Open the `.env` file and update the necessary environment variables, such as database connection details.

## Database Setup

1. **Run Migrations**:
    ```sh
    php artisan migrate
    ```

2. **Run Seeders**:
    ```sh
    php artisan db:seed
    ```

## Running the Application

1. **Start the Development Server**:
    ```sh
    php artisan serve
    ```

2. **Compile Assets**:
    ```sh
    npm run dev
    ```

3. **Access the Application**:
    Open your browser and navigate to `http://127.0.0.1:8000`.

## Testing

1. **Run PHPUnit Tests**:
    ```sh
    php artisan test
    ```

2. **Run Playwright Tests**:
    ```sh
    npx playwright test
    ```
