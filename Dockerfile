FROM php:8.2-apache

# Enable Apache modules
RUN a2enmod rewrite

# Install system packages and Python build dependencies
RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip \
    python3-venv \
    python3-dev \
    build-essential \
    cmake \
    libgtk-3-dev \
    libboost-all-dev \
    libssl-dev \
    libffi-dev \
    libjpeg-dev \
    libatlas-base-dev \
    libopencv-dev \
    ffmpeg \
    wget \
    curl \
    git \
    libgl1-mesa-glx \
    libgl1 \
    && rm -rf /var/lib/apt/lists/*

# ✅ Install mysqli extension for PHP
RUN docker-php-ext-install mysqli

# ✅ Create virtual environment
RUN python3 -m venv /opt/venv

# ✅ Upgrade pip inside venv and install packages
RUN /opt/venv/bin/pip install --upgrade pip && \
    /opt/venv/bin/pip install --no-cache-dir \
    numpy \
    dlib==19.24.0 \
    opencv-python \
    Pillow \
    mysql-connector-python \
    face_recognition

# ✅ Set environment path so venv is default
ENV PATH="/opt/venv/bin:$PATH"

# Copy your PHP project into Apache root
COPY . /var/www/html/

# Allow .htaccess overrides
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html/

EXPOSE 80
