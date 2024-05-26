## Mail Campaign App

Mail Campaign App is a demo application for Mail Campaigning.
Customer can register and login to their account using simple authentication process ( > 2 mins).
Customer can create their user list, mail templates to run campaign. Public mail templates are also available.
Customer can create and schedule their mail campaign by selecting "Mail Template" and "Users".
Scheduled Campaign Mails will be handled in background to have smooth app working.

## Steps to Setup

- Clone the project using following command: 
    git clone https://github.com/DEV-ANSH-1121/campaingn-mailer.git
- Create a database and name it 'SIT_MAIL_CAMPAINGN'
- After successfull clone and database creation, run the below commands to setup project locally:

    - "composer update".
    - "cp .env.example .env".
    - "php artisan key:generate".
    - "npm install".
    - "php artisan migrate".
    - "php artisan db:seed".
    -  Hurraayy!!! Project Setup Done.


### Commands to run project locally
    We need to run 4 individual commmands on separate terminals.
    Note: These commands needs to run as long as you are using the application.

- **php artisan serve**
- **npm run dev**
- **php artisan queue:work**
- **php artisan schedule:work**

Run the application on browser using the serve url (usualy: http://127.0.0.1:8000)

## You can register and login to start using the application.
## You can also use the already created accounts with pre seeded data:

- **User 1: Ansh Suman**
    -Email    => 'yepansh001@gmail.com',
    -Password => 'Pa$$w0rd'

- **User 2: Shyrel Picache**
    -Email    => 'sheryl@sourceitmarketing.com',
    -Password => 'Pa$$w0rd'

- **User 3: John Doe**
    -Email    => 'john@example.com',
    -Password => 'Pa$$w0rd'



## Thanks for using "Mail Campaign App" 
## Incase of any suggestion or issue found, feel free to notify at: yepansh001@gmail.com" 

## Enjoy the application
