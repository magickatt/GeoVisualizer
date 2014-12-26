Geograhical Visualizer
=============
[![Build Status](https://travis-ci.org/magickatt/GeoVisualizer.svg?branch=master)](https://travis-ci.org/magickatt/GeoVisualizer)

Visualizer for GeoPoint (geographical) data, using different front-ends (e.g. Google Maps) and back-ends (e.g. Twitter)

Very basic prototype I put together to test out a few design pattern combinations, needs a lot of work to finish (filtering/validation, AJAX, test coverage, etc.)

## Setup

Install dependencies via [Composer](https://getcomposer.org/)

Copy the distributed configuration files to the real files

`cp config/collector/twitter.ini.dist \
config/collector/twitter.ini`

`cp config/visualizer/google-maps.ini.dist \
config/visualizer/google-maps.ini`

You will then need to put in real values to use the Twitter API and Google Maps JavaScript V3 API


