## Insider Project - Cricket League Management

### Requirement Specifications
 
- It contains various modules create and manage matches, create and manage teams, create & manage locations and   create & manage players.
- Admin has the right to manage entire application from backend.
- Teams have matches.
- Match is played between any two teams.
- A separate team has multiple players.
- Front end user can see the Upcoming matches, total teams and points specific for a team.
- Front end user can click on teams and see the Players specific for a team. 


## Installation

#### Project setup
- Create a file named ```.env ``` and copy ```.env.example``` to it. Modify database connection details as per  environment. Modify server settings in that file too. 
- Go to project directory and run database migration with ```php artisan migrate```
- Run ```php artisan db:seed``` for all data migrations


### Run

- Hit url http://127.0.0.1:8000/ to view home page
- Hit url http://127.0.0.1:8000/matches to view upcoming matches
- Hit url http://127.0.0.1:8000/view-teams to view teams 
- Hit url http://127.0.0.1:8000/points to view points for a specific teams 

### Technical details
- Developed in Laravel 6.0


### How it is developed.

- First, Admin LTE theme is used for Admin Panel (backened).
- The requirement document is studied, and entities and its value objects are being drafted on paper.
- Then database migrations are written in folder ```database/migrations```
- Sample data is being input in ``database/seeds/DatabaseSeeder.php``
- Controllers are being namespaced in respective entity (using ADR pattern)
- Flow of web call (route -> Controller -> Service -> Model -> Service -> Controller -> View )

### Result Screenshot

Please see following screenshot - Result of Cricket League  ( https://drive.google.com/drive/folders/1HwbODgj2PDV0tetiUFf4npifuFmQWdca)