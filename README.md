<!-- @format -->

# Laravel Calculator Application

This project is a simple web-based calculator built using Laravel, Docker, and Make for automation. The application allows users to perform basic arithmetic operations such as addition, subtraction, multiplication, and division.

## Tools

#### Docker

- visit "[https://www.docker.com](https://www.docker.com)

#### make

- for linux : use the package manager
- for windows : visit [https://gnuwin32.sourceforge.net/packages/make.htm](https://gnuwin32.sourceforge.net/packages/make.htm)

## Docker Setup

- build : `make build`
- up the services : `make up`
- stop the services : `make down`
- restart the services : `make restart`
- execute shell commands inside the app container : `make sh`
- execute laravel tests : `make test`
- run unit tests : `make test-unit`

## Laravel env Setup

- edit `docker/configs/laravel/.env`

## Run Laravel

- go to http://localhost:82/calculator
