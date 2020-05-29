<?php
namespace App\Actions;
use TCG\Voyager\Actions\AbstractAction;
class Accept extends AbstractAction
{
    public function getTitle()
    {
        // Action title which display in button based on current status
        return "ACCEPT";
    }
    public function getIcon()
    {
        // Action icon which display in left of button based on current status
        return 'voyager-check-circle';
    }
    public function getAttributes()
    {
        // Action button class
        return [
            'class' => 'btn btn-sm btn-primary pull-left',
        ];
    }
    public function shouldActionDisplayOnDataType()
    {
        // show or hide the action button, in this case will show for posts model
        return ($this->data->{'booking_status'} == 'PENDING' || $this->data->{'booking_status'} == 'ACCEPTED');
    }
    public function getDefaultRoute()
    {
        // URL for action button when click
       // dd($this->dataType);
        return route('accept', array("id"=>$this->data->{$this->data->getKeyName()}));
    }
}