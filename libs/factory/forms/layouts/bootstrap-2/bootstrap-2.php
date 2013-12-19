<?php
/**
 * The file contains a form layout based on Twitter Bootstrap 2
 * 
 * @author Paul Kashtanoff <paul@byonepress.com>
 * @copyright (c) 2013, OnePress Ltd
 * 
 * @package factory-forms 
 * @since 1.0.0
 */

/**
 * A form layout based on Twitter Bootstrap 2
 */
class FactoryForms300_Bootstrap2FormLayout extends FactoryForms300_FormLayout {
    
    public $name = 'default';
    
    /**
     * Creates a new instance of a bootstrap3 form layout.
     * 
     * @since 1.0.0
     * @param mixed[] $options A holder options.
     * @param FactoryForms300_Form $form A parent form.
     */
    public function __construct($options, $form) {
        parent::__construct($options, $form);
        $this->addCssClass('factory-bootstrap-300');
    }
    
    /**
     * Renders a beginning of a form.
     * 
     * @since 1.0.0
     * @return void
     */
    protected function beforeRendering() {
    ?>
        <div <?php $this->attrs() ?>>
            <div class="form-horizontal">
    <?php
    }
    
    /**
     * Renders the end of a form.
     * 
     * @since 1.0.0
     * @return void
     */
    protected function afterRendering() {
    ?>
            </div>
        </div>
    <?php
    }
    
    public function beforeControl( $control ) {
        if ( $control->getType() == 'hidden' ) return;
        
        $themeClass = '';
        if ( isset($control->options['theme']) ) $themeClass = $control->options['theme'];
    ?>
    <div class="control-group <?php echo $themeClass ?>">
        <label for="<?php $control->printNameOnForm() ?>" class="control-label">
            <?php if ( $control->hasIcon() ) { ?>
            <img class="control-icon" src="<?php $control->icon() ?>" />
            <?php } ?>        
            <?php $control->title() ?>
            <?php if ( $control->hasHint() && $control->getLayoutOption('hint-position', 'bottom') == 'left' ) { ?>
            <div class="help-block"><?php $control->hint() ?></div>
            <?php } ?>
        </label>
        <div class="controls">
    <?php
    }

    public function afterControl( $control ) {
        if ( $control->getType() == 'hidden' ) return;
    ?>
        <?php if ( $control->hasHint() && $control->getLayoutOption('hint-position', 'bottom') == 'bottom' ) { ?>
        <div class="help-block">
            <?php $control->hint() ?>
        </div>
        <?php } ?>
        </div>
    </div>
    <?php
    }
}