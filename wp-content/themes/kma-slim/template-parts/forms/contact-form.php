
<form method="post">
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
    
