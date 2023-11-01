![laravel](https://img.shields.io/badge/laravel-v10-0678BE.svg?style=flat-square)
![php](https://img.shields.io/badge/PHP-v8.2-828cb7.svg?style=flat-square)
![Node](https://img.shields.io/badge/node-v19-644D31.svg?style=flat-square)
![composer](https://img.shields.io/badge/composer-v2.6.4-126E75.svg?style=flat-square)

## ABOUT
An simple Laravel project to retrieve Instagram posts

## HOW TO INSTALL THE PROJECT

### 1/ BACKEND

#### 1.1_ Create the directory on your computer
```
mkdir bbs-instagram-laravel
```

#### 1.2_ Clone the website project from your directory (don't forget the . at the end):
```git
git clone git@github.com:Rapkalin/bbs-instagram-laravel.git .
```

#### 1.3_ Move to the project directory and install the backend dependencies:
```
cd bbs-instagram-laravel
composer install
```

#### 1.4_ Copy the .env.sample file, rename it to .env and complete the needed variables:
```
DATABASE_NAME='bbs-instagram-laravel'
DATABASE_USER='your-database-username'
DATABASE_PASSWORD='your-database-password'
DATABASE_HOST='localhost'

WP_ENV=local
WP_CONTENT_URL=https://bbs-instagram-laravel.local/
WP_SITEURL=https://bbs-instagram-laravel.local/

```

#### 1.5_ Configure your vHost
- ServerName: bbs-instagram-laravel.local
- Directory: bbs-instagram-laravel/public
```
  <VirtualHost *:80>
    ServerName bbs-instagram-laravel.local
    DocumentRoot "/Path/to-your/directory/public/"
    ServerAlias bbs-instagram-laravel.local.*
    <Directory "/Path/to-your/directory/public/">
      Options Includes FollowSymLinks
      AllowOverride All
    </Directory>
 </VirtualHost>
```

#### 1.6_ Run migrations
- Migrate 
```
php artisan migrate
```

### 2/ FRONTEND
- This project build with Vite x Laravel.
- Go to the website directory
```
  cd website
```
- Install the dependencies
```
  nvm use
  npm install
```
- Build the frontend project
```
  npm run build
```
- Launch the dev mode
```
  npm run dev
```

## GENERAL INFORMATION ON THE PROJECT

### 1/ BRANCHES
We use a simple process due to low developer numbers working on this project.
All development are made from the develop branch. 
```
  git checkout develop
  git pull --rebase
  git add xxx
  git commit -m "name-of-your-branch"
  git push
```

When everything is OK, the branches are merge into main
```
  git checkout mail
  git pull --rebase
```
