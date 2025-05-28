# Makefile for setting up Laravel project

# Set default shell
SHELL := /bin/bash

# Variables
PHP = php
COMPOSER = composer
NPM = npm
ARTISAN = $(PHP) artisan

# Default target
all: setup

# Setup Laravel environment
setup: env vendor migrate build

# Copy .env.example to .env and generate app key
env:
	cp -n .env.example .env || true
	$(ARTISAN) key:generate

# Install PHP dependencies
vendor:
	$(COMPOSER) install

# Run DB migrations
migrate:
	$(ARTISAN) migrate

# Install and build frontend assets
build:
	$(NPM) install
	$(NPM) run build

# Clear caches (optional utility)
refresh:
	$(ARTISAN) optimize:clear

# Run dev server
serve:
	$(ARTISAN) serve

.PHONY: all setup env vendor migrate build refresh serve
