#CareerVista

A Website To Post Jobs Created In Laravel

## Get Started

### Requirements

### Migrations
To Create all the necessary tables and columns, run the following
````
php artisan migrate
````

### Seeding The Database
To add the dummy listings with a single user, run the following
````
php artisan db:seed
````

### File Uploading
When uploading listing files, they go to "storage/app/public". Create a symlink with the following command to make them publicly accessible.
````
php artisan storage:link
````

### Running The App
Upload the files to your document root, Valet folder or run
````
php artisan serve
````

