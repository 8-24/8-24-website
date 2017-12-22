# Agence 824
## Installation 
### Install wamp
### Install NodeJs
https://www.youtube.com/watch?v=53U0TBKFwUw

### Install Database
Create database named 8-24 in your database manager
from your project :
- `composer update`
- `npm install`
- `php artisan key:generate`
 copy the key base64:XXX...= in your env. file and past it to the APP_KEY value
- `php artisan migrate`
Now the php side should work
- `php artisan serve`

### setting git
- `git clone git@github.com:YOUR-USERNAME/YOUR-FORKED-REPO.git`
- `cd into/cloned/fork-repo`
- `git remote add upstream git://github.com/ORIGINAL-DEV-USERNAME/REPO-YOU-FORKED-FROM.git`
- `git fetch upstream`


## Usefull commands
<<<<<<< HEAD
- `npm run dev` To compile sass & JS
- `php artisan migrate:refresh` To refresh the database 
- `php artisan db:seed` To fill the database with seeder, to do after the refresh or it will be many duplications
=======
- To compile sass & JS
- `npm run dev`
####To refresh the database
- `php artisan migrate:refresh`
####To fill the database with seeder, to do after the refresh or it will be many duplications
- `php artisan db:seed`

#### To add new commit
- `git commit -m "commit description"`
#### To push commit online
- `git push -u origin`
#### To get updates from another collaborator
- `git pull upstream master`

