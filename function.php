<?php
    function message() {

        $response['status'] = 'false';
        $response['message'] = 'Empty';
        if (Yii::$app->session->hasFlash('danger')) {
            $response['status'] = 'error';
            $response['message'] = Yii::$app->session->getFlash('danger');
            // Yii::$app->session->remove('danger');

        } elseif (Yii::$app->session->hasFlash('success')) {
            $response['status'] = 'success';
            $response['message'] = Yii::$app->session->getFlash('success');
            // Yii::$app->session->remove('danger');
        }
        return $response;
    }

    function arrayToString($arr) {
        if(!is_array($arr))
            return "";
        $result = "Array {";
        foreach($arr as $key=>$value) {
            if(is_string($value))
                $result .= "$key => $value\n,";
            else
                $result .= "$key => " . arrayToString($value) . ",";
        }
        return $result . "}";
    }

    function convertDateDdMmYyyyToYyyyMmDd($date, $delimeter = ".", $join = "-") {
        if($date == null)
            return $date;
        $spl = explode($delimeter, $date);
        return $spl[2].$join.$spl[1].$join.$spl[0];
    }

    function convertDateYyyyMmDdToDdMmYyyy($date, $delimeter = "-", $join = ".") {
        if($date == null)
            return $date;
        $spl = explode($delimeter, $date);
        return $spl[2].$join.$spl[1].$join.$spl[0];
    }

    function simpleDate($unix) {
        if($unix !== null)
            return date("d.m.Y", $unix);
        return null;
    }

    function simpleDateTime($unix) {
        if($unix !== null)
            return date("d.m.Y H:i:s", $unix);
        return null;
    }

