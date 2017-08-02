<h1>Cattastic Settings</h1>

<h3>Instructions: add shortcode [cattastic] to your page, post, or widget area to show a bunch of fun cats!  If you click on one of the images, the image will change to a new cat! </h3>

<form method="POST">
    <label >API KEY (disabled since I am using my own API key.  In production, user would apply for their own API Key</label>
    <input type="text" disabled><br>
    <label for="number_of_results">Number of Results (how many cat pictures you want to see)</label>
    <input type="text" name="number_of_results" id="number_of_results" value="<?php echo $value; ?>">
    <?php echo wp_nonce_field( 'wpshout_option_page_example_action' ); ?> <br>
    <input type="submit" value="Save" class="button button-primary button-large" onClick = "alert('Saved Successfully');">
</form>