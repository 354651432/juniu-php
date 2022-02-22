<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\EmbeddedForm;
use Encore\Admin\Form\Field\Embeds;

class NestedEmbeds extends Embeds
{
    protected $view = 'admin::form.embeds';

    protected function buildEmbeddedForm()
    {
        $form = new EmbeddedForm($this->elementName);

        $form->setParent($this->form);

        call_user_func($this->builder, $form);

        $form->fill($this->getEmbeddedData());

        return $form;
    }
}