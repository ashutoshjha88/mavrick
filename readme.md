## Theme 2: Open House

Open house is an event where the all available properties will be open for any interested party to walk-in for evaluation. Most probably the property will be closed by the end of the event. Seekers have the problem to visit as many properties as possible on that day. Owners would want to get as much rent for that property as possible.

## Finalized Part

####Design Templates
main-page: mavrick/openhouse/templates/main.html
timeline: listing-form: mavrick/openhouse/templates/travel-timeline.html
my-bidding: listing-form: mavrick/openhouse/templates/my-biddings.html
listing-page:  mavrick/openhouse/templates/index.html
listing-form: mavrick/openhouse/templates/listing-page.html
profile-page: listing-form: mavrick/openhouse/templates/my-profile.html
dashboard: listing-form: mavrick/openhouse/templates/dashboard.html
dashboard-listing: listing-form: mavrick/openhouse/templates/dashboard-listings.html
inbox: listing-form: mavrick/openhouse/templates/inbox.html
setting: listing-form: mavrick/openhouse/templates/settings.html


## Coded In Laravel Php Framework
#### Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Trying to solve the puzzle, by introducing Bidding Mechanism where house owner can open a bid and seekers can bid.
On a given day seekers can bid on as many deals as possible until he is not on the top bidder for any given bid.
 Also trying salesman travel algorithm so that seeker can visit as many house as possible based on given slot and his/her time preferences.

## Motivation

We are here in Codesign Hackathon hosted by Grabhouse company. We got this challenge here itself and trying to nailed it down.

## Installation
    * Create Database name as mavrick
    * open env file in this project change DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD accordingly.
    * run command: $ php artisan migrate
    * run command: $ php artisan db:seed
    * Enjoy :)

## Contributors
    * Akhil Sreenivasan (UI/UX Developer)
    * Faraj (Android Developer)
    * Ashutosh Kumar (Full LAMP Stack Developer)

## Security Vulnerabilities

If you discover a security vulnerability within, please send an e-mail to Ashutosh Kumar at ashutosh.sce@hotmail.com. All security vulnerabilities will be promptly addressed.

### License

Free to use/abuse, Anyway We will be not responsible for the consequence after using it.

