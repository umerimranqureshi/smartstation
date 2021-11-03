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
  margin:0;
  font-size: 60px;
  color: #fff;
  z-index: 2;
  line-height: 83px;
  top:30px;
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
  padding: 20px;
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
  color:  #006622;
}

.item input:hover, .item select:hover, .item textarea:hover {
  border: 1px solid transparent;
  box-shadow: 0 0 3px 0  #006622;
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
  display:flex;
  justfiy-content:space-between;
}
.colums {
  display:flex;
  justify-content:space-between;
  flex-direction:row;
  flex-wrap:wrap;
}
.colums div {
  width:48%;
}
input[type=radio], input[type=checkbox]  {
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
  border: 2px solid  #006622;
}
label.radio:after {
  content: "";
  position: absolute;
  top: 6px;
  left: 5px;
  width: 8px;
  height: 4px;
  border: 3px solid  #006622;
  border-top: none;
  border-right: none;
  transform: rotate(-45deg);
  opacity: 0;
}
input[type=radio]:checked + label:after {
  opacity: 1;
}
.flax {
  display:flex;
  justify-content:space-around;
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
  background:  #0cb3f3;
  font-size: 16px;
  color: #fff;
  cursor: pointer;
}
button:hover {
  background:  black;
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
      width:97%;}
      .name-item div label {
          display:block;
          padding-bottom:5px;
      }
  }
}
</style>
@endsection
<div class="container">
    <div class="testbox">
        @include('sweetalert::alert')
        <form action="{{url('savebooking')}}" method="post">
            {{csrf_field()}}
            <div class="banner">

            </div>
            <br/>
            <fieldset>
                <legend>Booking Form</legend>
                <div class="colums">
                    <div class="item ">
                        <label for="DeviceName">Device Name<span>*</span></label>
                        <input placeholder="Device Name" name="device" type="text" required   value=""/>
                    </div>
                    <div class="item ">
                        <label for="IssueName"> Issue Name<span>*</span></label>
                        <input type="text" name="issue" placeholder="Issue Name" required value="" />
                    </div>
                    <div class="item ">
                        <label for="model">Model Name<span>*</span></label>
                        <input type="text" name="model" placeholder="Model Name" required value=""/>
                    </div>
                    
                    <div class="item">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Your Name" value="" required/>
                    </div>
                    <div class="item">
                        <label for="number">Phone Number</label>
                        <input type="text" name="number"  placeholder="Phone No" value="" required/>
                    </div>
                    <div class="item">
                        <label for="email">Email Address</label>
                        <input type="email" name="email"  placeholder="Email Address" value="" required/>
                    </div>
                    
                    <div class="item">
                        <label for="shop">Select Shop</label>
                        <select class="form-control" name="shop">
                            <option>Select Shop Address</option>
                            @foreach(App\Models\Store::all() as $store)
                            <option value="{{$store->id}}">{{$store->StoreName}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="email" value="{{$store->StoreEmail}}">
                    </div>
                    <div class="item">
                        <label for="email">Message</label>
                        <textarea type="text" name="message"  placeholder="Other Detail" value=""></textarea>
                    </div>
                </div> 
            </fieldset>
            <div class="btn-block">
                <button type="submit">Book Repair</button>
            </div>
            
        </form>
    </div>
</div>
@section('scripts')

@endsection

