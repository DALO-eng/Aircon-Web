<!--
  Copyright 2021 Google LLC

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->
<!DOCTYPE html>
<html>
  <head>
    <title>Locator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/handlebars/4.7.7/handlebars.min.js"></script>

    <link rel="stylesheet" href="../styles/mapa.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script>
      'use strict';

      /**
       * Defines an instance of the Locator+ solution, to be instantiated
       * when the Maps library is loaded.
       */
      function LocatorPlus(configuration) {
        const locator = this;

        locator.locations = configuration.locations || [];
        locator.capabilities = configuration.capabilities || {};

        const mapEl = document.getElementById('map');
        const panelEl = document.getElementById('locations-panel');
        locator.panelListEl = document.getElementById('locations-panel-list');
        const sectionNameEl =
            document.getElementById('location-results-section-name');
        const resultsContainerEl = document.getElementById('location-results-list');

        const itemsTemplate = Handlebars.compile(
            document.getElementById('locator-result-items-tmpl').innerHTML);

        locator.searchLocation = null;
        locator.searchLocationMarker = null;
        locator.selectedLocationIdx = null;
        locator.userCountry = null;

        // Initialize the map -------------------------------------------------------
        locator.map = new google.maps.Map(mapEl, configuration.mapOptions);

        // Store selection.
        const selectResultItem = function(locationIdx, panToMarker, scrollToResult) {
          locator.selectedLocationIdx = locationIdx;
          for (let locationElem of resultsContainerEl.children) {
            locationElem.classList.remove('selected');
            if (getResultIndex(locationElem) === locator.selectedLocationIdx) {
              locationElem.classList.add('selected');
              if (scrollToResult) {
                panelEl.scrollTop = locationElem.offsetTop;
              }
            }
          }
          if (panToMarker && (locationIdx != null)) {
            locator.map.panTo(locator.locations[locationIdx].coords);
          }
        };

        // Create a marker for each location.
        const markers = locator.locations.map(function(location, index) {
          const marker = new google.maps.Marker({
            position: location.coords,
            map: locator.map,
            title: location.title,
          });
          marker.addListener('click', function() {
            selectResultItem(index, false, true);
          });
          return marker;
        });

        // Fit map to marker bounds.
        locator.updateBounds = function() {
          const bounds = new google.maps.LatLngBounds();
          if (locator.searchLocationMarker) {
            bounds.extend(locator.searchLocationMarker.getPosition());
          }
          for (let i = 0; i < markers.length; i++) {
            bounds.extend(markers[i].getPosition());
          }
          locator.map.fitBounds(bounds);
        };
        if (locator.locations.length) {
          locator.updateBounds();
        }

        // Get the distance of a store location to the user's location,
        // used in sorting the list.
        const getLocationDistance = function(location) {
          if (!locator.searchLocation) return null;

          // Fall back to straight-line distance.
          return google.maps.geometry.spherical.computeDistanceBetween(
              new google.maps.LatLng(location.coords),
              locator.searchLocation.location);
        };

        // Render the results list --------------------------------------------------
        const getResultIndex = function(elem) {
          return parseInt(elem.getAttribute('data-location-index'));
        };

        locator.renderResultsList = function() {
          let locations = locator.locations.slice();
          for (let i = 0; i < locations.length; i++) {
            locations[i].index = i;
          }
          if (locator.searchLocation) {
            sectionNameEl.textContent =
                'Nearest locations (' + locations.length + ')';
            locations.sort(function(a, b) {
              return getLocationDistance(a) - getLocationDistance(b);
            });
          } else {
            sectionNameEl.textContent = `All locations (${locations.length})`;
          }
          const resultItemContext = { locations: locations };
          resultsContainerEl.innerHTML = itemsTemplate(resultItemContext);
          for (let item of resultsContainerEl.children) {
            const resultIndex = getResultIndex(item);
            if (resultIndex === locator.selectedLocationIdx) {
              item.classList.add('selected');
            }

            const resultSelectionHandler = function() {
              selectResultItem(resultIndex, true, false);
            };

            // Clicking anywhere on the item selects this location.
            // Additionally, create a button element to make this behavior
            // accessible under tab navigation.
            item.addEventListener('click', resultSelectionHandler);
            item.querySelector('.select-location')
                .addEventListener('click', function(e) {
                  resultSelectionHandler();
                  e.stopPropagation();
                });
          }
        };

        // Optional capability initialization --------------------------------------
        initializeSearchInput(locator);

        // Initial render of results -----------------------------------------------
        locator.renderResultsList();
      }

      /** When the search input capability is enabled, initialize it. */
      function initializeSearchInput(locator) {
        const geocodeCache = new Map();
        const geocoder = new google.maps.Geocoder();

        const searchInputEl = document.getElementById('location-search-input');
        const searchButtonEl = document.getElementById('location-search-button');

        const updateSearchLocation = function(address, location) {
          if (locator.searchLocationMarker) {
            locator.searchLocationMarker.setMap(null);
          }
          if (!location) {
            locator.searchLocation = null;
            return;
          }
          locator.searchLocation = {'address': address, 'location': location};
          locator.searchLocationMarker = new google.maps.Marker({
            position: location,
            map: locator.map,
            title: 'My location',
            icon: {
              path: google.maps.SymbolPath.CIRCLE,
              scale: 12,
              fillColor: '#3367D6',
              fillOpacity: 0.5,
              strokeOpacity: 0,
            }
          });

          // Update the locator's idea of the user's country, used for units. Use
          // `formatted_address` instead of the more structured `address_components`
          // to avoid an additional billed call.
          const addressParts = address.split(' ');
          locator.userCountry = addressParts[addressParts.length - 1];

          // Update map bounds to include the new location marker.
          locator.updateBounds();

          // Update the result list so we can sort it by proximity.
          locator.renderResultsList();
        };

        const geocodeSearch = function(query) {
          if (!query) {
            return;
          }

          const handleResult = function(geocodeResult) {
            searchInputEl.value = geocodeResult.formatted_address;
            updateSearchLocation(
                geocodeResult.formatted_address, geocodeResult.geometry.location);
          };

          if (geocodeCache.has(query)) {
            handleResult(geocodeCache.get(query));
            return;
          }
          const request = {address: query, bounds: locator.map.getBounds()};
          geocoder.geocode(request, function(results, status) {
            if (status === 'OK') {
              if (results.length > 0) {
                const result = results[0];
                geocodeCache.set(query, result);
                handleResult(result);
              }
            }
          });
        };

        // Set up geocoding on the search input.
        searchButtonEl.addEventListener('click', function() {
          geocodeSearch(searchInputEl.value.trim());
        });

        // Add in an event listener for the Enter key.
        searchInputEl.addEventListener('keypress', function(evt) {
          if (evt.key === 'Enter') {
            geocodeSearch(searchInputEl.value);
          }
        });
      }
    </script>
    <script>
    
      let map;
      let markers = [];
    

      function initMap() {
        const haightAshbury = { lat: 4.7010, lng: -74.1461 };

        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 20,
          center: haightAshbury,
          mapTypeId: "terrain",
        });
        // This event listener will call addMarker() when the map is clicked.
        map.addListener("click", (event) => {
          addMarker(event.latLng);
        });
        // add event listeners for the buttons
        document
          .getElementById("show-markers")
          .addEventListener("click", showMarkers);
        document
          .getElementById("hide-markers")
          .addEventListener("click", hideMarkers);
        document
          .getElementById("delete-markers")
          .addEventListener("click", deleteMarkers);
        // Adds a marker at the center of the map.
        addMarker(haightAshbury);
      }

      // Adds a marker to the map and push to the array.
        function addMarker(position) {
          const marker = new google.maps.Marker({
            position,
            map,
          });
        
          markers.push(marker);
        }
        
        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
          for (let i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
          }
        }
        
        // Removes the markers from the map, but keeps them in the array.
        function hideMarkers() {
          setMapOnAll(null);
        }
        
        // Shows any markers currently in the array.
        function showMarkers() {
          setMapOnAll(map);
        }
        
        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
          hideMarkers();
          markers = [];
        }
    </script>
    <script id="locator-result-items-tmpl" type="text/x-handlebars-template">
      {{#each locations}}
        <li class="location-result" data-location-index="{{index}}">
          <button class="select-location">
            <h2 class="name">{{title}}</h2>
          </button>
          <div class="address">{{address1}}<br>{{address2}}</div>
        </li>
      {{/each}}
    </script>
  </head>

  <?php
        session_start();
        if(isset($_SESSION['user'])){
            if((time() - $_SESSION['time'] > 900)){
                header("Location: ./logout.php");
                exit;
            }
            else{
                $_SESSION['time'] = time();
                $mainValue = $_SESSION['user']['name'] . " " . $_SESSION['user']['lastname'];
                $direction = "#";
                $myId = "open";
            }
        }

        if (markers != []) {
            $serverName = 'localhost';
            $userName = 'root';
            $password = '';    
            $dbName = 'aircon';
        
            $conn = mysqli_connect($serverName,$userName,$password);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        
            $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
            if (!mysqli_query($conn,$sql)){
                echo "Error creating database: " . mysqli_error($conn);
            }
            $conn = mysqli_connect($serverName,$userName,$password, $dbName);

            $sql = "CREATE TABLE misVuelos (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                usuario VARCHAR(30) NOT NULL,
                origen VARCHAR(30) NOT NULL,
                destino VARCHAR(50)
                )";
                
                if ($conn->query($sql) === TRUE) {
                  echo "Table misVuelos created successfully";
                } else {
                  echo "Error creating table: " . $conn->error;
                }

            $sql = "INSERT INTO misViajes (usuario, origen, destino)
            VALUES ($_SESSION['user'], marker[0], marker[1])";
            
            if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }            
        }
    ?>

  
  <body>
    <div id="map-container">
        <div id="floating-panel">
          <input id="hide-markers" type="button" value="Hide Markers" />
          <input id="show-markers" type="button" value="Show Markers" />
          <input id="delete-markers" type="button" value="Delete Markers" />
        </div>
      <div id="locations-panel">
        <div id="locations-panel-list">
          <header>
            <h1 class="search-title">
              <img src="https://fonts.gstatic.com/s/i/googlematerialicons/place/v15/24px.svg"/>
              Find a location near you
            </h1>
            <div class="search-input">
              <input id="location-search-input" placeholder="Enter your address or zip code">
              <div id="search-overlay-search" class="search-input-overlay search">
                <button id="location-search-button">
                  <img class="icon" src="https://fonts.gstatic.com/s/i/googlematerialicons/search/v11/24px.svg" alt="Search"/>
                </button>
              </div>
            </div>
          </header>
          <div class="section-name" id="location-results-section-name">
            All locations
          </div>
          <div class="results">
            <ul id="location-results-list"></ul>
          </div>
        </div>
      </div>
      <div id="map"></div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCy6DBTzrvET6GkDxkVAevVRMU7BiX9ZDU&callback=initMap&libraries=places,geometry&solution_channel=GMP_QB_locatorplus_v4_cA" async defer></script>
  </body>
</html>
