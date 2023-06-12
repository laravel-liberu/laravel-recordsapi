<?php

namespace Iamdevmaniac\Recordsapi\traits;

trait MasterTrait {

    /**
     * success response with 200
     *
     * @return void
     */
    public function success($data){
        return [
            "status"=>"200",
            "data"=>$data
        ];
    }


    public function error($code=404){

        return match ($code) {
            404 => $this->response($code,"Invalid AppID/AppKEY"),
            500 => $this->response($code,"Account Deactivated/Suspended. Contact support"),
            504 => $this->response($code,"Catalogue Value Mismatched! Follow the Troubleshooting Guide in API USAGE MANUAL"),
            600 => $this->response($code,"Check values under data node. Last Name is a Mandatory Field"),
            601 => $this->response($code,"No more available calls left as your subscribed Plan. Renew your plan"),
            602 => $this->response($code,"Plan Expired. Renew your plan to continue"),
            603 => $this->response($code,"Invalid Mandatory Field Pattern Detected. Check the [LastName] Field!"),
            604 => $this->response($code,"Invalid Request Pattern Detected! Specify the [State] Name"),
            605 => $this->response($code,"Invalid Request Pattern Detected! [State] Name is Blank"),
            606 => $this->response($code,"Invalid Request Pattern Detected! First/Middle/Last Name is Invalid"),
            608 => $this->response($code,"Invalid Request Pattern Detected! State is Invalid"),
            609 => $this->response($code,"Invalid Request Pattern Detected! County is Invalid"),
            611 => $this->response($code,"Invalid Request Pattern Detected! Specify the State Name/Family Name is Invalid"),
            612 => $this->response($code,"Invalid Request Pattern Detected! Name is too short"),
            614 => $this->response($code,"Invalid Request Pattern Detected! Slang/offensive word"),
            615 => $this->response($code,"Invalid Request Pattern Detected! Slang/Offensive Word in Family Name"),
            681 => $this->response($code,"Invalid Request Pattern Detected! Birth Year is Invalid"),
            682 => $this->response($code,"Invalid Request Pattern Detected! Birth Year is Invalid."),
            683 => $this->response($code,"Invalid Request Pattern Detected! Birth Year is Invalid (Same Year or Year from Future)"),
            684 => $this->response($code,"Invalid Request Pattern Detected! Birth Year is Invalid"),
            default => $this->response(422, "OPPS AN ERROR OCCURED IN REQUEST"),
        };

    }

    public function response($code,$message){
        return [
            "status"=>$code,
            "message"=>$message
        ];
    }


}
