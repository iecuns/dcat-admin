<?php

namespace Dcat\Admin\Form\Field;

class Icon extends Text
{
    public static $js = '@fontawesome-iconpicker';
    public static $css = '@fontawesome-iconpicker';

    public function render()
    {
        $this->setupScript();

        $value = old($this->column, $this->value());

        $this->prepend("<i class='fa {$value}'></i>")
            ->defaultAttribute('autocomplete', 'off');

        return parent::render();
    }

    protected function setupScript()
    {
        $this->script = <<<JS
setTimeout(function () {
    var field = $('{$this->getElementClassSelector()}'),
        parent = field.parents('.form-field'),
        showIcon = function (icon) {
            parent.find('.input-group-prepend .input-group-text').html('<i class="' + icon + '"></i>');
        };
    
    field.iconpicker({placement:'bottomLeft', animation: false});
    
    parent.find('.iconpicker-item').on('click', function (e) {
       showIcon($(this).find('i').attr('class'));
    });
    
    field.on('keyup', function (e) {
        var val = $(this).val();
        
        if (val.indexOf('fa-') !== -1) {
            if (val.indexOf('fa ') === -1) {
                val = 'fa ' + val;
            }
        }
        
        showIcon(val);
    })
}, 10);
JS;
    }
}
