<?php 
/**
 *
 *	@author Marcus Jackson, <marcusj98@gmail.com>
 *	@package WordPress
 *	@subpackage 
 *	@since 2.0	
 *
**/

?>
<div class="k-content ng-cloak ng-controller" ng-controller="MainCtrl">
	<div class="col-md-12 col-service-page">
        <aside class="form-aside">
       		<ul class="form-tabs">
				<li class="form-tab"><i class="fa" aria-hidden="true"></i> Step 1. </li>
				<li class="form-tab"><i class="fa" aria-hidden="true"></i> Step 2. </li>
				<li class="form-tab"><i class="fa" aria-hidden="true"></i> Step 3. </li>
			</ul>
           	<h2 class="content-header"></h2>
           	<form method="POST" action="" name="form" class="registration-form" id="myForm" ng-submit="submitForm(form.$valid)" accept-charset="UTF-8" role="form" novalidate>
				<fieldset>
					<div class="form-top">
						<div class="form-top-left">
							<h2 class="fs-title">Step 1. Create your account</h2>
							<h3 class="fs-subtitle"></h3>
						</div>
					</div>
					<div class="form-bottom">
						<div class="second-user" ng-class="{'has-error':form.firstname.$error.required && !form.firstname.$pristine}">
							<label class="label">&#xf007; First Name</label>
							<input 
								type="text" 
								class="form-control" 
								placeholder="&#xf007; Your First Name"
								name="firstname" 
								id="firstname" 
								ng-model="viewModel.firstname"
								ng-model-options="{ updateOn: 'blur' }" 
								ng-required="true" />
							<p ng-show="form.name.$error.required && !form.name.$pristine" class="help-block">Your first name is required.</p>
						</div>
						<div class="second-user" ng-class="{'has-error':form.lastname.$error.required && !form.lastname.$pristine}">
							<label class="label">&#xf007; Last Name</label>
							<input 
								type="text" 
								class="form-control" 
								placeholder="&#xf007; Your Last Name"
								name="lastname" 
								id="lastname" 
								ng-model="viewModel.lastname"
								ng-model-options="{ updateOn: 'blur' }" 
								ng-required="true" />
								<p ng-show="form.lastname.$error.required && !form.lastname.$pristine" class="help-block">Your last name is required.</p>
						</div>
						<div class="first-user" ng-class="{'has-error':form.email.$invalid && !form.email.$pristine}">
							<label class="label">&#xf003; Your Email</label>
							<input 
								type="email" 
								class="form-control" 
								id="email" 
								name="email" 
								placeholder="&#xf003; Email" 
								ng-model="viewModel.email"
								ng-model-options="{ updateOn: 'blur' }"
								ng-required="true" />
							<p ng-show="form.email.$invalid && !form.email.$pristine">Please enter a valid email.</p>
						</div>
						<div class="first-user" ng-class="{ 'has-error':form.phone.$invalid && !form.phone.$pristine}">
							<label class="label">&#xf095; Your Phone Number</label>
							<input 
								type="tel"
								class="form-control"
								name="phone"
								id="phone"
								phone-input
								placeholder="(eg. &#xf095; (123) 456-7890)" 
								ng-minlength="10"
								ng-maxlength="15"
								ng-model="viewModel.phone"
								ng-model-options="{ updateOn: 'blur' }"
								ng-required="true" />
							<p ng-show="form.phone.$error.minlength" class="help-block">Your phone number is too short.</p>
							<p ng-show="form.phone.$error.maxlength" class="help-block">Your phone number is too long.</p>
						</div>

						<button type="button" class="next btn btn-next firstNext" ng-disabled="!viewModel.firstname && !viewModel.lastname && !viewModel.email && !viewModel.phone">Next</button>
					</div><!--/ .form-bottom -->
				</fieldset>
				<fieldset>
					<div class="form-top">
						<div class="form-top-left">
							<h2 class="fs-title">Step 2. Book Your Trip</h2>
							<h3 class="fs-subtitle">Be sure to add your pick up location along with each stop along the way.</h3>
						</div>
					</div>
					<div class="form-bottom">
						<div ng-repeat="location in fields track by $index" ng-if="$first">
							<div ng-show="pickUpFields">
								<div class="first-user location" id="locationField" ng-class="{'has-error' : form.autocomplete.$invalid && !form.autocomplete.$pristine}">
									<label class="label" for="autocomplete">&#xf041; Choose your location</label>
									<input 
										type="text" 
										name="autocomplete"
										id="autocomplete"
										class="autocomplete form-control" 
										vs-google-autocomplete
										placeholder="&#xf041; Choose your pick-up location" 
										ng-required="true"
										ng-model="viewModel.autocomplete"
										ng-model-options="{ updateOn: 'blur' }"
										vs-street-number="location[$index].location.street_1"
										vs-street="location[$index].location.street_2"
										vs-city="location[$index].location.city"
										vs-state="location[$index].location.state"
										options="autocompleteOptions"/>
									<p ng-show="form.autocomplete.$error.required && !form.autocomplete.$pristine" class="help-block">Please provide your pick-up location.</p>
								</div>
								<div class="first-user" ng-class="{'has-error' : form.depart_date.$invalid && !form.depart_date.$pristine}">
									<label class="label">&#xf073; &#xf017; Pick-up Date &amp; Time</label>
									<input 
										type="text"
										name="depart_date" 
										class="form-control" 
										id="depart_date"
										ng-click="myPicker.open()"
										placeholder="&#xf073; MM/DD/YYYY &#xf017; HH:MM AM/PM" 
										ng-model="location[$index].depart_date"
										ng-required="true"
										ng-disabled="checked"
										kendo-date-time-picker="myPicker"
										k-options="dateTimePickerOptions"
										ng-disabled="" />
									<p ng-show="form.depart_date.$error.required && !form.depart_date.$pristine" class="help-block">Please provide your pick-up date.</p>
								</div>
							</div>
							<div ng-if="$index === 0">
								<div ng-repeat="stop in stops track by $index" ng-if="stopFields">
									<div class="first-user location" id="locationField" ng-class="{'has-error' : form.destination.$invalid && !form.destination.$pristine}">
										<label class="label" for="destination">&#xf041; Choose your destination</label>
										<input
											vs-google-autocomplete
											type="text" 
											id="destination"
											class="autocomplete form-control" 
											name="destination"
											placeholder="&#xf041; Choose your destination"
											ng-required="true"
											ng-model-options="{ updateOn: 'blur' }"
						          ng-model="viewModel[$index + 1].destination"
											vs-street-number="location[$index + 1].location.street_1" 
											vs-street="location[$index + 1].location.street_2"
											vs-city="location[$index + 1].location.city"
											vs-state="location[$index + 1].location.state"
											options="autocompleteOptions"
											ng-disabled="checked || !location[$index].depart_date" />
										<p ng-show="form.destination.$error.required && !form.destination.$pristine" class="help-block">Please provide your destination location.</p>
									</div>
								</div><!-- ng-repeat -->
							</div><!-- ng-if -->
						</div>
						<div class="fourth-user">
							<label class="label">Is this your final stop?</label>
							<input type="checkbox" class="finalDestination" ng-model="checked" ng-click="changeClass()">
						</div>
						<div id="finalLocation" class="first-user">
							<button class="btn" type="button" ng-click="deleteStops($last)" ng-disabled="checked" ng-show="removeButton" ng-model="removeButton">Remove stop</button>
							<button class="btn" type="button" id="add_stop" ng-click="addStops(stops)" ng-model="addbutton" ng-disabled="checked">Add another stop</button>
						</div>
						<button type="button" class="prev btn btn-previous">Previous</button>
						<button type="button" class="next btn btn-next">Next</button>
					</div><!--/ .form-bottom -->
				</fieldset>
				<fieldset>
					<div class="form-top">
						<div class="form-top-left">
							<h2 class="fs-title">Step 3. Trip Details</h2>
							<h3 class="fs-subtitle">Select your group type to better serve your trip. Be sure to give an estimate of your passenger size. Add any extra details, (amenities, A/C, etc.</h3>
						</div>
					</div>
					<div class="form-bottom">
						<div class="fourth-user" ng-class="{'has-error':form.passengers.$error.required && !form.passengers.$pristine}">
							<label class="label">&#xf0c0; Passenger Count</label>
							<input 
								type="number" 
								class="form-control" 
								name="passengers" 
								placeholder="&#xf0c0; How Many Passengers?"
								ng-model="viewModel.passengers" 
								min="0" 								
								ng-minlength="1"
								ng-model-options="{ updateOn: 'blur' }"
								step="1" 
								ng-required="true" />
							<p ng-show="form.passengers.$error.required && !form.passengers.$pristine" class="help-block">Please provide your passenger count</p>
						</div>
						<div class="first-user">
							<label class="label">Trip Details</label>
							<textarea 
							class="form-control" 
						    id="itinerary" 
						    name="itinerary" 
						    rows="4" 
					        cols="4" 
							ng-model="viewModel.itinerary"
						    ng-model-options="{ updateOn: 'blur' }"
							ng-required="true"></textarea>
						</div>
						<input type="hidden" name="trkid" ng-model="viewModel.trkid">
						<div class="incoming"></div>
						<button type="button" class="prev btn btn-previous left">Previous</button>
						<button type="submit" class="btn cta submit right" ng-click="submitForm()">Get Your Quote</button>
					</div>
				</fieldset>
			</form>
        </aside><!--/ .form-aside -->
    </div><!--/ col-md-6 -->
</div><!--/ .k-content -->