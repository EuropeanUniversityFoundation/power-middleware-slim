# POWER middleware Slim PHP

A simple middleware written in Slim PHP, that takes care of the authentication for API users connecting to the POWER platform from the POWER React app, that is deployed on a University website.

## Applications and platforms in the POWER project
The whole project consists of the following applications:

0. [POWER project website](https://www.power-placements.eu/): Contains general information about the project, events, applications, articles. It is independent from the platforms discussed below.


1. [POWER platform](https://power.uni-foundation.eu): Company representatives can post and Institution representatives can review placement opportunities on this site. This site stores the job offer and user data and provides the API, that exposes accepted placement opportunities to Institutions through the middleware below.
2. [POWER React Application](https://github.com/EuropeanUniversityFoundation/power_react_app): The application, that Institutions can include into their websites. This application connects to the middleware, which handles authentication
3. POWER middleware: EUF provides two middleware solutions in the POWER project.
  - [NodeJS based middleware](https://github.com/EuropeanUniversityFoundation/power-middleware): If you'd like to use a middleware solution developed in NodeJS instead, visit [this project](https://github.com/EuropeanUniversityFoundation/power-middleware)
  - PHP Slim based middleware: This is the repository you're currently viewing.

## Connections and communication between applications
- POWER React App (2) is included into a University website. Code is to be hosted by the Institutions. The REACT App (2) sends requests to the POWER middleware.
- POWER middleware (3) is deployed on an Institution server reachable by the one that hosts the Institution's website. It authenticates the requests sent by the React App and forwards them to the POWER platform's (1) API.
- The POWER platform stores and exposes placement opportunity data to the middleware and through it, to the REACT App, that is shown on the University websites.

## Preparation

Go to the POWER platform and check the 'How to start using the POWER platform' chapter on the help page if you haven't already done so.

## System requirements

This POWER middleware solution is based on Slim PHP. According to the [official documentation](https://www.slimframework.com/docs/v4/start/installation.html), system requirements are:
- Web server with URL rewriting (Apache or Nginx recommended)
- PHP 7.4 or newer

_Note:_ You do not have to perform the steps detailed in the official installation guide.

In order to leverage this repository:
- Git must be installed on the server.
- Composer 2 must be present on your server. See the [official composer documentation](https://getcomposer.org/download/) on how to install it.

## Deployment

1. Create a domain / subdomain for the middleware on the hosting server.

2. Create a site in your webserver (Apache or Nginx) on the hosting server, that has PHP 7.4+ and URL rewriting installed and is accessible by the website that contains the POWER React app.

3. Enter the root directory of the site and clone the repository there: `git clone git@github.com:EuropeanUniversityFoundation/power-middleware-slim.git`

4. Run `composer install` to install the dependencies of this repository.

5. Set the document root (the home directory served by the site) to the `./public` directory.

6. Duplicate the `power_settings.example.php` file with the name `power_settings.php` and edit it's content.

7. Insert the API key you received from us, between the quotes:
```
<?php
$power_settings = [
  'api_key' => '[Enter your API key here]',
  'base_url' => 'https://power.uni-foundation.eu',
];
```

If you don't have an API key, check the 'How to start using the POWER platform' on the [POWER platform site](https://power.uni-foundation.eu/help) and follow the instructions there.

## Testing
To test if the deployment was succesful, send a GET request to `http(s)://[domain you installed to]/power-middleware/rest/public-pos`, where you should see placement opportunity data in JSON format.

## Further steps
Once you're done with this deployment, you can start to deploy and setting up the [POWER React Application](https://github.com/EuropeanUniversityFoundation/power_react_app)
