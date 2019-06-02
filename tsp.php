<?php
error_reporting(E_ALL ^ E_NOTICE);
class TSP{
    var $routing = array();
    var $result = array();

    function start( $kota ){
        $start = array('id'=>$kota, 'path'=>'');
        $this->route($start);
        return $this->result;
    }

    function setPeta($peta){
        $this->peta = $peta;
    }

    function possible($kota){
        $ret = array();
        foreach($this->peta as $next){
            foreach($next->path as $key=>$target){
                $tmp = array();
                if($next->id == $kota){
                        $tmp['id']  = $key;
                        $tmp['len'] = $target;
                        array_push($ret,$tmp);
                }else{
                    if($key == $kota){
                        $tmp['id']  = $next->id;
                        $tmp['len'] = $next->path[$kota];
                        array_push($ret,$tmp);
                    }
                }
            }
        }
        return $ret;
    }

    function route($start){
        $next = $this->possible($start['id']);

        $lastone = true;
        foreach($next as $nxt){

            $chkpath = $start['path'].'-'.$nxt['id'];
            $chkp = explode('-',$chkpath);

            if(!strpos('x'.$start['path'],$nxt['id']) || ($chkp[0]==$nxt['id'] && sizeof($chkp)==sizeof($this->peta)+1)){
                $tmp = $nxt;
                if($start['path']==''){
                    $tmp['lenmin'] = $nxt['len'];
                    $tmp['path']   = $start['id'].'-'.$tmp['id'];
                }else{
                    $tmp['lenmin'] = $start['lenmin'] + $nxt['len'];
                    $tmp['path']   = $start['path'].'-'.$tmp['id'];
                }
                array_push($this->routing, $tmp);
                $lastone = false;
            }
        }

        usort($this->routing,function($a,$b){ return $a['lenmin'] - $b['lenmin']; });

        $open = $this->routing[0];
        $back = $this->routing[1];

        if($open['path']){
            $tmp = array();
            $tmp['path'] = $this->KOTA($open['path']);
            $tmp['cost'] = $open['lenmin'];
            array_push($this->result, $tmp);
        }

        if($open['path']!=''){
            unset($this->routing[0]);
            $this->route($open);
        }
    }

    function KOTA( $path ){
        foreach($this->peta as $kota){
            $path = str_replace($kota->id,$kota->name,$path);
        }
        return $path;
    }
}

?>
