# Product Data Importer with User Interface

This Laravel application is developed to fetch and display products from the [dummyJSON.com/products](https://dummyjson.com/products). The application provides a user interface for authenticated users to view the products in a paginated display.

## Key Requirements

1. **Scheduled Data Fetching**: The application is set up with a Laravel task scheduler to fetch data from the DummyJSON.com API every 2 hours automatically.
2. **API Pagination**: The application fetches 10 products per request, covering the first 3 pages of the API.
3. **Database Storage**: MySQL is used to store the product details, including ID, name, description, price, etc.
4. **Error Handling**: The application implements robust error handling for API interactions and data processing, ensuring a smooth user experience.
5. **Data Update Mechanism**: The application updates existing database entries to avoid duplicates and keep the data up-to-date.
6. **User Authentication**: The application provides a user authentication system with features for registration, login, and logout.
7. **Product Display**: Authenticated users can view the products in a paginated display, with 5 products per page.

## Installation

1. Clone the repository to your local machine.
   ```
   git clone https://github.com/javierstere/laravel-test.git
   ```

2. Install the project dependencies using Composer.
   ```
   composer install
   ```

3. Create a copy of the `.env.example` file and rename it to `.env`. Update the necessary environment variables such as database credentials.
   ```
   cp .env.example .env
   ```

4. Generate an application key.
   ```
   php artisan key:generate
   ```

5. Run the database migrations to create the necessary tables.
   ```
   php artisan migrate
   ```

6. Set up the Laravel task scheduler by adding the following Cron entry to your server:
   ```
   * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
   ```

   This will ensure that the scheduled data fetching task runs every 2 hours.

7. Start the development server.
   ```
   php artisan serve
   ```

8. Visit `http://localhost:8000` in your web browser to access the application.

## Usage

1. Register a new user account or log in with an existing account.
2. Once logged in, you will be able to view the paginated list of products.
3. Navigate through the pages using the pagination links at the bottom of the page.
4. Log out when you are done using the application.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

---

Feel free to customize this README file based on your project's specific details and requirements. Include any additional sections or instructions that might be relevant.
