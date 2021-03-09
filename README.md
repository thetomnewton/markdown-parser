# Markdown Parser

This is a simple Laravel app that can be used to write and parse GitHub flavored markdown. It uses the GitHub API to do so.

## Requirements

PHP 7.3+
NPM 6+

## Installation

Setup the repository as follows:

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run dev
```

You will also need a GitHub Personal Access Token. You can get this from clicking your GitHub profile photo in the top right when logged in, going to Settings and then Developer Settings.

Once you have your token, add it to your `.env` file in the `GITHUB_PERSONAL_ACCESS_TOKEN` key.

After that, spin up the web server (either with Laravel Sail, Valet, `php artisan serve` etc. and navigate to the home page of the project.

## Usage

Simple type on the left side of the screen, and your parsed markdown will appear on the right. Simple!
