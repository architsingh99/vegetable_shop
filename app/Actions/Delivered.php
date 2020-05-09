<?php
namespace App\Actions;
use TCG\Voyager\Actions\AbstractAction;
class Delivered extends AbstractAction
{
    public function getTitle()
    {
        // Action title which display in button based on current status
        return "DELIVERED";
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
        return ($this->data->{'delivery_status'} == 'PENDING' || $this->data->{'delivery_status'} == 'Delivered');
    }
    public function getDefaultRoute()
    {
        // URL for action button when click
       // dd($this->dataType);
        return route('deliver', array("id"=>$this->data->{$this->data->getKeyName()}, "order_id"=>$this->data->order_id));
    }
}