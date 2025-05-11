# Gmail App Laravel

This is a messaging application built with Laravel. It allows users to create accounts, log in, and connect with others by sending and receiving messages. The app includes features such as user authentication, protected routes, and profile management.

## Features

- **User Authentication**: Register, log in, and manage your account securely.
- **Messaging System**:
    - Create and send messages to other users.
    - View received messages with details like sender, subject, and content.
    - View sent messages with pagination for better organization.
- **Profile Management**:
    - Edit your profile information.
    - Delete your account if needed.
- **Pagination**: Messages are segmented into pages for easier navigation.

## Sections

1. **Create Message**: Compose and send messages to other users.
2. **Received Messages**: View all messages sent to you.
3. **Sent Messages**: View all messages you have sent.

## Installation

To launch the project, follow these steps:

1. Install PHP dependencies:
     ```bash
     composer install
     ```
2. Install Node.js dependencies:
     ```bash
     npm install
     ```
3. Run database migrations:
     ```bash
     php artisan migrate
     ```
4. Compile assets:
     ```bash
     npm run dev
     ```
5. Start the development server:
     ```bash
     php artisan serve
     ```

## Requirements

- PHP >= 8.0
- Composer
- Node.js and npm
- A database (e.g., MySQL)

## License

This project is open-source and available under the [MIT License](LICENSE).
