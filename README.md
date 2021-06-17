## Introduction

This is a short coding assignment, in which you will implement a REST API that calls an external
API service to get information about books. Additionally, you will implement a simple CRUD
(Create, Read, Update, Delete) API with a local database of your choice.

## Requirements to Implement

Your solution should provide an implementation for each of the following requirements. The
tasks will be tested with the specified endpoints while expecting the specified JSON

### Requirements (Questions)

1. The external API that will be used here is the [Ice And Fire API](https://anapioficeandfire.com/Documentation#books). This API requires no sign up /
authentication on your part.

2. Implement a simple CRUD (Create, Read, Update, Delete) API with a local database (MySQL).



### Repository Branches

The Repository has Four(4) Branches stated below:

- <b>iceAndFireApi</b>  [Branch For Requirement 1]
- <b>Books</b>  [Branch For Requirement 2] 
- <b>development</b>  [This branch comprises of the two Branches 'iceAndFireApi, Books']
- <b>master</b> [This is the main branch]



## Installation Process


### 1. Clone The Repository Locally

If the project is hosted on github, we can use git on your local computer to clone it from github onto your local computer.

```
git clone https://github.com/Kazmodeston/book-assessment.git
```

### 2. cd into your project

You will need to be inside that project file to enter all of the rest of the commands in this tutorial. So remember to type `cd projectName` to move your terminal working location to the project file we just barely created. (Of course substitute “projectName” in the command above, with the name of the folder you created in the previous step).

```
cd book-assessment
```

### 3. Install all necessary dependency using :

Whenever you clone a new Laravel project you must now install all of the project dependencies. This is what actually installs Laravel itself, among other necessary packages to get started.

When we run composer, it checks the `composer.json` file which is submitted to the github repo and lists all of the composer (PHP) packages that your repo requires. Because these packages are constantly changing, the source code is generally not submitted to github, but instead we let composer handle these updates. So to install all this source code we run composer with the following command:

````
composer install
````

### 4. Create a copy of your .env file

``` .env ``` files are not generally committed to source control for security reasons. But there is a ``` .env.example ``` which is a template of the ``` .env ``` file that the project expects us to have. So we will make a copy of the ``` .env.example ``` file and create a ``` .env ``` file that we can start to fill out to do things like database configuration in the next few steps. 

````
cp .env.example .env
````

This will create a copy of the ``` .env.example ``` file in your project and name the copy simply ``` .env ```.


### 5. Generate an app encryption key

Laravel requires you to have an app encryption key which is generally randomly generated and stored in your .env file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.

Laravel’s command line tools thankfully make it super easy to generate this. In the terminal we can run this command to generate that key. (Make sure that you have already installed Laravel via composer and created an ``` .env ``` file before doing this, of which we have done both).

```
php artisan key:generate
```

If you check the ```.env``` file again, you will see that it now has a long random string of characters in the ```APP_KEY field```. We now have a valid app encryption key.



### 6. Create an empty database for our application

Create an empty database for your project using the database tools you prefer (MySQL=> phpMyAdmin). In our example we created a database called “books”. Just create an empty database here, the exact steps will depend on your system setup.


### 7. In the .env file, add database information to allow Laravel to connect to the database

We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must add the connection credentials in the .env file and Laravel will handle the connection from there.


In the .env file fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.


### 8. Migrate the database

Once your credentials are in the .env file, now you can migrate your database.

```
php artisan migrate
```

### 9. [Optional]: Seed the database

 Run the seed, which fills your database with dummy or fake data. 

```
php artisan migrate --seed
```

This will create five(5) randomly generated Books with its attributes


### 10. Run Server

This will enable us to run the Laravel project before the Routes/Endpoints could be tested.

```
php artisan serve
```
<b>
	Note that, whenever you run the server, it will run on default port `8000`, so when that port is in use, then you can make use of the command below by specifying your port number 
</b>

```
php artisan serve --port=portNumber
```
portNumber could be `8001`, `8002`, `8080` or any



## Separating the Requirements/Questions

- Create and Checkout to respective branches above aside master branch, then pull the branch using :

##### Example:
````
git checkout -b Books

git pull origin Books
````  

This Books branch happens to be the CRUD functionality for books



## Testing Endpoints.

- Suppose the server runs on port 8000, then we have the endpoint below


#### Requirement 1:

- Browse through the vendor directory, open the directories to look for Client.php `guzzlehttp` > `guzzle` > `src`, then open Client.php,

- Look for a method called `configureDefaults`, in variable array `$defaults`, locate key `verify` and set the value to `false`. This will enable you to make use of HttpClient which is the new feature from Laravel 7.

- GET single Book from an external API

```
http://127.0.0.1:8000/api/external-books/{nameOfABook}
```
where `nameOfABook` is the precise name of Book e.g `A Game Of Thrones`




#### Requirement 2:

```
GET  all Books

http://127.0.0.1:8000/api/v1/books
``` 

```
POST  Book

http://127.0.0.1:8000/api/v1/books
``` 

```
GET  single Book

http://127.0.0.1:8000/api/v1/books/{id}
``` 

```
PUT  edit Book

http://127.0.0.1:8000/api/v1/books/{id}
``` 

```
DELETE  single Book

http://127.0.0.1:8000/api/v1/books/{id}
``` 


## [Optional] Running PHPUnit Testing.

This will test the codes even before checking using Client tool like `Postman`, run this code below:

````
./vendor/bin/phpunit.bat
```