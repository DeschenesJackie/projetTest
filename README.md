# projetTest
Page 1
localhost:8001/weather/current
Page affiche des données de la météo pour la latitude et la longitude qui sont hard-coder a la ligne 19 de src/Controller/CurrentWeather.php
http://localhost:8001/weather/dbstats
page affiche le nombre d'enregistrement dans la base de donnée et la température moyenne des enregistrements.

Comme demander j'ai garder note de mon progres. J'ai eu beaucoup de ralentissement vu que c'étais la premiere foix que j'utilisais Symfony et Docker

06:00 Project start
08:44 Docker/Symfony up display on localhost:8001
09:06 mysql is now running
09:43 fixed git problem
10:46 Used template to create the HTML page "Hello World!" With title Welcome.
10:50 to 11:05 Break
11:59 First call to API 'https://api.openweathermap.org/data/2.5/onecall' and succesfully display 'timezone'
13:00 Simple API call and display of data using Template complete
13:21 Work Start on Doctrine
13:48 Table/Entity created with Doctrine
14:51 Save entry into db use entity to display API result
16:24 Added 2 statistics from db (un-imaginative) / Attempted (failed) to display of previous API call through http://localhost:8001/weather/current/{{ id }}
16:36 Abandon de tentative de faire des ajouts au projet commit planning to turn in soon. (Attempted to create a form to modify lat and lon using post)

Plannification de la bases de donnée

WeatherReport table
timezone : string 40
lat : float
lon : float
date_time : string 20
sunrise : string 8
sunset : string 8
temp : float
real_feel : float
humidity : integer
clouds : integer
winds : float
conditions : text Nullable
