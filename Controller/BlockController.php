<?php

class BlockController
{

    public function getBlock($file, $data = [])
    {
        require $file;
    }  

}

