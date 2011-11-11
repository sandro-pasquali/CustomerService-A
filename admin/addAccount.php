
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>formal</title>
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="en-us" />
<meta name="ROBOTS" content="ALL" />
<meta name="Copyright" content="Copyright (c) Jeebus" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="MSSmartTagsPreventParsing" content="true" />

<style type="text/css">

form p, form label 
  {
  	font-size: 10px; 
  	margin: 0; 
  	padding: 1px; 
  	line-height: 1.2em;
  }
  
input, textarea 
  {
  	background: #fff url("../images/input-bg.jpg") repeat-x bottom; 
  	border: solid 1px #5B3205; 
  	font: 11px "lucida grande", verdana, lucida, arial, helvetica, sans-serif; 
  	line-height: 1.3em;
  }
  
label 
  {
  	padding: 0px; 
  	font: 11px "lucida grande", verdana, lucida, arial, helvetica, sans-serif; 
  	line-height: 1.1em; 
  	font-weight: bold; 
  	cursor: hand;
  	cursor: pointer;
  }
  
select, option 
  {
  	font-size: 10px; 
  	background-color: #F9FBFD;
  }
  
.button 
  {
  	cursor: pointer; 
  	background: #CFB698 url("../images/button-bg.jpg") repeat-x bottom; 
  	border: solid 1px #5B3205; 
  	color: #000; 
  	padding: 0 1px;
  }
  
input.buttonimg 
  {
  	border: none; 
  	cursor: pointer;
  }
  
input.checkbox 
  {
  	background-color: transparent; 
  	border: none;
  }

BODY
  {
    color: black;
	  font-family: Verdana, Arial;
	  font-size: 11px;
	  background-color: gainsboro;
	  padding: 0px;
	  margin: 0px;
	  border: 0px;
  }
  
.check
  {
    position: static;
    font: 11px verdana, arial, sans-serif;
    font-family: Tahoma, Verdana, Arial, sans-serif;
    font-size: 11px;
	  font-weight: bold;
	  color: crimson;
	  padding: 2px;
  }	
  
.additionalInfo
  {
    font-family: Tahoma, Verdana, Arial, sans-serif;
    font-size: 10px;
	  font-weight: bold;
	  color: crimson;
	  padding-left: 4px;
	  cursor: hand;
	  cursor: pointer;
  }  
  
.formElement
  {
  	margin-bottom: 6px;
  }
  
</style>

<script language="Javascript" type="text/javascript" src="../scripts/Validator.js"></script>

</head>
<body>

<form class="formContainer" id="daform" method="post" action="about:blank">

<div id="_firstName" class="formElement">
  	<label>
    	First Name:
	  	<span class="formElementInput">
    		<input 	type="text" 
	    	   			size="20" 
		   					maxlength="64" 
		   					name="_firstName" 
		   					value="" />
  		</span>
	</label>
</div>

<div id="_lastName" class="formElement">
  	<label>
    	Last Name:
	  	<span class="formElementInput">
    		<input 	type="text" 
	    	   			size="20" 
		   					maxlength="64" 
		   					name="_lastName" 
		   					value="" />
  		</span>
	</label>
</div>
	
<div id="_email" class="formElement">
  	<label>
    	Email:
	  	<span class="formElementInput">
    		<input 	type="text" 
	    	   			size="40" 
		   					maxlength="255" 
		   					name="_email" 
		   					value="" 
		   					errorString="invalid email" 
		   					regex="validEmail" 
		   					additionalInfo="This is our primary contact point with you. Be sure to enter a valid email address." />
  		</span>
	</label>
</div>

<div id="_phone" class="formElement">
  	<label>
    	Phone Number:
	  	<span class="formElementInput">
    		<input 	type="text" 
	    	   			size="10" 
		   					maxlength="64" 
		   					name="_phone" 
		   					value="" />
  		</span>
	</label>
</div>

<div id="_fax" class="formElement">
  	<label>
    	Fax Number:
	  	<span class="formElementInput">
    		<input 	type="text" 
	    	   			size="10" 
		   					maxlength="64" 
		   					name="_fax" 
		   					value="" />
  		</span>
	</label>
</div>

<div id="_address_1" class="formElement">
  	<label>
    	Address 1:
	  	<span class="formElementInput">
			<input 	type="text" 
					size="30" 
					maxlength="40" 
					name="_address_1" 
					value="" />
  		</span>
	</label>
</div>
								
<div id="_address_2" class="formElement">
  	<label>
    	Address 2:
	  	<span class="formElementInput">
			<input 	type="text" 
					size="30" 
					maxlength="40" 
					name="_address_2" 
					validate="false" 
					value="" />
  		</span>
	</label>
</div>

<div id="_city" class="formElement">
  	<label>
    	City:
  		<span class="formElementInput">
			<input 	type="text" 
					size="14" 
					maxlength="20" 
					name="_city" 
					value="" 
					errorString="invalid city name" />
  		</span>
	</label>
</div>
								
<div id="_state" class="formElement">
  	<label>
    	State:
  		<span class="formElementInput">
			<select name="_state">
				<option value="">choose</option>
				<option value="AL">Alabama</option>
				<option value="AR">Arkansas</option>
				<option value="AZ">Arizona</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DC">District of Columbia</option>
				<option value="DE">Delaware</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="IA">Iowa</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="MA">Massachussetts</option>
				<option value="MD">Maryland</option>
				<option value="ME">Maine</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MO">Missouri</option>
				<option value="MS">Mississippi</option>
				<option value="MT">Montana</option>
				<option value="NB">Nebraska</option>
				<option value="NC">North Carolina</option>
				<option value="NE">Nebraska</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NV">Nevada</option>
				<option value="NY">New York</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VA">Virginia</option>
				<option value="VT">Vermont</option>
				<option value="WA">Washington</option>
				<option value="WI">Wisconsin</option>
				<option value="WV">West Virginia</option>
				<option value="WY">Wyoming</option>
			</select>
  		</span>
	</label>
</div>

<div id="_zipcode" class="formElement">
  	<label>
    	Zipcode:
	  	<span class="formElementInput">
 			<input 	type="text" 
					size="7" 
					maxlength="32" 
					name="_zipcode" 
					value="" />
			<a class="check" id="checkzip">
			</a>
  		</span>
	</label>
</div>

<div id="_country" class="formElement">
  	<label>
    	State:
  		<span class="formElementInput">
			<select name="_country">
				<option value="">Choose Country</option>
				<option value="US" selected>United States</option>
				<option value="CA">Canada</option>
				<option value="AF">Afghanistan</option>
				<option value="AL">Albania</option>
				<option value="DZ">Algeria</option>
				<option value="AS">American Samoa</option>
				<option value="AD">Andorra</option>
				<option value="AO">Angola</option>
				<option value="AQ">Antarctica</option>
				<option value="AR">Argentina</option>
				<option value="AM">Armenia</option>
				<option value="AW">Aruba</option>
				<option value="AU">Australia</option>
				<option value="AT">Austria</option>
				<option value="AZ">Azerbaijan</option>
				<option value="BH">Bahrain</option>
				<option value="BD">Bangladesh</option>
				<option value="BY">Belarus</option>
				<option value="BE">Belgium</option>
				<option value="BZ">Belize</option>
				<option value="BJ">Benin</option>
				<option value="BM">Bermuda</option>
				<option value="BT">Bhutan</option>
				<option value="BO">Bolivia</option>
				<option value="BA">Bosnia And Herzegovina</option>
				<option value="BW">Botswana</option>
				<option value="BV">Bouvet Island</option>
				<option value="BR">Brazil</option>
				<option value="IO">British Indian Ocean Territory</option>
				<option value="BN">Brunei Darussalam</option>
				<option value="BG">Bulgaria</option>
				<option value="BF">Burkina Faso</option>
				<option value="BI">Burundi</option>
				<option value="KH">Cambodia</option>
				<option value="CM">Cameroon</option>
				<option value="CA">Canada</option>
				<option value="CV">Cape Verde</option>
				<option value="CF">Central African Republic</option>
				<option value="TD">Chad</option>
				<option value="CL">Chile</option>
				<option value="CN">China</option>
				<option value="CX">Christmas Island</option>
				<option value="CC">Cocos Keeling Islands</option>
				<option value="CO">Colombia</option>
				<option value="KM">Comoros</option>
				<option value="CG">Congo</option>
				<option value="CD">Congo, D.P.R</option>
				<option value="CK">Cook Islands</option>
				<option value="CR">Costa Rica</option>
				<option value="CI">Côte D`ivoire</option>
				<option value="HR">Croatia</option>
				<option value="CU">Cuba</option>
				<option value="CY">Cyprus</option>
				<option value="CZ">Czech Republic</option>
				<option value="DK">Denmark</option>
				<option value="DJ">Djibouti</option>
				<option value="DO">Dominican Republic</option>
				<option value="TP">East Timor</option>
				<option value="EC">Ecuador</option>
				<option value="EG">Egypt</option>
				<option value="SV">El Salvador</option>
				<option value="GQ">Equatorial Guinea</option>
				<option value="ER">Eritrea</option>
				<option value="EE">Estonia</option>
				<option value="ET">Ethiopia</option>
				<option value="FK">Falkland Islands Malvinas</option>
				<option value="FO">Faroe Islands</option>
				<option value="FJ">Fiji</option>
				<option value="FI">Finland</option>
				<option value="FR">France</option>
				<option value="GF">French Guiana</option>
				<option value="PF">French Polynesia</option>
				<option value="TF">French Southern Territories</option>
				<option value="GA">Gabon</option>
				<option value="GM">Gambia</option>
				<option value="GE">Georgia</option>
				<option value="DE">Germany</option>
				<option value="GH">Ghana</option>
				<option value="GI">Gibraltar</option>
				<option value="GR">Greece</option>
				<option value="GL">Greenland</option>
				<option value="GP">Guadeloupe</option>
				<option value="GU">Guam</option>
				<option value="GT">Guatemala</option>
				<option value="GN">Guinea</option>
				<option value="GY">Guyana</option>
				<option value="HT">Haiti</option>
				<option value="HN">Honduras</option>
				<option value="HK">Hong Kong</option>
				<option value="HU">Hungary</option>
				<option value="IS">Iceland</option>
				<option value="IN">India</option>
				<option value="ID">Indonesia</option>
				<option value="IR">Iran, Islamic Republic Of</option>
				<option value="IQ">Iraq</option>
				<option value="IE">Ireland</option>
				<option value="IL">Israel</option>
				<option value="IT">Italy</option>
				<option value="JP">Japan</option>
				<option value="JO">Jordan</option>
				<option value="KZ">Kazakstan</option>
				<option value="KE">Kenya</option>
				<option value="KP">Korea, D.P.R.</option>
				<option value="KR">Korea, Republic Of</option>
				<option value="KW">Kuwait</option>
				<option value="KG">Kyrgyzstan</option>
				<option value="LA">Lao</option>
				<option value="LV">Latvia</option>
				<option value="LB">Lebanon</option>
				<option value="LS">Lesotho</option>
				<option value="LR">Liberia</option>
				<option value="LY">Libya</option>
				<option value="LI">Lichtenstein</option>
				<option value="LT">Lithuania</option>
				<option value="LU">Luxembourg</option>
				<option value="MO">Macau</option>
				<option value="MK">Macedonia</option>
				<option value="MG">Madagascar</option>
				<option value="MW">Malawi</option>
				<option value="MY">Malaysia</option>
				<option value="MV">Maldives</option>
				<option value="ML">Mali</option>
				<option value="MT">Malta</option>
				<option value="MH">Marshall Islands</option>
				<option value="MR">Mauritania</option>
				<option value="MU">Mauritius</option>
				<option value="MX">Mexico</option>
				<option value="FM">Micronesia</option>
				<option value="MD">Moldova, Republic Of</option>
				<option value="MC">Monaco</option>
				<option value="MN">Mongolia</option>
				<option value="MA">Morocco</option>
				<option value="MZ">Mozambique</option>
				<option value="MM">Myanmar</option>
				<option value="NA">Namibia</option>
				<option value="NP">Nepal</option>
				<option value="NL">Netherlands</option>
				<option value="NC">New Caledonia</option>
				<option value="NZ">New Zealand</option>
				<option value="NI">Nicaragua</option>
				<option value="NE">Niger</option>
				<option value="NG">Nigeria</option>
				<option value="NF">Norfolk Island</option>
				<option value="MP">Northern Mariana Islands</option>
				<option value="NO">Norway</option>
				<option value="OM">Oman</option>
				<option value="PK">Pakistan</option>
				<option value="PW">Palau</option>
				<option value="PS">Palestine</option>
				<option value="PA">Panama</option>
				<option value="PG">Papua New Guinea</option>
				<option value="PY">Paraguay</option>
				<option value="PE">Peru</option>
				<option value="PH">Philippines</option>
				<option value="PN">Pitcairn</option>
				<option value="PL">Poland</option>
				<option value="PT">Portugal</option>
				<option value="QA">Qatar</option>
				<option value="RO">Romania</option>
				<option value="RW">Rwanda</option>
				<option value="SH">Saint Helena</option>
				<option value="WS">Samoa</option>
				<option value="SM">San Marino</option>
				<option value="SN">Senegal</option>
				<option value="SC">Seychelles</option>
				<option value="SL">Sierra Leone</option>
				<option value="SG">Singapore</option>
				<option value="SK">Slovakia</option>
				<option value="SI">Slovenia</option>
				<option value="SB">Solomon Islands</option>
				<option value="SO">Somalia</option>
				<option value="ZA">South Africa</option>
				<option value="ES">Spain</option>
				<option value="LK">Sri Lanka</option>
				<option value="SD">Sudan</option>
				<option value="SR">Suriname</option>
				<option value="SZ">Swaziland</option>
				<option value="SE">Sweden</option>
				<option value="CH">Switzerland</option>
				<option value="SY">Syrian Arab Republic</option>
				<option value="TW">Taiwan</option>
				<option value="TJ">Tajikistan</option>
				<option value="TZ">Tanzania, United Republic Of</option>
				<option value="TH">Thailand</option>
				<option value="TG">Togo</option>
				<option value="TO">Tonga</option>
				<option value="TN">Tunisia</option>
				<option value="TR">Turkey</option>
				<option value="TM">Turkmenistan</option>
				<option value="TV">Tuvalu</option>
				<option value="UG">Uganda</option>
				<option value="UA">Ukraine</option>
				<option value="AE">United Arab Emirates</option>
				<option value="GB">United Kingdom</option>
				<option value="US">United States</option>
				<option value="UY">Uruguay</option>
				<option value="UM">US Minor Outlying Islands</option>
				<option value="UZ">Uzbekistan</option>
				<option value="VU">Vanuatu</option>
				<option value="VA">Vatican City</option>
				<option value="VE">Venezuela</option>
				<option value="VN">Vietnam</option>
				<option value="EH">Western Sahara</option>
				<option value="YE">Yemen</option>
				<option value="YU">Yugoslavia</option>
				<option value="ZM">Zambia</option>
				<option value="ZW">Zimbabwe</option>
			</select>
  		</span>
	</label>
</div>

<div id="_webAddress" class="formElement">
  	<label>
    	Phone Number:
	  	<span class="formElementInput">
    		<input 	type="text" 
	    	   			size="10" 
		   					maxlength="255" 
		   					name="_webAddress" 
		   					value="" />
  		</span>
	</label>
</div>

<div id="_notes" class="formElement">
  	<label>
    	Phone Number:
	  	<span class="formElementInput">
    		<textarea	rows="5" 
	    	   				cols="40" 
		   						name="_notes" 
		   						value="" 
		   						validate="false"></textarea>
  		</span>
	</label>
</div>
					
<div id="submitButton" class="formSubmitButton">
	<input 	type="button" 
			onclick="return Validator.attemptSubmit(this);" 
			value="create" />
</div>

</form>

</body>
</html>