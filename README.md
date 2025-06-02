<p align="center">
  <a href="https://github.com/nando-z/tickets-please-api">
    <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" width="100">
  </a>
</p>

<p align="center">
  <strong>🎟️ Tickets Please API</strong><br>
  A Laravel-powered backend for managing event tickets with ease.
</p>

<p align="center">
  <a href="https://github.com/nando-z/tickets-please-api/actions/workflows/tests.yml">
    <img src="https://github.com/nando-z/tickets-please-api/actions/workflows/tests.yml/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/nando-z/tickets-please-api">
    <img src="https://img.shields.io/packagist/v/nando-z/tickets-please-api.svg" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/nando-z/tickets-please-api">
    <img src="https://img.shields.io/packagist/dt/nando-z/tickets-please-api.svg" alt="Total Downloads">
  </a>
  <a href="https://github.com/nando-z/tickets-please-api/blob/main/LICENSE">
    <img src="https://img.shields.io/github/license/nando-z/tickets-please-api.svg" alt="License">
  </a>
</p>

<hr>

<h2>🚀 Features</h2>
<ul>
  <li>🎫 <strong>Event & Ticket Management</strong>: Create, update, and delete events and their associated tickets.</li>
  <li>👥 <strong>User Authentication</strong>: Secure user registration and login functionalities.</li>
  <li>📊 <strong>Analytics</strong>: Track ticket sales and event popularity.</li>
  <li>🛠️ <strong>RESTful API</strong>: Clean and organized endpoints following REST principles.</li>
  <li>🧪 <strong>Testing Suite</strong>: Comprehensive tests to ensure reliability.</li>
</ul>

<hr>

<h2>🛠️ Installation</h2>

<ol>
  <li><strong>Clone the repository:</strong><br>
    <code>git clone https://github.com/nando-z/tickets-please-api.git && cd tickets-please-api</code>
  </li>
  <li><strong>Install dependencies:</strong><br>
    <code>composer install</code><br>
    <code>npm install && npm run dev</code>
  </li>
  <li><strong>Environment setup:</strong><br>
    <code>cp .env.example .env</code><br>
    <code>php artisan key:generate</code>
  </li>
  <li><strong>Database migration:</strong><br>
    <code>php artisan migrate</code>
  </li>
  <li><strong>Run the server:</strong><br>
    <code>php artisan serve</code>
  </li>
</ol>

<hr>

<h2>📬 API Endpoints</h2>

<table>
  <thead>
    <tr>
      <th>Method</th>
      <th>Endpoint</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>GET</td><td>/api/events</td><td>List all events</td></tr>
    <tr><td>POST</td><td>/api/events</td><td>Create a new event</td></tr>
    <tr><td>GET</td><td>/api/events/{id}</td><td>Retrieve event details</td></tr>
    <tr><td>PUT</td><td>/api/events/{id}</td><td>Update event information</td></tr>
    <tr><td>DELETE</td><td>/api/events/{id}</td><td>Delete an event</td></tr>
  </tbody>
</table>

<p><em>For full documentation, check the <code>docs/API.md</code> (coming soon 👀).</em></p>

<hr>

<h2>🧪 Running Tests</h2>
<p>Make sure everything works as expected:</p>
<code>php artisan test</code>

<hr>

<h2>🤝 Contributing</h2>
<p>Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.</p>

<hr>

<h2>📄 License</h2>
<p>This project is licensed under the <a href="LICENSE">MIT License</a>.</p>