# Customer-Return-Request
Assignment - Custom Return Request Module with Admin Grid

## Overview
The Customer Return Request module allows customers to create return requests for their orders from the frontend and enables administrators to manage, approve, or reject those requests from the Magento Admin panel.
This module is useful for stores that want a simple, custom return (RMA-like) workflow without using Magento Commerce RMA features.

## Refrence Screenshots
Screenshots or screencast of the module are available in the `Screenshots Screencast` directory.

## Features
### Frontend (Customer)
- View eligible orders for return
- Create a return request with reason
- View return request details and status
- Order history integration (Return column)

### Admin Panel
- View all return requests in a grid
- Mass actions:
    - Approve return requests
    - Reject return requests
    - Mark as New
- View return request details
- Status history tracking

## Technical Highlights
- Service Contracts (API & Repository pattern)
- UI Component based admin grid
- Custom database tables
- Clean separation of Adminhtml and Frontend logic

## Installation Guide

### Method 1: Manual Installation (Recommended for Development)
- Copy the module to Magento codebase: app/code/Malvic/ReturnRequest
- Ensure folder permissions are correct.
- Run the following Magento CLI commands:
    php bin/magento module:enable Malvic_ReturnRequest
    php bin/magento setup:upgrade
    php bin/magento setup:di:compile
    php bin/magento setup:static-content:deploy
    php bin/magento indexer:reindex
    php bin/magento cache:clean
    php bin/magento cache:flush
- Log in to Admin Panel and verify the module is enabled.

### Method 2: ZIP Installation
- Extract the ZIP file.
- Place the Malvic/ReturnRequest directory inside: app/code/
- Run Magento upgrade commands (same as above).

## Configuration
Currently, the module works with default configuration and does not require additional admin settings.
(You may extend it later with email notifications, status configuration, or return reasons.)

## Admin Access (ACL)
Admin users must have appropriate permissions to access return requests:
    Stores → Settings → Configuration → Advanced → System → Permissions → User Roles
Ensure access to Return Requests is enabled for the role.

## Database Tables
### The module creates custom tables using db_schema.xml, such as:
- malvic_return_request
- malvic_return_status_history

### These tables store:
- Order ID
- Customer ID
- Reason for return
- Current status
- Status change history

## Compatibility
- Magento Open Source 2.4.8^
- PHP 8.4 (based on Magento version)

## Author
Developed by Deepesh Kumar
Magento Developer

## License
### Proprietary License – All Rights Reserved

This software is the exclusive intellectual property of Malvic Software Private Limited.

Unauthorized use, reproduction, modification, distribution, sublicensing, publication, or resale of this module—in whole or in part—is strictly prohibited.

This module is provided solely for the personal, commercial, and professional use of the author and Malvic Software Private Limited.
No individual, company, or organization is permitted to use this software for their own projects, commercial or non-commercial, without explicit written permission from the copyright holder.

Any violation of these terms may result in legal action.

© Malvic Software Private Limited. All rights reserved.