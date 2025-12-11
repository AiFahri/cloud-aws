<p align="center">
    <img src="public/favicon.ico" width="200" alt="AWS Cloud Manager Logo">
</p>

<h1 align="center">AWS Cloud Manager</h1>

<p align="center">
    <strong>Cloud-Based Data and File Management Platform with AWS S3 Storage Integration</strong>
</p>

<p align="center">
    <a href="#about">About</a> •
    <a href="#features">Features</a> •
    <a href="#technology-stack">Tech Stack</a> •
    <a href="#aws-services-implementation">AWS Services</a> •
    <a href="#architecture">Architecture</a> •
    <a href="#installation">Installation</a> •
    <a href="#usage">Usage</a> •
    <a href="#aws-configuration">AWS Configuration</a> •
    <a href="#contributing">Contributing</a> •
    <a href="#license">License</a>
</p>

---

## 🌐 Live Demo

Visit the live application: [http://alb-laravel-1977863577.us-east-1.elb.amazonaws.com/records](http://alb-laravel-1977863577.us-east-1.elb.amazonaws.com/records)

## ☁️ About

**AWS Cloud Manager** is a cloud-based data and file management platform integrated with Amazon Web Services (AWS) S3 Cloud Storage. This modern web application is designed to facilitate the management of data records and files with an intuitive, secure, and scalable interface.

### 📚 Project Information

This project is a **final project implementation** for the course **"Cloud-Based Technology"** (Teknologi Berbasis Cloud). The project demonstrates practical implementation of cloud computing concepts, specifically focusing on AWS cloud services integration, including:

-   **Cloud Storage**: Implementation of AWS S3 for file storage
-   **Cloud Infrastructure**: Deployment and configuration of cloud-based application
-   **Cloud Security**: Implementation of secure access and data management
-   **Scalable Architecture**: Building scalable web applications using cloud services

This project serves as a comprehensive learning exercise in cloud technology, showcasing real-world application of cloud computing principles and best practices.

### 🎯 Mission

To provide an efficient data and file management solution by leveraging AWS cloud infrastructure, ensuring security, scalability, and optimal performance for modern business needs.

## ✨ Features

### 📊 **Records Management**

-   **CRUD Operations**: Create, Read, Update, and Delete records with ease
-   **Data Sorting**: Data sorted by ID in ascending order
-   **Responsive Table**: Responsive table that works seamlessly on all devices
-   **Real-time Updates**: Real-time data updates with strict validation

### 📁 **File Management**

-   **Cloud Storage**: Upload files directly to AWS S3 bucket
-   **Multiple File Types**: Support for various file formats (images, PDF, documents, archives)
-   **Secure Access**: Temporary URLs for secure file access
-   **Drag & Drop**: User-friendly drag and drop interface for file uploads
-   **File Validation**: File size and type validation before upload

### 🎨 **User Interface**

-   **Modern Design**: Modern design with attractive indigo-purple gradient
-   **Responsive Layout**: Fully responsive for all devices (mobile, tablet, desktop)
-   **Smooth Animations**: Smooth animations for enhanced user experience
-   **Bootstrap Icons**: Complete and consistent icon set

### 🔒 **Security Features**

-   **AWS S3 Integration**: Files stored securely in AWS S3
-   **Temporary URLs**: Temporary URLs for secure file access
-   **Input Validation**: Strict input validation to prevent errors
-   **Error Handling**: Comprehensive error handling

## 🛠️ Technology Stack

### **Backend**

-   **Framework**: Laravel 12.x
-   **PHP Version**: PHP >= 8.2
-   **Database**: SQLite (can be configured to MySQL/PostgreSQL)
-   **AWS SDK**: AWS SDK for PHP v3
-   **Storage**: AWS S3 via Flysystem

### **Frontend**

-   **Styling**: Tailwind CSS 4.0
-   **Icons**: Bootstrap Icons
-   **Build Tool**: Vite 7.x
-   **JavaScript**: Vanilla JavaScript (ES6+)

### **Additional Tools**

-   **Composer**: PHP dependency manager
-   **NPM**: Node.js package manager
-   **Git**: Version control

## ☁️ AWS Services Implementation

This project will be fully deployed on AWS infrastructure using the following AWS services:

### **1. Amazon EC2 (Elastic Compute Cloud)**

-   **Purpose**: Running Laravel web application with Nginx web server
-   **Role**: Hosting the application server that processes all web requests
-   **Configuration**: EC2 instances configured with Nginx as reverse proxy and PHP-FPM for Laravel

### **2. Amazon RDS (Relational Database Service)**

-   **Purpose**: Managed MySQL database service
-   **Role**: Separate database layer from application server for better scalability and security
-   **Benefits**: Automated backups, high availability, and managed database operations

### **3. Amazon S3 (Simple Storage Service)**

-   **Purpose**: Object storage for uploaded files
-   **Role**: Storing all user-uploaded files (images, documents, archives)
-   **Features**: Scalable storage, secure access via temporary URLs, cost-effective file management

### **4. Elastic Load Balancer (Application Load Balancer - ALB)**

-   **Purpose**: Distributing incoming application traffic
-   **Role**: Load balancing across multiple EC2 instances to prevent server overload
-   **Benefits**: High availability, automatic traffic distribution, health checks

### **5. Amazon VPC (Virtual Private Cloud)**

-   **Purpose**: Isolated network environment
-   **Role**: Managing network configuration, subnets, and security groups
-   **Security**: Network isolation and controlled access between resources

### **6. Amazon CloudWatch**

-   **Purpose**: Monitoring and logging service
-   **Role**:
    -   Monitoring Nginx access and error logs
    -   Host-level metrics: CPU, Memory, Disk, and Network usage from EC2 instances
    -   Application performance monitoring
-   **Benefits**: Real-time monitoring, alerting, and log aggregation

### **7. IAM (Identity and Access Management) + Instance Profile**

-   **Purpose**: Secure access management
-   **Role**:
    -   Allowing EC2 instances to access S3 and CloudWatch without hardcoded credentials
    -   Using IAM roles and instance profiles for secure service-to-service communication
-   **Security**: Eliminates the need to store AWS credentials in application code

## 🏗️ Architecture

The following architecture diagram illustrates the infrastructure and data flow:

### **Architecture Overview**

```
┌─────────┐
│ Client  │
└────┬────┘
     │
     ▼
┌─────────┐
│   ALB   │  ← Elastic Load Balancer (distributes traffic)
└────┬────┘
     │
     ▼
┌─────────┐
│   EC2   │  ← Laravel Application + Nginx
└────┬────┘
     │
     ├──────────┐
     │          │
     ▼          ▼
┌─────────┐  ┌─────────┐
│   RDS   │  │   S3    │  ← MySQL Database  ← File Storage
│ (MySQL) │  │ (Files) │
└─────────┘  └─────────┘
     │
     ▼
┌─────────────┐
│ CloudWatch  │  ← Monitoring & Logging
└─────────────┘
```

### **Data Flow**

1. **Client → ALB → EC2 → RDS**

    - User requests flow through Application Load Balancer
    - ALB distributes traffic to EC2 instances
    - EC2 instances query RDS MySQL database for data operations

2. **Client → EC2 → S3**

    - File upload requests go to EC2 instances
    - EC2 instances store files directly to S3 bucket
    - File retrieval uses temporary S3 URLs

3. **EC2 → CloudWatch**
    - EC2 instances send logs and metrics to CloudWatch
    - Nginx access/error logs are collected
    - Host metrics (CPU, Memory, Disk, Network) are monitored

### **Security Architecture**

-   **VPC**: All resources are deployed within a private Virtual Private Cloud
-   **Security Groups**: Network-level firewall rules controlling traffic
-   **IAM Roles**: EC2 instances use IAM instance profiles for secure S3 and CloudWatch access
-   **No Hardcoded Credentials**: All AWS access uses IAM roles, eliminating credential exposure

## 🚀 Installation

### Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js >= 16.x
-   AWS Account with configured S3 bucket
-   AWS Access Key ID and Secret Access Key

### Setup Instructions

1. **Clone the repository**

```bash
git clone https://github.com/AiFahri/cloud-aws.git
cd cloud-aws
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Install Node.js dependencies**

```bash
npm install
```

4. **Environment configuration**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure AWS S3 credentials**

Edit the `.env` file and add AWS configuration:

```env
AWS_ACCESS_KEY_ID=your_access_key_id
AWS_SECRET_ACCESS_KEY=your_secret_access_key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your_bucket_name
AWS_USE_PATH_STYLE_ENDPOINT=false
```

6. **Configure database**

For SQLite (default):

```env
DB_CONNECTION=sqlite
```

Or for MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aws_cloud_manager
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. **Run database migrations**

```bash
php artisan migrate --seed
```

8. **Build frontend assets**

```bash
npm run build
```

9. **Start the development server**

```bash
# Development mode (with hot reload)
php artisan serve
npm run dev

# Production mode
php artisan serve
```

## 📖 Usage

### **Records Management**

1. **View Records**: Access `/records` to view all records
2. **Create Record**: Click "Add New Record" to create a new record
3. **Edit Record**: Click the "Edit" button on the record you want to modify
4. **Delete Record**: Click the "Delete" button to remove a record (with confirmation)

### **File Management**

1. **Upload File**: Access `/files` and drag & drop or select a file to upload
2. **View Files**: All uploaded files will be displayed on the files page
3. **Download/Preview**: Click the "Open" button to access the file (temporary URL)

### **Supported File Types**

-   **Images**: JPG, JPEG, PNG, GIF, WEBP
-   **Documents**: PDF, DOC, DOCX, TXT
-   **Archives**: ZIP, RAR

**File Size Limit**: Maximum 10MB per file

## ⚙️ AWS Configuration

### **S3 Bucket Setup**

1. **Create S3 Bucket** in AWS Console
2. **Configure Bucket Policy** for appropriate access
3. **Set CORS Configuration** if needed for web access
4. **Create IAM User** with policy that grants access to S3 bucket

### **IAM Policy Example**

```json
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Effect": "Allow",
            "Action": [
                "s3:PutObject",
                "s3:GetObject",
                "s3:DeleteObject",
                "s3:ListBucket"
            ],
            "Resource": [
                "arn:aws:s3:::your-bucket-name/*",
                "arn:aws:s3:::your-bucket-name"
            ]
        }
    ]
}
```

### **Environment Variables**

Make sure all AWS variables are properly configured in the `.env` file:

```env
AWS_ACCESS_KEY_ID=your_access_key_id
AWS_SECRET_ACCESS_KEY=your_secret_access_key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your_bucket_name
FILESYSTEM_DISK=s3
```

## 📱 Key Pages

-   **Landing Page** (`/`): Main page with feature overview and navigation
-   **Records Management** (`/records`): Complete CRUD data records management
-   **File Management** (`/files`): Upload and manage files on AWS S3

## 🔧 Configuration

### **File System Configuration**

File system is configured in `config/filesystems.php`:

```php
's3' => [
    'driver' => 's3',
    'key' => env('AWS_ACCESS_KEY_ID'),
    'secret' => env('AWS_SECRET_ACCESS_KEY'),
    'region' => env('AWS_DEFAULT_REGION'),
    'bucket' => env('AWS_BUCKET'),
    'url' => env('AWS_URL'),
    'endpoint' => env('AWS_ENDPOINT'),
    'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
],
```

### **File Upload Validation**

File upload validation can be configured in the route handler:

-   **Max Size**: 10MB (10240 KB)
-   **Allowed Extensions**: jpg, jpeg, png, gif, webp, pdf, doc, docx, txt, zip, rar

## 🧪 Testing

```bash
# Run tests
php artisan test

# Run tests with coverage
php artisan test --coverage
```

## 🤝 Contributing

We welcome contributions from the community! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### **Development Guidelines**

-   Follow PSR-12 coding standards for PHP
-   Use ESLint and Prettier for JavaScript code
-   Write meaningful commit messages
-   Include tests for new features
-   Update documentation as needed


## 🙏 Acknowledgments

-   **Laravel Community** for the excellent framework
-   **AWS** for powerful cloud services
-   **Tailwind CSS** for utility-first CSS framework
-   **Bootstrap Icons** for complete icon set
-   **Open Source Contributors** who made this project possible