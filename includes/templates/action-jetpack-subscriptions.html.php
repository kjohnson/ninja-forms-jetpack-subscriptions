<!-- SETTING: EMAIL FIELD -->
<tr>
    <th scope="row">
        <label for="settings[nf-jps-email-field]"><?php _e( 'Email Field', 'ninja-forms-jetpack-subscriptions' ); ?></label>
    </th>
    <td>
        <select name="settings[nf-jps-email-field]" id="settings-nf-jps-email-field">
            <option></option>
            <?php foreach( $form->fields as $field ): ?>
                <?php if( '_text' == $field['type'] ): ?>
                    <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['nf-jps-email-field'] ) echo " selected"; ?>>
                        <?php echo $field['data']['label']; ?> (ID: <?php echo $field['id']; ?>)
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </td>
</tr>