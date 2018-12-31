
<form method="post" action="#form">
    <input type="text" name="sec" value="" class="sec-form-code" style="position: absolute; left:-10000px; top:-10000px; height:0px; width:0px;" >
    <input type="hidden" name="user_agent" value="{{user-agent}}" >
    <input type="hidden" name="ip_address" value="{{ip-address}}" >
    <input type="hidden" name="referrer" value="{{referrer}}" >
    <div class="columns is-multiline">
        <div class="column is-full is-half-desktop">
            <div class="field">
                <label class="label sr-only">Name</label>
                <input type="text" name="first_name" class="input" placeholder="First Name" required>
            </div>
        </div>
        
        <div class="column is-full is-half-desktop">
            <div class="field">
                <label class="label sr-only">Email</label>
                <input type="email" name="email_address" class="input email" placeholder="Email Address" required>
            </div>
        </div>

        <div class="column is-full">
            <div class="field">
                <label class="label sr-only">Message</label>
                <textarea class="textarea" name="message" placeholder="Type your message here."></textarea>
            </div>
        </div>

        <div class="column is-12 has-text-centered">
            <div class="field">
                <button class="button is-default is-large" type="submit">submit</button>
            </div>
        </div>
    </div>
</form>
    
