# Optimus Prime Numbers
## Pre-requirements
To run this application you must have installed Docker and Docker Compose on your machine.

## Installation

1. Clone the repository by issuing the command `git clone https://github.com/nickbass72/optimus-prime.git`
2. Enter the application directory with `cd optimus-prime`
3. Create your local `.env` file copying it from `.env.dist`. Open `.env` file and edit the variable values if needed. The meaning of each variable in the file is explained with a comment.
4. The Docker container for development can be built and started issuing `docker-compose up -d --build`.
   For Mac users using the Mutagen extension for Docker desktop, the command is `mutagen-compose -f docker-compose-mutagen.yml up -d --build`

## Configuration
There are two configuration parameters available in `config/parameters.php` file. The meaning of each of them is explained inside the file.

## Running the application
1. Enter the container issuing `docker-compose exec -it app bash` or `mutagen-compose exec -it app bash`.
2. Execute the command `bin/console application`. The prime numbers multiplication table should be displayed as a result.  

## Running the tests
1. To run the tests inside the container issue the command `vendor/bin/phpunit`.
