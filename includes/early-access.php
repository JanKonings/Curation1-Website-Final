<!-- Early Access Sign Up Modal -->
<div class="earlyAccess">
    <div class="earlyAccessForm">
        <h2 id="close">X</h2>
        <div id="sideImgBox">
             <img src="/assets/images/logoBlack.JPG?v=3" id="sideImg">
        </div>
        <form id="signupForm">
            <h1 id="curationHead">curation1</h1>
            <input type="email" id="email" required placeholder="Email Address"/>

            <div id="phoneWrapper">
                <select id="countryCode" >
                    <option value="+1" data-country="USA">+1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(USA)</option>
                    <option value="+44" data-country="UK">+44&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(UK)</option>
                    <option value="+91" data-country="India">+91&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(India)</option>
                    <option value="+61" data-country="Australia">+61&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Australia)</option>
                    <option value="+33" data-country="France">+33&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(France)</option>
                    <option value="+49" data-country="Germany">+49&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Germany)</option>
                    <option value="+55" data-country="Brazil">+55&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Brazil)</option>
                    <option value="+81" data-country="Japan">+81&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Japan)</option>
                    <option value="+34" data-country="Spain">+34&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Spain)</option>
                    <option value="+7" data-country="Russia">+7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Russia)</option>
                    <option value="+226" data-country="Burkina Faso">+226&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Burkina Faso)</option>
                    <option value="+213" data-country="Algeria">+213&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Algeria)</option>
                    <option value="+54" data-country="Argentina">+54&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Argentina)</option>
                    <option value="+375" data-country="Belarus">+375&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Belarus)</option>
                    <option value="+359" data-country="Bulgaria">+359&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Bulgaria)</option>
                    <option value="+387" data-country="Bosnia and Herzegovina">+387&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Bosnia and Herzegovina)</option>
                    <option value="+1-246" data-country="Barbados">+1-246&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Barbados)</option>
                    <option value="+254" data-country="Kenya">+254&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Kenya)</option>
                    <option value="+1-242" data-country="Bahamas">+1-242&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Bahamas)</option>
                    <option value="+506" data-country="Costa Rica">+506&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Costa Rica)</option>
                    <option value="+855" data-country="Cambodia">+855&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Cambodia)</option>
                    <option value="+225" data-country="Ivory Coast">+225&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ivory Coast)</option>
                    <option value="+57" data-country="Colombia">+57&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Colombia)</option>
                    <option value="+255" data-country="Tanzania">+255&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Tanzania)</option>
                    <option value="+233" data-country="Ghana">+233&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ghana)</option>
                    <option value="+1-767" data-country="Dominica">+1-767&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Dominica)</option>
                    <option value="+1-59" data-country="Saint Lucia">+1-59&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Saint Lucia)</option>
                </select>
                <input type="tel" id="phone"  placeholder="Phone Number" pattern="^\d{1,14}$" title="Phone number should only contain digits" />
            </div>

            <div class="consentBlock">
                <div class="checkboxCol">
                    <input type="checkbox" id="smsOptIn" name="smsOptIn">
                </div>
                <div class="textCol">
                    By checking this box and clicking 'JOIN' you consent to receive future product drop
                    alerts via SMS from curation1. Reply STOP to opt out. Reply HELP for help. Message and
                    data rates may apply. Message frequency may vary.                    </div>
            </div>

            <div class="consentBlock">
                <div class="checkboxCol">
                    <input type="checkbox" id="termsOptIn" >
                </div>
                <div class="textCol">
                    I agree to the <a href="/static/terms.html">Terms and Conditions</a> and
                    <a href="/static/privacy.html">Privacy Policy</a>. Your mobile information
                    will not be sold or shared with third parties for promotional purposes.
                </div>
            </div>

            <button id="earlyAccessButton" type="submit">JOIN</button>
        </form>
    </div>
</div>
