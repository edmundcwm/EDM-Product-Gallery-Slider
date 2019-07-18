<div class="error notice">
    <p>
        <strong>Error:</strong>
        <em><?php echo $this->plugin_name; ?></em> won't execute
        because the following required plugins are not active:
        <?php echo esc_html( implode( ', ', $this->missing_plugin_names ) ) ?>.
        Please activate these plugins.
    </p>
</div>