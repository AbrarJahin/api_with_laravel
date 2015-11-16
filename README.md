# Logistics-API for iOS and Android Apps of Terra App

## Web URL - https://terra-app.com/

###Server Installation (AWS Linux env)

Corn job ( http://laravel.com/docs/5.1/scheduling ) needed to update the "partner_service_scheduling" table every day so that next job can be created autometically

```clj
cd var/www

git clone https://github.com/terra-app/logistics-API

cd logistics-API

composer install

set up .env file from .env.example and change the .env file to configurations,
run these below commands

php artisan key:generate

/////////////////////////////////

composer dump-autoload

php artisan migrate:rollback

-> if any problem occured

/////////////////////////////////

php artisan migrate:reset

php artisan migrate --seed
```

------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------

## API Documentation

------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------
### Client Account
------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------
No of total pages- 7

#### Page 1 of 7
------------------------------------------------------------------------------------------
##### Summary - List

Summary of last defined day's works, partner's name, average rating given to partner, total jobs done in that perios and total payout for those works.

###### Request

Request Type    | URL to request
----------------|----------------------
POST            | **base_url**/api/customer/list_summary

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access
**no_of_day_to_show**   | Data of the needed days, optional, default = 7
**data_per_page**       | No of data per page, optional, default = 10
**current_page_no**     | Current active page no, optional, default = 1

###### Response

```json
{
  "no_of_day_to_show": "7",
  "data_per_page": 10,
  "data": [
    {
      "lawn_pro": "Any Name",
      "rating": "4.5",
      "jobs": "Any job detail",
      "payout": 56
    },
    {
      "lawn_pro": "Any One",
      "rating": "4.2",
      "jobs": "New job",
      "payout": "120"
    }
  ],
  "current_page_no": "1",
  "total_page_no": 1,
  "showing_start": 1,
  "showing_end": 2,
  "total_no_of_data": 2
}
```

Field Name              | Description
------------------------|------------
**no_of_day_to_show**   | No of last day's data shown
**data_per_page**       | No of data per page
**data**                | Current page's data
**current_page_no**     | Current page's number
**total_page_no**       | Total no of pages
**showing_start**       | Current page's start data
**showing_end**         | Current page's start data
**total_no_of_data**    | Total data available


##### Jobs - List

List of all jobs of current user

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/list_jobs

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access
**no_of_day_to_show**   | Data of the needed days, optional, default = 7
**data_per_page**       | No of data per page, optional, default = 10
**current_page_no**     | Current active page no, optional, default = 1

###### Response

```json
{
  "no_of_day_to_show": "7",
  "data_per_page": 10,
  "data": [
    {
      "finished_by": "Other Partner",
      "date": "7th January, 2015",
      "time_started": "2:13:11 PM",
      "time_completed": "5:52:14 PM",
      "pay": "100",
      "status": "done"
    },
    {
      "finished_by": "New Partner",
      "date": "6th January, 2015",
      "time_started": "12:13:11 PM",
      "time_completed": "1:12:14 PM",
      "pay": "50",
      "status": "done"
    }
  ],
  "current_page_no": "1",
  "total_page_no": 1,
  "showing_start": 1,
  "showing_end": 2,
  "total_no_of_data": 2
}
```

Field Name              | Description
------------------------|------------
**no_of_day_to_show**   | No of last day's data shown
**data_per_page**       | No of data per page
**data**                | Current page's data
**current_page_no**     | Current page's number
**total_page_no**       | Total no of pages
**showing_start**       | Current page's start data
**showing_end**         | Current page's start data
**total_no_of_data**    | Total data available


#### Page 2 of 7
------------------------------------------------------------------------------------------
##### Profile - Show

Show current user's profile

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/profile_view

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access

###### Response

```json
{
  "first_name": "Abrar",
  "last_name": "Jahin",
  "neighbourhood": "4b02187c32",
  "email": "something@anything.com"
}
```

Field Name              | Description
------------------------|------------
**first_name**          | No of last day's data shown
**last_name**           | No of data per page
**neighbourhood**       | Current page's data
**email**               | Current page's number


##### Profile - Update

Update current user's profile

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/profile_update

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access
**first_name**          | No of last day's data shown,  optional
**last_name**           | No of data per page,          optional
**neighbourhood**       | Current page's data,          optional
**email**               | Current page's number,        optional

###### Response

```json
{
  "first_name": "Abrar",
  "last_name": "Jahin",
  "neighbourhood": "4b02187c32",
  "email": "something@anything.com",
  "message": "Updated Successfully"
}
```

Field Name              | Description
------------------------|------------
**first_name**          | No of last day's data shown
**last_name**           | No of data per page
**neighbourhood**       | Current page's data
**email**               | Current page's number
**message**             | If all updated or not


#### Page 3 of 7
------------------------------------------------------------------------------------------
##### Inviting Friends (by mail or phone)

'Is this format is OK @alex?'

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/inviting_friends

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access
**invitation_type**     | phone/email
**address**             | Phone number or email address
**message**             | Message of the customer

#### Page 4 of 7
------------------------------------------------------------------------------------------
##### Payment Statements - List

List of payments of current user

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/payment_statements

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access
**no_of_day_to_show**   | Data of the needed days, optional, default = 7
**data_per_page**       | No of data per page, optional, default = 10
**current_page_no**     | Current active page no, optional, default = 1

###### Response

```json
{
  "no_of_day_to_show": "7",
  "data_per_page": 10,
  "data": [
    {
      "basic_payment_status": "In Process",
      "extra_payment_status": "In Process",
      "basic_service_payment": "100",
      "week_ending": "7th January, 2015"
    },
    {
      "basic_payment_status": "Processed",
      "extra_payment_status": "Processed",
      "basic_service_payment": "50",
      "week_ending": "14th January, 2015"
    }
  ],
  "current_page_no": "1",
  "total_page_no": 1,
  "showing_start": 1,
  "showing_end": 2,
  "total_no_of_data": 2
}
```

Field Name              | Description
------------------------|------------
**no_of_day_to_show**   | No of last day's data shown
**data_per_page**       | No of data per page
**data**                | Current page's data
**current_page_no**     | Current page's number
**total_page_no**       | Total no of pages
**showing_start**       | Current page's start data
**showing_end**         | Current page's start data
**total_no_of_data**    | Total data available

#### Page 5 of 7
------------------------------------------------------------------------------------------
##### How can we help

'Need to talk to alex about it - what will be the page view and is it a feedback? of just ask questions@alex?'


###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/how_can_we_help

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access

##### View Training Videos

'Will be some video available in this page @alex?
Will be they youtube vedios @alex?'

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/training_videos

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access

###### Response

```json
{
  "video_links": [
    {
      "subject": "Anything",
      "link": "https://www.youtube.com/watch?v=ORV-6HyuG2Y&list=PL5O3zv"
    },
    {
      "subject": "Processed",
      "link": "https://www.youtube.com/watch?v=ORV-6HWPG2Y&list"
    }
  ]
}
```

Field Name                      | Description
--------------------------------|------------
**video_links**                 | Link of the website


##### Report issue with job

'Only storing the issue @alex?'

Reporting service - if any un usual problem occured in any job

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/reporting_issue_with_job

Body Field                        | Description
----------------------------------|------------
**login_name**                    | log_in name of the user
**access_token**                  | Token needed for next time API access
**scheduled_service_id**          | log_in name of the user
**partner_service_scheduling_id** | Token needed for next time API access
**report**                        | log_in name of the user

###### Response

```json
{
  "message": "Report Added Successfully, out team is checking the issue"
}
```

Field Name                      | Description
--------------------------------|------------
**message**                     | Output f everything done OK

#### Page 6 of 7
------------------------------------------------------------------------------------------
##### Link to app
'Will it be a fixed link returned from API (hard coded) or return from DB  @alex? Currently hard coded in API'

Link of the apps


###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/link_to_app

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access

###### Response

```json
{
  "web_link": "http://terra-app.com/",
  "app_android_customer_link": "https://play.google.com/store/apps/developer?id=Terra&hl=en",
  "app_android_partner_link": "https://play.google.com/store/apps/developer?id=Terra&hl=en",
  "app_ios_customer_link": "https://itunes.apple.com/us/app/terra/id373793156?mt=8",
  "app_ios_partner_link": "https://itunes.apple.com/us/app/terra/id373793156?mt=8"
}
```

Field Name                      | Description
--------------------------------|------------
**web_link**                    | Link of the website
**app_android_customer_link**   | Link of customer Android App
**app_android_partner_link**    | Link of partner Android App
**app_ios_customer_link**       | Link of customer iOS App
**app_ios_partner_link**        | Link of partner iOS App

#### Page 7 of 7
------------------------------------------------------------------------------------------
##### Registration

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/register

Body Field          | Description
--------------------|------------
**first_name**      | User's First Name
**last_name**       | User's Last Name
**login_name**      | User's Login Name
**password**        | User's password
**neighbourhood**   | User's neighbourhood
**email**           | User's Email

###### Response

```json
{
  "message": [
    "The login name has already been taken."
  ],
  "status": 0
}
```

Field Name      | Description
----------------|------------
**message**     | Server Message about log out responce
**status**      | true/false

##### Login

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/login

Body Field      | Description
----------------|------------
**login_name**  | User login name
**password**    | Password of the user

###### Response

```json
{
  "name": "Abrar Jahin",
  "login_name": "abrarjahin",
  "user_type": "customer",
  "access_token": "9e34573cd44f4daa98feabe131a4938056d967ec41def9dc1e1cdd3d63df40e02e045ff5f6b763fbc39dded0e5e9d8c736fa6d566fad9f169274e9e82d8e2109db79c6c66bfef73c8c4931842419938abe047b59c9ae8c98ab837638d502d51e89613cdc78fdf55da4b50677c6842b1cbc9c3354d7c3287e9d572868d833c42cddacbb163e991ef084ba2c9739716f7a714471586d72",
  "expires_on": {
    "date": "2015-11-07 08:12:57",
    "timezone_type": 3,
    "timezone": "UTC"
  }
}
```

Field Name          | Description
--------------------|------------
**name**            | User name
**login_name**      | User login name
**user_type**       | Type of the user
**access_token**    | Token needed for next time API access
**expires_on**      | Time of expire of the token


##### Logout

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/customer/logout

Body Field          | Description
--------------------|------------
**access_token**    | Token needed for next time API access

###### Response

```json
{
  "message": "Log Out Successfully",
  "status": 1
}
```

Field Name      | Description
----------------|------------
**message**     | Server Message about log out responce
**status**      | true/false


------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------
### Partner Account
------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------
No of total pages- 9

#### Page 1 of 9 - Authintication
------------------------------------------------------------------------------------------

##### Registration

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/partner/register

Body Field          | Description
--------------------|------------
**first_name**      | User's First Name
**last_name**       | User's Last Name
**login_name**      | User's Login Name
**password**        | User's password
**business_type**   | Type of Business
**company_name**    | User's Company Name
**type_of_phone**   | User's phone type
**is_18_years_old** | Is user 18 years old or not

###### Response

```json
{
  "message": "Successfully registered, please verify your mail",
  "status": 1
}
```

Field Name      | Description
----------------|------------
**message**     | Server Message about log out responce
**status**      | true/false

##### Login

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/partner/login

Body Field      | Description
----------------|------------
**login_name**  | User login name
**password**    | Password of the user

###### Response

```json
{
  "name": "Abrar Jahin",
  "login_name": "abrarjahin",
  "user_type": "customer",
  "access_token": "9e34573cd44f4daa98feabe131a4938056d967ec41def9dc1e1cdd3d63df40e02e045ff5f6b763fbc39dded0e5e9d8c736fa6d566fad9f169274e9e82d8e2109db79c6c66bfef73c8c4931842419938abe047b59c9ae8c98ab837638d502d51e89613cdc78fdf55da4b50677c6842b1cbc9c3354d7c3287e9d572868d833c42cddacbb163e991ef084ba2c9739716f7a714471586d72",
  "expires_on": {
    "date": "2015-11-07 08:12:57",
    "timezone_type": 3,
    "timezone": "UTC"
  }
}
```

Field Name          | Description
--------------------|------------
**name**            | User name
**login_name**      | User login name
**user_type**       | Type of the user
**access_token**    | Token needed for next time API access
**expires_on**      | Time of expire of the token


##### Logout

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/partner/logout

Body Field          | Description
--------------------|------------
**access_token**    | Token needed for next time API access

###### Response

```json
{
  "message": "Log Out Successfully",
  "status": 1
}
```

Field Name      | Description
----------------|------------
**message**     | Server Message about log out responce
**status**      | true/false

------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------

#### Page 2 of 9 - Profile Management
------------------------------------------------------------------------------------------

##### Profile - View

View current user's profile

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/partner/profile_view

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access

###### Response

```json
{
  "first_name": "Abrar",
  "last_name": "Hasin",
  "business_type": "Single Person Business",
  "company_name": "a7050c",
  "type_of_phone": "Other",
  "is_18_years_old": "yes",
  "uploaded_files": [
    {
      "file_type": "Profile Picture",
      "storing_name": "7_77b7eea953_ERD.pdf",
      "created_at": "2015-11-16 16:23:13",
      "updated_at": "2015-11-16 16:23:13"
    },
    {
      "file_type": "Profile Picture",
      "storing_name": "7_a7d2573a89_ERD.pdf",
      "created_at": "2015-11-16 16:23:25",
      "updated_at": "2015-11-16 16:23:25"
    },
    {
      "file_type": "Profile Picture",
      "storing_name": "7_c1c8c99814_ERD.pdf",
      "created_at": "2015-11-16 16:23:26",
      "updated_at": "2015-11-16 16:23:26"
    },
    {
      "file_type": "Profile Picture",
      "storing_name": "7_efd8915e36_ERD.pdf",
      "created_at": "2015-11-16 16:23:27",
      "updated_at": "2015-11-16 16:23:27"
    },
    {
      "file_type": "Profile Picture",
      "storing_name": "7_8fa08fbdd1_ERD.pdf",
      "created_at": "2015-11-16 16:23:28",
      "updated_at": "2015-11-16 16:23:28"
    },
    {
      "file_type": "Profile Picture",
      "storing_name": "7_b9537dc251_Untitled.png",
      "created_at": "2015-11-16 16:23:57",
      "updated_at": "2015-11-16 16:23:57"
    }
  ]
}
```

Field Name              | Description
------------------------|------------
**first_name**          | No of last day's data shown
**last_name**           | No of data per page
**business_type**       | Type of Business
**company_name**        | Name of partner's company
**type_of_phone**       | Partner's phone type
**is_18_years_old**     | Is the partner 16 years old
**uploaded_files**      | List of files uploaded by the partner


##### Profile - Update

Update current user's profile

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/partner/profile_update

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access
**first_name**          | First Name,               optional
**last_name**           | Last Name,                optional
**business_type**       | Type of Business,         optional
**company_name**        | Name of company,          optional
**type_of_phone**       | Partner's phone type,     optional
**is_18_years_old**     | Is partner 18 years old,  optional

###### Response

```json
{
  "first_name": "Anything",
  "last_name": "Nothing",
  "business_type": "Single Person Business",
  "company_name": "Any Company",
  "type_of_phone": "iOS",
  "is_18_years_old": "yes",
  "message": [
    "Updated Successfully",
    "'business_type' value can only be 'Single Person Business' or 'Multiple Person Business', so 'business_type' not updated"
  ]
}
```

Body Field              | Description
------------------------|------------
**first_name**          | First Name
**last_name**           | Last Name
**business_type**       | Type of Business
**company_name**        | Name of company
**type_of_phone**       | Partner's phone type
**is_18_years_old**     | Is partner 18 years old
**message**             | If all updated or not


##### Profile - Upload Documents

Upload Document or profile picture of the user

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/partner/upload_file

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access
**file_type**           | Type of file
**file**                | Image of PDF file

###### Response

```json
{
  "file": {
    "file_type": "Profile Picture",
    "storing_name": "7_69843c1c8a_ERD.png",
    "updated_at": "2015-11-16 16:37:42",
    "created_at": "2015-11-16 16:37:42"
  },
  "message": "Successfully Uploaded."
}
```

Field Name              | Description
------------------------|------------
**file_type**           | No of last day's data shown
**storing_name**        | No of data per page
**updated_at**          | Update Time
**created_at**          | Creation Time
**message**             | If all updated or not

##### Profile - Remove Documents

Remove Document or profile picture of the user

###### Request

Request Type  | URL to request
--------------|----------------------
POST          | **base_url**/api/partner/remove_file

Body Field              | Description
------------------------|------------
**login_name**          | log_in name of the user
**access_token**        | Token needed for next time API access
**file_name**           | Type of file

###### Response

```json
{
  "file_name": "7_debb412cab_ERD.pdf",
  "message": [
    "File Deleted from Storage",
    "Link Deleted from Database"
  ]
}
```

Field Name              | Description
------------------------|------------
**file_name**           | Name of the file to remove
**message**             | If all updated or not
