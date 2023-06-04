## Application Demo

https://github.com/sayedsafwe77/beyond_creation_assignment/assets/73827400/aacfbfe2-6146-4f77-9c1c-7714118e7c50

## Application Setup

-   [Installation](#installation)
-   [Setup](#setup)

<a name="installation"></a>

### Installation

-   Clone the repository

```
    git clone https://github.com/sayedsafwe77/beyond_creation_assignment.git
```

-   `cd` into the project directory

```
   cd beyond_creation_assignment
```

-   Run `Composer Install`

```
    Composer Install
```

-   Run `npm install`

```
    npm install
```

<a name="setup"></a>

### Setup

-   Run `cp .env.example .env`

```
    cp .env.example .env
```

-   Create Database And Add Database Credentails To .env file

-   Run `php artisan migrate --seed`

```
    php artisan migrate --seed
```

-   Run `php artisan l5-swagger:generate` to generate api documentation

-   Run `npm run dev`

```
    npm run dev
```

-   Run `php artisan serve`

```
    php artisan serve
```

-   Visit `http://127.0.0.1:8000/dashoard`

-   If You Want To Visit Api Documentation

-   Visit `http://127.0.0.1:8000/api/documentation`
