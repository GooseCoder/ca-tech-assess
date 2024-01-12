# Project Title

This is a Laravel 10 application that provides access to a number of REST APIs, managing records for funds, fund managers, and companies. It also has a Redis queue configured, all running over Sail, which is a Docker-based environment.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- You have installed the latest version of [Docker](https://www.docker.com/get-started) and [Docker Compose](https://docs.docker.com/compose/install/).
- You have a basic understanding of Laravel and Docker.

## Installation

Follow these steps to get your development environment set up:

1. Clone the repository
```bash
git clone https://github.com/your-repo-url
```
2. Navigate to the project directory
```bash
cd your-project-directory
```
3. Start the Laravel Sail development environment
```bash
./vendor/bin/sail up
```
4. Run the migrations
```bash
./vendor/bin/sail artisan migrate
```

## Running the Application

To start the application, use the following command:

```bash
./vendor/bin/sail up
```

## Testing the APIs

You can use tools like [Postman](https://www.postman.com/) or [curl](https://curl.se/) to test the APIs.

## Contributing to Project Title

To contribute to Project Title, follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b <branch_name>`.
3. Make your changes and commit them: `git commit -m '<commit_message>'`
4. Push to the original branch: `git push origin <project_name>/<location>`
5. Create the pull request.

## Contact

If you want to contact me you can reach me at `<your_email@domain.com>`.

## License

This project uses the following license: `<license_name>`.