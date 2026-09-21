# Web Defaced Attack

## Overview

Web Defaced Attack is an intentionally vulnerable PHP web application designed for controlled web security research, defensive testing, and website defacement experiments. It provides a small, reproducible target for observing common application weaknesses and evaluating security or defacement-detection workflows.

The application is packaged with Docker Compose so the PHP/Apache service and MariaDB database can be started consistently on a local machine or isolated Linux server.

> **Important:** This project is intentionally insecure. Use it only in an isolated, authorized environment.

## Features

- Database-backed username and password login form.
- Deliberately injectable SQL query for SQL injection testing.
- Reflected cross-site scripting (XSS) demonstration through the search page.
- Unrestricted file upload page with persistent upload storage.
- Simple post-login dashboard.
- MariaDB schema and sample-user initialization through `setup.sql`.
- Container health checks, restart policies, and persistent Docker volumes.
- Image, HTML, notebook, and trained-model artifacts for related web defacement research; these are excluded from the web application image.

## Tech Stack

- PHP 8.3 with `mysqli`
- HTML and CSS
- Apache HTTP Server
- MariaDB 11.4
- Docker and Docker Compose
- TensorFlow/Keras and Jupyter Notebook for the included ResNet50 research artifacts

## Project Structure

```text
.
|-- index.php            # Vulnerable database-backed login page
|-- dashboard.php        # Simple application dashboard
|-- search.php           # Reflected XSS demonstration
|-- upload.php           # Unrestricted file upload demonstration
|-- db_config.php        # Primary database connection configuration
|-- config.php           # Alternate compatible database configuration
|-- setup.sql            # MariaDB schema and initial sample user
|-- Dockerfile           # PHP/Apache application image
|-- compose.yaml         # Application, database, health checks, and volumes
|-- .dockerignore        # Excludes secrets and research artifacts from builds
|-- .env.example         # Environment configuration template
|-- uploads/             # Existing local upload artifacts; not copied to image
|-- Dataset/             # Image and HTML datasets for defacement research
`-- Notebook/            # ResNet50 notebook, diagrams, logs, and model artifact
```

The Docker image contains only the PHP runtime files. `Dataset/`, `Notebook/`, `.env`, Git metadata, model files, reports, and existing uploads are excluded from the build context.

## Architecture

```text
Browser
   |
   | HTTP (APP_BIND_ADDRESS:APP_PORT)
   v
PHP 8.3 + Apache application
   |
   | mysqli over the private Compose network
   v
MariaDB
```

The application connects to MariaDB using the Compose service name `db`. The database is not published directly to the host.

## Docker Setup

### Prerequisites

- Git
- Docker Engine
- Docker Compose plugin

### Clone and run

```bash
git clone https://github.com/Nhat22-archlinux/Web_Defaced_Attack.git
cd Web_Defaced_Attack

cp .env.example .env
chmod 600 .env
```

Edit `.env` and replace the placeholder database passwords before starting the services.

```bash
docker compose up -d --build
docker compose ps
```

On systems where the Docker daemon requires elevated privileges, prefix Docker commands with `sudo`.

## Environment Variables

| Variable | Purpose | Example from template |
|---|---|---|
| `APP_BIND_ADDRESS` | Host interface used to publish the web application | `127.0.0.1` |
| `APP_PORT` | Host port mapped to Apache port 80 | `8080` |
| `DB_NAME` | MariaDB database name | `Web_Deface_Attack` |
| `DB_USER` | Application database user | `webdeface` |
| `DB_PASSWORD` | Password for the application database user | Replace the placeholder |
| `DB_ROOT_PASSWORD` | MariaDB root password used during initialization | Replace the placeholder |

Do not commit `.env`. It is ignored by Git and excluded from the Docker build context.

## Database Initialization

On the first startup, Compose mounts `setup.sql` into MariaDB's initialization directory. The script creates the `Web_Deface_Attack` database, creates the `users` table, and inserts a sample account for controlled testing.

Database files persist in the named volume `web-defaced-attack_db_data`. Initialization scripts run only when MariaDB starts with an empty data directory. The upload directory persists separately in `web-defaced-attack_uploads_data`.

## Access

The application is available at:

```text
http://<APP_BIND_ADDRESS>:<APP_PORT>
```

With the values in `.env.example`, access it locally at `http://127.0.0.1:8080`.

Keep `APP_BIND_ADDRESS=127.0.0.1` for local-only access. If a different bind address is required in a controlled lab, update the variable deliberately and apply appropriate firewall or network isolation controls.

## Useful Docker Commands

Start the services:

```bash
docker compose up -d
```

Stop the services while preserving volumes:

```bash
docker compose down
```

Rebuild and restart after source changes:

```bash
docker compose up -d --build
```

View service status:

```bash
docker compose ps
```

Follow logs:

```bash
docker compose logs -f --tail=200
```

View logs for one service:

```bash
docker compose logs -f app
docker compose logs -f db
```

## Security Warning

This application intentionally includes exploitable behavior, including SQL injection, reflected XSS, and unrestricted file uploads. It is provided exclusively for education, defensive research, and authorized security testing.

- Run it only in an isolated or tightly controlled environment.
- Do not expose it directly to the public internet.
- Do not deploy it as a production application.
- Do not test against systems you do not own or have explicit authorization to assess.
- Treat uploaded files and database contents as untrusted.

## Related Research

This vulnerable application can be used alongside a separate web defacement detection project based on ResNet50. It can provide controlled application behavior and defacement scenarios for testing a detection workflow.

The included `Dataset/` and `Notebook/` directories contain supporting image/HTML datasets and a TensorFlow/Keras ResNet50 training notebook. These research artifacts are not required to run the Dockerized PHP application and are intentionally excluded from its image.
