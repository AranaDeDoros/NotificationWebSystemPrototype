## ABOUT

A barebones Email Notification WebSystem using Laravel 7. Allows you to manage users, groups, and program notifications. The workflow is as follows: 

* Login as either admin or regular user. 
* Make a new notification and add users or groups that will receive it. 

## HOW TO INSTALL

1. Clone the repo 
2. Install the dependencies  `npm i` 

## HOW TO RUN

### Run the App 
`php artisan run` 
### Execute the commands and they'll be enqueued 
`php artisan notifications:info|alert|error` 
### Run the queued commands to start sending the emails 
`php artisan queue:work` 

## CREDITS
**Icons borrowed from:**   
  [https://www.flaticon.com/authors/freepik](Freepik)  
  [https://friconix.com/](Ficonix)  