define({ "api": [
  {
    "type": "POST",
    "url": "/auth/login",
    "title": "User/Artist Login",
    "name": "Login_User_Artist",
    "group": "Authentication",
    "description": "<p>This Endpoint is responsible for login. Users/Artists</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>User email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>User Password</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>A token is returned. This token should be sent with every request</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    {\n\t\t\t  \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6XC9cL2xvY2FsLXdlYjo4MDgwXC9wb2xlc1wvcHVibGljXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNDcxNDM0Mzg3LCJleHAiOjE0NzE1MjA3ODcsIm5iZiI6MTQ3MTQzNDM4NywianRpIjoiZTkxMTdjOGY0ZWI2YmNiMGZkMGUwNmJjYWVjNzRhNzcifQ.KB6S1h8jQU5k7xFquUZC4e3TRA3YpiQ0gfrHb_rf0rU\"\n\t\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Error message</p>"
          },
          {
            "group": "Error 4xx",
            "type": "integer",
            "optional": false,
            "field": "status_code",
            "description": "<p>A status code to go with the error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "array",
            "optional": false,
            "field": "errors",
            "description": "<p>Array of errors</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/api_routes.php",
    "groupTitle": "Authentication",
    "sampleRequest": [
      {
        "url": "http://polesmusic.herokuapp.com/api/auth/login"
      }
    ]
  },
  {
    "type": "POST",
    "url": "/auth/signup",
    "title": "User/Artist Signup",
    "name": "Signup_User_Artist",
    "group": "Authentication",
    "description": "<p>This Endpoint is responsible for signup. Users/Artists</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Confirm password on client end</p>"
          },
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "is_artist",
            "description": "<p>1 or 0 for Artist or user</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "stage_name",
            "description": "<p>Should be sent if New Account is for Artist</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "description",
            "description": "<p>This should serve as Artist Bio.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>A token is returned. This token should be sent with every request</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    {\n\t\t\t  \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6XC9cL2xvY2FsLXdlYjo4MDgwXC9wb2xlc1wvcHVibGljXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNDcxNDM0Mzg3LCJleHAiOjE0NzE1MjA3ODcsIm5iZiI6MTQ3MTQzNDM4NywianRpIjoiZTkxMTdjOGY0ZWI2YmNiMGZkMGUwNmJjYWVjNzRhNzcifQ.KB6S1h8jQU5k7xFquUZC4e3TRA3YpiQ0gfrHb_rf0rU\"\n\t\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Error message</p>"
          },
          {
            "group": "Error 4xx",
            "type": "integer",
            "optional": false,
            "field": "status_code",
            "description": "<p>A status code to go with the error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "array",
            "optional": false,
            "field": "errors",
            "description": "<p>Array of errors</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/api_routes.php",
    "groupTitle": "Authentication",
    "sampleRequest": [
      {
        "url": "http://polesmusic.herokuapp.com/api/auth/signup"
      }
    ]
  }
] });
