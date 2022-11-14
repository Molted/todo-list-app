# Todo list API with JWT Authentication ⚙️
---

## Endpoints

<!-- Login -->
#### Endpoint: /api/login

Request body:
```json
{
  "email": "string",
  "password": "string"
}
```

Response body:
```json
{
    "status": "success",
    "user": {
        "id": 3,
        "name": "Joshua Concepcion",
        "email": "joshuaconcepcion@gmail.com",
        ...
    },
    "authorization": {
        "token": "eyJ0eXAiOiJK...",
        "type": "bearer"
    }
}
```

<!-- Register -->
#### Endpoint: /api/register

Request body:
```json
{
  "name": "Joshua Concepcion",
  "email": "joshuaconcepcion@gmail.com",
  "password": "password"
}
```

Response body:
```json
{
    "status": "success",
    "message": "User created successfully",
    "user": {
        "name": "Joshua Concepcion",
        "email": "joshuaconcepcion@gmail.com",
        ...
    },
    "authorization": {
        "token": "eyJ0eXAiOiJKV1Qi...",
        "type": "bearer"
    }
}
```

<!-- Logout -->
#### Endpoint: /api/logout

Requires **JWT Bearer Token**

Request body:
```
// Current Logged in User
```

Response body:
```json
{
    "status": "success",
    "message": "Successfully logged out"
}
```

<!-- Refresh Token -->
#### Endpoint: /api/refresh

Requires **JWT Bearer Token**

Request body:
```
// Current Logged in User
```

Response body:
```json
{
    "status": "success",
    "user": {
        "id": 3,
        "name": "Joshua Concepcion",
        "email": "joshuaconcepcion@gmail.com",
        ...
    },
    "authorization": {
        "token": "eyJ0eXAiOiJKV1...",
        "type": "bearer"
    }
}
```

<!-- Getting All Todos -->
#### Endpoint: /api/todos

Requires **JWT Bearer Token**

Response body: <em>(Getting all todos)</em>
```json
{
    "status": true,
    "todos": [
        {
            "id": 2,
            "title": "This is the second title",
            "description": "second description",
            "isComplete": 0,
            ...
        },
        {
            "id": 3,
            "title": "This is the third title (Updated)",
            "description": "third description (Updated)",
            "isComplete": 1,
            ...
        },
        ...
    ]
}
```

<!-- Creating a Todo -->
#### Endpoint: /api/todos

Requires **JWT Bearer Token**

Request body: <em>(Creating a Todo)</em>
```json
{
    "title": "string",
    "description": "string",
}
```

Response body: <em>(Created a Todo)</em>
```json
{
    "status": true,
    "message": "Todo created successfully.",
    "todo": {
        "title": "Readme.md",
        "description": "Update the Readme.md",
        ...
    }
}
```

<!-- Showing a Specific Todo -->
#### Endpoint: /api/todos/3

Requires **JWT Bearer Token**

Response body: <em>(Showing a specific Todo)</em>
```json
{
    "status": "success",
    "todo": {
        "id": 3,
        "title": "This is the third title (Updated)",
        "description": "third description (Updated)",
        "isComplete": 1,
        ...
    }
}
```

<!-- Updating a Todo -->
#### Endpoint: /api/todos/6

Requires **JWT Bearer Token**

Request body: <em>(Updating a Todo)</em>
```json
{
    "title": "Sixth - Readme.md",
    "description": "Sixth - Update Readme.md",
    "isComplete": true
}
```

Response body: <em>(Updated Todo)</em>
```json
{
    "status": true,
    "message": "Todo updated successfully.",
    "todo": {
        "id": 6,
        "title": "Sixth - Readme.md",
        "description": "Sixth - Update Readme.md",
        "isComplete": true,
        ...
    }
}
```

<!-- Deleting a Todo -->
#### Endpoint: /api/todos/7

Requires **JWT Bearer Token**

Response body: <em>(Deleting a specific Todo)</em>
```json
{
    "status": true,
    "message": "Todo deleted successfully."
}
```