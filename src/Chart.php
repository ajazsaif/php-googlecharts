<?php

namespace Ajaz\Google;

/**
 * Base chart class
 * 
 * @author Ajaz Alam <ajazaalam@gmail.com>
 */

abstract class Chart
{
    /**
     * Initializes the constructor.
     * @param array $config
     */

    public function __construct(array $config = [])
    {
        //validate unique id of chart
        if(!isset($config['id']))
        {
            throw new \InvalidArgumentException("id key is required");
        }
        //validate chart data key
        if(!isset($config['data']))
        {
            throw new \InvalidArgumentException("data key is required");
        }
        //validate chart data must be array
        if(!is_array($config['data']))
        {
            throw new \InvalidArgumentException("data key must be array");
        }

        //validate options key
        if(!isset($config['options']))
        {
            throw new \InvalidArgumentException("options key is rquired");
        }

        //validate options key
        if(!is_array($config['options']))
        {
            throw new \InvalidArgumentException("options key must be array");
        }

        //assign defualt value to containerOption property
        if(isset($config['containerOption']))
        {
            $this->containerOption = $config['containerOption'];
        }
    }

    /**
     * Renders chart
     * @return string
     */

    public function render()
    {
        $attributes = $this->renderHtmlAttributes($this->containerOption);
        $content = "<div id='".$this->id."' $attributes></div>";
        $this->getJs();
        return $content;
    }

    /**
     * Renders html attributes
     * @param array
     * @return string
     */

    protected function renderHtmlAttributes(array $data)
    {
        if(isset($data['id']))
        {
            unset($data['id']);
        }

        $str = '';
        foreach($data as $key => $val)
        {
            $str .= "$key=\"$val\"";
        }

        return $str;
    }

    /**
     * Return necessary javascript.
     */

    abstract protected function getJs();
}