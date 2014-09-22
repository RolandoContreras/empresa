<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="/js/moment.js"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js"></script>

<article class="main-content homepage" style="padding-bottom:20%;">
    <div class="breadcrumbs transition" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">My Account</li>
        </ul><!-- .breadcrumb -->
    </div>
    <!--<header class="title-page">
        <h1></h1>
    </header>-->

    <div class="content">
         <section class="widget widget-menu-icons">
            <header class="title-widget">
                <div style="width:90%;">
                 <img src=/images/profile/82273_1398035183_9537.jpg class = 'moldura consultant'><div style='padding-left: 95px;''> <h1 style='padding-top:15px;font-size:22px;text-align:left;'>Rolando Contreras</h1> <span class = 'title consultant'>Consultant</span></div>                 </div>
                <div style="clear:both;"></div>
            </header>
        </section>
                        <section class="widget">

            <nav class="abas">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#aba1" data-toggle="tab">User Information<? echo __('personal_data_title'); ?></a></li>
                    <li><a href="#aba2" data-toggle="tab">Partner Information</a></li>
				 	<li><a href="#aba3" data-toggle="tab">Password</a></li>
                    <li><a href="#aba4" data-toggle="tab">Security Code</a></li>                </ul>
            </nav>

            <div class="wg-content_nav">
                <div class="tab-content">
                    <div class="tab-pane active" id="aba1">
                        <!-- Quando quiser usar um formul·rio, usar essa class .forms em volta dele. N„o precisa necessariamente ser na tag form.  -->
                        <h2>Personal Information</h2><hr>
                        <form action="/users/profile" class="forms" enctype="multipart/form-data" id="UserProfileForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="PUT"/></div>                        <fieldset>
                            <div class="input file"><label for="UserProfileImageUpload">Profile Image</label><input type="file" name="data[User][profile_image_upload]"  id="UserProfileImageUpload"/></div><br>
                            <input type="hidden" name="data[User][profile_image]" value="/images/profile/82273_1398035183_9537.jpg" id="UserProfileImage"/>
	
                            <div class="form-group">
                                <label for="phone">Full Name</label>
                                <div class="input text"><input name="data[User][nome]" readonly="readonly" class="form-control input-medium" maxlength="45" type="text" value="Rolando Irvyng Contreras Huidobro" id="UserNome"/></div>                            </div>

    
                            <div class="form-group">
                                <label for="nome">First Name</label>
                                <div class="input text required"><input name="data[User][firstName]" readonly="readonly" class="form-control input-small" maxlength="100" type="text" value="Rolando" id="UserFirstName" required="required"/></div>                                
                            </div>
                            <div class="form-group">
                                <label for="nome">Last Name</label>
                                <div class="input text required"><input name="data[User][lastName]" readonly="readonly" class="form-control input-small" maxlength="100" type="text" value="Contreras" id="UserLastName" required="required"/></div>                            </div>

                            <div class="">
                                <label for="sexo">Gender</label>                            
                                <div class="input required"><input type="radio" name="data[User][sexo]" id="UserSexoF" value="F" required="required" />Female&nbsp;&nbsp;&nbsp;<input type="radio" name="data[User][sexo]" id="UserSexoM" value="M" required="required" checked="checked" />Male</div>                            </div><br>
                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <div class="input email required"><input name="data[User][email]" readonly="readonly" class="form-control input-medium" maxlength="45" type="email" value="software.contreras@gmail.com" id="UserEmail" required="required"/></div>                            </div>


                            <div class="form-group">
                                <!-- lock -->
                                <label for="nome">Social Security Number</label>
                                <div class="input text required"><input name="data[User][tax]" class="form-control input-small" maxlength="45" type="text" value="45887343" id="UserTax" required="required"/></div>                            </div>

                            <div class="form-group">
                                <label for="nome">Tax Number</label>
                                <div class="input text"><input name="data[User][national_identification]" class="form-control input-small" maxlength="45" type="text" value="10458873432" id="UserNationalIdentification"/></div>                            </div>

                            <label for="">
                                Birth date</label>
                            <div class="false"><div class="controls"><select name="data[User][data_nascimento][day]" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoDay">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06" selected="selected">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select><select name="data[User][data_nascimento][month]" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoMonth">
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06" selected="selected">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select><select name="data[User][data_nascimento][year]" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoYear">
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989" selected="selected">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
</select></div></div>                        

                            <div class ="clearfix"></div>

                            <div class="form-group" style = "margin-top: 15px;">
                                <label for="phone">Phone</label>
                                <div class="input text"><input name="data[User][telefone]" class="form-control input-small" maxlength="45" type="text" value="5114285880" id="UserTelefone"/></div>                            </div>

                            <div class="form-group">
                                <label for="phone">Mobile</label>
                                <div class="input text"><input name="data[User][telemovel]" class="form-control input-small" maxlength="45" type="text" value="51995795449" id="UserTelemovel"/></div>                            </div>

                            <div class="form-group">
                                <label for="phone">Skype</label>
                                <div class="input text"><input name="data[User][skype]" class="form-control input-small" placeholder="Insert your skype ID" maxlength="50" type="text" value="" id="UserSkype"/></div>                            </div>


                            <div class="form-group">
                                <label for="phone">Facebook</label>
                                <div class="input text"><input name="data[User][facebook]" class="form-control input-small" placeholder="Insert your facebook ID" maxlength="50" type="text" value="" id="UserFacebook"/></div>                            </div>


                            <h2 class="blue">Address</h2>
                            <hr> 

                            <div class="form-group">
                                <label for="phone">Street Address</label>
                                <div class="input text"><input name="data[User][morada]" class="form-control input-medium" maxlength="45" type="text" value="Jr. Los Nogales 230 Urb. Santa Rosa de Quives" id="UserMorada"/></div>                            </div>

                            <div class="form-group">
                                <label for="phone">Address Complement</label>
                                <div class="input text"><input name="data[User][morada_complementar]" class="form-control input-medium" maxlength="45" type="text" value="" id="UserMoradaComplementar"/></div>                            </div>

                            <div class="form-group">
                                <label for="phone">City</label>
                                <div class="input text"><input name="data[User][cidade]" class="form-control input-medium" maxlength="45" type="text" value="Santa Anita" id="UserCidade"/></div>                            </div>

                            <div class="form-group">
                                <label for="phone">Zip-Code</label>
                                <div class="input text"><input name="data[User][cod_postal]" class="form-control input-small" maxlength="45" type="text" value="43" id="UserCodPostal"/></div>                            </div>

                            <div class="form-group">
                                <label for="phone">Country</label>
                                <div class="input text"><input name="data[User][country]" disabled="disabled" class="form-control input-medium" maxlength="45" type="text" value="PE" id="UserCountry"/></div>                            </div>
                        </fieldset>
                    </div>
                    <div class="tab-pane forms" id="aba2">
                        <div class="tab-pane active" id="aba2">
                            <!-- Quando quiser usar um formul·rio, usar essa class .forms em volta dele. N„o precisa necessariamente ser na tag form.  -->
                            <h2>Personal Information</h2><hr>
                            <fieldset>
                                <div class="form-group">
                                    <label for="nome">Full Name</label>
                                    <div class="input text"><input name="data[User][2_nome]" class="form-control input-medium" maxlength="45" type="text" value="" id="User2Nome"/></div>                                </div>

                                <div class="">
                                    <label for="sexo">Gender</label>
                                    <div class="input"><input type="radio" name="data[User][2_sexo]" id="User2SexoF" value="F" />Female&nbsp;&nbsp;&nbsp;<input type="radio" name="data[User][2_sexo]" id="User2SexoM" value="M" />Male</div><br>
                                </div>
                                <div class="form-group">
                                    <!-- lock -->
                                    <label for="niss">Social Security Number</label>
                                    <div class="input text"><input name="data[User][2_tax]" class="form-control input-small" maxlength="45" type="text" value="" id="User2Tax"/></div>                                </div>

                                <div class="form-group">
                                    <label for="nome">Tax Number</label>
                                    <div class="input text"><input name="data[User][2_national_identification]" class="form-control input-small" maxlength="45" type="text" value="" id="User2NationalIdentification"/></div>                                </div>

                         
                                      
                            <label for="">
                                Birth date</label>
                                <div class="false"><div class="controls"><select name="data[User][2_data_nascimento][day]" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="User2DataNascimentoDay">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20" selected="selected">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select><select name="data[User][2_data_nascimento][month]" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="User2DataNascimentoMonth">
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04" selected="selected">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select><select name="data[User][2_data_nascimento][year]" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="User2DataNascimentoYear">
<option value="2014" selected="selected">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
</select></div></div>                            

                            <div class ="clearfix"></div>

                               <div class="form-group" style = "margin-top: 15px;">
                                    <label for="phone">Phone</label>
                                    <div class="input text"><input name="data[User][2_telefone]" class="form-control input-small" maxlength="45" type="text" value="" id="User2Telefone"/></div>                                </div>

                                <div class="form-group">
                                    <label for="phone">Mobile</label>
                                    <div class="input text"><input name="data[User][2_telemovel]" class="form-control input-small" maxlength="45" type="text" value="" id="User2Telemovel"/></div>                                </div>

                                 <div class="form-group">
                                 
                                <label for="phone">Skype</label>
                                <div class="input text"><input name="data[User][2_skype]" class="form-control input-small" placeholder="Partners Skype ID" type="text" id="User2Skype"/></div>                                </div>


                                <div class="form-group">
                                    <label for="phone">Facebook</label>
                                    <div class="input text"><input name="data[User][2_facebook]" class="form-control input-small" placeholder="Partners Facebook ID" type="text" id="User2Facebook"/></div>                                </div>

                                <h2 class="blue">Address</h2>
                                <hr> 

                                <div class="form-group">
                                    <label for="phone">Street Address</label>
                                    <div class="input text"><input name="data[User][2_morada]" class="form-control input-medium" maxlength="45" type="text" value="" id="User2Morada"/></div>                                </div>

                                <div class="form-group">
                                    <label for="phone">Address Complement</label>
                                    <div class="input text"><input name="data[User][2_morada_complementar]" class="form-control input-medium" maxlength="45" type="text" value="" id="User2MoradaComplementar"/></div>                                </div>

                                <div class="form-group">
                                    <label for="phone">City</label>
                                    <div class="input text"><input name="data[User][2_cidade]" class="form-control input-medium" maxlength="45" type="text" value="" id="User2Cidade"/></div>                                </div>

                                <div class="form-group">
                                    <label for="phone">Zip-Code</label>
                                    <div class="input text"><input name="data[User][2_cod_postal]" class="form-control input-small" maxlength="45" type="text" value="rolandocontreras" id="User2CodPostal"/></div>                                </div>

                                <div class="form-group">
                                    <label for="phone">Country</label>
                                    <div class="input text"><input name="data[User][2_country]" disabled="disabled" class="form-control input-medium" maxlength="45" type="text" id="User2Country"/></div>                                </div>
                            </fieldset>
                        </div>
                    </div>

					<div class="tab-pane forms" id="aba3">
                        <h2>Change Password</h2>
						<p style="font-size:14px;">
							Password must contain minimum of 8 characters, one numeral, one capital letter and one lower letter.						</p>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input text">
                                <div class="input password"><input name="data[User][password]" class="form-control input-medium" autocomplete="off" type="password" id="UserPassword"/></div>                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Repeat Password</label>
                            <div class="input text">
                                <div class="input password"><input name="data[User][password_confirm]" class="form-control input-medium" type="password" id="UserPasswordConfirm"/></div>                            </div>
                        </div>                    
                    </div>
                    <div class="tab-pane forms" id="aba4">
                        <h2>Edit here your Security Code</h2>
                        
                        <div class="form-group">
                            <label for="sec_code">Security Code</label>
                            <div class="input text">
                                <div class="input password"><input name="data[User][sec_code]" class="form-control input-medium" type="password" id="UserSecCode"/></div>                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sec_code">Confirm your Security Code</label>
                            <div class="input text">
                                <div class="input password"><input name="data[User][sec_code_confirm]" class="form-control input-medium" type="password" id="UserSecCodeConfirm"/></div>                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sec_code">Password</label>
                            <div class="input text">
                                <div class="input password"><input name="data[User][pw]" class="form-control input-medium" type="password" id="UserPw"/></div>                            </div>
                        </div>        

                                                                        <div class="form-group">
                            <label for="sec_code">Current Security Code</label>
                            <div class="input text">
                                <div class="input password"><input name="data[User][current_sec_code]" class="form-control input-medium" type="password" id="UserCurrentSecCode"/></div>                            </div>
                        </div>   
                         
                    </div>
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value=Send>
            </form>

        </section>

        </section>

    </div>
