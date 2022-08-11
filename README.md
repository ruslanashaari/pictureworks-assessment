# Pictureworks Assessment

## Documentation

### Assumption
1. Assuming that the password should be store in the database as hash, so the column password is included in the users table


### Routes

1. GET: {{ url }}/user/{{ id }} 
	Required parameter: id
	Description: The route to display **view HTML (Blade)** with existing user id

2. POST: {{ url }}/user
	Required body request: id, comments, password
	Description: The route to post **form request** or **JSON object** to append user comments with given comment in body request

### Migration

1. Table users
	Description: Drop the existing users table (prepared by Laravel) and create a new one with columns id, name, comments and password

### Test Case

- [x] 1. User successfully view HTML (Blade) test with existing user

- [x] 2. User view response text test with non existing user

- [x] 3. User successfully post append comment with existing user

- [x] 4. User failed to post append comment using wrong password

- [x] 5. User failed to post append comment using non existing user id

- [x] 6. User successfully post append comment with existing user (JSON body request)

- [x] 7. User successfully post append comment with existing user using artisan command

- [x] 8. User failed to append comment with non existing user id using artisan command


### Checklist Assessment

- [x] 1. GET requests with URL parameters "?id=X" should return the existing styled HTML for some user with id "X". All input must be validated.

- [x] 2. POST requests with form fields "password", "id" and "comments" will append the value of 'comments' to the existing comments field of user with identifier 'id' provided the 'password' is a given static value. All input must be validated.

- [x] 3. POST requests with a JSON object containing "password", "id" and "comments" will do exactly the same as (2) above. All input must be validated.

- [x] 4. Command line executions such as "php controller.php ID COMMENTS" will essentially do the same as (2) above, too, where "ID" is the user identifier and "COMMENTS" is some amount of comments, potentially with spaces. No password is required for this execution type. All input must be validated. Hint: behavior should be ported over to Artisan console commands.

- [x] 5. Parts 1-4 above should be ported with expected functionality using native Laravel behavior (e.g. url “?id=x” should be available via "/user/{id}").

- [x] 6. Migrations must be provided. Seeders must be provided. And .env.example file should be filled in with the relevant info.

- [x] 7. Documentation must list all the routes implemented, params and what they do. 