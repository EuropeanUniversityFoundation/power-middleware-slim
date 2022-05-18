# POWER middleware Slim PHP

A simple middleware written in Slim PHP, that takes care of the authentication for API users connecting to the POWER platform from the POWER React app, that is deployed on a University website.

## Applications and platforms in the POWER project
The whole project consists of the following applications:

0. [POWER project website](https://www.power-placements.eu/): Contains general information about the project, events, applications, articles. It is independent from the platforms discussed below.


1. [POWER platform](https://power.uni-foundation.eu): Company representatives can post and Institution representatives can review placement opportunities on this site. This site stores the job offer and user data and provides the API, that exposes accepted placement opportunities to Institutions through the middleware below.
2. [POWER React App](https://github.com/EuropeanUniversityFoundation/power_react_app): The application, that Institutions can include into their websites. This application connects to the middleware, which handles authentication
3. POWER middleware: EUF provides two middleware solutions in the POWER project.
  - [NodeJS based middleware](https://github.com/EuropeanUniversityFoundation/power-middleware): If you'd like to use a middleware solution developed on NodeJS instead of PHP, visit [this project](https://github.com/EuropeanUniversityFoundation/power-middleware)
  - PHP Slim based middleware: This is the repository you're currently viewing.

## Connections and communication between applications
- POWER React App (2) is included into a University website. Code is to be hosted by the Institutions. The REACT App (2) sends requests to the POWER middleware.
- POWER middleware (3) is deployed on an Institution server reachable by the one that hosts the Institution's website. It authenticates the requests sent by the React App and forwards them to the POWER platform's (1) API.
- The POWER platform stores and exposes placement opportunity data to the middleware and through it, to the REACT App, that is shown on the University websites.

## Deployment


## Stack

Built with [Slim - a micro framework for PHP](https://www.slimframework.com/).

## Structure

Based on [this tutorial](https://odan.github.io/2019/11/05/slim4-tutorial.html).
