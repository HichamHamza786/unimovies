# Data dictionary - Unimovies

## casting

| Column | Type | Null | Default | Links to | Comments | Media type |
| -- | -- | -- | -- | -- | -- | -- |
| id (Primary) | int(11) | No |
| person_id | int(11) | No |  | person -> id | 
| movie_id | int(11) | No | | movie -> id |
| role | varchar(100) | No | 
| credit_order | smallint(6) | No |


## genre

| Column | Type | Null | Default | Links to | Comments | Media type |
| -- | -- | -- | -- | -- | -- | -- |
| id (Primary) | int(11) | No |
| name | varchar(100) | No |


## movie

| Column | Type | Null | Default | Links to | Comments | Media type |
| -- | -- | -- | -- | -- | -- | -- |
| id (Primary) | int(11) | No |
| title | varchar(255) | No |
| release_date | date | No |
| duration | int(11) | No |
| type | varchar(10) | No |
| summary | varchar(255) | No |
| synopsis | varchar(5000) | No |
| poster | varchar(2083) | No |
| rating | decimal(2,1) | Yes | NULL | 
| slug | varchar(255) | No |


## movie_genre

| Column | Type | Null | Default | Links to | Comments | Media type | 
| -- | -- | -- | -- | -- | -- | -- |
| movie_id (Primary) | int(11) | No | movie -> id |
| genre_id (Primary) | int(11) | No | genre -> id |


## person
Column
Type
Null
Default
Links to
Comments
Media type
id (Primary) 
int(11) 
No




firstname 
varchar(100) 
No




lastname 
varchar(100) 
No


## review
Column
Type
Null
Default
Links to
Comments
Media type
id (Primary) 
int(11) 
No




movie_id 
int(11) 
No

movie -> id


username 
varchar(50) 
No




email 
varchar(255) 
No




content 
longtext 
No




rating 
double 
No




reactions 
longtext 
No


(DC2Type:json)

watched_at 
datetime 
No


## season
Column
Type
Null
Default
Links to
Comments
Media type
id (Primary) 
int(11) 
No




movie_id 
int(11) 
No

movie -> id


number 
smallint(6) 
No




episodes_number 
smallint(6) 
No




## user
Column
Type
Null
Default
Links to
Comments
Media type
id (Primary) 
int(11) 
No




email 
varchar(180) 
No




roles 
longtext 
No


(DC2Type:json)

password 
varchar(255) 
No


