@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@include('partials.sidebars')
@yield('top-sidebar')

<div class="container">
    <!-- Profile Data Section -->
    <div class="profile-section">
        <p><strong>Username: </strong>{{$user['username']}}</p>
        <p><strong>Email: </strong>{{$user['email']}}</p>
        <p><strong>Credit: </strong>${{ number_format($user['credit'], 2) }}</p>
    </div>
    <br>
    <div class="profile-data">
        <form id="update-user-data" action="/path-to-server-side-script" method="POST">
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="full-name">Full name *</label>
                <input type="text" id="full-name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
        </form>
        <div class="button-group">
            <button class="btn-save" onclick="location.href='{{ route('add.credit.view') }}'">Add Credit</button>
            <button type="submit" form="update-user-data" class="btn-save">Save</button>
            <button class="btn-save" onclick="toggleChangePasswordForm('changePasswordForm')">Change Password</button>
            <a href="{{ route('delete.account.view') }}">
                <button type="button" class="btn-save">Delete Account</button>
            </a>
        </div>
    </div>
    <div style="display:none" class="password-change-form" id="changePasswordForm">
        <form action="/path-to-password-change-script" method="POST">
            <div class="form-group">
                <label for="old-password">Old Password *</label>
                <input type="password" id="old-password" name="old_password" required>
            </div>
            <div class="form-group">
                <label for="new-password">New Password *</label>
                <input type="password" id="new-password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm-new-password">Confirm New Password *</label>
                <input type="password" id="confirm-new-password" name="confirm_new_password" required>
            </div>
            <button type="submit" class="btn-save">Update Password</button>
        </form>
    </div>
    @if (!isset($rating))
    <div class="update-bidder-seller-data" id="bidder-seller">
        <form method="post" action="{{ route('bidderseller') }}">
            @csrf
            <div class="form-group">
                <label for="street">Street<sup style="color:red">*</sup></label>
                <input type="string" id="street" name="street" required>
            </div>
            <div class="form-group">
                <label for="city">City<sup style="color:red">*</sup></label>
                <input type="string" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="zipcode">Zipcode<sup style="color:red">*</sup></label>
                <input type="number" id="zipcode" name="zipcode" required>
            </div>
            <div class="form-group">
                <label for="country">Country<sup style="color:red">*</sup></label>
                <select id="country" name="country" required>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
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
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde (Cabo Verde)">Cape Verde (Cabo Verde)</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo, Republic of the">Congo, Republic of the</option>
                    <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
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
                    <option value="Eswatini">Eswatini</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Greece">Greece</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
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
                    <option value="Kosovo">Kosovo</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia">Micronesia</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="North Korea">North Korea</option>
                    <option value="North Macedonia">North Macedonia</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Korea">South Korea</option>
                    <option value="South Sudan">South Sudan</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Timor-Leste">Timor-Leste</option>
                    <option value="Togo">Togo</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City">Vatican City</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>
            </div>
            <label for="card">Card</sup></label>
            <input type="radio" id="card" name="payment-method" value="card" required>
            <br>
            <label for="paypal">Paypal</sup></label>
            <input type="radio" id="paypal" name="payment-method" value="paypal" required><br><br>
            <div id='card-details'>
                <div class="form-group">
                    <label for="cardnumber">Card Number<sup style="color:red">*</sup></label>
                    <input type="number" id="cardnumber" name="cardnumber">
                    <label for="holdername">Holder Name<sup style="color:red">*</sup></label>
                    <input type="string" id="holdername" name="holdername">
                    <label for="expirationdate">Expiration Date<sup style="color:red">*</sup></label>
                    <input type="date" id="expirationdate" name="expirationdate">
                    <label for="cvv">CVV<sup style="color:red">*</sup></label>
                    <input type="number" id="cvv" name="cvv">
                </div>
            </div>
            <div id='paypal-details'>
                <div class="form-group">
                    <label for="paypalemail">Paypal Email<sup style="color:red">*</sup></label>
                    <input type="string" id="paypalemail" name="paypalemail">
                </div>
            </div>
            
            <button type="submit" class="btn-save">Update</button>
        </form>
    </div>
    @endif
    <div class="profile-section account-summary">
    <h3>Account Summary</h3>
    <div class="account-info">
        <p><strong>Total Bids: </strong>{{ $totalBids }}</p>
        <p><strong>Auctions Won: </strong>{{ $auctionsWon }}</p>
        @isset($rating)
        <p><strong>Seller Rating: </strong>{{ $rating }}</p>
        @endisset
    </div>
</div>

<!-- Bidding History -->
<div class="profile-section bidding-history">
    <h3>Bidding History</h3>
    @if($bids->isEmpty())
        <p>No recent bidding activities.</p>
    @else
        @foreach ($bids as $bid)
            <p>
                <strong>{{ $bid->item_name }}</strong><br>
                Status: <span style="{{ $bid->status === 'active' ? 'color:green;' : 'color:red;' }}">
                    {{ ucfirst($bid->status) }}
                </span><br>
                Amount: ${{ number_format($bid->amount, 2) }}<br>
                Date: {{ $bid->bidding_date }}
            </p>
        @endforeach
    @endif
</div>

</div>

<br><br><br><br><br>

<script>
    function toggleChangePasswordForm(formName) {
        var form = document.getElementById(formName);
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }

    const card = document.querySelector('#card');
    const paypal = document.querySelector('#paypal');

    const listener = () => {
        if (card.checked()) toggleChangePasswordForm()
    }

    card.addEventListener('click', () => {
        if (card.checked) {
            document.getElementById('card-details').style.display = "block"
            document.getElementById('paypal-details').style.display = "none"
        }
    });
    paypal.addEventListener('click', () => {
        if (paypal.checked) {
            document.getElementById('card-details').style.display = "none"
            document.getElementById('paypal-details').style.display = "block"
        }
    });

    card.click();
</script>

@yield('bottom-sidebar')