<?php

class FactoryFormFR101TextareaFormControl extends FactoryFormFR101StandartFormControl 
{
    public $type = 'textarea';
        
    protected function renderInput( $c, $value, $fullname ) {
        ?>

        <textarea id="<?php echo $fullname ?>" name="<?php echo $fullname ?>" /><?php echo $value ?></textarea>
        <?php if ( !empty( $c['hint'] ) ) { ?>
            <span class='help-block'><?php echo $c['hint'] ?></span>    
        <?php } ?>
            
        <?php
    }
}