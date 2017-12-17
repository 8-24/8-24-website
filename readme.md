# Agence 824
## Installation 
### Install wamp
### Install NodeJs
https://www.youtube.com/watch?v=53U0TBKFwUw

### Install Database
Create database named 8-24 in your database manager
from your project :
- composer update
- npm install
- php artisan key:generate
-- copy the key base64:XXX...= in your env. file and past it to the APP_KEY value
- php artisan migrate
Now the php side should work
- php artisan serve 

