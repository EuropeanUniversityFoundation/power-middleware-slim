# POWER middleware Slim PHP

A simple middleware written in Slim PHP, that takes care of the authentication for API users connecting to the POWER platform from the POWER React app, that is deployed on a University website.

## Architecture of the POWER project
The whole project consists of the following applications:
- [POWER project website](https://www.power-placements.eu/): Contains general information about the project, events, applications, articles. It is independent from the platforms discussed here.
- [POWER placement opportunity management site](https://power.uni-foundation.eu): Company representatives can post and Institution representatives can review placement opportunities on this site.
- [POWER React App](https://github.com/EuropeanUniversityFoundation/power_react_app): The application, that Institutions can include into their websites.
- POWER middleware: EUF provides two middleware solutions in the POWER project.
  - NodeJS based middleware: 
  - PHP Slim based middleware:



## Deployment
Pick a directory (and a server) that is accessible for the POWER React App, has an internet connection, but is not available for the public.


## Stack

Built with [Slim - a micro framework for PHP](https://www.slimframework.com/).

## Structure

Based on [this tutorial](https://odan.github.io/2019/11/05/slim4-tutorial.html).
