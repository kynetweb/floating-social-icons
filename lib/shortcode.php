[php] <?php

function form_creation(){
?>
<form>
First name: <input type=”text” name=”firstname”><br>
Last name: <input type=”text” name=”lastname”><br>
Message: <textarea name=”message”> Enter text here…</textarea>
</form> <?php
}
add_shortcode('test', 'form_creation');
?>[/php]