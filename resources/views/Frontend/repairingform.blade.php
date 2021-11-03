@extends('Frontend.layouts.app')
@section('styles')

    <style>
        html, body {
            min-height: 100%;
        }

        body, div, form, input, select, textarea, label {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }

        h1 {
            position: absolute;
            margin: 0;
            font-size: 60px;
            color: #fff;
            z-index: 2;
            line-height: 83px;
            top: 30px;
        }

        legend {
            padding: 10px;
            font-family: Roboto, Arial, sans-serif;
            font-size: 18px;
            color: #fff;
            background-color: #0cb3f3;;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            margin-top: 163px;
        }

        form {
            width: 100%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 8px black;
        }

        .banner {
            position: relative;
            height: 250px;
            background-image: url("{{asset('/')}}frontend/image/Slider/SS booking cover.jpg");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        @media (max-width: 500px) {
            .mobilebanner {
                position: relative;
                height: 250px;
                background-image: url("{{asset('/')}}frontend/image/Slider/Mobile.png");
                background-size: cover;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .banner {
                display: none;
            }
        }

        .banner::after {
            content: "";

            position: absolute;
            width: 100%;
            height: 100%;
        }

        input, select, textarea {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input {
            width: calc(100% - 10px);
            padding: 5px;
        }

        input[type="date"] {
            padding: 4px 5px;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
            color: #006622;
        }

        .item input:hover, .item select:hover, .item textarea:hover {
            border: 1px solid transparent;
            box-shadow: 0 0 3px 0 #006622;
            color: #006622;
        }

        .item {
            position: relative;
            margin: 10px 0;
        }

        .item span {
            color: red;
        }

        .week {
            display: flex;
            justfiy-content: space-between;
        }

        .colums {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .colums div {
            width: 48%;
        }

        input[type=radio], input[type=checkbox] {
            display: none;
        }

        label.radio {
            position: relative;
            display: inline-block;
            margin: 5px 20px 15px 0;
            cursor: pointer;
        }

        .question span {
            margin-left: 30px;
        }

        .question-answer label {
            display: block;
        }

        label.radio:before {
            content: "";
            position: absolute;
            left: 0;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

        input[type=radio]:checked + label:before, label.radio:hover:before {
            border: 2px solid #006622;
        }

        label.radio:after {
            content: "";
            position: absolute;
            top: 6px;
            left: 5px;
            width: 8px;
            height: 4px;
            border: 3px solid #006622;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
        }

        input[type=radio]:checked + label:after {
            opacity: 1;
        }

        .flax {
            display: flex;
            justify-content: space-around;
        }

        .btn-block {
            margin-top: 10px;
            text-align: center;
        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #0cb3f3;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background: black;
        }

        @media (min-width: 568px) {
            .name-item, .city-item {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .name-item input, .name-item div {
                width: calc(50% - 20px);
            }

            .name-item div input {
                width: 97%;
            }

            .name-item div label {
                display: block;
                padding-bottom: 5px;
            }
        }

        }
        .custom-map-control-button {
            background-color: #fff;
            border: 0;
            border-radius: 2px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            margin: 10px;
            padding: 0 0.5em;
            font: 400 18px Roboto, Arial, sans-serif;
            overflow: hidden;
            height: 40px;
            cursor: pointer;
        }

        .custom-map-control-button:hover {
            background: #ebebeb;
        }

        .storeList::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        .storeList::-webkit-scrollbar-track {
            background: lightgray;
        }

        /* Handle */
        .storeList::-webkit-scrollbar-thumb {
            background: #0089bc;
        }

        /* Handle on hover */
        .storeList::-webkit-scrollbar-thumb:hover {
            background: #2957a9;
        }

        .mapDiv {
            border: #106dbd solid;
        }
        .white-toastr{
            background-color: white;
        }


        @media (max-width: 500px) {
           .mobileMap{
               display:none;
           }
        }
    </style>
@endsection
<div class="container">
    <div class="testbox">
        <form id="save_booking">
            @csrf
            <div class="banner">

            </div>
            <div class="mobilebanner mobileMap"></div>
            <br/>
            <fieldset>
                <legend>Booking Form</legend>
                <p style="text-align:center;margin-top:10px;" id="selectedDe"><b>You are Selected<br>
                        Manufacturer:</b> {{$details->DeviceName}}<br><b>Models:</b> {{$details->ModelName}}
                    <br><b>Issues:</b> {{$issue_name}} - ${{$issue_price}} </p>
                <input type="hidden" name="selected_issues" value="{{$issue_name}}">
                <div class="colums">
                    <div class="item hidden">
                        <label for="DeviceName">Device Name<span>*</span></label>
                        <input placeholder="Device Name" name="device" type="text" readonly required
                               value="{{$details->DeviceName}}"/>
                        <input placeholder="Device Name" name="deviceID" type="text" hidden
                               value="{{$details->device_id}}"/>
                    </div>
                    <div class="item hidden">
                        <label for="IssueName"> Issue Name<span>*</span></label>
                        @foreach($issues as $issue)<input type="text" name="issue_names" placeholder="Issue Name" readonly
                                                          required value=" {{$issue->issue_name}}"/>
                        <input type="text" name="issueID" placeholder="Issue Name" hidden readonly required
                               value=" {{$issue->id}}"/>@endforeach
                    </div>
                    <div class="item hidden">
                        <label for="model">Model Name<span>*</span></label>
                        <input type="text" name="model" placeholder="Model Name" readonly required
                               value="{{$details->ModelName}}"/>
                        <input type="text" name="modelID" placeholder="Model Name" hidden readonly required
                               value="{{$details->id}}"/>
                    </div>
                    <div class="item">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Your Name" value="" required/>
                    </div>
                    <div class="item">
                        <label for="number">Phone Number</label>
                        <input type="text" name="number" placeholder="Phone No" value="" required/>
                    </div>
                    <div class="item">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="Email Address" value="" required/>
                    </div>
                    <input type="hidden" value="" id="store_email" name="store_email">
                    <input type="hidden" value="" id="store_id" name="store_id">
                    <div class="item">
                        <label for="email">Message</label>
                        <textarea type="text" name="message" placeholder="(Optional)" value=""></textarea>
                    </div>

                </div>
            </fieldset>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <label for="pac-input">Locate Store</label>
                        <input id="pac-input" class="form-control" type="text" placeholder="Enter Suburb or Post Code"/>
                        <input type="hidden" id="addressLat" >
                        <input type="hidden" id="addressLng"  >
                        <section id="map" class="mobileMap" style="height:700px;"></section>
                    </div>
                    <div class="col-md-4">
                        <h2>Please Select Store</h2>
                        <div id="mapDiv" class="storeList" style="height: 700px;overflow-y: scroll;">

                        </div>


                    </div>
                </div>
            </div>
            <div class="btn-block">
                <button type="submit" style="color:white;">Book Repair</button>
            </div>

        </form>
    </div>
</div>
@section('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUMoVX1-rpci7KMQ5P9ZZMIcIs7wM3FBI&callback=initAutocomplete&libraries=places&v=weekly"
        async></script>
    <script type="text/javascript">
        let value = {
            "type": "FeatureCollection",
            "features": [
                    @foreach($stores as $store)
                {
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            {{$store->longitude}}, {{$store->latitude}}
                        ]
                    },
                    "type": "Feature",
                    "properties": {
                        "category": "Mobile Phone",
                        "hours": "{{$store->hours}}",
                        "description": "{{$store->description}}",
                        "name": "{{$store->name}}",
                        "phone": "{{$store->phone}}",
                        "storeid": "0{{$store->store_id}}"
                    }
                },
                @endforeach
            ]
        };

        let values = {
            "features": [
                    @foreach($stores as $store)
                {
                    "properties": {
                        "id": "{{$store->id}}",
                        "description": "{{$store->description}}",
                        "name": "{{$store->name}}",
                        "phone": "{{$store->phone}}",
                        "email": "{{$store->email}}",
                        "hours": "{{$store->hours}}",
                        "latt": "{{$store->latitude}}",
                        "long": "{{$store->longitude}}",
                    }
                },
                @endforeach
            ]
        };
        var infowindow;
        let latitude = '';
        let longitude = '';
        let map = '';


        $(document).ready(function () {

            $.each(values, function (key, val) {

                $.each(val, function (key, v) {
                    var html = '<div class="card card-body justify-content mapAddressDiv' + v.properties.id + ' m-2" data-value="1" onclick="changeAddress(' + v.properties.id + ')" style="cursor:pointer;" data-lat="' + v.properties.latt + '" data-long="' + v.properties.long + '">\n' +
                        '                    <h3>' + v.properties.name + '</h3><br>\n' +
                        '                    <p style="display:none;" id="addressLatitude' + v.properties.id + '">' + v.properties.latt + '</p>\n' +
                        '                    <p style="display:none;" id="addressLogitude' + v.properties.id + '">' + v.properties.long + '</p>\n' +
                        '                    <p style="display:none;" id="addressEmail' + v.properties.id + '">' + v.properties.email + '</p>\n' +
                        '                    <p style="display:none;" id="addressId' + v.properties.id + '">' + v.properties.id + '</p>\n' +
                        '                    <p style="margin: 0 0 5px !important;"  id="addressHour' + v.properties.id + '">' + v.properties.hours + '</p>\n' +
                        '                    <p style="margin: 0 0 5px !important;" >' + v.properties.description + '</p>\n' +
                        '                    <i class="fa fa-phone">' + v.properties.phone + '</i>\n' +
                        '                  </div>';
                    $('#mapDiv').append(html);


                });

            });
        });


        function initAutocomplete() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 4,
                mapTypeId: "roadmap",
            });

            map.data.addGeoJson(value, {idPropertyName: 'storeid'});
            map.data.addListener('click', (event) => {
                const category = event.feature.getProperty('category');
                const name = event.feature.getProperty('name');
                const description = event.feature.getProperty('description');
                const hours = event.feature.getProperty('hours');
                const phone = event.feature.getProperty('phone');
                const position = event.feature.getGeometry().get();
                const content = `
                                  <h2 style="color:#FB5E24;">${name}</h2><p>${description}</p>
                                  <p><b>Open:</b> ${hours}<br/><b>Phone:</b> ${phone}</p>
                                `;


                infoWindow.setContent(content);
                infoWindow.setPosition(position);
                infoWindow.setOptions({pixelOffset: new google.maps.Size(100, 100)});
                infoWindow.open(map);
            });
            const infoWindow = new google.maps.InfoWindow();
            google.maps.event.addListener(map, 'click', function () {
                infowindow.close();
            });
            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                const abc = searchBox.setBounds(map.getBounds());
            });
            // let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    let lat = place.geometry.location.lat();
                    let lng = place.geometry.location.lng();
                    $('#addressLat').val(lat);
                    $('#addressLng').val(lng);
                    var latt = $('#addressLat').val();
                    var long = $('#addressLng').val();
                    var _token = $("input[name=_token]").val();
                    $.ajax({
                        url: '{{url('store/search')}}',
                        method: "POST",
                        data: { _token: _token, 'latitude' : latt , 'longitude' : long},
                        dataType: "json",
                        success: function (data) {
                            var html = '';
                            if (data.length > 0) {
                                for (var count = 0; count < data.length; count++) {
                                    html += '<div class="card card-body justify-content mapAddressDiv' + data[count].id + ' m-2" data-value="1" onclick="changeAddress(' + data[count].id + ')" style="cursor:pointer;" data-lat="' + data[count].latitude + '" data-long="' + data[count].longitude + '">\n' +
                                        '                    <h3>' + data[count].name + '</h3><br>\n' +
                                        '                    <p style="display:none;" id="addressLatitude' + data[count].id + '">' + data[count].latitude + '</p>\n' +
                                        '                    <p style="display:none;" id="addressLogitude' + data[count].id + '">' + data[count].longitude + '</p>\n' +
                                        '                    <p style="display:none;" id="addressEmail' + data[count].id + '">' + data[count].email + '</p>\n' +
                                        '                    <p style="margin: 0 0 5px !important;"  id="addressHour' + data[count].id + '">' + data[count].hours + '</p>\n' +
                                        '                    <p style="margin: 0 0 5px !important;">' + data[count].description + '</p>\n' +
                                        '                    <i class="fa fa-phone">' + data[count].phone + '</i>\n' +
                                        '                  </div>';
                                }
                            } else {
                                html += '<div class="card card-body justify-content  " >\n' +
                                    '                    <h3>No Record Found</h3><br>\n' +
                                    '                  </div>';
                            }
                            $('#mapDiv').html(html);
                        }
                    });

                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }

                });
                map.fitBounds(bounds);
            });

        }

        function changeAddress(id) {
            $('.mapDiv').removeClass('mapDiv');
            $('.mapAddressDiv' + id).addClass('mapDiv');

            latitude = '';
            longitude = '';
            storeEmail = '';
            store_id='';
            latitude = parseFloat($('#addressLatitude' + id).text());
            longitude = parseFloat($('#addressLogitude' + id).text());
            storeEmail = $('#addressEmail' + id).text();
            store_id = $('#addressId' + id).text();
            $('#store_email').val(storeEmail);
            $('#store_id').val(store_id);

            map = new google.maps.Map(document.getElementById("map"), {
                center: {lat: latitude, lng: longitude},
                zoom: 15,
                mapTypeId: "roadmap",
            });

            marker = new google.maps.Marker({
                position: {lat: latitude, lng: longitude},
                map,
            });

            map.data.addGeoJson(value, {idPropertyName: 'storeid'});
            map.data.addListener('click', (event) => {
                const category = event.feature.getProperty('category');
                const name = event.feature.getProperty('name');
                const description = event.feature.getProperty('description');
                const hours = event.feature.getProperty('hours');
                const phone = event.feature.getProperty('phone');
                const position = event.feature.getGeometry().get();
                const content = `
                 <h2 style="color:#FB5E24;">${name}</h2><p>${description}</p>
                 <p><b>Open:</b> ${hours}<br/><b>Phone:</b> ${phone}</p>`;


                infoWindow.setContent(content);
                infoWindow.setPosition(position);
                infoWindow.setOptions({pixelOffset: new google.maps.Size(100, 100)});
                infoWindow.open(map);
            });
            const infoWindow = new google.maps.InfoWindow();
            google.maps.event.addListener(map, 'click', function () {
                infowindow.close();
            });
        }


        $('#save_booking').submit(function (e) {
            e.preventDefault();
            var form = $('#save_booking');
            var formData = new FormData(form[0]);
            $.ajax({
                url: '{{url('savebooking')}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (success) {
                    toastr.success('', success.message,{

                        // tap to dismiss
                        tapToDismiss: true,

                        // toast class
                        toastClass: 'toast',

                        // container ID
                        containerId: 'toast-container',


                        // fadeIn, slideDown, and show are built into jQuery
                        showMethod: 'fadeIn',

                        // duration of animation
                        showDuration: 300,

                        // easing function
                        showEasing: 'swing',


                        // duration of animation
                        hideDuration: 1000,

                        // easing function
                        hideEasing: 'swing',

                        // close animation
                        closeMethod: false,

                        // timeout in ms
                        extendedTimeOut: 8000,


                        // toast-top-center, toast-bottom-center, toast-top-full-width
                        // toast-bottom-full-width, toast-top-left, toast-bottom-right
                        // toast-bottom-left, toast-top-right
                        positionClass: 'toast-top-center',

                        // set timeOut and extendedTimeOut to 0 to make it sticky
                        timeOut: 8000,


                        // shows progress bar
                        progressBar: true,

                    })
                    window.setTimeout(function(){
                        window.location.href = "{{url('/')}}";
                    }, 9000);

                }, error: function (error) {
                    toastr.error(error.responseJSON.message);
                },
            })


        });
    </script>
    <script src="{{asset('toastr/toastr.min.js')}}"></script>

@endsection
