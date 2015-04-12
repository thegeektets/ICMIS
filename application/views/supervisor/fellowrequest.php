
<body>


	<div id="cl-wrapper" class="fixed-menu">
		<div class="cl-sidebar" data-position="right" >
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img src="<?php echo $profile['0']['user_avatar'] ?>"  height="150px"alt="" /></div>
              <div class="info">
                <a href="#"><?php if (strlen($profile['0']['username']) > 1 ){echo "Supervisor :".$profile['0']['username'] ;} ?></a>
                <img src="<?php echo base_url('/assets/images/state_online.png')?>" alt="Status" /> <span>Online</span>
              </div>
            </div>
            <ul class="cl-vnavigation">
               <li><a href="#"><i class="fa fa-home"></i><span>Profile</span></a>
                <ul class="sub-menu">
                  <li ><a href="<?php echo base_url('index.php/supervisor') ?>">My Profile</a></li>
                </ul>
              </li>
        
              <li><a href="#"><i class="fa fa-list-alt"></i><span>Requests</span></a>
                <ul class="sub-menu">
                  <li><a href="<?php echo base_url('index.php/supervisor/newinternrequest') ?>">Request Interns</a></li>
                   <li  class="active"><a href="<?php echo base_url('index.php/supervisor/newfellowrequest') ?>">Request Fellows</a></li>
               
                  <li><a href="<?php echo base_url('index.php/supervisor/requeststatus') ?>">View Progress</a></li>
                  </ul>
              </li>
                    <li><a href="#"><i class="fa fa-user"></i><span>Students</span></a>
                <ul class="sub-menu">
                  
                   <li><a href="<?php echo base_url('index.php/supervisor/supervisorintern');?>">Interns</a></li>
                   <li><a href="<?php echo base_url('index.php/supervisor/supervisorfellow')?>">Fellows</a></li>
            
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-table"></i><span>Reports</span></a>
                <ul class="sub-menu">
                
                <li><a href="<?php echo base_url("index.php/supervisor/project_reports");?>">Projects</a></li>
              
                </ul>
              </li>              
          </div>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">
          <input type="text" class="form-control search" placeholder="Search..." />
          <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>
			</div>
		</div>
	
		<div class="container-fluid" id="pcont">
		  <div class="cl-mcont">
		  
	<div class="row">
        <div class="col-sm-12">
          
          <div class="tab-container">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#intern">Request Fellow(s)</a></li>
                      </ul>
            <div class="tab-content">
              <div id="intern" class="tab-pane active cont">
            <h3 class="widget-title">Request New Fellow(s)</h3>
                <div class="row friends-list">



                            <form role="form" style="color:#000;" class="form-horizontal" <?php echo form_open('supervisor/newfellowrequest'); ?>
             
                  <div class="form-group spacer2">
                    <div class="col-sm-3"></div>
                    </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="skills">Skills,Qualifications & Experience of the Desired Fellow</label>
                    <div class="col-sm-9">
                      <textarea type="text" required ="true" value="<?php echo set_value('skills'); ?>" name="skills" id="skills" class="form-control">

                      </textarea>
                      <div style="color:#DF0D8A" id="skills-error"> <?php echo form_error('skills'); ?></div>
        
                    </div>
                     
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="number">Number of Fellow(s) Required</label>
                    <div class="col-sm-9">
                      <input type="text" placeholder="number of fellows" value="<?php echo set_value('number'); ?>" id="number" name="number" class="form-control">
                          <div style="color:#DF0D8A"  id="number-error"> <?php echo form_error('number'); ?></div>
             
                    </div>
                   </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="education">Level of Education</label>
                    <div class="col-sm-9">
                  
                     <select name="education" value="<?php echo set_value('education'); ?>" class="form-control">
                    
                    <option value="Diploma">Diploma</option>
                    <option value="Undergraduate"> Undergraduate</option>
                    <option value="MSC">MSC</option>
                    <option value="PHD">PHD</option>
                    </select>                 
                   <div  style="color:#DF0D8A" id="education-error"> <?php echo form_error('education'); ?></div>
                 
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="summary">Summary of the Project where fellowship will be undertaken </label>
                    <div class="col-sm-9">
                      <textarea type="text"  value="<?php echo set_value('summary'); ?>" name="summary" id="summary" class="form-control">

                      </textarea>
                  <div style="color:#DF0D8A" id="summary-error"> <?php echo form_error('summary'); ?></div>
                 
                    </div>
                  </div>
                     <!--
                       <div class="form-group">
                    <label class="col-sm-3 control-label" for="summary">Suggested fellows</label>
                    <div class="col-sm-9">
                      <textarea type="text" placeholder="summary" name="summary" id="summary" class="form-control">

                      </textarea>
                    </div>
                
                  </div>
                    -->
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="purpose">Research Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="purpose" value="<?php echo set_value('purpose'); ?>" id="purpose" class="form-control"/>

                  
                    <div style="color:#DF0D8A" id="purpose-error"> <?php echo form_error('purpose'); ?></div>
                
                    </div>
                   
                  </div>
                        <div class="form-group">
                    <label class="col-sm-3 control-label" for="sd_unit">SD/Unit</label>
                    <div class="col-sm-9">
                      
                           <select name="sd_unit"  selected="<?php echo set_value('sd_unit'); ?>" class="form-control">
                    <option>Select One</option>
                   
                     <option>Select One</option>
                    <option value = "sd1">SD 1 </option>
                    <option value = "sd2">SD 2 </option>
                    <option value = "sd3">SD 3 </option>
                    <option value = "sd4">SD 4 </option>
                    <option value = "sd5">SD 5 </option>
                    <option value = "sd6">SD 6 </option>
                    <option value = "Capacity Development Unit">Capacity Development Unit</option>
                    <option value = "Communications">Communications</option>
                    <option value = "Contracts and Grants Office">Contracts and Grants Office</option>
                    <option value = "Genetic Resources">Genetic Resources</option>
                    <option value = "Geographic Information Systems">Geographic Information Systems</option>
                    <option value = "ICT">ICT</option>
                    <option value = "Internal Audit">Internal Audit</option>
                    <option value = "Library">Library</option>
                    <option value = "Operations">Operations</option>
                    <option value = "Partnership and Impact">Partnership and Impact</option>
                    <option value = "Protocol">Protocol</option>
                    <option value = "Security">Security</option>
                    <option value = "Protocol">Protocol</option>
                    <option value = "Knowledge Management">Knowledge Management</option>
                    <option value = "Protocol">Protocol</option>
                    <option value = "Programme Development Unit">Programme Development Unit</option>
                    <option value = "RMG">RMG</option>
                    <option value = "FSU">FSU</option>
                    <option value = "HRU">HRU</option>
                    <option value = "OTHERS">OTHERS</option>                    </select> 
                  
                      <div style="color:#DF0D8A"  id="sd_unit-error"> <?php echo form_error('sd-unit'); ?></div>
                  
                    </div>
                  
                  </div>
                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="budgetholder">Budget Holder</label>
                    <div class="col-sm-9">
                      <input type="text"   value="<?php echo set_value('budgetholder'); ?>"  placeholder="Name of the Budget Holder" id="budgetholder" name="budgetholder" class="form-control">
                        <div  style="color:#DF0D8A"  id="budgetholder-error"> <?php echo form_error('budgetholder'); ?></div>
        
                    </div>
             
                  </div>
                        <div class="form-group">
                    <label class="col-sm-3 control-label"   value="<?php echo set_value('budgetholderemail'); ?>"  for="budgetholderemail">Budget Holder Email </label>
                    <div class="col-sm-9">
                      <input type="email" placeholder="Email" id="budgetholderemail" name="budgetholderemail" class="form-control">
                  <div style="color:#DF0D8A"  id="budgetholderemail-error"> <?php echo form_error('budgetholderemail'); ?></div>
         
                    </div>
                       
                  </div>
                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="CostCentre">Charge Code</label>
                    <div class="col-sm-9">
                      <input type="text" placeholder="Cost Centre"  value="<?php echo set_value('costcenter'); ?>"  id="costcenter"  name="costcenter" class="form-control">
                      
                       <div  style="color:#DF0D8A"  id="costcenter-error"> <?php echo form_error('costcenter'); ?></div>
             
                    </div>
                     
                  </div>
                         <div class="form-group">
                    <label class="col-sm-3 control-label" for="provisions">Provisions</label>
                    <div class="col-sm-9">
                       <div class="radio"> 
                    <label> <input type="checkbox" checked=""  value="<?php echo set_value('provisions'); ?>"  name="provisions" class="icheck"> Student ID</label> 
                  </div>
                
                  <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck"> Office space</label> 
                  </div>
                  <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck"> Email connectivity</label> 
                  </div>
                    <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">  Computer</label> 
                  </div>
                    <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">  Research/field costs</label> 
                  </div>
                      <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">   Medical insurance</label> 
                  </div>
                         <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">    Personal Accident cover</label> 
                  </div>
                             <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">    Other Specify</label> 
                  </div>
                          <div  style="color:#DF0D8A"  id="provisions-error"> <?php echo form_error('provisions'); ?></div>
             
                    </div>
                  </div>
             
                            <div class="form-group">
                    <label class="col-sm-3 control-label" for="CostCentre">Region</label>
                    <div class="col-sm-9">

                           <select name="region"  value="<?php echo set_value('region'); ?>"  class="form-control">
                  
                    <option value="HeadQuarters">HeadQuarters</option> 
                     <option value="East and Southern Africa"> East and Southern Africa</option> 
                     <option value="Latin America">Latin America</option> 
                     <option value="South Asia">South Asia</option> 
                     <option value="Southeast Asia">Southeast Asia</option> 
                     <option value="East and Central Asia">East and Central Asia</option> 
                     <option value="West and Central Africa">West and Central Africa</option> 
                   
                    </select>      
                  <div   style="color:#DF0D8A"  id="region-error"> <?php echo form_error('region'); ?></div>
             
                    </div>
             
                  </div>
                            <div class="form-group">
                    <label class="col-sm-3 control-label" for="CostCentre">Country</label>
                    <div class="col-sm-9">
                            <select name="country"   value="<?php echo set_value('country'); ?>"  class="form-control">
                  <option value="" selected="selected">Select Country</option>
                  <option value="United States">United States</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antarctica">Antarctica</option>
                  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bermuda">Bermuda</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Bouvet Island">Bouvet Island</option>
                  <option value="Brazil">Brazil</option>
                  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                  <option value="Brunei Darussalam">Brunei Darussalam</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Cape Verde">Cape Verde</option>
                  <option value="Cayman Islands">Cayman Islands</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Christmas Island">Christmas Island</option>
                  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo">Congo</option>
                  <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                  <option value="Cook Islands">Cook Islands</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Cote D'ivoire">Cote D'ivoire</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                  <option value="Faroe Islands">Faroe Islands</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="French Guiana">French Guiana</option>
                  <option value="French Polynesia">French Polynesia</option>
                  <option value="French Southern Territories">French Southern Territories</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Greece">Greece</option>
                  <option value="Greenland">Greenland</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guadeloupe">Guadeloupe</option>
                  <option value="Guam">Guam</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guinea-bissau">Guinea-bissau</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                  <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong">Hong Kong</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                  <option value="Korea, Republic of">Korea, Republic of</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macao">Macao</option>
                  <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Martinique">Martinique</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mayotte">Mayotte</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                  <option value="Moldova, Republic of">Moldova, Republic of</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="Netherlands Antilles">Netherlands Antilles</option>
                  <option value="New Caledonia">New Caledonia</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Niue">Niue</option>
                  <option value="Norfolk Island">Norfolk Island</option>
                  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Pitcairn">Pitcairn</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Reunion">Reunion</option>
                  <option value="Romania">Romania</option>
                  <option value="Russian Federation">Russian Federation</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saint Helena">Saint Helena</option>
                  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                  <option value="Saint Lucia">Saint Lucia</option>
                  <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                  <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                  <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Timor-leste">Timor-leste</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                  <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Viet Nam">Viet Nam</option>
                  <option value="Virgin Islands, British">Virgin Islands, British</option>
                  <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                  <option value="Wallis and Futuna">Wallis and Futuna</option>
                  <option value="Western Sahara">Western Sahara</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                 </select>
                 <div  style="color:#DF0D8A"  id="country-error"> <?php echo form_error('country'); ?></div>
                  
                    </div>
               
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tors">Terms of Reference </label>
                    <div class="col-sm-9">
                      <textarea type="text"  value="<?php echo set_value('tors'); ?>"   name="tors" id="tors" class="form-control">

                      </textarea>
                          <div  style="color:#DF0D8A"  id="tors-error"> <?php echo form_error('tors'); ?></div>
            
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="expected">Expected Output </label>
                    <div class="col-sm-9">
                      <textarea type="text"  value="<?php echo set_value('expected'); ?>"  name="expected" id="expected" class="form-control">

                      </textarea>
                    <div  style="color:#DF0D8A"  id="expected-error"> <?php echo form_error('expected'); ?></div>
        
                    </div>
             
                  </div>
              
                     <div class="form-group">
                <label class="col-sm-3 control-label"> Start Date </label>
                <div class="col-sm-6">
                  <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control"   value="<?php echo set_value('startdate'); ?>"  size="16" name="startdate"type="text" value="" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>          
                <div  style="color:#DF0D8A"  id="startdate-error"> <?php echo form_error('startdate'); ?></div>
        
                </div>
             
              </div>
     
                                <div class="form-group">
                <label class="col-sm-3 control-label"> End Date </label>
                <div class="col-sm-6">
                  <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control"  value="<?php echo set_value('enddate'); ?>"  size="16" name="enddate"type="text" value="" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>          
                <div  style="color:#DF0D8A"  id="enddate-error"> <?php echo form_error('enddate'); ?></div>
        
                </div>
             
              </div>
                     

                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                  </div>
              </form>
              </div>
              </div>




            </div>
          </div>    
          
          

      </div>

  </div>
  </div>
  	
  </div> 
  	
  </div>
  
  </body>

</html>